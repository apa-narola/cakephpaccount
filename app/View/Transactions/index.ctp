<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Transactions
            <!--<small>Subheading</small>-->
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  
                <?php echo $this->Html->link(__("Home", true), "/") ?>                
            </li>            
            <li class="active">
                <i class="fa fa-file"></i> Transactions
            </li>
            <li class="pull-right">
                <i class="fa fa-plus-circle"></i>  <a href="<?php echo $this->webroot ?>transactions/add">Add Transaction</a>
            </li>
        </ol>
        <div class="row">
            <h3 style="padding-left: 15px;">Search Transaction</h3>
            <?php
            // The base url is the url where we'll pass the filter parameters
            $base_url = array('controller' => 'transactions', 'action' => 'index');
            echo $this->Form->create("Transaction", array('class' => 'filter', 'novalidate'));
            // add a select input for each filter. It's a good idea to add a add_new_party.ctp value and set
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
                    <?php /*echo $this->Form->input("is_interest", array('label' => false, "class" => "form-control", 'options' => array("1" => "Display only interest entries", "2" => "Don't display interest entries"), 'empty' => '-- All --')); */?>
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

                        echo $this->Form->input('transaction_from', array("id"=>"transaction_from","type" => "text", "class" => "form-control",
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

                        echo $this->Form->input('transaction_to', array("id"=>"transaction_to","type" => "text", "class" => "form-control",
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
        <div class="row">            
            <div class="col-lg-6">
                <div class="col-lg-10"> <h2>Receipt</h2></div>
                <div class="col-lg-2">
                    <!--<h2 class="pull-right">Amount</h2>-->
                </div>
                <table class="table-responsive table-hover table-striped" width="100%">
                    <?php if (!empty($transactions)) { ?>                        
                        <tr>
                            <th class="col-lg-3 bdr-left" valign="top"> <?php echo $this->Number->currency($receipt_total[0]["total"], ""); ?></th>
                            <th class="col-lg-3 bdr-left" valign="top"> Total Receipt</th>    
                        </tr>
                        <tr><td class="col-lg-3 bdr-left" colspan="2">&nbsp;</td></tr>
                    <?php } ?>
                    <?php
                    foreach ($transactions as $transaction):
                        if ($transaction['Transaction']['transaction_type'] != "Receipt")
                            continue;
                        ?>
                        <tr>
                            <td class="col-lg-3 bdr-left" valign="top">
                                <div class="text-left"> <?php echo h($transaction['Transaction']['amount']); ?></div>
                            </td>
                            <td class="col-lg-9 bdr-left">            
                                <table width="100%"><tr>
                                        <td width="25%" valign="top" align="left"><strong><?php echo h($transaction['User']['first_name'] . " " . $transaction['User']['last_name']); ?></strong>,</td>
                                        <td width="55%" valign="top" align="left">&nbsp; <?php if (!empty($transaction['Transaction']['remarks'])) echo h(($transaction['Transaction']['remarks'])); ?>, &nbsp;</td>
                                        <td valign="top" align="left"><?php echo $transaction['Transaction']['transaction_date'] ? date(Configure::read('App.DATE_FORMAT'), strtotime($transaction['Transaction']['transaction_date'])) : "NA"; ?></td>
                                </table>
                                <?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $transaction['Transaction']['id'])); ?>
                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transaction['Transaction']['id'],"type"=> $this->params["named"]["type"])); ?>
                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transaction['Transaction']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transaction['Transaction']['id']))); ?>
                            </td>                            
                        </tr>
                    <?php endforeach; ?>
                    <?php if (!empty($transactions)) { ?>
                        <tr><td class="col-lg-3 bdr-left" colspan="2">&nbsp;</td></tr>
                        <tr style="border-top:5px double #333;">
                            <th class="col-lg-3 bdr-left" valign="top"> <?php echo $this->Number->currency($receipt_total[0]["total"], ""); ?></th>
                            <th class="col-lg-3 bdr-left" valign="top"> Total Receipt</th>    
                        </tr>
                        <?php if ($receipt_total[0]["total"] > $payment_total[0]["total"]) { ?>
                            <tr><td class="col-lg-3 bdr-left" colspan="2">&nbsp;</td></tr>
                            <tr><td class="col-lg-3 bdr-left" colspan="2">&nbsp;</td></tr>
                            <tr style="border-top:5px double #333;border-bottom:5px double #333;">
                                <th class="col-lg-3 bdr-left" valign="top"> <?php echo $this->Number->currency($receipt_total[0]["total"] - $payment_total[0]["total"], ""); ?></th>
                                <th class="col-lg-3 bdr-left" valign="top"> Total Remaining Receipt</th>    
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </table>
            </div>
            <div class="col-lg-6">
                <div class="col-lg-10"> <h2>Payment</h2></div>
                <div class="col-lg-2">
                    <!--<h2 class="pull-right">Amount</h2>-->
                </div>

                <table class="table-responsive table-hover table-striped" width="100%">
                    <?php if (!empty($transactions)) { ?>
                        
                        <tr>
                            <th class="col-lg-3 bdr-left" valign="top"> <?php echo $this->Number->currency($payment_total[0]["total"], ""); ?></th>
                            <th class="col-lg-3 bdr-left" valign="top"> Total Payment</th>    
                        </tr>
                        <tr><td class="col-lg-3 bdr-left" colspan="2">&nbsp;</td></tr>
                    <?php } ?>
                    <?php
                    foreach ($transactions as $transaction):
                        if ($transaction['Transaction']['transaction_type'] != "Payment")
                            continue;
                        ?>
                        <tr>
                            <td class="col-lg-3 bdr-left" valign="top">
                                <div class="text-left"> <?php echo h($transaction['Transaction']['amount']); ?></div>
                            </td>
                            <td class="col-lg-9 bdr-left">
                                <table width="100%"><tr>
                                        <td width="25%" valign="top" align="left"><strong><?php echo h($transaction['User']['first_name'] . " " . $transaction['User']['last_name']); ?></strong>,</td>
                                        <td width="55%" valign="top" align="left">&nbsp; <?php if (!empty($transaction['Transaction']['remarks'])) echo h(($transaction['Transaction']['remarks'])); ?>, &nbsp;</td>
                                        <td valign="top" align="left"><?php echo $transaction['Transaction']['transaction_date'] ? date(Configure::read('App.DATE_FORMAT'), strtotime($transaction['Transaction']['transaction_date'])) : "NA"; ?></td>
                                </table>
                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transaction['Transaction']['id'],"type"=> $this->params["named"]["type"])); ?>
                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transaction['Transaction']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transaction['Transaction']['id']))); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (!empty($transactions)) { ?>
                        <tr><td class="col-lg-3 bdr-left" colspan="2">&nbsp;</td></tr>
                        <tr style="border-top:5px double #333;">
                            <th class="col-lg-3 bdr-left" valign="top"> <?php echo $this->Number->currency($payment_total[0]["total"], ""); ?></th>
                            <th class="col-lg-3 bdr-left" valign="top"> Total Payment</th>    
                        </tr>
                        <?php if ($payment_total[0]["total"] > $receipt_total[0]["total"]) { ?>
                            <tr><td class="col-lg-3 bdr-left" colspan="2">&nbsp;</td></tr>
                            <tr><td class="col-lg-3 bdr-left" colspan="2">&nbsp;</td></tr>
                            <tr style="border-top:5px double #333;border-bottom:5px double #333;">
                                <th class="col-lg-3 bdr-left" valign="top"> <?php echo $this->Number->currency($payment_total[0]["total"] - $receipt_total[0]["total"], ""); ?></th>
                                <th class="col-lg-3 bdr-left" valign="top"> Total Remaining Payment</th>    
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </table>
            </div>
            <div class="clearfix"></div>            
        </div>
    </div>
<?php echo $this->Html->script('jquery.mask'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#transaction_from').mask(DATE_FORMAT_MASK);
            $('#transaction_to').mask(DATE_FORMAT_MASK);
        });
    </script>
