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
            <?php echo __('Change Password for '); echo h($name); ?>
            <!--<small>Subheading</small>-->
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  
                <?php echo $this->Html->link(__("Home", true), "/") ?>                
            </li>
            <li>
                <i class="fa fa-users fa-fw"></i>  <a href="<?php echo $this->webroot ?>allUsers">Users</a>
            </li>
            <li class="active">
                <i class="fa fa-unlock"></i> <?php echo __('Change Password for '); echo h($name); ?>
            </li>
        </ol>
        <?php echo $this->Session->flash(); ?>
        <div class="col-lg-6">
            <?php echo $this->Form->create('User', array('role'=>'form')); ?>              
            <div class="form-group">
                <label><?php echo __('New Password'); ?></label>
                <?php echo $this->Form->input("password", array('type'=>'password','label' => false, 'div' => false, 'class' => "form-control")) ?>
            </div>
            <div class="form-group">
                <label><?php echo __('Confirm Password'); ?></label>
                <?php echo $this->Form->input("cpassword", array('type'=>'password','label' => false, 'div' => false, 'class' => "form-control")) ?>
            </div>           
            <?php
            $options = array(
                'label' => __('Change'),
                'class' => "btn btn-default"
            );
            echo $this->Form->end($options);
            ?>
        </div>
    </div>
</div>
<script>
    document.getElementById("UserPassword").focus();
</script>