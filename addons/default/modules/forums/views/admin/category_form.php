<section class="title">
<?php if($this->method == 'create_category'): ?>
	<h4><?php echo lang('forums_create_category_title');?></h4>
<?php else: ?>
	<h4><?php echo sprintf(lang('forums_edit_category_title'), $category->title);?></h4>
<?php endif; ?>
</section>
<section class="item">
<?php echo form_open($this->uri->uri_string(), 'class="crud"', array('id' => $category->id)); ?>
<div class="form_inputs">
	<fieldset>
	<ul>

		<li class="even">
			<label for="title"><?php echo lang('forums_title_label');?><span>*</span></label>
			<div class="input"><?php echo form_input('title', $category->title, 'maxlength="100" class="text"'); ?></div>
		</li>

	</ul>
	</fieldset>
</div>
	<div class="buttons align-right padding-top">
	<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )); ?>
	</div>
<?php echo form_close(); ?>
</section>