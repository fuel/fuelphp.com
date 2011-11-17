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
 * PyroCMS Forum Categories Model
 *
 * @author		Dan Horrigan <dan@dhorrigan.com>, Stephen Cozart <stephen.cozart@gmail.com>
 * @package		PyroCMS
 * @subpackage		Forums
 * @category		Model
 */
class Forum_categories_m extends MY_Model
{
    /**
     * Update sort order position
     *
     * @access public
     * @return bool
     */
    public function update_order($id, $position)
    {
        return $this->update($id, array('sort_order' => $position));
    }
}
/* End of file models/forum_categories_m.php */