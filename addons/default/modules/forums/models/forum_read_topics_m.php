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
 * PyroCMS Forums Read Topics Model
 *
 * @author		Stephen Cozart <stephen.cozart@gmail.com>
 * @package		PyroCMS
 * @subpackage		Forums
 * @category		Model
 */
class Forum_read_topics_m extends MY_Model
{
    /**
     * Mark
     *
     * Mark a topic as read.  Will either update an existing row or insert new.
     *
     * @access public
     * @param $user_id
     * @param $forum_id
     * @param $topic_id
     * @return mixed
     */
    public function mark($user_id = FALSE, $forum_id = FALSE, $topic_id = FALSE)
    {
        if($user_id AND $forum_id AND $topic_id)
        {
            if(!$this->_row_exists($user_id, $forum_id))
            {
                $data = array(
                            'user_id' => $user_id,
                            'forum_id' => $forum_id,
                            'last_activity' => now(),
                            'topics' => serialize(array($topic_id => now()))
                        );
                return parent::insert($data);
            }
            
            //already an entry for this user/forum combo,  added to the existing entry
            else
            {
                $row = $this->get_by(array('user_id'=>$user_id, 'forum_id' => $forum_id));
                
                $topics = unserialize($row->topics);
                
                //how big is the serialized string.  if its longer than 20,000
                if(strlen($row->topics) > 20000)
                {
                    $topics = array_slice($topics, 2, TRUE);
                }
                
                $topics[$topic_id] = now();
                
                $data = array(
                            'last_activity' => now(),
                            'topics' => serialize($topics)
                        );
                
                return parent::update_by(array('user_id'=>$user_id, 'forum_id'=>$forum_id), $data);
            }
        }
        return FALSE;
    }
    
    /**
     * Mark all topics read that are passed to this method
     *
     * @param user_id
     * @access public
     * @return bool
     */
    public function mark_all_read($user_id = FALSE, $topics = array())
    {
        $counter = 0;
        foreach($topics as $topic)
        {
            if($this->mark($user_id, $topic->forum_id, $topic->id))
            {
                $counter++;
            }
        }
        return ($counter == count($topics)) ? TRUE : FALSE ;
    }
    
    /**
     * Get read topics for a specific user
     *
     * @param $user_id
     * @param $forum_id
     * @access public
     * @return array
     */
    public function read_topics($user_id = FALSE)
    {
        $rows = $this->get_many_by('user_id', $user_id);
        
        if(!empty($rows))
        {
            foreach($rows as $forum)
            {
                $read[$forum->forum_id] = unserialize($forum->topics);
            }
            return $read;
        }
        
        return array();
    }
    
    /**
     * Find the users last activity date
     *
     * @param $user_id
     * @access public
     * @return int
     */
    public function last_activity($user_id = FALSE)
    {
        return $this->db->select_max('last_activity')
                        ->from($this->_table)
                        ->where('user_id', $user_id)
                        ->get()
                        ->row()
                        ->last_activity;
    }
    
    /**
     * Determine wether or not a row exists for a user/forum combination
     *
     * @param $user_id
     * @param $forum_id
     * @access private
     * @return bool
     */
    private function _row_exists($user_id, $forum_id)
    {
        return ($this->count_by(array('user_id' => $user_id, 'forum_id' => $forum_id)) > 0) ? TRUE : FALSE ;
    }
}
/* End of file models/forum_read_topics_m.php */