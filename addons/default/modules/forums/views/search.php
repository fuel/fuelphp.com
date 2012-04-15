{{ noparse }}
<?php if(!empty($results)): ?>
<?php echo $pagination['links']; ?>
<table class="forum-table" border="0" cellspacing="0">
	<thead>
		<tr>
			<th colspan="5" class="header"><?php echo lang('forums.search_header'); ?></th>
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
		  <?php foreach($results as $topic): ?>
		  <tr>
			<td class="forum-icon">
				<?php echo Asset::img('module::folder-read.png', 'read'); ?>
			</td>
			<td class="forum-name">
				<span class="title">
                                    <?php echo anchor('forums/topics/view/'.$topic->id, $topic->title);?>
                                </span>
                                <div class="search-results">
                                    <p class="keyword-text"><?php echo lang('forums.keywords_msg'); ?></p>
                                    <ul>
                                        <li>
                                            <?php echo anchor('forums/posts/view_reply/'.$topic->id, $topic->content); ?>
                                        </li>
                                        <?php if(!empty($topic->replies)): ?>
                                            <?php foreach($topic->replies as $reply): ?>
                                                <li>
                                                    <?php echo anchor('forums/posts/view_reply/'.$reply->id, $reply->content); ?>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
				<p class="description">
                                    <span>
                                        <?php echo lang('forums.author_label'); ?>
                                        <?php echo user_displayname($topic->author_id); ?>
                                    </span>
                                </p>
			</td>
			<td class="forum-topic"><?php echo $topic->post_count;?></td>
			<td class="forum-replies"><?php echo $topic->view_count?></td>
			<td class="forum-info">
			<?php if(!empty($topic->last_post)):?>
			<p class="last-date">
				<span><?php echo lang('forums.posted_label'); ?></span><?php echo anchor('forums/posts/view_reply/'.$topic->last_post->id, forum_date($topic->last_post->created_on)); ?>
			</p>
			<p class="last-author">
				<span><?php echo lang('forums.author_label'); ?></span>
				<?php echo user_displayname($topic->last_post->author_id); ?>
			</p>
                        <p class="forum-name">
                            <span><?php echo lang('forums_forum_label'); ?>: </span>
                            <?php echo $topic->forum_name; ?>
                        </p>
			<?php endif;?>
                        &nbsp;
			</td>
		  </tr>
		  <?php endforeach; ?>
  	</tbody>
  	
</table>
<?php echo $pagination['links']; ?>
<?php else: ?>
    <p><?php echo lang('forums.search_empty_msg'); ?></p>
    <?php echo $template['partials']['search_form']; ?>
    
<?php endif; ?>
{{ /noparse }}