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
<div class="login-panel panel panel-default">    
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="umstyle1"><?php echo __('Email Verification or '); ?></span>
            <span  class="umstyle2"><?php echo $this->Html->link(__("Sign In", true), "/login") ?></span>
        </h3>
    </div>
    <div class="panel-body">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Form->create('User', array('action' => 'emailVerification', "role" => "form")); ?>
        <div class="form-group">
            <?php echo $this->Form->input("email", array('label' => false, 'div' => false, 'class' => "form-control", "placeholder" => __('Enter Email / Username'), "autofocus")) ?>
        </div>
        <?php echo $this->Form->Submit(__('Send Email'), array("class" => "btn btn-lg btn-success btn-block")); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<script>
    document.getElementById("UserEmail").focus();
</script>