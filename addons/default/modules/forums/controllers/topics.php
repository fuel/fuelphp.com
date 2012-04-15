<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
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
 * PyroCMS Forums Topic Controller
 *
 * Provides viewing and CRUD for topics
 *
 * @author		Dan Horrigan <dan@dhorrigan.com>
 * @package		PyroCMS
 * @subpackage	Forums
 */
class Topics extends Public_Controller {

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
	 * Loads dependencies and template settings
	 *
	 * @access	public
	 * @return	void
	 */
	public function __construct()
	{
		parent::__construct();

		// Load dependencies
		$this->load->models(array('forums_m', 'forum_posts_m', 'forum_subscriptions_m', 'forum_read_topics_m'));
		$this->load->helper(array('smiley', 'forums', 'users/user'));
		$this->load->helper($this->settings->item('forums_editor'));
		$this->lang->load('forums');
		$this->load->config('forums');
		$this->load->library('forums_lib');
		
		$this->validation_rules = array(
						array(
							'field' => 'content',
							'label' => lang('forums.message_label'),
							'rules' => 'trim|required'
						),
						array(
							'field' => 'title',
							'label' => lang('forums_title_label'),
							'rules' => 'trim|strip_tags|required|max_length[100]'
						)
					);
		
		// Set Template Settings
		$this->template
			//->enable_parser_body(FALSE)
			->append_css('module::forums.css')
			->append_js('module::forums.js')
			->set_partial('search_form', 'partials/search')
			->set_breadcrumb(lang('breadcrumb_base_label'), '/')
			->set_breadcrumb(lang('forums_forum_title'), 'forums');
	}

	/**
	 * View
	 *
	 * Loads the topic and displays it with all replies.
	 *
	 * @param	int	$topic_id	Id of the topic to display
	 * @param	int	$offset		The offset used for pagination
	 * @access	public
	 * @return	void
	 */
	public function view($topic_id = FALSE, $offset = 0)
	{
		(!$topic_id) ? show_404() : '' ;
		
		$topic_id = (int) $topic_id;
		
		// Update view counter
		$this->forum_posts_m->add_topic_view($topic_id);
		
		// Pagination junk
		$per_page = '10';
		$pagination = create_pagination('forums/topics/view/'.$topic_id, $this->forum_posts_m->count_posts_in_topic($topic_id), $per_page, 5);
		if($offset < $per_page)
		{
			$offset = 0;
		}
		$pagination['offset'] = $offset;
		// End Pagination

		// If topic or forum do not exist then 404
		($topic = $this->forum_posts_m->get($topic_id)) or show_404();
		($forum = $this->forums_m->get($topic->forum_id)) or show_404();
		
		$move_form = '';
		//check user access
		$this->forums_lib->has_access($topic->forum_id) or show_404();
		
		//do we have the ability to move?
		if($this->forums_lib->can_move($topic))
		{
			//get the list of possible forums
			$data['forum_options'] = $this->forums_m->dropdown('id', 'title');
			$data['current_forum'] = array($topic->forum_id);
			$data['topic_id'] = $topic_id;
			
			//get the partial move form
			$move_form = $this->load->view('partials/move_form', $data, TRUE);
		}		
	
		// Get a list of posts which have no parents (topics) in this forum
		$topic->posts = $this->forum_posts_m->get_posts_by_topic($topic_id, $offset, $per_page);
		foreach($topic->posts as &$post)
		{
			$post->author = $this->forum_posts_m->author_info($post->author_id);
			$post->author->post_count =  $this->forum_posts_m->count_user_posts($post->author_id);
		}
		
		//mark this topic as read
		$this->current_user AND $this->current_user->id ? $this->forum_read_topics_m->mark($this->current_user->id, $forum->id, $topic_id) : '' ;
		
		// Create page
		$this->template->title($topic->title)
				->set_breadcrumb($forum->title, 'forums/view/'.$forum->id)
				->set_breadcrumb($topic->title)
				->set('topic', $topic)
				->set('forum', $forum)
				->set('pagination', $pagination)
				->set('move_form', $move_form)
				->title( lang('forums_forum_title'), $forum->title, $topic->title )
				->build('posts/view');
	}

