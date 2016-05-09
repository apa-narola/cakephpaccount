<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php
            //echo __('Transactions for ');
            echo h($fullname." - ".$typeStr);
            ?>
            <!--<small>Subheading</small>-->
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <?php echo $this->Html->link(__("Home", true), "/") ?>
            </li>
            <li>
                <i class="fa fa-users"></i>
                <a href="<?php echo $this->webroot ?>allUsers">Users</a>
            </li>
            <li class="active">
                <i class="fa fa-money"></i> <?php
                echo __('Transactions for ');
                echo h($fullname);
                ?>
            </li>
            <li class="pull-right">
                <?php
                $linkStr = $type == "T" ? "View Interests" : "View Transactions";
                $invertType = $type == "T" ? "I" : "T";
                echo $this->Html->link(__($linkStr), array('action' => 'userTransactions', $user_id, $invertType)); ?>
            </li>
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading">Search</div>
            <div class="panel-body">
                <div class="row">
                    <!--            <h3 style="padding-left: 15px;">Search Transaction</h3>-->
                    <?php
                    // The base url is the url where we'll pass the filter parameters
                    $url = array(
                        'controller' => 'transactions',
                        'action' => 'userTransactions'
                    );

                    $my_params = array(
                        'user_id' => $user_id,
                    );

                    $base_url = $this->Html->url(array_merge($url, $my_params), true);
                    //$base_url = array('controller' => 'transactions', 'action' => 'userTransactions',$user_id);
                    echo $this->Form->create("Transaction", array('url' => $base_url, 'class' => 'filter', 'novalidate'));
                    // add a select input for each filter. It's a good idea to add a empty value and set
                    // the default option to that.
                    ?>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Transaction Type</label>
                            <?php echo $this->Form->input("transaction_type", array('label' => false, "class" => "form-control", 'options' => array("Receipt" => "Receipt", "Payment" => "Payment"), 'empty' => '-- All --', 'default' => '')); ?>
                        </div>
                    </div>
                    <!--            <div class="col-lg-4"><div class="form-group">&nbsp;</div></div>-->
                    <!-- <div class="col-lg-4">
                <div class="form-group">
                    <label>Entries view option</label>
                    <?php /*echo $this->Form->input("is_interest", array('label' => false, "class" => "form-control", 'options' => array("1" => "Display only interest entries", "2" => "Don't display interest entries"), 'empty' => '-- All --')); */ ?>
                </div>
            </div>-->
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Search </label>
                            <?php
                            // Add a basic search
                            echo $this->Form->input("search", array('label' => false, "class" => "form-control", 'placeholder' => "Type Party name or remarks..."));
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>From</label>

                            <div class="input-group date">
                                <?php
                                $selected_transaction_from = null;
                                if (isset($this->params['named']["transaction_from"]))
                                    $selected_transaction_from = $this->params['named']["transaction_from"];

                                echo $this->Form->input('transaction_from', array("id" => "transaction_from", "type" => "text", "class" => "form-control",
                                    "value" => $selected_transaction_from, "label" => false, "div" => false));
                                ?>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>To</label>

                            <div class="input-group date">
                                <?php
                                $selected_transaction_to = null;
                                if (isset($this->params['named']["transaction_to"]))
                                    $selected_transaction_to = $this->params['named']["transaction_to"];

                                echo $this->Form->input('transaction_to', array("id" => "transaction_to", "type" => "text", "class" => "form-control",
                                    "value" => $selected_transaction_to, "label" => false, "div" => false));
                                ?>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" style="margin-top: 20px;">
                        <?php
                        echo $this->Form->button("Search", array("type" => "submit", "class" => "btn btn-primary"));
                        ?>
                        &nbsp;&nbsp;
                        <?php
                        //                    echo $this->Form->button("Reset", array("type" => "reset", "class" => "btn btn-default"));
                        echo $this->Html->link("Reset", $base_url, array("class" => "btn btn-primary"));
                        ?>
                        <?php
                        // echo $this->Html->link("PDF", array('controller' => 'transactions', 'action' => 'transactionsPdf'), array("class" => "btn btn-primary"));
                        ?>
                        <?php
                        echo $this->Form->button("Export to Excel", array("type" => "submit", "class" => "btn btn-primary", "name" => "exportToexcel", "value" => 1));
                        ?>
                        <?php
                        echo $this->Form->end();
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $this->Session->flash(); ?>
        <div class="panel panel-default">
            <div class="panel-heading">Transactions</div>
            <div class="panel-body">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6" style="min-height: 600px;">
                            <div class="col-lg-10"><h2>Receipt</h2></div>
                            <div class="col-lg-2">
                                <!--<h2 class="pull-right">Amount</h2>-->
                            </div>
                            <table class="table-responsive table-hover table-striped" width="100%">
                                <?php
                                foreach ($transactions as $transaction):
                                    if ($transaction['Transaction']['transaction_type'] != "Receipt")
                                        continue;
                                    $hidden_style = "";
                                    $hidden_text = "Hide";
                                    if ($transaction['Transaction']['is_hidden'] == 1) {
                                        $hidden_text = "Show";
                                        $hidden_style = "style='opacity:0.2'";
                                    }

                                    ?>
                                    <tr <?php echo $hidden_style; ?> >
                                        <td width="10%" class="bdr-left" valign="top">
                                            <div class="text-right">
                                                <?php echo $this->requestAction('App/moneyFormatIndia/' . h($transaction['Transaction']['amount'])); ?>
                                            </div>
                                        </td>
                                        <td width="5%" class="bdr-left" valign="top">
                                            <div
                                                class="text-right short_note"> <?php echo h($transaction['Transaction']['short_notes']); ?></div>
                                        </td>
                                        <td class="bdr-left trans_action" valign="top">
                                            <table width="100%">
                                                <tr>
                                                    <td valign="top" align="left" class="remark">
                                                        &nbsp; <?php if (!empty($transaction['Transaction']['remarks'])) echo h(($transaction['Transaction']['remarks'])); ?>
                                                        , &nbsp;</td>
                                            </table>
                                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transaction['Transaction']['id'], "type" => $this->request->params["pass"][1], "user_id" => $user_id)); ?>
                                            <?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transaction['Transaction']['id'],"type"=> $this->request->params["pass"][1]), array('confirm' => __('Are you sure you want to delete # %s?', $transaction['Transaction']['id'])));
                                            ?>
                                            <?php echo $this->Form->postLink(__($hidden_text), array('action' => 'hide', $transaction['Transaction']['id'], "is_hidden" => $transaction['Transaction']['is_hidden'], "type" => $type, "user_id" => $user_id), array('confirm' => __('Are you sure you want to hide # %s?', $transaction['Transaction']['id']))); ?>

                                        </td>
                                        <td width="12%" class="bdr-left" valign="top">
                                            <div class="text-left">
                                                <?php echo $transaction['Transaction']['transaction_date'] ? date(Configure::read('App.DATE_FORMAT'), strtotime($transaction['Transaction']['transaction_date'])) : "NA"; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <div class="col-lg-6" style="min-height: 600px;">
                            <div class="col-lg-10"><h2>Payment</h2></div>
                            <div class="col-lg-2">
                                <!--<h2 class="pull-right">Amount</h2>-->
                            </div>

                            <table class="table-responsive table-hover table-striped" width="100%">
                                <?php
                                foreach ($transactions as $transaction):
                                    if ($transaction['Transaction']['transaction_type'] != "Payment")
                                        continue;
                                    $hidden_style = "";
                                    $hidden_text = "Hide";
                                    if ($transaction['Transaction']['is_hidden'] == 1) {
                                        $hidden_text = "Show";
                                        $hidden_style = "style='opacity:0.2'";
                                    }
                                    ?>
                                    <tr <?php echo $hidden_style; ?> >
                                        <td width="10%" class="bdr-left" valign="top">
                                            <div class="text-right">
                                                <?php echo $this->requestAction('App/moneyFormatIndia/' . h($transaction['Transaction']['amount'])); ?>
                                            </div>
                                        </td>
                                        <td width="5%" class="bdr-left" valign="top">
                                            <div
                                                class="text-right short_note"> <?php echo h($transaction['Transaction']['short_notes']); ?></div>
                                        </td>
                                        <td class="bdr-left trans_action">
                                            <table width="100%">
                                                <tr>
                                                    <td valign="top" align="left" class="remark">
                                                        &nbsp; <?php if (!empty($transaction['Transaction']['remarks'])) echo h(($transaction['Transaction']['remarks'])); ?>
                                                        , &nbsp;</td>
                                            </table>
                                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transaction['Transaction']['id'], "type" => $this->request->params["pass"][1], "user_id" => $user_id)); ?>
                                            <?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transaction['Transaction']['id'],$this->request->param["pass"][1]), array('confirm' => __('Are you sure you want to delete # %s?', $transaction['Transaction']['id'])));
                                            ?>
                                            <?php echo $this->Form->postLink(__($hidden_text), array('action' => 'hide', $transaction['Transaction']['id'], "is_hidden" => $transaction['Transaction']['is_hidden'], "type" => $type, "user_id" => $user_id), array('confirm' => __('Are you sure you want to hide # %s?', $transaction['Transaction']['id']))); ?>
                                        </td>
                                        <td width="12%" class="bdr-left" valign="top">
                                            <div class="text-left">
                                                <?php echo $transaction['Transaction']['transaction_date'] ? date(Configure::read('App.DATE_FORMAT'), strtotime($transaction['Transaction']['transaction_date'])) : "NA"; ?>
                                            </div>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>

                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table-responsive table-hover table-striped" width="100%">

                                <?php if (!empty($transactions)) { ?>
                                    <tr style="border-top:2px solid #333;">
                                        <th width="10%" class=" bdr-left text-right" valign="top">
                                            <?php echo $this->requestAction('App/moneyFormatIndia/' . $receipt_total[0]["total"]); ?>
                                        </th>
                                        <th class="bdr-left cr-dr" valign="top"> Cr. Total Receipt</th>
                                    </tr>
                                    <?php if ($receipt_total[0]["total"] > $payment_total[0]["total"]) { ?>
                                        <tr>
                                            <td class="bdr-left" colspan="2">&nbsp;</td>
                                        </tr>
                                        <tr class="amount-green"
                                            style="border-top:5px double #333;border-bottom:5px double #333;">
                                            <th width="10%" class="bdr-left text-right" valign="top">
                                                <?php $rt = $receipt_total[0]["total"] - $payment_total[0]["total"];
                                                if (empty($rt))
                                                    echo $this->requestAction('App/moneyFormatIndia/' . $rt);
                                                ?></th>
                                            <th class="bdr-left cr-dr" valign="top">Cr. Net Receipt</th>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table class="table-responsive table-hover table-striped" width="100%">
                                <?php if (!empty($transactions)) { ?>

                                    <tr style="border-top:2px solid #333;">
                                        <th width="10%" class="bdr-left text-right" valign="top">
                                            <?php
                                            if (!empty($payment_total[0]["total"]))
                                                echo $this->requestAction('App/moneyFormatIndia/' . $payment_total[0]["total"]);
                                            ?>
                                        </th>
                                        <th class="bdr-left cr-dr" valign="top"> Dr. Total Payment</th>
                                    </tr>
                                    <?php if ($payment_total[0]["total"] > $receipt_total[0]["total"]) { ?>

                                        <tr class="amount-red"
                                            style="border-top:5px double #333;border-bottom:5px double #333;">
                                            <th width="10%" class="bdr-left text-right" valign="top">
                                                <?php
                                                $t = $payment_total[0]["total"] - $receipt_total[0]["total"];

                                                if (!empty($t)) {
                                                    echo "- " . $this->requestAction('App/moneyFormatIndia/' . $t);
                                                    //echo $t;
                                                }
                                                ?>
                                            </th>
                                            <th class="bdr-left cr-dr" valign="top"> Dr. Net Payment</th>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php echo $this->Html->script('jquery.mask'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#transaction_from').mask(DATE_FORMAT_MASK);
        $('#transaction_to').mask(DATE_FORMAT_MASK);
    });
</script>