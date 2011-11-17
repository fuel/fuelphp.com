<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * PyroCMS
 *
 * An open source CMS based on CodeIgniter
 *
 * @package		PyroCMS
 * @author		PyroCMS Dev Team
 * @license		Apache License v2.0
 * @link		http://pyrocms.com
 * @since		Version 0.9.8-rc2
 * @filesource
 */

/**
 * PyroCMS Forums Posts Controller
 *
 * Provides CRUD for topic replies
 *
 * @author		Dan Horrigan <dan@dhorrigan.com>
 * @package		PyroCMS
 * @subpackage		Forums
 */
class Posts extends Public_Controller {

	/**
	 * validation rules
	 *
	 * @var array
	 * @access protected
	 */
	protected $validation_rules = array();

	/**
	 * Constructor
	 *
	 * Loads dependencies and sets template settings
	 *
	 * @access	public
	 * @return	void
	 */
	public function __construct()
	{
		parent::__construct();

		// Load dependencies
		$this->load->models(array('forums_m', 'forum_posts_m', 'forum_subscriptions_m', 'users/users_m'));
		$this->load->helper(array('smiley', 'forums', 'gravatar', 'users/user'));
		$this->load->helper($this->settings->forums_editor); //bbcode or textile
		$this->load->library('forums_lib');
		$this->load->config('forums');
		$this->lang->load('forums');

		$this->validation_rules = array(
						array(
							'field' => 'content',
							'label' => lang('forums.message_label'),
							'rules' => 'trim|required'
						),
						array(
							'field' => 'notify',
							'label' => lang('forums.subscription_label'),
							'rules' => 'is_numeric|max_length[1]'
						)
					);

		// Template settings
		$this->template
			->enable_parser_body(FALSE)
			->append_metadata( theme_css('forums.css') )
			->append_metadata( js('forums.js', 'forums') )
			->set_breadcrumb(lang('breadcrumb_base_label'), '/')
			->set_breadcrumb(lang('forums_forum_title'), 'forums')
			->set_partial('search_form', 'partials/search');
	}

	/**
	 * View Reply
	 *
	 * Takes the reply and redirects to the correct topic and page.
	 *
	 * @param	int	$reply_id	Id of the reply
	 * @access	public
	 * @return	void
	 */
	public function view_reply($reply_id = FALSE)
	{
		(!$reply_id) ? show_404() : '' ;
		
		$reply_id = (int) $reply_id;
		// If not a valid reply then 404
		($reply = $this->forum_posts_m->get_reply($reply_id)) || show_404();

		$this->forums_lib->has_access($reply->forum_id) or show_404();

		// Get the offset (for pagination)
		$per_page = 10;
		$offset = (int) ($this->forum_posts_m->count_prior_posts($reply->parent_id, $reply->created_on) / $per_page);
		$offset = ($offset == 0) ? '' : '/' . ($offset * $per_page);

		// Propogate flashdata
		$this->session->set_flashdata('notice', $this->session->flashdata('notice'));
		$this->session->set_flashdata('error', $this->session->flashdata('error'));
		$this->session->set_flashdata('success', $this->session->flashdata('success'));

		$reply->parent_id > 0

			// This is a reply
			? redirect('forums/topics/view/' . $reply->parent_id . $offset . '#' . $reply_id)

			// This is a new topic
			: redirect('forums/topics/view/' . $reply_id);
	}

	/**
	 * Quote Reply
	 *
	 * Stores the quote of $post_id in flashdata then redirects to edit_reply.
	 *
	 * @param	int	$post_id	Id of the post to quote
	 * @access	public
	 * @return	void
	 */
	public function quote_reply($post_id = FALSE)
	{
		(!$post_id) ? show_404() : '' ;
		
		$post_id = (int) $post_id;
		// If post is not valid 404
		$quote = $this->forum_posts_m->get_post($post_id) OR show_404();

		$this->forums_lib->has_access($quote->forum_id) or show_404();

		// Put the quote in the flashdata.
		$this->session->set_flashdata('forum_quote', serialize($quote));

		// set the topic's id
		$topic_id = $quote->parent_id > 0 ? $quote->parent_id : $quote->id;

		// Redirect to the normal reply form. It will pick the quote up
		redirect('forums/posts/new_reply/' . $topic_id);
	}

