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
 * PyroCMS Forums Model
 *
 * @author		Dan Horrigan <dan@dhorrigan.com>, Stephen Cozart <stephen.cozart@gmail.com>
 * @package		PyroCMS
 * @subpackage		Forums
 * @category		Model
 */
class Forums_m extends MY_Model
{
	/**
	 * Get list of forums and its associated category title
	 *
	 * @access public
	 * @return object
	 */
	public function get_forums($category_id = FALSE)
	{
		$category_id ? $this->db->where('forums.category_id', $category_id) : '' ;
		return $this->db->select('forums.is_closed, forums.id, forums.title, forums.description, forum_categories.title as category, forum_categories.id as cat_id')
				->join('forum_categories', 'forums.category_id = forum_categories.id')
				->order_by('category', 'ASC')
				->order_by('forums.sort_order', 'ASC')
				->get($this->_table)
				->result();
	}
	
	/**
	 * Update the sort_order of the specified forums
	 *
	 * @access public
	 * @return bool
	 */
	public function update_order($id, $position)
	{
		return $this->update($id, array('sort_order' => $position));
	}
}
/* End of file models/forums_m.php */
