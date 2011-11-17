<div id="forum-search">
    <?php echo form_open('forums/search'); ?>
        <?php echo validation_errors(); ?>
        <?php echo form_input('terms'); ?>
        <?php echo form_submit('search', lang('forums.search_label')); ?>
        <?php echo anchor('forums/search/advanced', lang('forums.advanced_search_label')); ?>
    <?php echo form_close(); ?>
</div>
