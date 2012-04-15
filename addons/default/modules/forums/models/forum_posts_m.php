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
 * PyroCMS Forum Posts Model
 *
 * @author		Dan Horrigan <dan@dhorrigan.com>, Stephen Cozart <stephen.cozart@gmail.com>
 * @package		PyroCMS
 * @subpackage		Forums
 * @category		Model
 */
class Forum_posts_m extends MY_Model
{
	/**
	 * Count Topics in Forum
	 *
	 * How many topics (posts which have no parent / are not a reply to anything) are in a forum.
	 *
	 * @access       public
	 * @param        int 	[$forum_id] 	Which forum should be counted
	 * @return       int 	Returns a count of how many topics there are
	 * @package      forums
	 */
	public function count_topics_in_forum($forum_id)
	{
		return parent::count_by(array(
			'parent_id' => 0,
			'forum_id' => $forum_id
		));
	}


	/**
	 * Count Replies in Forum
	 *
	 * How many replies have been made to topics in a forum.
	 *
	 * @access       public
	 * @param        int 	[$forum_id] 	Which forum should be counted
	 * @return       int 	Returns a count of how many replies there are
	 * @package      forums
	 */
	public function count_replies_in_forum($forum_id)
	{
		return parent::count_by(array(
			'parent_id >' => 0,
			'forum_id' => $forum_id
		));
	}

	/**
	 * Count Posts in Topic
	 *
	 * How many posts are in a topic.
	 *
	 * @access       public
	 * @param        int 	[$forum_id] 	Which topic should be counted
	 * @return       int 	Returns a count of how many posts there are
	 * @package      forums
	 */
	public function count_posts_in_topic($topic_id)
	{
		return parent::count_by("id = $topic_id OR parent_id = $topic_id");
	}

	/**
	 * Count Posts for user
	 *
	 * How many posts have been made by a user
	 *
	 * @access       public
	 * @param        int 	[$forum_id] 	Which forum should be counted
	 * @return       int 	Returns a count of how many replies there are
	 * @package      forums
	 */
	public function count_user_posts($user_id)
	{
		return parent::count_by(array('author_id' => $user_id));
	}
	/**
	 * Count Prior Posts
	 *
	 * How many posts were before this one.  Used for pagination.
	 *
	 * @access       public
	 * @param        int 	[$topic_id] 	Which topic
	 * @param        int 	[$reply_time] 	Reply time o compair
	 * @return       int
	 * @package      forums
	 */
	public function count_prior_posts($topic_id, $reply_time)
	{
		return parent::count_by(array('parent_id' => $topic_id, 'created_on <' => $reply_time)) + 1;
	}
	/**
	 * Add a view to a topic
	 *
	 *
	 * @access       public
	 * @param        int 	[$topic_id]
	 * @return       NULL
	 * @package      forums
	 */

	public function add_topic_view($topic_id)
	{
		$this->db->set('view_count', 'view_count + 1', FALSE);
		$this->db->where('id', (int) $topic_id);
		$this->db->update('forum_posts');
	}

	/**
	 * Sets the Topic Updates
	 *
	 *
	 * @access       public
	 * @param        int 	[$topic_id]
	 * @return       NULL
	 * @package      forums
	 */

	public function set_topic_update($topic_id)
	{
		$this->db->set('updated_on', now(), FALSE);
		$this->db->where('id', (int) $topic_id);
		$this->db->update('forum_posts');
	}

	/**
	 * Get Posts in Topic
	 *
	 * Get all posts in a topic.
	 *
	 * @access       public
	 * @param        int 	[$forum_id] 	Which topic should be counted
	 * @return       int 	Returns a count of how many posts there are
	 * @package      forums
	 */
	public function get_posts_by_topic($topic_id, $offset, $per_page)
	{
		$this->db->or_where(array('id' => $topic_id, 'parent_id' => $topic_id));
		$this->db->order_by('created_on');

		return $this->db->get('forum_posts', $per_page, $offset)->result();
	}

	/**
	 * Get Topics in Forum
	 *
	 * Return an array of all topics in a forum.
	 *
	 * @access       public
	 * @param        int 	[$forum_id] 	Which forum should be counted
	 * @return       int 	Returns a count of how many topics there are
	 * @package      forums
	 */
	public function get_topics_by_forum($forum_id, $offset, $per_page)
	{
		$this->db->where(array('forum_id' => $forum_id, 'parent_id' => 0));
		$this->db->order_by('sticky DESC, updated_on DESC, created_on DESC');
		$query = $this->db->get('forum_posts', $per_page, $offset);
		return $query->result();
	}

	/**
	 * Get latest post in Forum
	 *
	 * How many replies have been made to topics in a forum.
	 *
	 * @access       public
	 * @param        int 	[$forum_id] 	Which forum should be counted
	 * @return       int 	Returns a count of how many replies there are
	 * @package      forums
	 */
	public function last_forum_post($forum_id)
	{
		$this->db->where('forum_posts.forum_id', $forum_id);
		$this->db->order_by('forum_posts.created_on DESC');
		$this->db->limit(1);
		$return = $this->db->get('forum_posts')->row();

		if (empty($return->title) && !empty($return->parent_id))
		{
			$this->db->select('title');
			$this->db->where('id', $return->parent_id);
			$this->db->limit(1);
			$return->title = $this->db->get('forum_posts')->row()->title;

		}
		return $return;
	}

