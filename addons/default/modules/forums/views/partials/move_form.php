<?php echo form_open('forums/topics/move', 'class="move-form"'); ?>
    <?php echo form_hidden('topic_id', $topic_id); ?>
    <?php echo lang('forums_move_label', 'forum_id'); ?>
    <?php echo form_dropdown('forum_id', $forum_options, $current_forum); ?>
    
    <?php echo form_submit('move_forum', lang('forums_move_button')); ?>

<?php echo form_close(); ?>