	/**
	 * New Topic
	 *
	 * Create a new topic in a forum.
	 *
	 * @param	int	$forum_id	Id of the forum where creating the new topic
	 * @access	public
	 * @return	void
	 */
	public function new_topic($forum_id = FALSE)
	{
		(!$forum_id) ? show_404() : '' ;
		
		$forum_id = (int) $forum_id;
		
		if(!$this->ion_auth->logged_in())
		{
			redirect('users/login');
		}
		
		// Get the forum name
		$forum = $this->forums_m->get($forum_id);
		
		// Chech if there is a forum with that ID
		if(empty($forum))
		{
			show_404();
		}
		
		//check user access they shouldn't be allowed to post in this forum if
		//they don't have access
		$this->forums_lib->has_access($forum_id) or show_404();
		
		//if the forum is closed redirect if not admin
		if($forum->is_closed and !$this->forums_lib->can_post($forum->id))
		{
			$this->session->set_flashdata('notice', lang('forums_forum_closed_message'));
			redirect('forums/view/'.$forum->id);
		}
		
		$topic = FALSE;
		
		if($this->input->post('submit') or $this->input->post('preview'))
		{
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules($this->validation_rules);
			
			if ($this->form_validation->run() === TRUE)
			{
				if( $this->input->post('submit') )
				{
					$topic->title = $this->input->post('title', TRUE);
					
					$topic->content = htmlspecialchars_decode($this->input->post('content', TRUE), ENT_QUOTES);
					
					if($topic->id = $this->forum_posts_m->new_topic($this->current_user->id, $topic, $forum))
					{
						$this->forum_posts_m->set_topic_update($topic->id);

						// Add user to notify
						if($this->input->post('notify') == 1)
						{
							$this->forum_subscriptions_m->add($this->current_user->id, $topic->id);
						}
						else
						{
							$this->forum_subscriptions_m->delete_by(array('user_id' => $this->current_user->id, 'topic_id' => $topic->id));
						}
						redirect('forums/topics/view/'.$topic->id);
					}
					
					else
					{
						show_error(lang('forums.topic_add_error'));
					}
				}
			}
		}
		
		$this->template->set_partial('buttons', 'partials/buttons')
				->set_breadcrumb($forum->title, 'forums/view/'.$forum->id)
				->set_breadcrumb(lang('forums.new_topic_label'))
				->set('forum', $forum)
				->set('topic', $topic)
				->set('show_preview', $this->input->post('preview'))
				->title( lang('forums_forum_title'), $forum->title, lang('forums.new_topic_label') )
				->build('posts/new_topic');
	}

	/**
	 * Stick Topic
	 *
	 * Make a topic stick to the top of a forum.
	 *
	 * @param	int	$topic_id	id of the topic being stickied
	 * @access	public
	 * @return	void
	 */
	public function stick($topic_id = FALSE)
	{
		!$topic_id ? redirect('forums') : '' ;
		
		$topic_id = (int) $topic_id;
		
		$this->ion_auth->logged_in() or redirect('users/login');
		
		$topic = $this->forum_posts_m->get($topic_id);
		
		empty($topic) and show_404();
		
		//check user access they shouldn't be allowed to sticky in this forum if
		//they don't have access
		$this->forums_lib->can_sticky($topic) or show_404();

		if($this->forum_posts_m->update($topic_id, array('sticky' => 1)))
		{
			$this->session->set_flashdata('success', lang('forums.sticky_success'));
		}
		else
		{
			$this->session->set_flashdata('error', lang('forums.sticky_error'));

		}
		redirect('forums/topics/view/' . $topic_id);
	}
	
	/**
	 * Un Stick Topic
	 *
	 * Un-stick a previously stickied topic
	 *
	 * @param	int	$topic_id	id of the topic to un-stick
	 * @access	public
	 * @return	void
	 */
	public function unstick($topic_id = FALSE)
	{
		!$topic_id ? redirect('forums') : '' ;
		
		$topic_id = (int) $topic_id;
		
		$this->ion_auth->logged_in() or redirect('users/login');

		$topic = $this->forum_posts_m->get($topic_id);
		
		empty($topic) and show_404();
		
		//check user access they shouldn't be allowed to sticky in this forum if
		//they don't have access
		$this->forums_lib->can_sticky($topic) or show_404();

		if($this->forum_posts_m->update($topic_id, array('sticky' => 0)))
		{
			$this->session->set_flashdata('success', lang('forums.unstick_success'));
		}
		else
		{
			$this->session->set_flashdata('error', lang('forums.unstick_error'));

		}
		redirect('forums/topics/view/' . $topic_id);
	}
	