	/**
	 * New Reply
	 *
	 * Displays new reply form and adds reply to topic
	 *
	 * @param	int	$topic_id	Id of the topic to reply too
	 * @access	public
	 * @return	void
	 */
	public function new_reply($topic_id = FALSE)
	{
		(!$topic_id) ? show_404() : '' ;
		
		$topic_id = (int) $topic_id;
		
		// Can't reply if you aren't logged it
		$this->ion_auth->logged_in() or redirect('users/login');

		// Get the topic and forum info
		$topic = $this->forum_posts_m->get_topic($topic_id);
		
		$this->forums_lib->has_access($topic->forum_id) or show_404();
		
		//if topic is locked.. bye bye... unless is moderator or admin
		if($topic->is_locked and !$this->forums_lib->can_post($topic->forum_id))
		{
			$this->session->set_flashdata('notice', lang('forums.locked_msg'));
			redirect('forums/topics/view/' . $topic->id);
		}
		
		$forum = $this->forums_m->get(@$topic->forum_id);
		$quote = array();
		// Chech if there is a forum with that ID
		($topic and $forum) or show_404();
		
		//get last topic post
		$last_post = $this->forum_posts_m->last_topic_post($topic->id);
		$last_post->author = $this->forum_posts_m->author_info($last_post->author_id);
		$last_post->author->post_count = $this->forum_posts_m->count_user_posts($last_post->author_id);

		// If it's a quote reply get the flashdata
		if ($this->session->flashdata('forum_quote'))
		{
			$quote = unserialize($this->session->flashdata('forum_quote'));

			if ($this->settings->forums_editor == 'bbcode')
			{
				$q_date = forum_date($quote->created_on);
				$q_author = $this->users_m->get(array('id' => $quote->author_id))->full_name;
				$reply->content = '[quote author=' . $q_author . ' date=' . $q_date . ']' . $quote->content . '[/quote]';
			}
			elseif ($this->settings->forums_editor == 'textile')
			{
				$reply->content = 'bq..  ' . $quote->content . "\n\n";
			}
		}

		// If not a reply jsut set the content to the form validation value
		else
		{
			$reply->content = $this->input->post('content', TRUE);
		}

		// Default's notify based on if the user is subscribed already
		$reply->notify = $this->forum_subscriptions_m->is_subscribed($this->current_user->id, $topic_id);
		
		$reply->notify = $this->input->post('preview') ? $this->input->post('notify') : $reply->notify ;

		// Decode the content.  This is required because of DB encoding.
		$reply->content = htmlspecialchars_decode($reply->content, ENT_QUOTES);

		// The form has been submitted one way or another
		if ($this->input->post('submit') or $this->input->post('preview'))
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules($this->validation_rules);

			// Run form validation and add the reply
			if ($this->form_validation->run() === TRUE)
			{
				// Add the reply already
				if ($this->input->post('submit'))
				{
					// Try and add the reply
					if ($reply->id = $this->forum_posts_m->new_reply($this->current_user->id, $reply, $topic))
					{
						// Set Topic Update Time
						$this->forum_posts_m->set_topic_update($topic->id);

						// Set some info needed for notificaations
						$reply->title = $topic->title;
						$reply->topic_id = $topic->id;
						$recipients = $this->forums_lib->get_recipients($topic_id);

						// Send notifications
						$this->forums_lib->notify_reply($recipients, $reply);

						// User wants to be notified
						if ($this->input->post('notify') == 1)
						{
							$this->forum_subscriptions_m->add($this->current_user->id, $topic->id);
						}

						// User does NOT want to be notified, so unsubscribe them.
						else
						{
							$this->forum_subscriptions_m->delete_by(array('user_id' => $this->current_user->id, 'topic_id' => $topic->id));
						}
						$this->session->set_flashdata('success', lang('forums.reply_success'));
						redirect('forums/posts/view_reply/' . $reply->id);
					}

					// Couldn't add the reply for some reason
					else
					{
						show_error(lang('forums.reply_error'));
					}
				}
			}
		}

