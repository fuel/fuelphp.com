<h3><?php echo lang('forums_forum_label') . ' ' . lang('forums_list_categories_title');?></h3>
<?php echo form_open('admin/forums');?>

	<?php if (!empty($categories)): ?>

	<table border="0" class="table-list forum_categories" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th><?php echo form_checkbox('action_to_all');?></th>
				<th><?php echo lang('forums_category_label');?></th>
				<th><span><?php echo lang('forums_actions_label');?></span></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="6">
					<div class="inner"><?php //$this->load->view('admin/partials/pagination'); ?></div>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php foreach ($categories as $cat): ?>
				<tr>
					<td><?php echo form_checkbox('action_to[]', $cat->id);?></td>
					<td><?php echo $cat->title;?></td>
					<td class="buttons buttons-small">
						<?php echo anchor("admin/forums/list_forums/{$cat->id}", lang('forums_list_forum_title'), array('class' => 'button')); ?>
						<?php echo anchor('admin/forums/edit_category/' . $cat->id, lang('forums_edit_label'), array('class'=>'button'));?> 
						<?php echo anchor('admin/forums/delete/category/' . $cat->id, lang('forums_delete_label'), array('class'=>'button confirm')); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<div class="buttons align-right padding-top">
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete') )); ?>
	</div>
	<?php else: ?>
		<div class="blank-state">
			<h2><?php echo lang('forums_no_categories');?></h2>
		</div>
	<?php endif; ?>

<?php echo form_close();?>
