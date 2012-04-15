<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/***
 * PyroCMS
 *
 * An open source CMS based on CodeIgniter
 *
 * @package		PyroCMS
 * @category            Module
 * @subpackage          Forums helper
 * @author		Stephen Cozart
 * @license		Apache License v2.0
 * @link		http://pyrocms.com
 */

/**
 * Returns a formated date based on the format string set in the controll panel
 *
 * @param $timestamp
 * @return string
 */
function forum_date($timestamp = FALSE, $append_time = TRUE)
{
        $CI =& get_instance();
        
        $time = $append_time ? ' g:i a' : '' ;
        
        if(!function_exists('format_date'))
        {
                return date($CI->settings->forums_date_format . $time, $timestamp);
        }
        else
        {
                return format_date($timestamp);
        }
}

function strip_code_tags($str) {
        $pattern = '|[[\/\!]*?[^\[\]]*?]|si';
        $replace = '';
        return preg_replace($pattern, $replace, $str);
}

function auto_bblink($str, $type = 'both', $popup = FALSE)
{
        if ($type != 'email')
		{
			if (preg_match_all("#(^|\s|\()((http(s?)://)|(www\.))(\w+[^\s\)\<]+)#i", $str, $matches))
			{
				$pop = ($popup == TRUE) ? " target=\"_blank\" " : "";
	
				for ($i = 0; $i < count($matches['0']); $i++)
				{
					$period = '';
					if (preg_match("|\.$|", $matches['6'][$i]))
					{
						$period = '.';
						$matches['6'][$i] = substr($matches['6'][$i], 0, -1);
					}
		
					$str = str_replace($matches['0'][$i],
										$matches['1'][$i].'[url=http'.
										$matches['4'][$i].'://'.
										$matches['5'][$i].
										$matches['6'][$i].$pop.']http'.
										$matches['4'][$i].'://'.
										$matches['5'][$i].
										$matches['6'][$i].'[/url]'.
										$period, $str);
				}
			}
		}

		if ($type != 'url')
		{
			if (preg_match_all("/([a-zA-Z0-9_\.\-\+]+)@([a-zA-Z0-9\-]+)\.([a-zA-Z0-9\-\.]*)/i", $str, $matches))
			{
				for ($i = 0; $i < count($matches['0']); $i++)
				{
					$period = '';
					if (preg_match("|\.$|", $matches['3'][$i]))
					{
						$period = '.';
						$matches['3'][$i] = substr($matches['3'][$i], 0, -1);
					}
		
					$str = str_replace($matches['0'][$i], safe_mailto($matches['1'][$i].'@'.$matches['2'][$i].'.'.$matches['3'][$i]).$period, $str);
				}
			}
		}

		return $str;
}

function sanitize_search_results($str = FALSE, $limit = 25)
{
		$ci =& get_instance();
        if($str)
        {
                //since we are going to be wrapping $str in anchor tags
                $str = htmlentities($str);
                
                //handle the PITA { left curly brace so Tags Library doesn't bitch
                //$str = str_replace('{', '&#123', $str);
                
                //remove code tags 
                $str = strip_code_tags($str);
                
                //shorten that baby up
                $str = word_limiter($str, $limit);
        }
        return $str;
}

/**
 * make content safe for display by converting to htmlentities etc..
 *
 * @param $str string
 * @return string
 */
function forum_entities($str = FALSE, $entities = FALSE)
{
        if($str)
        {
                //convert to entities?
                $str = $entities ? htmlentities($str) : $str;
                
                //convert the { character
                //$str = str_replace('{', '&#123;', $str);
        }
        return $str;
}

function lock_button($topic)
{
		$ci =& get_instance();
		$anchor = '';
		if(!$topic->is_locked and $ci->forums_lib->can_lock($topic))
		{
				$anchor = anchor('forums/topics/lock/' . $topic->id, '<i class="icon-white icon-remove-circle"></i>' . lang('forums.lock_label'), 'class="btn danger"');
		}
		if($topic->is_locked and $ci->forums_lib->can_lock($topic))
		{
				$anchor = anchor('forums/topics/unlock/' . $topic->id, '<i class="icon-white icon-ok-circle"></i>' . lang('forums.unlock_label'), 'class="btn success"');
		}
		return $anchor;
}
function sticky_button($topic)
{
		$ci =& get_instance();
		$anchor = '';
		if(!$topic->sticky and $ci->forums_lib->can_sticky($topic))
		{
				$anchor = anchor('forums/topics/stick/' . $topic->id, '<i class="icon-star"></i>' . lang('forums.stick_label'), 'class="btn default"');
		}
		if($topic->sticky and $ci->forums_lib->can_sticky($topic))
		{
				$anchor = anchor('forums/topics/unstick/' . $topic->id, '<i class="icon-star"></i>' . lang('forums.unstick_label'), 'class="btn default"');
		}
		return $anchor;
}

function edit_button($post)
{
		$ci =& get_instance();
		$anchor = '';
		
		if($ci->forums_lib->can_edit($post))
		{
				$anchor = anchor('forums/posts/edit_reply/'.$post->id, '<i class="icon-white icon-edit"></i>' . lang('forums_edit_label'), 'class="btn warning"');
		}
		
		return $anchor;
}

function delete_button($post)
{
		$ci =& get_instance();
		$anchor = '';
		
		if($ci->forums_lib->can_delete($post))
		{
				$anchor = anchor('forums/posts/delete_reply/'.$post->id, '<i class="icon-white icon-remove"></i>' . lang('forums_delete_label'), 'class="btn danger"');
		}
		
		return $anchor;
}

function quote_button($post, $topic)
{
		$ci =& get_instance();
		$anchor = '';
		
		if(!$topic->is_locked or $ci->forums_lib->can_lock($topic))
		{
				$anchor = anchor('forums/posts/quote_reply/'.$post->id,'<i class="icon-white icon-share"></i>' . lang('forums.quote_label'), 'class="btn info"');
		}
		
		return $anchor;
}

function reply_button($topic, $closed)
{
		$ci =& get_instance();
		$anchor = '';
		
		$topic->is_locked = $closed ? TRUE : $topic->is_locked;
		
		if(!$topic->is_locked or $ci->forums_lib->can_lock($topic))
		{
				$anchor = anchor('forums/posts/new_reply/'.$topic->id, '<i class="icon-white icon-share-alt"></i>' . lang('forums.new_reply_label'), 'class="btn info"');
		}
		
		return $anchor;
}

function new_topic_button($forum_id, $closed)
{
		$ci =& get_instance();
		$anchor = '';
		
		if(!$closed or $ci->forums_lib->can_post($forum_id))
		{
				$anchor = anchor('forums/topics/new_topic/'.$forum_id, '<i class="icon-white icon-pencil"></i>' . lang('forums.new_topic_label'), 'class="btn success"');
		}
		
		return $anchor;
}

function unread_button($forum_id, $topic_id)
{
		$ci =& get_instance();
		$anchor = '';
		
		if($ci->ion_auth->logged_in())
		{
				$read_topics = $ci->forum_read_topics_m->read_topics($ci->current_user->id);
				
				//does the forum exist in the array
				$forum = array_key_exists($forum_id, $read_topics) ? $read_topics[$forum_id] : array();
				
				if(!empty($forum))
				{
						if(array_key_exists($topic_id, $forum))
						{
								$anchor = anchor('forums/topics/unread/'.$forum_id . '/' . $topic_id, '<i class="icon-white icon-remove"></i>' . lang('forums_unread_button'), 'class="btn warning"');
						}
				}
		}
		return $anchor;
}

/* End of file helpers/forums_helper.php */