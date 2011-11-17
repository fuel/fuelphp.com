<div style="width:1000px;float:left;">
<?php if(validation_errors()): ?>
	<div class="errors">
		<?php echo validation_errors(); ?>
	</div>
<?php endif; ?>

	<?php if($show_preview): ?>
	<div class="preview">
		<h4><?php echo lang('forums.post_preview_header'); ?></h4>
		<h5><?php echo $topic->title;?></h5>
		<div><?php echo parse(forum_entities($reply->content, TRUE), 0, TRUE );?></div>
	</div>
	<?php endif; ?>

	<table class="forum-table topic-table" border="0" cellspacing="0">
	
	<tbody>
		<tr class="postinfo">
			<td>
				<?php echo user_displayname($last_post->author_id); ?>
			</td>
			<td>
				<?php echo lang('forums.posted_label') . forum_date($last_post->created_on);?>
			</td>
		</tr>
		<tr>
			<td class="authorinfo border-left">
				<a href="<?php echo site_url('user/'.$last_post->author_id); ?>">
					<?php echo gravatar($last_post->author->email);?>
				</a>
		
				<div class="date">
					<?php echo lang('forums.joined_label') . forum_date($last_post->author->created_on, FALSE);?>
				</div>
				<div class="count">
					<?php echo lang('forums.posts_header') . ': '.  $last_post->author->post_count;?>
				</div>
			</td>
			<td colspan="2" class="body border-right"><?php echo parse(forum_entities($last_post->content, TRUE), 0, TRUE); ?></td>
		</tr>
	</tbody>
	</table>

	<table class="form-table" border="0" cellspacing="0">
		<?php echo form_open(uri_string(), 'class="forum"'); ?>
		<thead>
			<tr>
				<th colspan="2" class="header">
					<?php if($this->method == 'new_reply'): ?>
					<?php echo lang('forums.new_reply_msg'); ?><span class="title"><?php echo $topic->title;?> in <?php echo $forum->title;?></span>
					<?php elseif($this->method == 'edit_reply'): ?>
					<?php echo lang('forums.edit_reply_msg'); ?><span class="title"><?php echo $topic->title;?> in <?php echo $forum->title;?></span>
					<?php endif; ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr class="formatting">
				<th><?php echo lang('forums.format_label'); ?></th>
				<td><?php echo $template['partials']['buttons']; ?></td>
			</tr>
			<tr class="message">
				<th class ="textarea-label"><?php echo lang('forums.message_label'); ?></th>
				<td>
					<?php echo form_textarea(array('name' => 'content', 'id' => 'forum_input', 'value' => forum_entities($reply->content))); ?>
					
					<?php echo form_error('content', '<p class="form_error">', '</p>'); ?></td>
			</tr>
			<tr class="options">
				<th><?php echo lang('forums.options_label'); ?></th>
				<td class="form-options">
					<?php echo form_checkbox('notify', 1, $reply->notify); ?> <label for="notify"><?php echo lang('forums.notify_label'); ?></label>
				</td>
			</tr>
			<tr class="buttons">
				<td>&nbsp;</td>
				<td class="form-buttons">
					<input type="submit" name="preview" value="<?php echo lang('forums.preview_label'); ?>" />&nbsp;
					<input type="submit" name="submit" class="submit" value="<?php echo lang('forums.submit_reply_label'); ?>" /></td>
			</tr>
		</tbody>
		<?php echo form_close(); ?>
	</table>
</div>