	/**
	 * Get latest post in Forum
	 *
	 * How many replies have been made to topics in a forum.
	 *
	 * @access       public
	 * @param        int 	[$forum_id] 	Which forum should be counted
	 * @return       int 	Returns a count of how many replies there are
	 * @package      forums
	 */
	public function last_topic_post($topic_id)
	{
		$this->db->or_where(array('id' => $topic_id, 'parent_id' => $topic_id));
		$this->db->order_by('created_on DESC');
		$this->db->limit(1);
		return $this->db->get('forum_posts')->row();
	}

	/**
	 * Get Author Info
	 *
	 *
	 * @access       public
	 * @param        int 	[$author_id] 	The author ID.
	 * @return       array
	 * @package      forums
	 */
	public function author_info($author_id)
	{
		$u_table = $this->ion_auth_model->tables['users'];
		$m_table = $this->ion_auth_model->tables['meta'];
		$g_table = $this->ion_auth_model->tables['groups'];
		$m_join = $this->ion_auth_model->meta_join;

		return $this->db
			->from($u_table .' u')
			->select('u.id, u.email, u.created_on, u.last_login, g.name `group`, m.first_name, m.last_name')
			->select('CONCAT(m.first_name, " ", m.last_name) as full_name', FALSE)
			->where('u.id', $author_id)
			->join($m_table .' m', 'u.id = m.'.$m_join, 'left')
			->join($g_table .' g', 'g.id = u.group_id', 'left')
			->limit(1)
			->get()
			->row();
	}


	/**
	 * Get topic
	 *
	 * Get the basic information about a topic (not the posts within it)
	 *
	 * @access       public
	 * @param        int 	[$topic_id] 	Which topic to look at
	 * @return       int 	Returns an object containing a topic
	 * @package      forums
	 */
	public function get_topic($topic_id = 0)
	{
		$this->db->where(array('id' => $topic_id, 'parent_id' => 0));
		return $this->db->get('forum_posts')->row();
	}

	/**
	 * New Topic
	 *
	 * Create a new topic in the specified forum
	 *
	 * @access	public
	 * @param	int	$user_id - id of user posting the topic
	 * @param	object	$topic	- the object containing new topic data
	 * @param	object	$forum - information about the forum being posted to
	 * @return	int	returns insert id
	 */
	public function new_topic($user_id, $topic, $forum)
	{
		$this->load->helper('date');

		$insert = array(
			'forum_id' 	=> $forum->id,
			'author_id' 	=> $user_id,
			'parent_id' 	=> 0,
			'title' 	=> $topic->title,
			'content' 	=> auto_bblink($topic->content, 'url'),
			'created_on' 	=> now(),
			'view_count' 	=> 0,
		);

		$this->db->insert('forum_posts', $insert);

		return $this->db->insert_id();
	}

	/**
	 * New Reply
	 *
	 * Create a new reply to the specified topic
	 *
	 * @access	public
	 * @param	int	$user_id - id of user posting the topic
	 * @param	object	$topic	- the object containing data about the topic being replied to
	 * @param	object	$reply - the object containing new reply data
	 * @return	int	returns insert id
	 */
	public function new_reply($user_id, $reply, $topic)
	{
		$this->load->helper('date');

		$insert = array(
			'forum_id' 	=> $topic->forum_id,
			'author_id' 	=> $user_id,
			'parent_id' 	=> $topic->id,
			'title' 	=> '',
			'content'	=> auto_bblink($reply->content, 'url'),
			'created_on' 	=> now(),
			'view_count' 	=> 0,
		);

		$this->db->insert('forum_posts', $insert);

		return $this->db->insert_id();
	}

	/**
	 * Get Reply
	 *
	 * Retrieve a reply - alias of get_post()
	 *
	 * @access       public
	 * @param        int 		$reply_id - the id of the post
	 * @return       object 	Returns an object containing a topic
	 */
	public function get_reply($reply_id = 0)
	{
		$this->db->where('id', $reply_id);
		return $this->db->get('forum_posts', 1)->row();
	}

	/**
	 * Get a post
	 *
	 * Retrieve a post
	 *
	 * @access	public
	 * @param	int	$post_id	the id of the post
	 * @return	obj	returns row object
	 */
	public function get_post($post_id = 0)
	{
		$this->db->where('id', $post_id);
		return $this->db->get('forum_posts', 1)->row();
	}

	/**
	 * Get topics created after the specified timestamp
	 *
	 * @param $timestamp
	 * @access public
	 * @return obj
	 */
	public function created_after($timestamp = FALSE)
	{
		return $this->db->order_by('created_on DESC')
				->where('created_on > ' . $timestamp)
				->where('parent_id < 1')
				->from($this->_table)
				->get()
				->result();
	}

