<section class="title">
<h4><?php echo $category_title; ?> <?php echo lang('forums_category_title'); ?></h4>
</section>
<section class="item">
<?php echo form_open('admin/forums');?>	
	<?php if (!empty($forums)): ?>
		
		<table border="0" class="table-list forums">
			<thead>
				<tr>
					<th><?php echo form_checkbox('action_to_all');?></th>
					<th><?php echo lang('forums_forum_label');?></th>
					<th><?php echo lang('forums_description_label');?></th>
					<th><?php echo lang('forums_closed_label'); ?></th>
					<th class="width-10"><span><?php echo lang('forums_actions_label');?></span></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="5">
						<div class="inner"><?php //$this->load->view('admin/partials/pagination'); ?></div>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach ($forums as $forum): ?>
					<tr>
						<td><?php echo form_checkbox('action_to[]', $forum->id);?></td>
						<td><?php echo $forum->title;?></td>
						<td><?php echo $forum->description;?></td>
						<td>
							<?php echo $forum->is_closed ? lang('buttons.yes') : lang('buttons.no') ; ?>
						</td>
						<td class="buttons buttons-small">
							<?php echo anchor('admin/forums/edit_forum/' . $forum->id, lang('forums_edit_label'), array('class'=>'btn green'));?>
							<?php echo anchor('admin/forums/delete/forum/' . $forum->id, lang('forums_delete_label'), array('class'=>'btn red confirm')); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<div class="buttons align-right padding-top">	
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete') )); ?>
	</div>
	<?php else: ?>
		<div class="no_data">
			<?php echo lang('forums_no_forums');?>
		</div>
	<?php endif; ?>

<?php echo form_close();?>
</section>