		// Template settings, then build
		$this->template->set_partial('buttons', 'partials/buttons')
				->set_breadcrumb($forum->title, 'forums/view/' . $topic->forum_id)
				->set_breadcrumb($topic->title, 'forums/topics/view/' . $topic->id)
				->set_breadcrumb(lang('forums.new_reply_label'))
				->set('quote', $quote)
				->set('reply', $reply)
				->set('forum', $forum)
				->set('topic', $topic)
				->set('show_preview', $this->input->post('preview'))
				->set('last_post', $last_post)
				->title( lang('forums_forum_title'), lang('forums.new_reply_label') )
				->build('posts/reply_form');
	}

	/**
	 * Edit Reply
	 *
	 * Allows users to edit their replies. Admins can edit all.
	 *
	 * @param	int $reply_id	Id of reply to edit
	 * @access	public
	 * @return	void
	 */
	public function edit_reply($reply_id = FALSE)
	{
		(!$reply_id) ? show_404() : '' ;
		
		$reply_id = (int) $reply_id;
		// Can't edit if you aren't logged in
		$this->ion_auth->logged_in() or redirect('users/login');

		// Get the reply info
		$reply = $this->forum_posts_m->get($reply_id);

		// This is the main topic so get it's info
		if (empty($reply->parent_id))
		{
			$topic = $this->forum_posts_m->get_topic($reply_id);
		}

		// This is a reply so get the parent's info
		else
		{
			$topic = $this->forum_posts_m->get_topic($reply->parent_id);
		}

		// Get forum info
		$forum = $this->forums_m->get($reply->forum_id);

		// Vlaid topic and forum? No? 404.
		($topic && $forum) or show_404();

		// You have to be the author or an admin.  Neither? 404.
		$this->forums_lib->can_edit($reply) or redirect('forums/posts/view_reply/' . $reply_id);
		
		// Default's notify based on if the user is subscribed already
		$reply->notify = $this->forum_subscriptions_m->is_subscribed($this->current_user->id, $topic->id);
		$notify = $reply->notify;
		
		// Override with post data if it exists
		$this->input->post('content') and $reply->content = $this->input->post('content', TRUE);
		$reply->notify = $this->input->post('preview') ? $this->input->post('notify') : $reply->notify ;

		// Must decode the content.  DB encodes quotes and such.
		$reply->content = htmlspecialchars_decode($reply->content, ENT_QUOTES);

		// The form has been submitted one way or another
		if ($this->input->post('submit') or $this->input->post('preview'))
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules($this->validation_rules);

			// Did we pass form validation?
			if ($this->form_validation->run() === TRUE)
			{
				// Go ahead and update the reply
				if ($this->input->post('submit'))
				{
					$reply->id = $this->forum_posts_m->update($reply_id, array(
								'content' => $reply->content
							));
						//update subscription ?
						if($notify AND !$this->input->post('notify'))
						{
								$this->forum_subscriptions_m->delete_by(array('user_id' => $this->current_user->id, 'topic_id' => $topic->id));
						}
						elseif(!$notify AND $this->input->post('notify'))
						{
								$this->forum_subscriptions_m->add($this->current_user->id, $topic->id);
						}
					// Yay it was added.
					if ($reply->id)
					{			
						$this->session->set_flashdata('notice', lang('forums.reply_edit_success'));
						redirect('forums/posts/view_reply/' . $topic->id);
					}
					else
					{
						show_error(lang('forums.reply_edit_error'));
					}
				}
			}
		}
		
		//get last topic post
		$last_post = $this->forum_posts_m->last_topic_post($topic->id);
		$last_post->author = $this->forum_posts_m->author_info($last_post->author_id);
		$last_post->author->post_count = $this->forum_posts_m->count_user_posts($last_post->author_id);

		//Template Settings and build
		$this->template->set_partial('buttons', 'partials/buttons')
				->set_breadcrumb($forum->title, 'forums/view/' . $forum->id)
				->set_breadcrumb($topic->title, 'forums/topics/view/' . $topic->id)
				->set_breadcrumb(lang('forums.edit_reply_label'))
				->set('forum', $forum)
				->set('topic', $topic)
				->set('reply', $reply)
				->set('last_post', $last_post)
				->set('show_preview', $this->input->post('preview'))
				->title( lang('forums_forum_title'), lang('forums.edit_reply_label') )
				->build('posts/reply_form');
	}

	/**
	 * Delete Reply
	 *
	 * Allows users to delete their posts, admins can delete any.
	 *
	 * @param	int	$reply_id Id of the reply to delete
	 * @access	public
	 * @return	void
	 */
	public function delete_reply($reply_id = FALSE)
	{
		(!$reply_id) ? show_404() : '' ;
		
		$reply_id = (int) $reply_id;
		// You gotta be logged in
		$this->ion_auth->logged_in() or redirect('users/login');

		// Get the reply
		$reply = $this->forum_posts_m->get($reply_id);

		// Chech if it is the user's reply or if admin
		$this->forums_lib->can_delete($reply) or redirect('forums/posts/view_reply/' . $reply_id);

		// Delete the post
		$this->forum_posts_m->delete($reply_id);

		// If it's a topic delete all the replies
		if ($reply->parent_id == 0)
		{
			$this->forum_posts_m->delete_by(array('parent_id' => $reply_id));

			$this->session->set_flashdata('notice', lang('forums.topic_delete_success'));
			redirect('forums/view/' . $reply->forum_id);
		}

		// It's a single reply
		else
		{
			$this->session->set_flashdata('success', lang('forums.reply_delete_success'));
			redirect('forums/topics/view/' . $reply->parent_id);
		}
	}
}

/* End of file controllers/posts.php */