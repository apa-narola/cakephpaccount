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
            <span class="umstyle1"><?php echo __('Sign In or'); ?></span>
            <span  class="umstyle2"><?php echo $this->Html->link(__("Sign Up", true), "/register") ?></span>
        </h3>
    </div>
    <div class="panel-body">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Form->create('User', array('action' => 'login', "role" => "form","novalidate")); ?>
        <div class="form-group">
            <?php echo $this->Form->input("email", array('label' => false, 'div' => false, 'class' => "form-control", "placeholder" => __('Email / Username'), "autofocus")) ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input("password", array('type' => 'password', 'label' => false, 'div' => false, 'class' => "form-control", "placeholder" => __('Password'))) ?>
        </div>
        <div class="checkbox">
            <label>
                <?php
                if (!isset($this->request->data['User']['remember']))
                    $this->request->data['User']['remember'] = true;
                ?>
                <?php echo $this->Form->input("remember", array("type" => "checkbox", 'label' => false)) ?>
                Remember Me
            </label>
        </div>
        <?php
        if (!isset($this->request->data['User']['remember']))
            $this->request->data['User']['remember'] = true;
        ?>         
        <?php echo $this->Form->Submit(__('Login'), array("class" => "btn btn-lg btn-success btn-block")); ?>
        <?php echo $this->Form->end(); ?>
        <br/>
        <div  align="left"><?php echo $this->Html->link(__("Forgot Password?", true), "/forgotPassword", array("class" => "style30")) ?></div>
        <div  align="left"><?php echo $this->Html->link(__("Email Verification", true), "/emailVerification", array("class" => "style30")) ?></div>
    </div>
</div>
<script>
    document.getElementById("UserEmail").focus();
</script>