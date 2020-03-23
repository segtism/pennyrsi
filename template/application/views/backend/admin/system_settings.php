<div class="row">
	<div class="col-sm-7">
		<div class="panel panel-info">
			<div class="panel-heading"><i class="fa fa-gear"></i>  <?php echo get_phrase('System Settings'); ?></div>
			<div class="panel-body table-responsive">
				<?php echo form_open(base_url() . 'systemsetting/system_settings/do_update', array('class' => 'form-horizontal form-groups-bordered validate', 'target')); ?>

				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('System Name'); ?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="system_name" value="<?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('System Title'); ?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="system_title" value="<?php echo $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('System Address'); ?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="address" value="<?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('System Phone'); ?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="phone" value="<?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Currency'); ?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="currency" value="<?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('System Email'); ?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="system_email" value="<?php echo $this->db->get_where('settings', array('type' => 'system_email'))->row()->description;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Text Alignment'); ?></label>
					<div class="col-sm-12">
						<select name="text_align" class="form-control">
							<?php $align = $this->db->get_where('settings', array('type' => 'text_align'))->row()->description;?>
							<option value="left-to-right"<?php if ($align =='left-to-right') echo "selected"; ?>>Left to Right</option>
							<option value="right-to-left"<?php if ($align =='right-to-left') echo "selected"; ?>>Right to Left</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Language'); ?></label>
					<div class="col-sm-12">
						<select name="language" class="form-control">
						<?php
						$getLanguage = $this->db->list_fields('language');
						foreach ($getLanguage as $key => $field){
							if ($field == 'phrase_id' || $field == 'phrase')
								continue;
							$default_language = $this->db->get_where('settings', array('type' => 'language'))->row()->description;	
						?>
						<option value="<?php echo $field;?>"<?php if ($default_language == $field) echo 'selected'?>><?php echo $field;?></option>
						<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Skin Color'); ?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="skin_colour" value="<?php echo $this->db->get_where('settings', array('type' => 'skin_colour'))->row()->description;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Session'); ?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="session" value="<?php echo $this->db->get_where('settings', array('type' => 'session'))->row()->description;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Footer'); ?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="footer" value="<?php echo $this->db->get_where('settings', array('type' => 'footer'))->row()->description;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Paypal Email'); ?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="paypal_email" value="<?php echo $this->db->get_where('settings', array('type' => 'paypal_email'))->row()->description;?>">
					</div>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-success btn-rounded btn-block btn-sm"><i class="fa fa-save"></i> <?php echo get_phrase('Save'); ?></button>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>


<div class="col-sm-5">
<div class="panel panel-info">
<div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('System Logo');?></div>
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body table-responsive">

<?php echo form_open(base_url() . 'systemsetting/system_settings/upload_logo', array('class' => 'form-horizontal form-groups-bordered validate', 'target')); ?>

	<div class="form-group">
		<label class="col-sm-12"><?php echo get_phrase('browse_image'); ?>*</label>
		<div class="col-sm-12">
			<input type='file' class="form-control" name="userfile" onChange="readURL(this);" /required>
			<img id="blah" src="<?php echo base_url(); ?>uploads/logo.png" alt="" height="200" width="200" />
		</div>
	</div>
	<div class="form-group">
		<button class="btn btn-block btn-info btn-rounded btn-sm"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('Update Logo');?></button>
	</div>
<?php echo form_close(); ?>


</div>
</div>
</div>
</div>
</div>
