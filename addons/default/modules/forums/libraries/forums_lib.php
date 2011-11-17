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
 * PyroCMS Forums Library
 *
 * Provides email handling for forum subscriptions and various auth functions
 *
 * @author		Dan Horrigan <dan@dhorrigan.com>, Stephen Cozart <stephen.cozart@gmail.com>
 * @package		PyroCMS
 * @subpackage		Forums
 * @
 */
class Forums_lib
{
	private $CI;

	public function  __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model(array('forum_permissions_m', 'forum_moderators_m'));
		
		$this->current_user = $this->CI->current_user;
	}
	public function notify_reply($recipients, $reply)
	{
		$this->CI->load->library('email');
		$this->CI->load->helper('url');

		foreach($recipients as $person)
		{
			// No need to email the user that entered the reply
			if ($person->email == $this->current_user->email)
			{
				continue;
			}
			$text_body = 'View the reply here: ' . anchor('forums/posts/view_reply/' . $reply->id) . '<br /><br />';
			$text_body .= '<strong>Message:</strong><br />';
			$text_body .= parse($reply->content);

			$this->CI->email->clear();
			$this->CI->email->from($this->CI->settings->server_email, $this->CI->settings->site_name . ' Forums');
			$this->CI->email->to($person->email);

			$this->CI->email->subject('Subscription Notification: ' . $reply->title);
			$text_body = 'Reply to <strong>"' . $reply->title . '"</strong>.<br /><br />' . $text_body;
			$text_body .= "<br /><br />Click here to unsubscribe from this topic: " . anchor('forums/unsubscribe/' . $person->id . '/' . $reply->topic_id);

			$this->CI->email->message($text_body);
			$this->CI->email->send();
		}
	}

	public function get_recipients($topic_id)
	{
		$recipient_count = 0;
		$recipients = array();
		$subscriptions = $this->CI->forum_subscriptions_m->get_many_by(array('topic_id' => $topic_id));
		foreach($subscriptions as& $sub)
		{
			$this->CI->db->or_where('users.id', $sub->user_id);
			$recipient_count++;
		}

		// If there are recipients
		if ($recipient_count > 0)
		{
			$this->CI->db->select('email,id');
			return $this->CI->db->get($this->CI->ion_auth_model->tables['users'])->result();
		}

		// If no recipients then return an empty array
		return array();
	}
	
	public function forum_has_unread($forum_id, $topic_count, $read_topics)
	{
		//no topics from this forum has never been visited
		if ( ! array_key_exists($forum_id, $read_topics))
		{
			return TRUE;
		}
		
		//user has been visited a topic but have they been to all of them?
		if (count($read_topics[$forum_id]) != $topic_count)
		{
			return TRUE;
		}
	}

	public function has_access($forum_id)
	{
		$groups = $this->CI->forum_permissions_m->get_many_by('forum_id', $forum_id);
		
		//if groups is empty this forum is viewable to everyone
		if (empty($groups))
		{
			return TRUE;
		}
		
		//since we have groups assigned to this forum id only admins, mods, and
		//said groups should have access
		else
		{
			//we need to check if user is logged in since we are going to be comparing groups
			if ($this->current_user)
			{
				if ($this->CI->ion_auth->is_admin() or $this->_is_moderator($forum_id, $this->current_user->id) or $this->_check_group($forum_id, $this->current_user->group_id))
				{
					return TRUE;
				}
				return FALSE;
			}
			else
			{
				return FALSE;
			}
		}
		
	}
	
	public function can_edit($post)
	{
		//if the user is not logged in no edit for you!
		if ( ! $this->current_user)
		{
			return FALSE;
		}
		
		//if user is an admin or moderator or the author of original post,  we can edit
		if ($post->author_id === $this->current_user->id or $this->CI->ion_auth->is_admin() or $this->_is_moderator($post->forum_id, $this->current_user->id))
		{
			return TRUE;
		}
		return FALSE;
	}
	
	public function can_delete($post)
	{
		//if the user is not logged in no edit for you!
		if ( ! $this->current_user)
		{
			return FALSE;
		}
		
		//if user is an admin or moderator or the author of original post,  we can edit
		if ($post->author_id === $this->current_user->id or $this->CI->ion_auth->is_admin() or $this->_is_moderator($post->forum_id, $this->current_user->id))
		{
			return TRUE;
		}
		return FALSE;
	}
	
	public function can_sticky($post)
	{
		if ( ! $this->current_user)
		{
			return FALSE;
		}
		
		if ($this->CI->ion_auth->is_admin() or $this->_is_moderator($post->forum_id, $this->current_user->id))
		{
			return TRUE;
		}
		return FALSE;
	}
	
	public function can_lock($post)
	{
		if ( ! $this->current_user)
		{
			return FALSE;
		}
		
		if ($this->CI->ion_auth->is_admin() or $this->_is_moderator($post->forum_id, $this->current_user->id))
		{
			return TRUE;
		}
		return FALSE;
	}
	
	public function can_move($topic)
	{
		if ( ! $this->current_user)
		{
			return FALSE;
		}
		
		if ($this->CI->ion_auth->is_admin() or $this->_is_moderator($topic->forum_id ? $topic->forum_id : $topic, $this->current_user->id))
		{
			return TRUE;
		}
		return FALSE;
	}
	
	public function can_post($forum_id)
	{
		if ( ! $this->current_user)
		{
			return FALSE;
		}
		
		if ($this->CI->ion_auth->is_admin() or $this->_is_moderator($forum_id, $this->current_user->id))
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	public function is_private($forum_id)
	{
		return $this->current_user && $this->_check_group($forum_id, $this->current_user->group_id);
	}
	
	public function _is_moderator($forum_id, $user_id)
	{
		$moderator = $this->CI->forum_moderators_m->count_by(array('forum_id' => $forum_id, 'user_id' => $user_id));
		return $moderator > 0 ? TRUE : FALSE;
	}
	
	private function _check_group($forum_id, $group_id)
	{
		$group = $this->CI->forum_permissions_m->count_by(array('forum_id' => $forum_id, 'group_id' => $group_id));
		return $group > 0 ? TRUE : FALSE;
	}
	
}
/* End of file libraries/forums_lib.php */