	/**
	 * Lock a topic
	 *
	 * Lock a topic preventing any new replies
	 *
	 * @param 	int	$topic_id
	 * @access	public
	 * @return	void
	 */
	public function lock($topic_id = FALSE)
	{
		!$topic_id ? redirect('forums') : '' ;
		
		$topic_id = (int) $topic_id;
		
		$this->ion_auth->logged_in() or redirect('users/login');

		$topic = $this->forum_posts_m->get($topic_id);
		
		empty($topic) and show_404();
		
		//check user access they shouldn't be allowed to lock in this forum if
		//they don't have access
		$this->forums_lib->can_lock($topic) or show_404();
		
		if($this->forum_posts_m->update($topic_id, array('is_locked' => 1)))
		{
			$this->session->set_flashdata('success', lang('forums.lock_success'));
		}
		else
		{
			$this->session->set_flashdata('error', lang('forums.lock_error'));
		}
		redirect('forums/topics/view/' . $topic_id);
	}
	
	/**
	 * Lock a topic
	 *
	 * Lock a topic preventing any new replies
	 *
	 * @param 	int	$topic_id
	 * @access	public
	 * @return	void
	 */
	public function unlock($topic_id = FALSE)
	{
		!$topic_id ? redirect('forums') : '' ;
		
		$topic_id = (int) $topic_id;
		
		$this->ion_auth->logged_in() or redirect('users/login');

		$topic = $this->forum_posts_m->get($topic_id);
		
		empty($topic) and show_404();
		
		//check user access they shouldn't be allowed to lock in this forum if
		//they don't have access
		$this->forums_lib->can_lock($topic) or show_404();
		
		if($this->forum_posts_m->update($topic_id, array('is_locked' => 0)))
		{
			$this->session->set_flashdata('success', lang('forums.unlock_success'));
		}
		else
		{
			$this->session->set_flashdata('error', lang('forums.unlock_error'));
		}
		redirect('forums/topics/view/' . $topic_id);
	}

	/**
	 * Move a topic to another forum
	 *
	 * @param 	none
	 * @access	public
	 * @return	void
	 */
	public function move()
	{
		$forum_id = $this->input->post('forum_id');
		$topic_id = $this->input->post('topic_id');
		
		//check access again
		$this->forums_lib->can_move($forum_id) or show_404();
		
		if(is_numeric($forum_id) and is_numeric($topic_id))
		{
			if($this->forum_posts_m->update($topic_id, array('forum_id' => $forum_id)))
			{
				$this->forum_posts_m->update_by('parent_id', $topic_id, array('forum_id' => $forum_id));
				$this->session->set_flashdata('success', lang('forums_move_topic_message'));
			}
		}
		redirect('forums/topics/view/'.$topic_id);
	}
	
	/**
	 * Mark a previously read topic as unread
	 *
	 * @param	$forum_id
	 * @param	$topic_id
	 * @access	public
	 * @return	void
	 */
	public function unread($forum_id = FALSE, $topic_id = FALSE)
	{
		if($forum_id and $topic_id and $this->current_user)
		{
			//get the read topics for this forum
			$topics = $this->forum_read_topics_m->get_by(array('user_id' => $this->current_user->id, 'forum_id' => $forum_id));
			
			if(!empty($topics))
			{
				$topics = unserialize($topics->topics);
			}
			
			if(array_key_exists($topic_id, $topics))
			{
				unset($topics[$topic_id]);
			}
			
			$new_topics = serialize($topics);
			//insert the new topic data
			
			$data = array(
				'topics' => $new_topics,
				'last_activity' => now()
			);
			
			$this->forum_read_topics_m->update_by(array('user_id' => $this->current_user->id, 'forum_id' => $forum_id), $data);
			redirect('forums/view/'.$forum_id);
		}
		redirect('forums');
	}
}
/* Enf of file controllers/topics.php */