<div id="post-actions">
	<?php echo anchor('forums/markall', lang('forums.markall_label'), 'class="button markall"'); ?>
	<?php echo anchor('forums/newtopics', lang('forums.view_new_label'), 'class="button markall"'); ?>
</div>

<?php echo $template['partials']['search_form']; ?>

<?php foreach($forum_categories as $category): ?>
<?php if($category->forums): ?>

<br style="clear:both;" />
	
<table class="forum-table" border="0" cellspacing="0">
	<thead>
	  <tr>
	    <th colspan="5" class="header"><?php echo $category->title;?></th>
	  </tr>
	  <tr>
	    <th class="forum-icon">&nbsp;</th>
	    <th class="forum-name"><?php echo lang('forums.forum_name_header'); ?></th>
	    <th class="forum-topic"><?php echo lang('forums.topics_header'); ?></th>
	    <th class="forum-replies"><?php echo lang('forums.replies_header'); ?></th>
	    <th class="forum-info"><?php echo lang('forums.last_post_header'); ?></th>
	  </tr>
	</thead>
	
	<tbody>
<?php if(!empty($category->forums)): ?>
  <?php foreach($category->forums as $forum): ?>
<tr>
	<td class="forum-icon">
		<?php echo image($forum->image, 'forums'); ?>
	</td>
	<td class="forum-name">
		<div class="title">
			<?php echo anchor('forums/view/'.$forum->id, $forum->title);?>
		</div>
		<div class="description">
			<?php echo $forum->description;?>
		</div>
	</td>
	<td class="forum-topic">
		<?php echo $forum->topic_count; ?>
	</td>
	<td class="forum-replies">
		<?php echo $forum->reply_count; ?>
	</td>
	<td class="forum-info">
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
