<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Edit Transaction
            <!--<small>Subheading</small>-->
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  
                <?php echo $this->Html->link(__("Home", true), "/") ?>                
            </li>
            <li>
                <i class="fa fa-dashboard"></i>  <a href="<?php echo $this->webroot ?>transactions">Transactions</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Add Transaction
            </li>
        </ol>

        <div class="col-lg-6">
            <?php echo $this->Form->create('Transaction', array("role" => "form")); ?>
            <?php echo $this->Form->input('id'); ?>
            <div class="form-group">
                <label>Select party name</label>                
                <?php echo $this->Form->input('user_id', array("label" => false, "class" => "form-control")); ?>
                <p class="help-block">Choose party name for which you are making transaction.</p>
            </div>
            <div class="form-group">
                <label>Enter amount</label>
                <?php echo $this->Form->input('amount', array("label" => false, "class" => "form-control")); ?>
                <p class="help-block">Enter amount. E.g. 10000</p>
            </div>

            <div class="form-group">
                <label>Select transaction type</label>         
                <?php echo $this->Form->input('transaction_type', array("label" => false, "class" => "form-control", "options" => array("Receipt" => "Receipt", "Payment" => "Payment"))); ?>
                <p class="help-block">Choose transaction type. it can be <strong>Payment</strong> or <strong>Receipt</strong>.</p>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <?php echo $this->Form->input('is_interest', array("label" => false)); ?>
                        Is this transaction of interest ?
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>Remarks</label>
                <?php echo $this->Form->input('remarks', array("label" => false, "class" => "form-control")); ?>
                <p class="help-block">Type remarks for this transaction here.</p>
            </div>
            <div class="form-group">
                <label>Transaction date</label>
                <div class="input-group date transaction_datetime col-md-5" data-date-format="yyyy-mm-dd HH:ii" data-link-field="dtp_input1">
                    <?php
                    if ($this->request->data["Transaction"]["transaction_date"] == "0000-00-00 00:00:00")
                        $this->request->data["Transaction"]["transaction_date"] = "";

                    echo $this->Form->input('transaction_date', array("type" => "text", "class" => "form-control",
                        "label" => false, "div" => false,"readonly"));
                    ?>
                    <?php echo $this->Form->hidden("dtp_input1", array("id" => "dtp_input1", "name" => "transaction_date")); ?><br/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
            </div>            
            <?php
            $options = array(
                'label' => __('Submit'),
                'class' => "btn btn-default"
            );
            echo $this->Form->end($options);
            ?>

        </div>
    </div>
</div>
<!--Bootstrap datetime picker js - ref : http://www.malot.fr/bootstrap-datetimepicker/demo.php -->
<?php echo $this->Html->script('jquery-1.8.3.min.js'); ?>
<?php echo $this->Html->script('bootstrap-datetimepicker.min.js'); ?>
<script type="text/javascript">
    $('.transaction_datetime').datetimepicker({
        //language:  'fr',        
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
</script>
