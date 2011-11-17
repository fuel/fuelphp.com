<?php if($this->method == 'create_forum'): ?>
	<h3><?php echo lang('forums_create_forum_title');?></h3>
<?php else: ?>
	<h3><?php echo sprintf(lang('forums_edit_forum_title'), $forum->title);?></h3>
<?php endif; ?>

<?php if(empty($forum->categories)): ?>
	<div class="blank-slate">
		<h2><?php echo lang('forums_no_categories'); ?></h2>
	</div>
<?php else: ?>

	<?php echo form_open($this->uri->uri_string(), 'class="crud"', array('id' => $forum->id)); ?>

	<ol>
		<li>
			<label for="category"><?php echo lang('forums_category_label');?></label>
			<?php echo form_dropdown('category', $forum->categories, $this->input->post('category') ? array($forum->category) : array($category_id)); ?>
		</li>

		<li class="even">
			<label for="title"><?php echo lang('forums_title_label');?></label>
			<?php echo form_input('title', $forum->title, 'maxlength="100"'); ?>
			<span class="required-icon tooltip"><?php echo lang('required_label');?></span>
		</li>
		<li>
			<label for="is_closed"><?php echo lang('forums_closed_label');?></label>
			<?php echo form_dropdown('is_closed', array(lang('buttons.no'), lang('buttons.yes')), array($forum->is_closed)); ?>
		</li>

		<li class="even">
			<label for="description"><?php echo lang('forums_description_label');?></label>
			<?php echo form_textarea('description', $forum->description, 'maxlength="255"'); ?>
			<span class="required-icon tooltip"><?php echo lang('required_label');?></span>
		</li>
		
		<li>
			<label for="permissions"><?php echo lang('forums_permissions_label');?></label>
			<?php echo form_multiselect('permissions[]', $group_options, $forum->permissions);?>
		</li>
		
		<li class="even">
			<label for="moderators"><?php echo lang('forums_moderators_label');?></label>
			<?php echo form_multiselect('moderators[]', $moderator_options, $forum->moderators);?>
		</li>
	</ol>
	<div class="buttons align-right padding-top">
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )); ?>
	</div>
	<?php echo form_close(); ?>

<?php endif; ?>