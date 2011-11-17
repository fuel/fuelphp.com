<?php if(validation_errors()): ?>
<div class="errors">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>

<?php if($show_preview): ?>
<div class="preview">
	<h4><?php echo lang('forums.topic_preview_header'); ?></h4>
	<h5><?php echo html_entity_decode(set_value('title'));?></h5>
	<?php echo parse(html_entity_decode(set_value('content')), 0, TRUE);?>
</div>
<?php endif; ?>

<table class="form-table" border="0" cellspacing="0">
	<?php echo form_open('forums/topics/new_topic/'.$forum->id); ?>
	<thead>
		<tr>
			<th colspan="2" class="header">
				<?php echo lang('forums.new_topic_msg'); ?><span class="title"><?php echo $forum->title;?></span>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr class="title">
			<th><?php echo lang('forums_title_label'); ?></th>
			<td><?php echo form_input(array('name' => 'title', 'id' => 'title', 'value' => forum_entities(set_value('title')))); ?><?php echo form_error('title', '<p class="form_error">', '</p>'); ?></td>
		</tr>
		<tr class="formatting">
			<th><?php echo lang('forums.format_label'); ?></th>
			<td><?php echo $template['partials']['buttons']; ?></td>
		</tr>
		<tr class="message">
			<th class ="textarea-label"><?php echo lang('forums.message_label'); ?></th>
			<td><?php echo form_textarea(array('name' => 'content', 'id' => 'forum_input', 'value' => forum_entities(set_value('content')))); ?><?php echo form_error('content', '<p class="form_error">', '</p>'); ?></td>
		</tr>
		<tr class="options">
			<th><?php echo lang('forums.options_label'); ?></th>
			<td class="form-options">
				<?php echo form_checkbox('notify', 1, $this->input->post('notify')); ?> <label for="notify"><?php echo lang('forums.notify_label'); ?></label>
			</td>
		</tr>
		<tr class="buttons">
			<td>&nbsp;</td>
			<td class="form-buttons">
				<input type="submit" name="preview" value="<?php echo lang('forums.preview_label'); ?>" />&nbsp;
				<input type="submit" name="submit" class="submit" value="<?php echo lang('forums.submit_topic_label'); ?>" /></td>
		</tr>
	</tbody>
	<?php echo form_close(); ?>
</table>
