<h2 class="page-title"><?php echo lang('user_reset_password_title');?></h2>

<?php if ( ! empty($error_string)):?>
	<p>
		<strong>Error:</strong> <?php echo $error_string;?>
	<p>
<?php endif;?>

<?php if ( ! empty($success_string)): ?>
	<p>
		<?php echo $success_string; ?>
	</p>
<?php else: ?>

	<?php echo form_open('users/reset_pass', array('id'=>'reset-pass')); ?>

	<p class="reset-instructions"><?php echo lang('user_reset_instructions'); ?></p>

	<ul>
		<li>
			<label for="email"><?php echo lang('user_email') ?></label>
			<input type="text" name="email" maxlength="100" value="<?php echo set_value('email'); ?>" />
		</li>
		<li>
			OR
		</li>
		<li>
			<label for="user_name"><?php echo lang('user_username') ?></label>
			<input type="text" name="user_name" maxlength="40" value="<?php echo set_value('user_name'); ?>" />
		</li>
		<li class="form_buttons">
			<?php echo form_submit('btnSubmit', lang('user_reset_pass_btn')) ?>
		</li>
	</ul>
	<?php echo form_close(); ?>

<?php endif; ?>
