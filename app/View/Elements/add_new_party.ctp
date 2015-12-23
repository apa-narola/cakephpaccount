
<!-- Add New Party Modal -->
<div class="modal fade" id="addNewPartyModal" tabindex="-1" role="dialog" aria-labelledby="addNewPartyModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo $this->Form->create('User', array('id'=>'frmAddNewPary', 'role' => 'form')); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addNewPartyModalLabel">Add New Party</h4>
            </div>
            <div class="modal-body">
                <ul id="addPartyMessages" style="display: none;"></ul>
                <div class="form-group">
                    <label><?php echo __('Username'); ?><font color='red'>*</font></label>
                    <?php echo $this->Form->input("username", array('label' => false, 'div' => false, 'class' => "form-control")); ?>
                </div>
                <div class="form-group">
                    <label><?php echo __('First Name'); ?><font color='red'>*</font></label>
                    <?php echo $this->Form->input("first_name", array('label' => false, 'div' => false, 'class' => "form-control")); ?>
                </div>
                <div class="form-group">
                    <label><?php echo __('Last Name'); ?></label>
                    <?php echo $this->Form->input("last_name", array('label' => false, 'div' => false, 'class' => "form-control")); ?>
                </div>
            </div>
            <div class="modal-footer">
                <?php echo $this->Form->button('Close',array("class"=>"btn btn-default","data-dismiss"=>"modal"));?>
                <?php echo $this->Form->button('Save', array('type' => 'submit',"class"=>"btn btn-primary"));?>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>