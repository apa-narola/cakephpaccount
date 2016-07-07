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
            Add Party
            <!--<small>Subheading</small>-->
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <?php echo $this->Html->link(__("Home", true), "/") ?>
            </li>
            <li>
                <i class="fa fa-edit fa-fw"></i> <a href="<?php echo $this->webroot ?>allUsers">Parties</a>
            </li>
            <li class="active">
                <i class="fa fa-user"></i> Add Party
            </li>
        </ol>
        <?php echo $this->Session->flash(); ?>
        <div class="col-lg-12">
            <?php echo $this->Form->create('User', array('action' => 'addUser', 'role' => 'form')); ?>


            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label><?php echo __('First Name'); ?>
                            <font color='red'>*</font>
                        </label>
                <?php echo $this->Form->input("first_name", array('label' => false, 'div' => false, 'class' => "form-control")) ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label><?php echo __('Middle Name'); ?>
                            <!--<font color='red'>*</font>-->
                        </label>
                <?php echo $this->Form->input("middle_name", array('label' => false, 'div' => false, 'class' => "form-control")) ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label><?php echo __('Last Name'); ?>
                            <!--<font color='red'>*</font>-->
                        </label>
                <?php echo $this->Form->input("last_name", array('label' => false, 'div' => false, 'class' => "form-control")) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label><?php echo __('Group'); ?><font color='red'>*</font></label>
                <?php echo $this->Form->input("user_group_id", array('type' => 'select', 'label' => false, 'div' => false, 'class' => "form-control")) ?>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Reference</label>
                        <!-- Button trigger modal -->
                       <!-- &nbsp;<a style="text-decoration: none" href="#"> <i class="fa fa-plus-circle fa-2x"
                                                                            data-toggle="modal"
                                                                            data-target="#addNewPartyModal"></i></a>-->
                        <input id="referenceName" type="text" class="typeahead tt-query form-control" autocomplete="off"
                               spellcheck="false" placeholder="Type reference party name">
                <?php //echo $this->Form->input('user_id', array("label" => false, "class" => "form-control"));  ?>
                <?php echo $this->Form->input('reference_id', array("type" => "hidden", "label" => false)); ?>               
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label><?php echo __('Sub Group'); ?></label>
                <?php echo $this->Form->input("user_sub_group_id", array('type' => 'select', 'label' => false, 'div' => false, 'class' => "form-control")) ?>
                    </div>
                </div>
            </div>

            <?php
            $options = array(
                'label' => __('Add Party'),
                'class' => "btn btn-default"
            );
            echo $this->Form->end($options);
            ?>
        </div>
    </div>
</div>
<?php echo $this->Html->script('bootstrap-typeahead.js'); ?>
<?php echo $this->Html->script('typeahead_helper.js'); ?>

<script>
    document.getElementById("UserUserGroupId").focus();
    sarvasvaReferenceInitTypeAhead("UserReferenceId");

</script>