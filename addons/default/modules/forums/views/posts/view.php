{{ noparse }}
<section class="forum">

	<?php if($topic->is_locked): ?>
		<div class="block-message block-message-alert"><?php echo lang('forums.locked_msg'); ?></div>
	<?php endif; ?>
	
	<div class="forum-buttons">
		<?php echo new_topic_button($forum->id, $forum->is_closed); ?>
		<?php echo reply_button($topic, $forum->is_closed); ?>
	</div>
	
	<?php echo $template['partials']['search_form']; ?>
	
<table class="forum-table topic-table" border="0" cellspacing="0" style="clear: both;">
	<thead>
		<tr>
			<th colspan="4" class="header">
				<h3>Topic: <?php echo $topic->title;?></h3>
	
				<div class="mod_buttons">
					<?php echo $move_form; ?>
					<?php echo lock_button($topic); ?>
				</div>
			</th>
		</tr>
	</thead>
	
	<tbody>
  		<?php 
			$i = $pagination['offset'];
			foreach($topic->posts as $post):
  		?>
		<tr class="postinfo header-alt">
			<td width="20%" class="forum-name">
				<h5><?php echo lang('forums.posted_label') . forum_date($post->created_on);?></h5>
			</td>
  
  			<td width="50%">&nbsp;</td>
			
			<?php if($post->parent_id == 0): ?>
				<td width="30%" class="postreport">
					<!--<?php echo anchor('forums/posts/report/'.$post->id, lang('forums.report_label'), 'class="btn default"');?>-->
					<?php echo sticky_button($post); ?>
				</td>
			<?php else: ?>
				<td width="35%" class="postreport">
					<!--<?php echo anchor('forums/posts/report/'.$post->id, lang('forums.report_label'), 'class="button report"');?>-->
					<?php echo anchor('forums/posts/view_reply/'.$post->id, '# '.$i , array('title' => lang('forums.permalink_label'), 'name' => $post->id, 'class' => 'btn default'));?>
				</td>
			<?php endif; ?>
  		</tr>
  		<tr>
    		<td class="authorinfo">
				<div class="authorname">
					<h4><?php echo user_displayname($post->author_id); ?></h4>
				</div>
				
				<a href="<?php echo site_url('user/'.$post->author_id); ?>">
					<span class="badge <?php echo $post->author->group; ?>">
						<?php echo ucfirst($post->author->group); ?><br>
						<?php echo gravatar($post->author->email);?>
					</span>
				</a>
				
				<div class="authorstats">
					<?php echo lang('forums.joined_label') . forum_date($post->author->created_on, FALSE);?><br>
					<?php echo lang('forums.posts_header') . ': '.  $post->author->post_count;?>
				</div>
			</td>
    		<td colspan="2" class="body"><?php echo parse(forum_entities($post->content, TRUE), 0, TRUE); ?></td>
  		</tr>
  
  		<tr class="postlinks">
    		<td>
				<!--<?php if(isset($user['id'])): ?>
				[ <?php echo anchor('messages/create/'.$post->author->id, 'Message');?> ]
				<?php endif; ?>-->
			</td>
			<td colspan="2" class="align-right">
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
	
	<hr>
	
	<?php echo $pagination['links']; ?>

	<div class="forum-buttons" style="float:right;margin-top: -50px;">
		<?php echo new_topic_button($forum->id, $forum->is_closed); ?>
		<?php echo reply_button($topic, $forum->is_closed); ?>
	</div>
</section>
{{ /noparse }}