<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * PyroCMS
 *
 * An open source CMS based on CodeIgniter
 *
 * @package		PyroCMS
 * @author		PyroCMS Dev Team
 * @license		Apache License v2.0
 * @link		http://pyrocms.com
 */

/**
 * PyroCMS Forums Search Controller
 *
 * Provides ability to search forum content
 *
 * @author		Stephen Cozart <stephen.cozart@gmail.com>
 * @package		PyroCMS
 * @subpackage	        Forums
 */
class Search extends Public_Controller {
    
    /**
     * Array that contains the simple search validation rules
     * @access protected
     * @var array
     */
    protected $simple_rules = array(
		array('field' => 'terms',
		  'label' => 'Terms',
		  'rules' => 'trim|required|xss_clean|max_length[100]'
		)
    );
    
    /**
     * Array that contains the advanced search validation rules
     * @access protected
     * @var array
     */
    protected $advanced_rules = array(
				    array(
					    'field' => 'keywords',
					    'label' => 'Keywords',
					    'rules' => 'trim|xss_clean|max_length[100]'
					    
				    ),
				    array(
					    'field' => 'search_in',
					    'label' => 'Search In',
					    'rules' => 'trim|xss_clean|alpha'
				    ),
				    array(
					    'field' => 'search_criteria',
					    'label' => 'Search Criteria',
					    'rules' => 'trim|xss_clean|alpha'
				    ),
				    array(
					    'field' => 'search_forums',
					    'label' => 'Search Forums',
					    'rules' => 'xss_clean|is_array'
				    ),
				    array(
					    'field' => 'order_by',
					    'label' => 'Sort Order',
					    'rules' => 'trim|xss_clean|alpha_dash'
				    ),
					array(
						'field' => 'sort',
						'label' => 'Order',
						'rules' => 'alpha'
					)
    );    
    
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
        $this->load->models(
			array(
			    'forums_m',
			    'forum_posts_m',
			    'forum_subscriptions_m',
			    'users/users_m',
			    'forum_searches_m'
			    )
			);
        $this->load->library(array('form_validation', 'forums_lib'));
        $this->lang->load('forums');
	$this->load->config('forums');
    	$this->load->helper(array('forums', 'users/user'));
        $this->load->helper($this->settings->item('forums_editor'));
        
