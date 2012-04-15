{{ noparse }}
<div class="forum-buttons">
	<?php echo $template['partials']['search_form']; ?>
	<br class="clear-both" />
</div>
<?php echo $pagination['links']; ?>
<table class="forum-table" border="0" cellspacing="0">
	<thead>
		<tr>
			<th colspan="5" class="header"><?php echo lang('forums.new_topics_header'); ?></th>
		</tr>
		<tr>
			<th class="forum-icon">&nbsp;</th>
			<th class="forum-name"><?php echo lang('forums.topic_name_header'); ?></th>
			<th class="forum-topic"><?php echo lang('forums.posts_header'); ?></th>
			<th class="forum-replies"><?php echo lang('forums.views_header'); ?></th>
			<th class="forum-info"><?php echo lang('forums.last_post_header'); ?></th>
		</tr>
	</thead>
	
	<tbody>
  
		<?php if(empty($forum->topics)):?>
		<tr>
			<td colspan="5" align="center"><?php echo lang('forums.no_topics_msg'); ?></td>
		</tr>
	  
		<?php else: ?>
		  
		  <?php foreach($forum->topics as $topic): ?>
		  <tr>
			<td class="forum-icon">
				<?php echo $topic->sticky ? Asset::img('module::pin.png', 'forums') : Asset::img('module::'.$topic->image); ?>
			</td>
			<td class="forum-name">
				<?php echo $topic->sticky ? '<span class="sticky">' . lang('forums.sticky_label') . '</span>' : ''; ?>
				<div class="title">
					<?php echo anchor('forums/topics/view/'.$topic->id, $topic->title);?>
				</div>
				<div class="description">
					<?php echo lang('forums.author_label'); ?>
					<?php echo user_displayname($topic->author_id); ?>
				</div>
			</td>
			<td class="forum-topic"><?php echo $topic->post_count;?></td>
			<td class="forum-replies"><?php echo $topic->view_count?></td>
			<td class="forum-info">
			<?php if(!empty($topic->last_post)):?>
			<div class="last-date">
				<?php echo lang('forums.posted_label'); ?>
				<?php echo anchor('forums/posts/view_reply/'.$topic->last_post->id, forum_date($topic->last_post->created_on)); ?>
			</div>
			<div class="last-author">
				<?php echo lang('forums.author_label'); ?>
				<?php echo user_displayname($topic->last_post->author_id); ?>
			</div>
			<div class="forum-name">
                            <?php echo lang('forums_forum_label'); ?>:&nbsp;
                            <?php echo $topic->forum_name; ?>
			</div>
			<?php endif;?>
			</td>
		  </tr>
		  <?php endforeach; ?>
  	</tbody>
  	
  <?php endif;?>
</table>
<?php echo $pagination['links']; ?>
{{ /noparse }}