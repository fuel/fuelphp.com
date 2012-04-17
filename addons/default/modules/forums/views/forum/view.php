{{ noparse }}
<section class="forum">
	<?php echo $template['partials']['search_form']; ?>
	
	<table class="forum-table" border="0" cellspacing="0" style="clear: both;">
		<thead>
	  		<tr class="header">
	    		<th class="forum-name"><h3><?php echo $forum->title;?></h3></th>
	    		<th class="forum-topic"><h6><?php echo lang('forums.posts_header'); ?></h6></th>
	    		<th class="forum-replies"><h6><?php echo lang('forums.views_header'); ?></h6></th>
	    		<th class="forum-info"><h6><?php echo lang('forums.last_post_header'); ?></h6></th>
	  		</tr>
		</thead>
	<tbody>
	
	<?php if (empty($forum->topics)):?>
		<tr>
			<td colspan="5" align="center"><?php echo lang('forums.no_posts_msg'); ?></td>
		</tr>
	<?php else: ?>
		<?php foreach ($forum->topics as $topic): ?>
			<tr>
				<td  style="border-bottom: 1px solid #eeeeee;padding: 15px;" class="forum-name">
					<?php echo $topic->sticky ? '<span class="sticky">' . lang('forums.sticky_label') . '</span>' : ''; ?>
					<div class="title"><?php echo anchor('forums/topics/view/'.$topic->id, $topic->title);?></div>
					<div class="author-label">
						<?php echo lang('forums.author_label'); ?>
						<?php echo user_displayname($topic->author_id); ?>
					</div>
				</td>
				<td style="border-bottom: 1px solid #eeeeee;padding: 15px;" class="forum-topic"><?php echo $topic->post_count;?></td>
				<td  style="border-bottom: 1px solid #eeeeee;padding: 15px;" class="forum-replies"><?php echo $topic->view_count?></td>
				<td  style="border-bottom: 1px solid #eeeeee;padding: 15px;" class="forum-info">
					<?php if (!empty($topic->last_post)):?>
						<div class="last-date">
							<?php echo lang('forums.posted_label'); ?>
							<?php echo anchor('forums/posts/view_reply/'.$topic->last_post->id, forum_date($topic->last_post->created_on)); ?>
						</div>
						<div class="last-author">
							<?php echo lang('forums.author_label'); ?>
							<?php echo user_displayname($topic->last_post->author_id); ?>
						</div>
					<?php endif;?>
				</td>
			</tr>
		<?php endforeach; ?>
	<?php endif;?>
  	</tbody>
</table>

<hr>

	<?php echo $pagination['links']; ?>

	<div class="forum-buttons">
		<?php echo new_topic_button($forum->id, $forum->is_closed); ?>
	</div>
</section>
{{ /noparse }}
