<nav id="shortcuts">
	<h6><?php echo lang('cp_shortcuts_title'); ?></h6>
	<ul>
		<li><?php echo anchor('admin/forums', lang('forums_forum_label') . ' ' . lang('forums_list_categories_title')); ?></li>
		<?php if($this->method == 'index'): ?>
		<li><?php echo anchor('admin/forums/create_category', lang('forums_create_category_title')) ?></li>
		<?php endif; ?>
		<?php if($this->method == 'list_forums'): ?>
		<li><?php echo anchor('admin/forums/create_forum/'.$this->uri->segment(4), lang('forums_create_forum_title')) ?></li>
		<?php endif; ?>
		<?php if($this->method == 'create_forum'): ?>
		<li><?php echo anchor('admin/forums/list_forums/'.$this->uri->segment(4), lang('forums_list_forum_title')) ?></li>
		<?php endif; ?>
	</ul>
	<br class="clear-both" />
</nav>