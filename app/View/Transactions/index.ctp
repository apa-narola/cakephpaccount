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
            echo $this->Form->create("Transaction", array('url' => $base_url, 'class' => 'filter', 'novalidate'));
            // add a select input for each filter. It's a good idea to add a empty value and set
            // the default option to that.
            ?>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Transaction Type</label>
                    <?php echo $this->Form->input("transaction_type", array('label' => false, "class" => "form-control", 'options' => array("Receipt" => "Receipt", "Payment" => "Payment"), 'empty' => '-- All --', 'default' => '')); ?>                    
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Display interest entries ?</label>
                    <?php echo $this->Form->input("is_interest", array('label' => false, "class" => "form-control", 'options' => array("1" => "Yes", "2" => "No"), 'empty' => '-- All --', 'default' => '')); ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Search </label>
                    <?php
                    // Add a basic search 
                    echo $this->Form->input("search", array('label' => false, "class" => "form-control", 'placeholder' => "Type Party name or remarks..."));
                    ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>From</label>
                    <div class="input-group date from_datetime" data-date-format="yyyy-mm-dd">
                        <?php
                        echo $this->Form->input('transaction_from', array("type" => "text", "class" => "form-control",
                            "value" => "", "label" => false, "div" => false, "readonly"));
                        ?>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>To</label>
                    <div class="input-group date to_datetime" data-date-format="yyyy-mm-dd">
                        <?php
                        echo $this->Form->input('transaction_to', array("type" => "text", "class" => "form-control",
                            "value" => "", "label" => false, "div" => false, "readonly"));
                        ?>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
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
                echo $this->Form->end();
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="col-lg-10"> <h2>Payment</h2></div>
                <div class="col-lg-2"><h2 class="pull-right">Amount</h2></div>

                <table class="table-responsive table-hover table-striped" width="100%">
                    <?php
                    foreach ($transactions as $transaction):
                        if ($transaction['Transaction']['transaction_type'] != "Payment")
                            continue;
                        ?>
                        <tr>
                            <td class="col-lg-10 bdr-left">            
                                <h4> Party Name : <?php echo h($transaction['User']['first_name'] . " " . $transaction['User']['last_name']); ?></h4>
                                <p>Transaction ID : <?php echo h($transaction['Transaction']['id']); ?></p>
                                <p>Transaction type : <?php echo h($transaction['Transaction']['transaction_type']); ?></p>
                                <p>Is Interest entry : <?php echo h($transaction['Transaction']['is_interest']) == 1 ? "Yes" : "No"; ?></p>
                                <p>Remarks : <?php echo h($transaction['Transaction']['remarks']); ?></p>
                                <p>Transaction date : <?php echo $transaction['Transaction']['transaction_date'] ? date(Configure::read('App.DATE_FORMAT'), strtotime($transaction['Transaction']['transaction_date'])) : "NA"; ?></p>
                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transaction['Transaction']['id'])); ?>
                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transaction['Transaction']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transaction['Transaction']['id']))); ?>
                            </td>
                            <td class="col-lg-2 bdr-left">
                                <div class="text-right"><i class="fa fa-rupee"></i> <?php echo h($transaction['Transaction']['amount']); ?></div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>

            <div class="col-lg-6">
                <div class="col-lg-10"> <h2>Receipt</h2></div>
                <div class="col-lg-2"><h2 class="pull-right">Amount</h2></div>
                <table class="table-responsive table-hover table-striped" width="100%">
                    <?php
                    foreach ($transactions as $transaction):
                        if ($transaction['Transaction']['transaction_type'] != "Receipt")
                            continue;
                        ?>
                        <tr>
                            <td class="col-lg-10 bdr-left">            
                                <h4> Party Name : <?php echo h($transaction['User']['first_name'] . " " . $transaction['User']['last_name']); ?></h4>
                                <p>Transaction ID : <?php echo h($transaction['Transaction']['id']); ?></p>
                                <p>Is Interest entry : <?php echo h($transaction['Transaction']['is_interest']) == 1 ? "Yes" : "No"; ?></p>
                                <p>Remarks : <?php echo h($transaction['Transaction']['remarks']); ?></p>
                                <p>Transaction date : <?php echo $transaction['Transaction']['transaction_date'] ? date(Configure::read('App.DATE_FORMAT'), strtotime($transaction['Transaction']['transaction_date'])) : "NA"; ?></p>
                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transaction['Transaction']['id'])); ?>
                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transaction['Transaction']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transaction['Transaction']['id']))); ?>
                            </td>
                            <td class="col-lg-2 bdr-left">
                                <div class="text-right"><i class="fa fa-rupee"></i> <?php echo h($transaction['Transaction']['amount']); ?></div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <div class="row pull-right">
<!--            <p>
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
            ));
            ?>
            </p>-->
            <ul class="pagination">
                <?php
                echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
                echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                ?>
            </ul>
        </div></div>
    <!--Bootstrap datetime picker js - ref : http://www.malot.fr/bootstrap-datetimepicker/demo.php -->
    <?php echo $this->Html->script('jquery-1.8.3.min.js'); ?>
    <?php echo $this->Html->script('bootstrap-datetimepicker.min.js'); ?>
    <script type="text/javascript">
        $('.from_datetime,.to_datetime').datetimepicker({
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });
    </script>