        $this->template->enable_parser_body(FALSE)
			->append_metadata( theme_css('forums.css') )
			->append_metadata( js('forums.js', 'forums') )
			->set_breadcrumb(lang('breadcrumb_base_label'), '/')
			->set_breadcrumb(lang('forums_forum_title'), 'forums');
    }
    
    /**
     * Basic search
     *
     * This method expects post data to be given.  If this uri is requested
     * without a post request it will redirect to the advanced search method.
     *
     * @access public
     * @return void
     */
    public function index($search_id = FALSE, $offset = 0)
    {
        if(!$this->input->post('search') AND $search_id === FALSE)
        {
            redirect('forums/search/advanced');
        }
		$search_id = (int) $search_id;
        
        //empty array so if someone submits an empty search,  php wont complain.
        $results = array();
        
        $topics = array();
		
		$data = '';
        
        //set validation rules
        $this->form_validation->set_rules($this->simple_rules);
        
        //form passed validation
        if($this->form_validation->run() !== FALSE)
        {
			//purge out some previously saved searches
			$this->forum_searches_m->purge_searches();
	    
            $data = set_value('terms');
	    
			//serialize the post data
			$search = serialize($data);
	    
			//insert the search in the db
			$search_id = $this->forum_searches_m->insert(array('user_id'=> $this->current_user ? $this->current_user->id : 0, 'criteria' => $search, 'created_on' => now()));
        }
		else
		{
			if($criteria = $this->forum_searches_m->get($search_id))
			{
				$data = unserialize($criteria->criteria);
			}
		}
	
		$num_results = count($this->forum_posts_m->search($data));
		
		// Pagination junk
		$per_page = '25';
		$pagination = create_pagination('forums/search/index/'.$search_id, $num_results, $per_page, 5);
		if($offset < $per_page)
		{
			$offset = 0;
		}
		$pagination['offset'] = $offset;
		// End Pagination
		
		$results = $this->forum_posts_m->search($data, $offset, $per_page);
	
        $topics = $this->_process_results($results);
    
        if(empty($topics))
        {
            $this->template->set_partial('search_form', 'partials/search');
        }
        
        //render the view.
        $this->template->set_breadcrumb(lang('forums.search_label'), 'forums/search')
                        ->set_breadcrumb(lang('forums.results_label'))
                        ->set('results', $topics)
			->set('pagination', $pagination)
			->title( lang('forums_forum_title'), lang('forums.search_label') )
                        ->build('search');
    }
    
    /**
     * advanced search
     *
     * 
     *
     * @access public
     * @return void
     */
    public function advanced($search_id = FALSE, $offset = 0)
    {
	$data = array();

	$topics = array();
	
	$search_id = (int) $search_id;
		
	//dropdown arrays
	$search_in = array('both' => lang('forums.in_both_label'),
			    'title' => lang('forums.in_titles_label'),
			    'content' => lang('forums.in_content_label')
		    );
	$search_criteria = array(
				'exact' => lang('forums.for_exact_label'),
				'any' => lang('forums.for_any_label'),
				'all' => lang('forums.for_all_label')
			    );
	$forum_list = array(0 => lang('forums.in_forums_label'));
	
	//call db to get an list of forums.
	$options = $this->forums_m->get_all();
	
	if(!empty($options))
	{
		$list = array();
	    foreach($options as $forum)
	    {
			if($this->forums_lib->has_access($forum->id))
			{
				$list[$forum->id] = $forum->title;
			}
	    }
	    $forum_list = $forum_list + $list;
	}
	
	//order by array
	$order_by = array(
			'relevance' => lang('forums.relevance_label'),
			'created_on' => lang('forums.date_label'),
			'title' => lang('forums_title_label'),
			'view_count' => lang('forums.viewed_label')
		    );
	
	$this->form_validation->set_rules($this->advanced_rules);
	
	if($this->form_validation->run())
	{
	    //purge out some previously saved searches
	    $this->forum_searches_m->purge_searches();
	    
	    foreach($this->advanced_rules as $rule)
		{
			$data[$rule['field']] = set_value($rule['field']);
		}

	    
	    //serialize the post data
	    $search = serialize($data);
	    
	    //insert the search in the db
	    $search_id = $this->forum_searches_m->insert(array('user_id'=> $this->current_user ? $this->current_user->id : 0, 'criteria' => $search, 'created_on' => now()));
	    
	}
	else
	{
	    if($criteria = $this->forum_searches_m->get($search_id))
	    {
		$data = unserialize($criteria->criteria);
	    }
	}
	
	$num_results = count($this->forum_posts_m->advanced_search($data));
	
	// Pagination junk
	$per_page = '25';
	$pagination = create_pagination('forums/search/advanced/'.$search_id, $num_results, $per_page, 5);
	if($offset < $per_page)
	{
	    $offset = 0;
	}
	$pagination['offset'] = $offset;
	// End Pagination
	
	//query the db
	$results = $this->forum_posts_m->advanced_search($data, $offset, $per_page);
	
	$topics = $this->_process_results($results);
	
	
	
        $this->template->set_breadcrumb(lang('forums.search_label'), 'forums/search')
                        ->set_breadcrumb(lang('forums.advanced_label'))
			->set('search_in', $search_in)
			->set('search_criteria', $search_criteria)
			->set('forum_list', $forum_list)
			->set('order_by', $order_by)
			->set('results', $topics)
			->set('pagination', $pagination)
			->title( lang('forums_forum_title'), lang('forums.advanced_search_label') )
                        ->build('search_advanced', $this->data);
    }
    
    /**
     * Construct search topics
     *
     * @param	$results	result array of search results
     * @access	private
     * @return 	object
     */
    private function _process_results($results = array())
    {
		$topics = array();
		if(!empty($results))
        {
			foreach($results as $key => &$post)
			{
				//if user doesn't have access to the forum the post belongs to
				//unset it
				if(!$this->forums_lib->has_access($post->forum_id))
				{
					unset($results[$key]);
				}
				else
				{
					$post->content = sanitize_search_results($post->content);
				}
			}
            foreach($results as $key => &$item)
            {				
                if($item->parent_id < 1)
                {
                    $topics[$item->id] = $item;
                    $topics[$item->id]->post_count = $this->forum_posts_m->count_posts_in_topic($item->id);
					$last_post = $this->forum_posts_m->last_topic_post($item->id);
					$last_post->content =& sanitize_search_results($last_post->content);
                    $topics[$item->id]->last_post =& $last_post;
					$topics[$item->id]->forum_name = $this->forums_m->get($item->forum_id)->title;
                    
                    if(!empty($topics[$item->id]->last_post))
                    {
                        $topics[$item->id]->last_post->author = $this->forum_posts_m->author_info($topics[$item->id]->last_post->author_id);
                    }
                }
            }
            
            foreach($results as &$reply)
            {
                if($reply->parent_id > 0)
                {
                    if(array_key_exists($reply->parent_id, $topics))
                    {
                        $topics[$reply->parent_id]->replies[] = $reply;
                    }
                    
                    //uh oh we need to get the topic and at it to the topics object
                    else
                    {
						$topic = $this->forum_posts_m->get_topic($reply->parent_id);
						$topic->content = !empty($topic) ? sanitize_search_results($topic->content) : '';
                        $topics[$reply->parent_id] = $topic;
                        $topics[$reply->parent_id]->post_count = $this->forum_posts_m->count_posts_in_topic($reply->parent_id);
                        $topics[$reply->parent_id]->last_post = $this->forum_posts_m->last_topic_post($reply->parent_id);
						$topics[$reply->parent_id]->forum_name = $this->forums_m->get($reply->forum_id)->title;
                        
                        if(!empty($topics[$reply->parent_id]->last_post))
                        {
                            $topics[$reply->parent_id]->last_post->author = $this->forum_posts_m->author_info($topics[$reply->parent_id]->last_post->author_id);
                        }
                    }
                    
                }
            }
        }
		
		return $topics;
    }
}
/* End of file controllers/search.php */
