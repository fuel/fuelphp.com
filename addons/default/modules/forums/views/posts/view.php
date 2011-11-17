<div class="forum-buttons">
	<?php echo new_topic_button($forum->id, $forum->is_closed); ?>
	<?php echo reply_button($topic, $forum->is_closed); ?>
	<?php echo unread_button($topic->forum_id, $topic->id); ?>
	<?php echo $template['partials']['search_form']; ?>
		<br class="clear-both" />
	<?php if($topic->is_locked): ?>
		<div class="notice-box locked"><?php echo lang('forums.locked_msg'); ?></div>
	<?php endif; ?>
	
	<br class="clear-both" />
</div>

<table class="forum-table topic-table" border="0" cellspacing="0">
	<thead>
	<tr>
		<th colspan="4" class="header">
			<?php echo $topic->title;?>
			<?php echo $move_form; ?>
			<?php echo lock_button($topic); ?>
		</th>
	</tr>
	</thead>
	<tbody>
  <?php 
	$i = $pagination['offset'];
	foreach($topic->posts as $post):
  ?>
	<tr class="postinfo">
		<td width="20%" class="author border-left">
			<?php echo user_displayname($post->author_id); ?>
		</td>
    <td width="50%"><?php echo lang('forums.posted_label') . forum_date($post->created_on);?></td>
<?php if($post->parent_id == 0): ?>
	<td width="30%" class="postreport border-right">
		<!--<?php echo anchor('forums/posts/report/'.$post->id, lang('forums.report_label'), 'class="button report"');?>-->
		
		<?php echo sticky_button($post); ?>
		
	</td>
<?php else: ?>
	<td width="35%" class="postreport border-right">
		<!--<?php echo anchor('forums/posts/report/'.$post->id, lang('forums.report_label'), 'class="button report"');?>-->
		<?php echo anchor('forums/posts/view_reply/'.$post->id, '# '.$i , array('title' => lang('forums.permalink_label'), 'name' => $post->id, 'class' => 'button permalink'));?>
	</td>
<?php endif; ?>
  </tr>
 
  <tr>
    <td class="authorinfo border-left">
		<a href="<?php echo site_url('user/'.$post->author_id); ?>">
			<?php echo gravatar($post->author->email);?>
		</a>

		<div class="date">
			<?php echo lang('forums.joined_label') . forum_date($post->author->created_on, FALSE);?>
		</div>
		<div class="count">
			<?php echo lang('forums.posts_header') . ': '.  $post->author->post_count;?>
		</div>
	</td>
    <td colspan="2" class="body border-right"><?php echo parse(forum_entities($post->content, TRUE), 0, TRUE); ?></td>
  </tr>
  
  <tr class="postlinks">
    <td class="border-left">
		<!--<?php if(isset($user['id'])): ?>
		[ <?php echo anchor('messages/create/'.$post->author->id, 'Message');?> ]
		<?php endif; ?>-->
	</td>
	
	<td colspan="2" class="border-right align-right">
		<?php echo quote_button($post, $topic); ?>
		<?php echo edit_button($post); ?>
		<?php echo delete_button($post); ?>
	</td>

	</tr>
  <?php
	$i++;
	endforeach; ?>
	</tbody>
</table>
<?php echo $pagination['links']; ?>

<div class="forum-buttons">
	<?php echo new_topic_button($forum->id, $forum->is_closed); ?>
	<?php echo reply_button($topic, $forum->is_closed); ?>
	<br class="clear-both" />
</div>
