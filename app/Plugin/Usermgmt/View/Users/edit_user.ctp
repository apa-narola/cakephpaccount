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
            Edit User
            <!--<small>Subheading</small>-->
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  
                <?php echo $this->Html->link(__("Home", true), "/") ?>                
            </li>
            <li>
                <i class="fa fa-edit fa-fw"></i>  <a href="<?php echo $this->webroot ?>allUsers">Users</a>
            </li>
            <li class="active">
                <i class="fa fa-user"></i> Edit User
            </li>
        </ol>
        <?php echo $this->Session->flash(); ?>
        <div class="col-lg-6">
            <?php echo $this->Form->create('User', array('role' => 'form')); ?>
            <?php echo $this->Form->input("id", array('type' => 'hidden', 'label' => false, 'div' => false)) ?>
            <?php if ($this->UserAuth->isAdmin()) { ?>
                <?php if (count($userGroups) > 2) { ?>
                    <div class="form-group">
                        <label><?php echo __('Group'); ?><font color='red'>*</font></label>                
                        <?php echo $this->Form->input("user_group_id", array('type' => 'select', 'label' => false, 'div' => false, 'class' => "form-control")) ?>
                    </div>
                <?php } ?>   
            <?php } else { ?>
                <?php echo $this->Form->input("user_group_id", array('type' => 'hidden', 'label' => false, 'div' => false, 'value' => 2)) ?>
            <?php } ?>
            <div class="form-group">
                <label><?php echo __('Username'); ?><font color='red'>*</font></label>
                <?php echo $this->Form->input("username", array('label' => false, 'div' => false, 'class' => "form-control")) ?>
            </div>
            <div class="form-group">
                <label><?php echo __('First Name'); ?><font color='red'>*</font></label>
                <?php echo $this->Form->input("first_name", array('label' => false, 'div' => false, 'class' => "form-control")) ?>
            </div>
            <div class="form-group">
                <label><?php echo __('Last Name'); ?><font color='red'>*</font></label>
                <?php echo $this->Form->input("last_name", array('label' => false, 'div' => false, 'class' => "form-control")) ?>
            </div>
            <div class="form-group">
                <label><?php echo __('Email'); ?><font color='red'>*</font></label>
                <?php echo $this->Form->input("email", array('label' => false, 'div' => false, 'class' => "form-control")) ?>
            </div>           
            <?php
            $options = array(
                'label' => __('Update User'),
                'class' => "btn btn-default"
            );
            echo $this->Form->end($options);
            ?>
        </div>
    </div>
</div>
<script>
    document.getElementById("UserUserGroupId").focus();
</script>