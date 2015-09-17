<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Change Password
            <!--<small>Subheading</small>-->
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  
                <?php echo $this->Html->link(__("Home", true), "/") ?>                
            </li>            
            <li class="active">
                <i class="fa fa-unlock"></i> Change Password
            </li>
        </ol>
        <?php echo $this->Session->flash(); ?>
        <div class="col-lg-6">
            <?php echo $this->Form->create('User', array('action' => 'changePassword','role'=>'form')); ?>              
            <div class="form-group">
                <label><?php echo __('Old Password'); ?></label>
                <?php echo $this->Form->input("oldpassword", array('type'=>'password','label' => false, 'div' => false, 'class' => "form-control")) ?>
            </div>
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