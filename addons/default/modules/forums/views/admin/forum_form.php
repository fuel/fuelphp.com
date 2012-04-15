<section class="title">
<?php if($this->method == 'create_forum'): ?>
	<h4><?php echo lang('forums_create_forum_title');?></h4>
<?php else: ?>
	<h4><?php echo sprintf(lang('forums_edit_forum_title'), $forum->title);?></h4>
<?php endif; ?>
</section>
<section class="item">
<?php if(empty($forum->categories)): ?>
	<div class="no_data">
		<?php echo lang('forums_no_categories'); ?>
	</div>
<?php else: ?>

	<?php echo form_open($this->uri->uri_string(), 'class="crud"', array('id' => $forum->id)); ?>
	<div class="form_inputs">
	<fieldset>
	<ul>
		<li>
			<label for="category"><?php echo lang('forums_category_label');?></label>
			<div class="input"><?php echo form_dropdown('category', $forum->categories, $this->input->post('category') ? array($forum->category) : array($category_id)); ?></div>
		</li>

		<li class="even">
			<label for="title"><?php echo lang('forums_title_label');?><span>*</span></label>
			<div class="input"><?php echo form_input('title', $forum->title, 'maxlength="100"'); ?></div>
		</li>
		<li>
			<label for="is_closed"><?php echo lang('forums_closed_label');?></label>
			<div class="input"><?php echo form_dropdown('is_closed', array(lang('buttons.no'), lang('buttons.yes')), array($forum->is_closed)); ?></div>
		</li>

		<li class="even">
			<label for="description"><?php echo lang('forums_description_label');?><span>*</span></label>
			<?php echo form_textarea('description', $forum->description, 'maxlength="255"'); ?>
		</li>
		
		<li>
			<label for="permissions"><?php echo lang('forums_permissions_label');?></label>
			<div class="input"><?php echo form_multiselect('permissions[]', $group_options, $forum->permissions);?></div>
		</li>
		
		<li class="even">
			<label for="moderators"><?php echo lang('forums_moderators_label');?></label>
			<div class="input"><?php echo form_multiselect('moderators[]', $moderator_options, $forum->moderators);?></div>
		</li>
	</ul>
	</fieldset>
	<div class="buttons align-right padding-top">
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )); ?>
	</div>
	<?php echo form_close(); ?>
<?php endif; ?>
</section>