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
 * PyroCMS Forums Posts Controller
 *
 * Provides CRUD for topic replies
 *
 * @author		Dan Horrigan <dan@dhorrigan.com>, Stephen Cozart <stephen.cozart@gmail.com>
 * @package		PyroCMS
 * @subpackage		Forums
 * @
 */
class Forums extends Public_Controller {

	function __construct()
	{
		parent::__construct();
			
		$this->load->model(array(
			'forums_m',
			'forum_categories_m',
			'forum_posts_m',
			'forum_read_topics_m',
			'users/users_m'
		));
		
		$this->load->helper(array('forums', 'users/user'));
		
		$this->load->library('forums_lib');
		
		$this->lang->load('forums');
		
		$this->load->config('forums');

		$this->template
			->enable_parser_body(FALSE)
			->append_metadata( theme_css('forums.css') )
			->append_metadata( js('forums.js', 'forums') )
			->set_breadcrumb(lang('breadcrumb_base_label'), '/')
			->set_partial('search_form', 'partials/search');
		
		$this->read_topics = $this->current_user ? $this->forum_read_topics_m->read_topics($this->current_user->id) : array();
	}
	
	/**
	 * Displays list of forum categories and their associated forums
	 *
	 * @access public
	 * @return void
	 */
	public function index()
	{
		if( $forum_categories = $this->forum_categories_m->order_by('sort_order', 'ASC')->get_all() )
		{
			// Get list of categories
			foreach($forum_categories as &$category)
			{
				$category->forums = $this->forums_m->order_by('sort_order', 'ASC')
									->get_many_by('category_id', $category->id);
				
				// Get a list of forums in each category
				foreach($category->forums as $key => &$forum)
				{
					//check to see if the user has access before doing all this stuff
					if($this->forums_lib->has_access($forum->id))
					{
						$forum->topic_count = $this->forum_posts_m->count_topics_in_forum( $forum->id );
						$forum->reply_count = $this->forum_posts_m->count_replies_in_forum( $forum->id );
						$forum->last_post = $this->forum_posts_m->last_forum_post($forum->id);
							$user_activity = $this->current_user ? $this->forum_read_topics_m->get_by(array('user_id'=>$this->current_user->id, 'forum_id'=>$forum->id)) : FALSE ;
			
							$user_last_activity = (!empty($user_activity)) ? $user_activity->last_activity : 0 ;
						
						if($forum->last_post AND $forum->last_post->created_on > $user_last_activity)
						{
							$forum->image = 'folder.png';
						}
						else
						{
							$forum->image = 'folder-read.png';
						}
						
						if($forum->topic_count == 0)
						{
							$forum->image = 'folder-read.png';
						}
					}
					else
					{
						unset($category->forums[$key]);
					}
				}
			}
		}
		
		$this->template->set_breadcrumb( lang('forums_forum_title') )
				->set('forum_categories', $forum_categories)
				->title( lang('forums_forum_title') )
				->build('forum/index');
	}

