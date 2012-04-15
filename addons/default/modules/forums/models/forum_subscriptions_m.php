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
 * PyroCMS Forum Subscriptions Model
 *
 * @author		Dan Horrigan <dan@dhorrigan.com>, Stephen Cozart <stephen.cozart@gmail.com>
 * @package		PyroCMS
 * @subpackage		Forums
 * @category		Model
 */
class Forum_subscriptions_m extends MY_Model
{

	/**
	 * Adds a suscription
	 *
	 * @access	public
	 * @param	int 	$user_id
	 * @param	int 	$topic_id
	 */
	public function add($user_id, $topic_id)
	{
		if(!$this->is_subscribed($user_id, $topic_id))
		{
			parent::insert(array('user_id' => $user_id, 'topic_id' => $topic_id));
		}
	}
	
	/**
	 * Check if a user is subscribed to the specified topic
	 *
	 * @param	int	$topic_id
	 * @param	int	$user_id
	 * @return	bool
	 */
	public function is_subscribed($user_id, $topic_id)
	{
		if(parent::count_by(array('user_id' => $user_id, 'topic_id' => $topic_id)) > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
}
/* End of file models/forum_subscriptions_m.php */