<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Data Entry
            <!--<small>Subheading</small>-->
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <?php echo $this->Html->link(__("Home", true), "/") ?>
            </li>
            <li>
                <i class="fa fa-dashboard"></i> <a href="<?php echo $this->webroot ?>transactions">Transactions</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Data Entry
            </li>
        </ol>
<div class="row">
        
            <?php // echo $this->Cookie->read('transactionType');?>
            <?php echo $this->Form->create('Transaction', array("role" => "form")); ?>
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="radio control-label">Transaction type</label>
                    <!--<div class="col-sm-8">-->

                    <?php
                    //                echo $cookieTransactionType;
                    $options = array("Receipt" => "Receipt", "Payment" => "Payment");
                    $attributes = array('legend' => false, "value" => $cookieTransactionType, "style" => "margin:0px;width:20px;");
                    echo $this->Form->radio('transaction_type', $options, $attributes);
                    ?>
                    <!--</div>-->
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group" style="margin-top:-9px;">
                    <label>Select party name</label>
                    <!-- Button trigger modal -->
                    &nbsp;<a style="text-decoration: none" href="#"> <i class="fa fa-plus-circle fa-2x"
                                                                        data-toggle="modal"
                                                                        data-target="#addNewPartyModal"></i></a>
                    <input id="partyName" type="text" class="typeahead tt-query form-control" autocomplete="off"
                           spellcheck="false" placeholder="Type user name" required>
                    <?php //echo $this->Form->input('user_id', array("label" => false, "class" => "form-control"));  ?>
                    <?php echo $this->Form->input('user_id', array("type" => "hidden", "label" => false)); ?>
                    <p class="help-block">Choose party name for which you are making transaction.</p>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <label>Enter amount</label>
                    <?php echo $this->Form->input('amount', array("label" => false, "class" => "form-control", "maxlength" => 15,"data-d-group"=>2)); ?>
                    <p class="help-block">Enter amount. E.g. 10000</p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Is interest ?</label>
                    <?php echo $this->Form->input('is_interest', array("label" => false, 'default' =>0, "options"=>array("0"=>"No","1"=>"Yes"), "class" => "form-control", "maxlength" => 15)); ?>
                </div>
            </div>
			
			</div>
			<div class="row">           
            
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Remarks</label>
                    <?php echo $this->Form->input('remarks', array("label" => false, "class" => "form-control","rows"=>3)); ?>
                    <p class="help-block">Type remarks for this transaction here.</p>
                </div>
            </div>
			   <div class="col-sm-3">
                <div class="form-group">
                    <label>Short Notes </label>
                    <?php echo $this->Form->input('short_notes', array("label" => false, "class" => "form-control","rows"=>3)); ?>
                    <p class="help-block">Type short note for this transaction here.</p>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Transaction date</label>

                    <div class="input-group date">
                        <?php
                        echo $this->Form->input('transaction_date', array("id" => "transaction-date", "type" => "text", "class" => "form-control",
                            "value" => date(Configure::read('App.DATE_FORMAT')), "label" => false, "div" => false));
                        ?>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                    </div>
                    <p class="help-block">Select transaction date.</p>
                </div>
            </div>
            
         
            <div class="col-sm-1">
                <div class="form-group" style="margin-top:25px;">
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
    </div>
</div>
<!--add new party popup-->
<?php echo $this->element("add_new_party"); ?>
<!--Bootstrap datetime picker js - ref : http://eternicode.github.io/bootstrap-datepicker/?markup=component&format=&weekStart=&startDate=&endDate=&startView=0&minViewMode=0&todayBtn=false&clearBtn=false&language=en&orientation=auto&multidate=&multidateSeparator=&keyboardNavigation=on&forceParse=on#sandbox -->
<?php echo $this->Html->script('jquery.mask'); ?>
<?php echo $this->Html->script('Easy-Numbers-Currency-Formatting-Plugin-autoNumeric/autoNumeric'); ?>
<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<?php //echo $this->Html->script('bootstrap-datepicker.min.js'); ?>
<?php echo $this->Html->script('add_transaction.js'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#transaction-date').mask(DATE_FORMAT_MASK);
    });
</script>

<?php echo $this->Html->script('bootstrap-typeahead.js'); ?>
<?php echo $this->Html->script('typeahead_helper.js'); ?>
<script type="text/javascript">
    sarvasvaInitTypeAhead("TransactionUserId");
	document.getElementById("partyName").focus();
</script>