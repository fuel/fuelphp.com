{{ noparse }}
<section class="forum">

	<div id="post-actions">
		<?php echo anchor('forums/newtopics', '<i class="icon-white icon-eye-open"></i>' . lang('forums.view_new_label'), 'class="btn success"'); ?>
		<?php echo anchor('forums/markall', '<i class="icon-white icon-remove"></i>' . lang('forums.markall_label'), 'class="btn danger"'); ?>
	</div>
	
	<?php echo $template['partials']['search_form']; ?>

<?php foreach($forum_categories as $category): ?>
<?php if($category->forums): ?>
	
	<table class="forum-table" border="0" cellspacing="0">
		<thead>
	  		<tr class="header">
	    		<th class="forum-name"><h3><?php echo $category->title;?></h3></th>
	    		<th class="forum-topic"><h6><?php echo lang('forums.topics_header'); ?></h6></th>
	    		<th class="forum-replies"><h6><?php echo lang('forums.replies_header'); ?></h6></th>
	    		<th class="forum-info"><h6><?php echo lang('forums.last_post_header'); ?></h6></th>
	  		</tr>
		</thead>
		<td>&nbsp;</td>
		<tbody>
			<?php if(!empty($category->forums)): ?>
  			<?php foreach($category->forums as $forum): ?>
				<tr>
					<td style="border-bottom: 1px solid #eeeeee;padding: 15px 0;" class="forum-name">
						<div class="title">
							<h4><?php echo anchor('forums/view/'.$forum->id, $forum->title);?></h4>
						</div>
						<div class="description">
							<?php echo $forum->description;?>
						</div>
					</td>
					
					<td style="border-bottom: 1px solid #eeeeee;padding: 15px 0;" class="forum-topic">
						<?php echo $forum->topic_count; ?>
					</td>
					
					<td style="border-bottom: 1px solid #eeeeee; padding: 15px 0;" class="forum-replies">
						<?php echo $forum->reply_count; ?>
					</td>
	
					<td style="border-bottom: 1px solid #eeeeee; padding: 15px 0;" class="forum-info">
						<?php if(isset($forum->last_post->title)):?>
							<div class="last-title">
								<?php echo anchor('forums/posts/view_reply/'.$forum->last_post->id, $forum->last_post->title); ?>
							</div>
							<div class="last-date">
								<?php echo lang('forums.posted_label'); ?>
								<?php echo forum_date($forum->last_post->created_on); ?>
							</div>
							<div class="last-author">
								<?php echo lang('forums.author_label'); ?>
								<?php echo user_displayname($forum->last_post->author_id); ?>
							</div>
						<?php endif;?>
					</td>
  				</tr>
  			<?php endforeach; ?>
		<?php endif; ?>
  	</tbody>
</table>

<?php endif; ?>
<?php endforeach; ?>
</section>
{{ /noparse }}