<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<?php echo __('Edit Group'); ?>
			<!--<small>Subheading</small>-->
		</h1>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<?php echo $this->Html->link(__("Home", true), "/") ?>
			</li>
			<li>
				<i class="fa fa-edit fa-fw"></i>  <a href="<?php echo $this->webroot ?>allGroups">Groups</a>
			</li>
			<li class="active">
				<i class="fa fa-user"></i> <?php echo __('Edit Group'); ?>
			</li>
		</ol>
		<?php echo $this->Session->flash(); ?>
		<div class="col-lg-3">
			<?php echo $this->Form->create('UserGroup', array('role' => 'form')); ?>
			<?php echo $this->Form->hidden('id')?>
			<div class="form-group">
				<label>
					<?php echo __('Group Name');?><font color='red'>*</font>
				</label>
				<?php echo $this->Form->input("name", array('label' => false, 'div' => false, 'class' => "form-control")) ?>
				<div>for ex. Business User</div>
			</div>
			<?php if ($this->UserAuth->isAdmin()) { ?>
				<div class="form-group">
					<label>
						<?php echo __('Alias Group Name');?><font color='red'>*</font>
					</label>
					<?php echo $this->Form->input("alias_name", array('label' => false, 'div' => false, 'class' => "form-control")) ?>
					<div>for ex. Business_User (Must not contain space) (Recomond: do not edit)</div>
				</div>
				<div class="checkbox">
					<?php   if (!isset($this->request->data['UserGroup']['allowRegistration'])) {
						$this->request->data['UserGroup']['allowRegistration']=true;
					}   ?>
					<label>
						<?php echo $this->Form->input("allowRegistration" ,array("type"=>"checkbox",'label' => false))?>
						<?php echo __('Allow Registration');?>
					</label>
				</div>
			<?php } ?>
			<?php

			$options = array(
				'label' => __('Update Group'),
				'class' => "btn btn-default"
			);
			echo $this->Form->end($options);
			?>
			<?php if ($this->UserAuth->isAdmin()) { ?>
				<div>Note: If you add a new group then you should give permissions to this newly created Group.</div>
			<?php } ?>

		</div>
	</div>
</div>
<script>
	document.getElementById("UserUserGroupId").focus();
</script>