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
 */

/**
 * PyroCMS Forum Search Storage Model
 *
 * @author		Stephen Cozart <stephen.cozart@gmail.com>
 * @package		PyroCMS
 * @subpackage		Forums
 * @category		Model
 */
class Forum_searches_m extends MY_Model {

    /**
     * Purge saved searches
     *
     * delete saved searches from the db that are older than two days
     *
     * @access public
     * @return void
     */
    public function purge_searches()
    {
            //now minus 2 days calculated in seconds
            $cutoff = now() - 172800;
            return $this->db->where('created_on <', $cutoff)
                            ->where('title', 'undefined')
                            ->delete($this->_table);
    }
    
}

/* End of file models/forum_searches_m.php */