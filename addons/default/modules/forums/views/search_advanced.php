<h3><?php echo lang('forums.advanced_search_label'); ?></h3>
<?php if(empty($results)): ?>
<div id="advanced-search">
    <?php echo form_open('forums/search/advanced'); ?>
    
        <?php echo form_fieldset(lang('forums.keywords_header'), 'id="keywords"'); ?>
            <?php echo form_input('keywords', set_value('keywords')); ?>
            <?php echo form_dropdown('search_in', $search_in, set_value('search_in')); ?>
            <?php echo form_dropdown('search_criteria', $search_criteria, set_value('search_criteria')); ?>
        <?php echo form_fieldset_close(); ?>
        
        <?php echo form_fieldset(lang('forums.forums_header'), 'id="forum-list"'); ?>
            <?php echo form_multiselect('search_forums[]', $forum_list, set_value('search_forums')); ?>
        <?php echo form_fieldset_close(); ?>
        
        <?php echo form_fieldset(lang('forums.orderby_header'), 'id="sort-options"'); ?>
            <?php echo form_dropdown('order_by', $order_by, set_value('order_by')); ?>
            <?php echo form_radio('sort', 'ASC', $this->input->post('sort') == 'ASC' ? 1 : 0); ?>
            <span><?php echo lang('forums.asc_label'); ?></span>
            <?php echo form_radio('sort', 'DESC', $this->input->post('sort') != 'ASC' ? 1 : 0); ?>
            <span><?php echo lang('forums.desc_label'); ?></span>
        <?php echo form_fieldset_close(); ?>
        
        <p class="submit"><?php echo form_submit('search_advanced', lang('forums.search_label')); ?></p>
        
    <?php echo form_close(); ?>
</div>
<?php else: ?>
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
                    <?php echo image('folder-read.png', 'forums'); ?>
            </td>
            <td class="forum-name">
                <span class="title"><?php echo anchor('forums/topics/view/'.$topic->id, $topic->title);?></span>
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
                        <?php echo lang('forums.author_label') . user_displayname($topic->author_id); ?>
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
<?php endif; ?>
