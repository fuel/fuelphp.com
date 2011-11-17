<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Forums Plugin
 *
 * @package		PyroCMS
 * @author		Stephen Cozart <stephen.cozart@gmail.com>
 * @subpackage	Forums
 * @category	plugin
 *
 */
class Plugin_Forums extends Plugin
{
	/**
	 * Display the simple search form partial
	 *
	 * Usage:
	 * {pyro:forums:search_form}
	 *
	 * @return	string
	 */
	function search_form()
	{
		return $this->_module_view('forums', 'partials/search');
	}

	/**
	 * Retrieves recent forum posts
	 *
	 * Usage:
	 * <ul>
	 * {pyro:forums:recent_posts forum="1" limit="5" word_count="15"}
	 *	<li>{pyro:forum_title} - {pyro:content}</li>
	 * {/pyro:forums:recent_posts}
	 * </ul>
	 *
	 * Available and optional attributes: forum, limit, word_count
	 *
	 * @return	array
	 */
	function recent_posts()
	{
		$forum = $this->attribute('forum', FALSE);
		$limit = $this->attribute('limit', 5);
		$shorten = $this->attribute('word_count', FALSE);
		
		if($forum and is_numeric('forum'))
		{
			$this->db->where('forum_id', $forum);
		}
		
		$posts = $this->db->select('forum_posts.*, forums.title as forum_title, users.username, profiles.display_name')
						->join('forums', 'forums.id = forum_posts.forum_id', 'LEFT')
						->join('users', 'users.id = forum_posts.author_id', 'LEFT')
						->join('profiles', 'profiles.user_id = forum_posts.author_id', 'LEFT')
						->order_by('created_on', 'DESC')
						->limit($limit)
						->get('forum_posts')
						->result_array();
	
		if($shorten and is_numeric($shorten))
		{
			if( ! function_exists('word_limiter') )
			{
				$this->load->helper('text');
			}
			foreach($posts as &$post)
			{
				$post['author'] = $post['display_name'] ? $post['display_name'] : $post['username'] ;
				$post['content'] = word_limiter($post['content'], $shorten);
			}
		}
	
		return $posts;
	}
	
	private function _module_view($module, $view, $vars = array())
	{
		list($path, $view) = Modules::find($view, $module, 'views/');

		$save_path = $this->load->_ci_view_path;
		$this->load->_ci_view_path = $path;

		$content = $this->load->_ci_load(array('_ci_view' => $view, '_ci_vars' => ((array) $vars), '_ci_return' => TRUE));

		// Put the path back
		$this->load->_ci_view_path = $save_path;

		return $content;
	}

}

/* End of file plugin.php */