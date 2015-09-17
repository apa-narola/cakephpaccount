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
            <span class="umstyle1"><?php echo __('Sign Up or'); ?></span>
            <span  class="umstyle2"><?php echo $this->Html->link(__("Sign In", true), "/login") ?></span>
        </h3>
    </div>
    <div class="panel-body">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Form->create('User', array('action' => 'register', "role" => "form")); ?>
        <?php if (count($userGroups) > 2) { ?>
            <div class="form-group">
                <?php echo $this->Form->input("user_group_id", array('type' => 'select', 'label' => false, 'div' => false, 'class' => "form-control")) ?>
            </div>
        <?php } ?>
        <div class="form-group">
            <?php echo $this->Form->input("username", array('label' => false, 'div' => false, 'class' => "form-control", "placeholder" => __('Username'))) ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input("first_name", array('label' => false, 'div' => false, 'class' => "form-control", "placeholder" => __('First Name'))) ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input("last_name", array('label' => false, 'div' => false, 'class' => "form-control", "placeholder" => __('Last Name'))) ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input("email", array('label' => false, 'div' => false, 'class' => "form-control", "placeholder" => __('Email'))) ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input("password", array('type' => 'password', 'label' => false, 'div' => false, 'class' => "form-control", "placeholder" => __('Password'))) ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input("cpassword", array('type' => 'password', 'label' => false, 'div' => false, 'class' => "form-control", "placeholder" => __('Confirm Password'))) ?>
        </div>
        <?php if (USE_RECAPTCHA && PRIVATE_KEY_FROM_RECAPTCHA != "" && PUBLIC_KEY_FROM_RECAPTCHA != "") { ?>
            <div class="form-group">
                <div class="umstyle4" style="margin-left:45px">
                    <?php echo $this->UserAuth->showCaptcha(isset($this->validationErrors['User']['captcha'][0]) ? $this->validationErrors['User']['captcha'][0] : ""); ?></div>
                <div style="clear:both"></div>
            </div>
        <?php } ?>
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
        <?php echo $this->Form->Submit(__('Sign Up'), array("class" => "btn btn-lg btn-success btn-block")); ?>
        <?php echo $this->Form->end(); ?>       
    </div>
</div>
<script>
    document.getElementById("UserUsername").focus();
</script>