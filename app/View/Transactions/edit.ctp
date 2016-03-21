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
        </ol>

        <div class="col-lg-6">
            <?php echo $this->Form->create('Transaction', array("role" => "form")); ?>
            <?php echo $this->Form->input('id'); ?>
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
            <div class="form-group">
                <label>Select party name</label>
                <?php //echo $this->Form->input('user_id', array("label" => false, "class" => "form-control")); ?>
                <input id="" type="text" class="typeahead tt-query form-control" autocomplete="off"
                       spellcheck="false" placeholder="Type user name" required value="<?php echo $users[$this->request->data["Transaction"]["user_id"]]; ?>">
                <?php //echo $this->Form->input('user_id', array("label" => false, "class" => "form-control")); ?>
                <?php echo $this->Form->input('user_id', array("type" => "hidden", "label" => false)); ?>
                <p class="help-block">Choose party name for which you are making transaction.</p>
            </div>
            <div class="form-group">
                <label>Enter amount</label>
                <?php echo $this->Form->input('amount', array("label" => false, "class" => "form-control")); ?>
                <p class="help-block">Enter amount. E.g. 10000</p>
            </div>

<!--            <div class="form-group">
                <label>Select transaction type</label>
                <?php echo $this->Form->input('transaction_type', array("label" => false, "class" => "form-control", "options" => array("Receipt" => "Receipt", "Payment" => "Payment"))); ?>
                <p class="help-block">Choose transaction type. it can be <strong>Payment</strong> or
                    <strong>Receipt</strong>.</p>
            </div>-->
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

                <div class="input-group date">
                    <?php
                    echo $this->Form->input('transaction_date', array("id"=>"transaction-date","type" => "text", "class" => "form-control",
                        "label" => false, "div" => false));
                    ?>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                </div>
                <p class="help-block">Select transaction date.</p>
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
<!--Bootstrap datetime picker js - ref : http://eternicode.github.io/bootstrap-datepicker/?markup=component&format=&weekStart=&startDate=&endDate=&startView=0&minViewMode=0&todayBtn=false&clearBtn=false&language=en&orientation=auto&multidate=&multidateSeparator=&keyboardNavigation=on&forceParse=on#sandbox -->
<?php /*echo $this->Html->script('bootstrap-datepicker.min.js'); */?><!--
<script type="text/javascript">
    $('.input-group.date').datepicker({
        format: DATE_FORMAT_JS
    });
</script>-->

<?php echo $this->Html->script('bootstrap-typeahead.js'); ?>
<script type="text/javascript">
    $("input.typeahead").typeahead({
        onSelect: function (item) {
            var user_id = item.value;
            if (!user_id) {
                alert("Could not find userID.");
                return false;
            }
            $("#TransactionUserId").val(user_id);
            //console.log(item.text);
            //window.location = site_url + "/transactions/userTransactions/" + user_id;
        },
        ajax: {
            url: site_url + "/typeaheadSearch",
            timeout: 500,
            displayField: "username",
            triggerLength: 1,
            method: "get",
            loadingClass: "loading-circle",
            preDispatch: function (query) {
                //showLoadingMask(true);
                return {
                    search: query
                }
            },
            preProcess: function (data) {
                //console.log(data);
                //showLoadingMask(false);
                if (data.success === false) {
                    // Hide the list, there was some error
                    return false;
                }
                // We good!
                return data;
            }
        }
    });
</script>
<?php echo $this->Html->script('jquery.mask'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#transaction-date').mask(DATE_FORMAT_MASK);
    });
</script>