	/**
	 * Get topics created before specified timestamp
	 *
	 * @param $timestamp
	 * @access public
	 * @return obj
	 */
	public function created_before($timestamp = FALSE)
	{
		return $this->db->order_by('created_on DESC')
				->where('created_on < ' . $timestamp)
				->where('parent_id < 1')
				->from($this->_table)
				->get()
				->result();
	}

	/**
	 * Return an array of unread topics
	 *
	 * @param array	$read	an array of read topics
	 * @access public
	 * @return array
	 */
	public function unread($read = array(), $offset = FALSE, $limit = FALSE)
	{
		//loop through the read array() combine read topics into one array
		if (empty($read))
		{
			return array();
		}

		foreach ($read as $topic)
		{
			foreach ($topic as $key => $item)
			{
				$items[] = $key;
			}
		}

		if (empty($items))
		{
			return array();
		}
		
		$offset !== FALSE AND $limit !== FALSE AND $this->limit($limit, $offset);

		$this->db->where_not_in('id', $items);
		$topics = $this->order_by('created_on', 'DESC')
				->get_many_by('parent_id', 0);

		$unread = array();

		if ( ! empty($topics))
		{
			foreach ($topics as $topic)
			{
				if ( ! array_key_exists($topic->forum_id, $read) OR !in_array($topic->id, $read[$topic->forum_id]))
				{
					$unread[] = $topic;
				}
			}
		}
		
		return $unread;
	}

	/**
	 * Simple Search
	 *
	 * Retrieve results based on specified keywords
	 *
	 * @access	public
	 * @param	string	$terms	the terms to search for
	 * @return	obj	returns result object
	 */
	public function search($terms = '', $offset = FALSE, $per_page = FALSE)
	{
		//limit it?
		if ($offset !== FALSE AND $per_page !== FALSE)
		{
			$this->db->limit($per_page, $offset);
		}

		return $this->db
			->select("*, MATCH(title,content) AGAINST(".$this->db->escape($terms)." IN BOOLEAN MODE) as relevance",false)
			->where("MATCH(title,content) AGAINST(".$this->db->escape($terms)." IN BOOLEAN MODE)")
			->having('relevance > 0.2')
			->order_by('relevance', 'DESC')
			->order_by('created_on', 'DESC')
			->get($this->_table)
			->result();
	}

	/**
	 * Advanced Search
	 *
	 * Search by specified criteria
	 *
	 * @param array $data
	 * @return obj	an object array containing the results of the search
	 * @access public
	 */
	public function advanced_search($data = array(), $offset = FALSE, $per_page = FALSE)
	{
		if ( ! empty($data))
		{
			$words = array();
			//do we have keywords?
			$keywords = !empty($data['keywords']) ? htmlentities($data['keywords'], ENT_QUOTES) : FALSE ;
			
			if ($keywords)
			{
				$words = explode(' ', $keywords);
			}

			//do we have where to search?
			$search_in = !empty($data['search_in']) ? $this->db->escape($data['search_in']) : FALSE ;
			$search_in = trim($search_in, "'");

			//do we have how to search?
			$criteria = !empty($data['search_criteria']) ? $this->db->escape($data['search_criteria']) : FALSE ;

			//what forums shall we search in
			$forums = !empty($data['search_forums']) ? $this->db->escape($data['search_forums']) : FALSE ;

			//order by?
			$order_by = !empty($data['order_by']) ? $this->db->escape($data['order_by']) : FALSE ;
			$order_by = trim($order_by, "'");
			//and how?
			$sort_order = !empty($data['sort']) ? $this->db->escape($data['sort']) : FALSE ;

			$against = FALSE;

			//build the against criteria
			if ($criteria == "'exact'" AND $keywords)
			{
				$against = '"'.$keywords.'"';
			}
			elseif ($criteria == "'any'" AND $keywords)
			{
				$against = $keywords;
			}
			elseif ($criteria == "'all'" AND $keywords)
			{
				if ( ! empty($words))
				{
					foreach ($words as $word)
					{
						$against .= '+' . $word . ' ';
					}
					$against = rtrim($against);
				}
			}
			
			
			
			//build the match criteria
			$match = ($search_in == 'both') ? 'title,content' : $search_in ;

			//what forums to search in?
			if (is_array($forums))
			{
				//we don't want to do anything if all forums is selected
				if ( ! in_array(0, $forums))
				{
					foreach ($forums as $forum)
					{
						$this->db->where('forum_id', $forum);
					}
				}
			}

			//sort it?
			if ($order_by AND $sort_order)
			{
				$this->db->order_by($order_by, $sort_order);
			}

			//limit it?
			if ($offset !== FALSE AND $per_page !== FALSE)
			{
				$this->db->limit($per_page, $offset);
			}

			//down to the good bits,  lets put it all together
			//we don't want to run the query without these two items
			if ($match AND $criteria)
			{
				
				return $this->db->select("*, MATCH($match) AGAINST(".$this->db->escape($against)." IN BOOLEAN MODE) as relevance",false)
						->from($this->_table)
						->where("MATCH(".$match.") AGAINST(".$this->db->escape($against)." IN BOOLEAN MODE)")
						->having('relevance > 0.2')
						->get()
						->result();
			}
		}
		return array();
	}

}
/* End of file models/forum_posts_m.php */