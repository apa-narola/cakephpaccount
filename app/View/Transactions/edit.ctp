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
                <i class="fa fa-dashboard"></i> <a href="<?php echo $this->webroot ?>transactions">Transactions</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Add Transaction
            </li>
            <li class="pull-right">
                <?php
                $urlArr = array('action' => 'delete', $this->request->data["Transaction"]["id"],"type"=>$this->request->params["named"]["type"]);
                if(!empty($user_id))
                    $urlArr["user_id"] = $user_id;

                echo $this->Form->postLink(
                    $this->Html->tag('i', '', array('class' => 'fa fa-trash')) . " Delete",
                    $urlArr,
                    array('escape' => false),
                    __('Are you sure you want to delete # %s?', $this->request->data["Transaction"]["id"]),
                    array('class' => 'btn btn-mini')
                );
                ?>
            </li>
        </ol>

        <div class="row">
            <?php echo $this->Form->create('Transaction', array("role" => "form")); ?>
            <?php echo $this->Form->input('id'); ?>
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="radio control-label">Transaction type</label>
                    <!--<div class="col-sm-8">-->

                    <?php
                    //                echo $cookieTransactionType;
                    $options = array("Receipt" => "Receipt", "Payment" => "Payment");
                    $attributes = array('legend' => false, "style" => "margin:0px;width:20px;");
                    echo $this->Form->radio('transaction_type', $options, $attributes);
                    ?>
                    <!--</div>-->
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Select party name</label>
                    <?php //echo $this->Form->input('user_id', array("label" => false, "class" => "form-control")); ?>
                    <input id="" type="text" class="typeahead tt-query form-control" autocomplete="off"
                           spellcheck="false" placeholder="Type user name" required
                           value="<?php echo $users[$this->request->data["Transaction"]["user_id"]]; ?>">
                    <?php //echo $this->Form->input('user_id', array("label" => false, "class" => "form-control")); ?>
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
                    <?php echo $this->Form->input('is_interest',
                        array("label" => false,
                            "options" => array("0" => "No","1" => "Yes",),
//                            "selected"=>  $this->request->data["Transaction"]["is_interest"],
                            "class" => "form-control")); ?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Remarks</label>
                    <?php echo $this->Form->input('remarks', array("label" => false, "class" => "form-control", "rows" => 3)); ?>
                    <p class="help-block">Type remarks for this transaction here.</p>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Short Notes </label>
                    <?php echo $this->Form->input('short_notes', array("label" => false, "class" => "form-control", "rows" => 3)); ?>
                    <p class="help-block">Type short notes for this transaction here.</p>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Transaction date</label>

                    <div class="input-group date">
                        <?php
                        echo $this->Form->input('transaction_date', array("id" => "transaction-date", "type" => "text", "class" => "form-control",
                            "label" => false, "div" => false));
                        ?>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                    </div>
                    <p class="help-block">Select transaction date.</p>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group" style="margin-top:25px;">
                    <?php
                    $options = array(
                        'label' => __('Submit'),
                        'class' => "btn btn-default",
						'div'=>false
                    );
                    echo $this->Form->end($options);
                    ?>
					&nbsp;
					<?php echo $this->Form->button('Cancel',array(
					"onclick"=>"history.go(-1);",
					'class' => "btn btn-default"
					));?>
					
                </div>
            </div>


        </div>
    </div>
</div>
<!--Bootstrap datetime picker js - ref : http://eternicode.github.io/bootstrap-datepicker/?markup=component&format=&weekStart=&startDate=&endDate=&startView=0&minViewMode=0&todayBtn=false&clearBtn=false&language=en&orientation=auto&multidate=&multidateSeparator=&keyboardNavigation=on&forceParse=on#sandbox -->
<?php /*echo $this->Html->script('bootstrap-datepicker.min.js'); */ ?><!--
<script type="text/javascript">
    $('.input-group.date').datepicker({
        format: DATE_FORMAT_JS
    });
</script>-->

<?php echo $this->Html->script('bootstrap-typeahead.js'); ?>
<?php echo $this->Html->script('typeahead_helper.js'); ?>
<script type="text/javascript">
    sarvasvaInitTypeAhead("TransactionUserId");
</script>
<?php echo $this->Html->script('jquery.mask'); ?>
<?php echo $this->Html->script('Easy-Numbers-Currency-Formatting-Plugin-autoNumeric/autoNumeric'); ?>
<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<?php echo $this->Html->script('add_transaction.js'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#transaction-date').mask(DATE_FORMAT_MASK);
    });
</script>