	/**
	 * View the specified forum
	 *
	 * @access public
	 * @return void
	 */
	function view($forum_id = FALSE, $offset = 0)
	{
		(!$forum_id) or !$this->forums_lib->has_access($forum_id) ? show_404() : '' ;
		
		$forum_id = (int) $forum_id;
		// Check if forum exists, if not 404
		($forum = $this->forums_m->get($forum_id)) || show_404();
		
		

		// Pagination junk
		$per_page = '25';
		$pagination = create_pagination('forums/view/'.$forum_id, $this->forum_posts_m->count_topics_in_forum($forum_id), $per_page, 4);
		if($offset < $per_page)
		{
			$offset = 0;
		}
		$pagination['offset'] = $offset;
		// End Pagination

		// Get all topics for this forum
		$forum->topics = $this->forum_posts_m->get_topics_by_forum($forum_id, $offset, $per_page);
		
		// Get a list of posts which have no parents (topics) in this forum
		foreach($forum->topics as &$topic)
		{
			$topic->post_count = $this->forum_posts_m->count_posts_in_topic($topic->id);
			$topic->last_post = $this->forum_posts_m->last_topic_post($topic->id);
			
			
			if(array_key_exists($forum_id, $this->read_topics) AND array_key_exists($topic->id, $this->read_topics[$forum_id]))
			{
				$topic->image = 'folder-read.png';
				
				if($this->read_topics[$forum_id][$topic->id] < $topic->last_post->created_on)
				{
						$topic->image = 'folder.png';
				}
			}
			else
			{
				$topic->image = 'folder.png';
			}
			
			
			
			
			if($topic->is_locked)
			{
				$topic->image = 'lock.png';
			}

			if(!empty($topic->last_post))
			{
				$topic->last_post->author = $this->forum_posts_m->author_info($topic->last_post->author_id);
			}
		}

		$this->template->set_breadcrumb(lang('forums_forum_title'), 'forums')
				->set_breadcrumb($forum->title)
				->set('forum', $forum)
				->set('pagination', $pagination)
				->title(lang('forums_forum_title'), $forum->title)
				->build('forum/view');
	}
	
	/**
	 * Show new topics
	 *
	 * @access public
	 * @return void
	 */
	public function newtopics($offset = 0)
	{
		//$last_activity = $this->forum_read_topics_m->last_activity($this->current_user->id);
		//$forum->topics = $this->forum_posts_m->created_after($last_activity);
		$offset = (int) $offset;
		
		$num_topics = count($this->forum_posts_m->unread($this->read_topics));
		
		// Pagination junk
		$per_page = '25';
		$pagination = create_pagination('forums/newtopics', $num_topics, $per_page, 3);
		if($offset < $per_page)
		{
			$offset = 0;
		}
		$pagination['offset'] = $offset;
		// End Pagination
		
		$forum->topics = $this->forum_posts_m->unread($this->read_topics, $offset, $per_page);
		
		foreach($forum->topics as $key => &$topic)
		{
			//we only want to show the new topics if the user should know they exist
			if($this->forums_lib->has_access($topic->forum_id))
			{
				$topic->post_count = $this->forum_posts_m->count_posts_in_topic($topic->id);
				$topic->last_post = $this->forum_posts_m->last_topic_post($topic->id);
				$topic->forum_name = $this->forums_m->get($topic->forum_id)->title;
				$topic->image = 'folder.png';
				
				if(!empty($topic->last_post))
				{
					$topic->last_post->author = $this->forum_posts_m->author_info($topic->last_post->author_id);
				}
			}
			else
			{
				unset($forum->topics[$key]);
			}
		}

		$this->template->set_breadcrumb(lang('forums_forum_title'), 'forums')
				->set_breadcrumb(lang('forums.new_topics_header'))
				->set('forum', $forum)
				->set('pagination', $pagination)
				->title(lang('forums_forum_title'), lang('forums.new_topics_header'))
				->build('forum/newtopics');
	}
	
	/**
	 * Mark all posts as read 
	 *
	 * @access public
	 * @return void
	 */
	public function markall()
	{
		$before = now();
		$topics = $this->forum_posts_m->created_before($before);
		$this->forum_read_topics_m->mark_all_read($this->current_user->id, $topics);
		
		redirect('forums');
	}
	
	/**
	 * Unsubscribe from a topic
	 *
	 * @access public
	 * @return void
	 */
	public function unsubscribe($user_id = FALSE, $topic_id = FALSE)
	{
		(!$user_id OR !$topic_id) ? show_404() : '' ;
		
		$this->load->model('forum_subscriptions_m');
		
		$topic = $this->forum_posts_m->get($topic_id);
		
		$this->forum_subscriptions_m->delete_by(array('user_id' => $user_id, 'topic_id' => $topic_id));
		
		$this->template->set('topic', $topic)
				->build('posts/unsubscribe');
	}

}
/* End of file controllers/forums.php */
