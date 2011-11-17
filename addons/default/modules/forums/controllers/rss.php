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
 * @package 		PyroCMS
 * @category		Module
 * @subpackage 		Rss Feed Controller
 * @author		Stephen Cozart
 *
 * Handles output of various forum feeds.
 *
 */
class Rss extends Public_Controller
{
	/**
	 * Constuctor
	 *
	 * @access public
	 * @return void
	 *
	 * Various helpers, models are loaded here.  Some of the base rss feed
	 * details are also set here.
	 */
	public function __construct()
	{
		parent::__construct();	
		$this->load->model('forum_posts_m');
		$this->load->helper(array('xml', 'date'));
		$this->load->helper($this->settings->item('forums_editor'));
		$this->load->library('forums_lib');
		$this->lang->load('forums');
		
		//common feed details
		$this->data->rss->encoding = $this->config->item('charset');
		$this->data->rss->feed_name = $this->settings->item('site_name');
		$this->data->rss->feed_url = base_url();
		$this->data->rss->page_description = sprintf($this->lang->line('news_rss_articles_title'), $this->settings->item('site_name'));
		$this->data->rss->page_language = 'en-gb';
		$this->data->rss->creator_email = $this->settings->item('contact_email');
	}
	
	/**
	 * index method
	 *
	 * @access public
	 * @return void
	 *
	 * This method is responsible for listing the most recent forums posts
	 * regardless of forum or topic they are posted in.
	 */
	public function index()
	{
		$posts = $this->forum_posts_m->limit($this->settings->item('rss_feed_items'))
						->order_by('created_on', 'DESC')
						->get_all();
		
		$this->_build_posts_feed( $posts );		
		$this->data->rss->feed_name .= lang('forums.recent_all_suffix');
		$this->output->set_header('Content-Type: application/rss+xml');
		$this->load->view('rss', $this->data);
	}
	
	/**
	 * thread method
	 *
	 * @access public
	 * @param $topic_id - the topic id that you want to display.
	 * @return void
	 *
	 * The thread method is used for specifically display posts from the
	 * specified topic.
	 */
	public function thread( $topic_id = 0 )
	{ 
		$posts = $this->forum_posts_m->order_by('created_on', 'DESC')
						->get_posts_by_topic($topic_id, 0, $this->settings->item('rss_feed_items'));
		if(empty($posts))
		{
			redirect('forums/rss/index');
		}
		
		//get the tread/topic name
		$topic = $this->forum_posts_m->get_topic($topic_id)->title;
		
		$this->_build_thread_feed( $posts );		
		$this->data->rss->feed_name .= lang('forums.recent_posts_suffix') . $topic;		
		$this->output->set_header('Content-Type: application/rss+xml');
		$this->load->view('rss', $this->data);
	}
	
	/**
	 * forum method
	 *
	 * @access public
	 * @param $forum_id
	 * @return void
	 *
	 * The forum method is responsible for output new topics created in the
	 * specified forum.
	 */
	public function forum( $forum_id = 0)
	{
		$this->load->model('forums_m');
		
		if(!$topics = $this->forum_posts_m->order_by('created_on', 'DESC')
							->get_topics_by_forum($forum_id, 0, $this->settings->item('rss_feed_items')))
		{
			redirect('forums/rss/index');
		}

		$this->_build_forum_feed( $topics );
		$category = $this->forums_m->get($forum_id)->title;
		$this->data->rss->feed_name .= lang('forums.recent_topics_suffix') . $category;		
		$this->output->set_header('Content-Type: application/rss+xml');
		$this->load->view('rss', $this->data);
	}
	
	/**
	 * rss feed helper - posts
	 *
	 * @access protected
	 * @param $posts array
	 * @return void
	 *
	 * Builds up the rss data object for the posts feed.
	 * 
	 */
	protected function _build_posts_feed( $posts = array() )
	{	
		if(!empty($posts))
		{        
			foreach($posts as $row)
			{
				//is the forum this post belong to private?  If it is don't show
				//in rss feeds
				if(!$this->forums_lib->is_private($row->forum_id))
				{
					$row->link = site_url('forums/posts/view_reply/' .$row->id);
					$row->created_on = standard_date('DATE_RSS', $row->created_on);
					
					if(empty($row->title))
					{
						$title = $this->forum_posts_m->get_topic($row->parent_id)->title;
					}
					else
					{
						$title = $row->title;
					}
					
					$item = array(
						//'author' => $row->author,
						'title' => xml_convert($title),
						'link' => $row->link,
						'guid' => $row->link,
						'description'  => parse($row->content),
						'date' => $row->created_on
					);				
					$this->data->rss->items[] = (object) $item;
				}
			} 
		}	
	}
	
	/**
	 * rss feed helper - forum
	 *
	 * @access protected
	 * @param $posts array
	 * @return void
	 *
	 * Builds up the rss data object for the forum feed.
	 * 
	 */
	protected function _build_forum_feed( $posts = array() )
	{
		if(!empty($posts))
		{        
			foreach($posts as $row)
			{
				//is the forum private.  Dont show feads
				if(!$this->forums_lib->is_private($row->forum_id))
				{
					$row->link = site_url('forums/topics/view/' .$row->id);
					$row->created_on = standard_date('DATE_RSS', $row->created_on);
									
					$item = array(
						//'author' => $row->author,
						'title' => xml_convert($row->title),
						'link' => $row->link,
						'guid' => $row->link,
						'description'  => parse($row->content),
						'date' => $row->created_on
					);				
					$this->data->rss->items[] = (object) $item;
				}
			} 
		}
	}
	
	/**
	 * rss feed helper - thread
	 *
	 * @access protected
	 * @param $posts array
	 * @return void
	 *
	 * Builds up the rss data object for the thread feed.
	 * 
	 */
	protected function _build_thread_feed( $posts = array() )
	{
		if(!empty($posts))
		{        
			foreach($posts as $row)
			{
				//is the forum private.  Dont show feads
				if(!$this->forums_lib->is_private($row->forum_id))
				{
					$row->link = site_url('forums/posts/view_reply/' .$row->id);
					$row->created_on = standard_date('DATE_RSS', $row->created_on);
									
					$item = array(
						//'author' => $row->author,
						'title' => xml_convert('View Post'),
						'link' => $row->link,
						'guid' => $row->link,
						'description'  => parse($row->content),
						'date' => $row->created_on
					);				
					$this->data->rss->items[] = (object) $item;
				}
			} 
		}
	}
}
/* End of file controllers/rss.php */
