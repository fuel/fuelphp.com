<?php defined('BASEPATH') or exit('No direct script access allowed');

class Module_Forums extends Module {

	public $version = '1.1.6';
	protected $_tables = array('forums', 'forum_categories', 'forum_posts', 'forum_subscriptions', 'forum_read_topics', 'forum_searches');

	public function info()
	{
		return array(
			'name' => array(
				'en' => 'Forums',
				'nl' => 'Forums',
				'es' => 'Forums',
				'fr' => 'Forums',
				'de' => 'Forums',
				'pl' => 'Forums',
				'br' => 'Forums',
				'zh' => 'Forums'
			),
			'description' => array(
				'en' => 'Forums for your website.',
				'nl' => "Forums for your website.",
				'pl' => 'Forums for your website.',
				'es' => 'Forums for your website.',
				'fr' => "Forums for your website.",
				'de' => 'Forums for your website.',
				'br' => 'Forums for your website.',
				'zh' => 'Forums for your website.'
			),
			'frontend' => TRUE,
			'backend'  => TRUE,
			'menu'	  => 'content'
		);
	}

	public function install()
	{
		$forums = "
			CREATE TABLE IF NOT EXISTS ".$this->db->dbprefix('forums')." (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`title` varchar(100) NOT NULL DEFAULT '',
			`description` varchar(255) NOT NULL DEFAULT '',
			`category_id` int(11) NOT NULL DEFAULT '0',
			`permission` int(2) NOT NULL DEFAULT '0',
			`sort_order` int(11) DEFAULT '0',
			`is_closed` int(1) NOT NULL DEFAULT '0',
			PRIMARY KEY (`id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Forums are the containers for threads and topics.';
		";
		
		$forum_subscriptions = "
			CREATE TABLE IF NOT EXISTS ".$this->db->dbprefix('forum_subscriptions')." (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`topic_id` int(11) NOT NULL DEFAULT '0',
			`user_id` int(11) NOT NULL DEFAULT '0',
			PRIMARY KEY (`id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
		";
		
		$forum_posts = "
			CREATE TABLE IF NOT EXISTS ".$this->db->dbprefix('forum_posts')." (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`forum_id` int(11) NOT NULL DEFAULT '0',
			`author_id` int(11) NOT NULL DEFAULT '0',
			`parent_id` int(11) NOT NULL DEFAULT '0',
			`title` varchar(100) NOT NULL DEFAULT '',
			`content` text NOT NULL,
			`type` tinyint(1) NOT NULL DEFAULT '0',
			`is_locked` tinyint(1) NOT NULL DEFAULT '0',
			`is_hidden` tinyint(1) NOT NULL DEFAULT '0',
			`created_on` int(11) NOT NULL DEFAULT '0',
			`updated_on` int(11) NOT NULL DEFAULT '0',
			`view_count` int(11) NOT NULL DEFAULT '0',
			`sticky` tinyint(1) NOT NULL DEFAULT '0',
			PRIMARY KEY (`id`),
			FULLTEXT KEY `search` (`title`, `content`)			
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
		";
		
		$forum_categories = "
			CREATE TABLE IF NOT EXISTS ".$this->db->dbprefix('forum_categories')." (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`title` varchar(100) NOT NULL DEFAULT '',
			`permission` mediumint(2) NOT NULL DEFAULT '0',
			`sort_order` int(11) DEFAULT '0',
			PRIMARY KEY (`id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Splits forums into categories';
		";
		
		$forum_read_topics = "
			CREATE TABLE IF NOT EXISTS ".$this->db->dbprefix('forum_read_topics')." (
				`user_id` int(11) NOT NULL,
				`forum_id` int(11) NOT NULL,
				`topics` text NOT NULL,
				`last_activity` int(10) NOT NULL,
				PRIMARY KEY user_forum_id (`user_id`, `forum_id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Store the topics a user has read';
		";
		
		$forum_searches = "
			CREATE TABLE IF NOT EXISTS ".$this->db->dbprefix('forum_searches')." (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`user_id` int(11) NULL,
				`title` varchar(100) NOT NULL DEFAULT 'undefined',
				`criteria` text NOT NULL,
				`created_on` int(11) NOT NULL DEFAULT '0',
				PRIMARY KEY (`id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Store search criteria.';
		";
		
		$editor_setting = "
			INSERT IGNORE INTO ".$this->db->dbprefix('settings')." " .
			"(`slug`, `title`, `description`, `type`, `default`, `value`, `options`, `is_required`, `is_gui`, `module`) VALUES" .
			"('forums_editor', 'Forums Editor', 'Which editor should the forums use?', 'select', 'bbcode', 'bbcode', " .
			"'bbcode=BBCode|textile=Textile', 1, 1, 'forums'),
			('forums_date_format', 'Date Format', 'Controlls how dates are displayed on your forums.  Please note you only need to specify the day, month, and year as hours, minutes and meridiem are added by default', " .
			"'text', 'm/d/Y', '', '', 1, 1, 'forums');
		";
		
		$forum_permissions = "
			CREATE TABLE IF NOT EXISTS ".$this->db->dbprefix('forum_permissions')." (
				`group_id` int(11) NOT NULL,
				`forum_id` int(11) NOT NULL,
				PRIMARY KEY (`group_id`, `forum_id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Store search criteria.';
		";
		
		$forum_moderators = "
			CREATE TABLE IF NOT EXISTS ".$this->db->dbprefix('forum_moderators')." (
				`user_id` int(11) NOT NULL,
				`forum_id` int(11) NOT NULL,
				PRIMARY KEY (`user_id`, `forum_id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Store search criteria.';
		";
		
		$this->db->query($editor_setting);
		
		$queries = array(
				$forums,
				$forum_subscriptions,
				$forum_posts,
				$forum_categories,
				$forum_read_topics,
				$forum_searches,
				$forum_permissions,
				$forum_moderators
				);
		
		foreach($queries as $query)
		{
			if( ! $this->db->query($query) )
			{
				return FALSE;
			}
		}
		
		//create the fulltext index on the forum_posts table
		$index = $this->db->query('SHOW INDEXES FROM '.$this->db->dbprefix('forum_posts').' WHERE Key_name="search"')->result();
		
		if(count($index) == 0)
		{
			$sql = "CREATE FULLTEXT INDEX `search` ON `".$this->db->dbprefix('forum_posts')."` (`title`, `content`);";
			$this->db->query($sql);
		}
		
		//create index on title field
		$index = $this->db->query('SHOW INDEXES FROM '.$this->db->dbprefix('forum_posts').' WHERE Key_name="title"')->result();
		if(count($index) == 0)
		{
			$sql = "CREATE FULLTEXT INDEX `title` ON ".$this->db->dbprefix('forum_posts')." (`title`);";
			$this->db->query($sql);
		}
		
		//create index on content field
		$index = $this->db->query('SHOW INDEXES FROM '.$this->db->dbprefix('forum_posts').' WHERE Key_name="content"')->result();
		if(count($index) == 0)
		{
			$sql = "CREATE FULLTEXT INDEX `content` ON `".$this->db->dbprefix('forum_posts')."` (`content`);";
			$this->db->query($sql);
		}
		
		//add the sort order column to forums table if it doesn't exist
		if(!$this->db->field_exists('sort_order', 'forums'))
		{
			$this->db->query("ALTER TABLE ".$this->db->dbprefix('forums')." ADD sort_order int(11) DEFAULT '0'");
		}
		
		//add the sort order column to categories table if it doesn't exist
		if(!$this->db->field_exists('sort_order', 'forum_categories'))
		{
			$this->db->query("ALTER TABLE ".$this->db->dbprefix('forum_categories')." ADD sort_order int(11) DEFAULT '0'");
		}
		
		//adding created_on to forum_searches table
		if(!$this->db->field_exists('created_on', 'forum_searches'))
		{
			$this->db->query("ALTER TABLE ".$this->db->dbprefix('forum_searches')." ADD created_on int(11) NOT NULL DEFAULT '0'");
		}
		
		return TRUE;

	}

	public function uninstall()
	{
		//remove the settings
		$this->db->delete('settings', array('slug' => 'forums_editor'));
		$this->db->delete('settings', array('slug' => 'forums_date_format'));
		
		return TRUE;
	}

	public function upgrade($old_version)
	{
		$sql['forum_permissions'] = "
			CREATE TABLE IF NOT EXISTS ".$this->db->dbprefix('forum_permissions')." (
				`group_id` int(11) NOT NULL,
				`forum_id` int(11) NOT NULL,
				PRIMARY KEY (`group_id`, `forum_id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Store search criteria.';
		";
		
		$sql['forum_moderators'] = "
			CREATE TABLE IF NOT EXISTS ".$this->db->dbprefix('forum_moderators')." (
				`user_id` int(11) NOT NULL,
				`forum_id` int(11) NOT NULL,
				PRIMARY KEY (`user_id`, `forum_id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Store search criteria.';
		";
		
		foreach($sql as $name => $query)
		{
			if( ! $this->db->query($query) )
			{
				return FALSE;
			}
		}
		
		//add is_closed field 
		if( ! $this->db->field_exists('is_closed', 'forums') )
		{
			$this->db->query("ALTER TABLE ".$this->db->dbprefix('forums')." ADD is_closed int(1) NOT NULL DEFAULT '0'");
		}
		
		return TRUE;
	}

	public function help()
	{
		// Return a string containing help info
		// You could include a file and return it here.
		return "No documentation has been added for this module.";
	}
}
/* End of file details.php */