<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Manage Transactions
            <!--<small>Subheading</small>-->
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>            
            <li class="active">
                <i class="fa fa-file"></i> Transactions
            </li>
            <li class="pull-right">
                <i class="fa fa-plus-circle"></i>  <a href="<?php echo $this->webroot?>transactions/add">Add Transaction</a>
            </li>
        </ol>
        <div class="row">
            <div class="col-lg-6">
                <h2>Payment</h2>
                <table class="table-responsive table-hover table-striped" width="100%">
                    <?php
                    foreach ($transactions as $transaction):
                        if ($transaction['Transaction']['transaction_type'] != "Payment")
                            continue;
                        ?>
                        <tr>
                            <td class="col-lg-10">            
                                <h4> Party Name : <?php echo h($transaction['User']['firstname'] . " " . $transaction['User']['lastname']); ?></h4>
                                <p>Transaction type : <?php echo h($transaction['Transaction']['transaction_type']); ?></p>
                                <p>Is Interest entry : <?php echo h($transaction['Transaction']['is_interest']) == 1 ? "Yes" : "No"; ?></p>
                                <p>Remarks : <?php echo h($transaction['Transaction']['remarks']); ?></p>
                                <p>Transaction date : <?php echo h($transaction['Transaction']['transaction_date']); ?></p>                       
                            </td>
                            <td class="col-lg-2">
                                <div class="text-right"><i class="fa fa-rupee"></i> <?php echo h($transaction['Transaction']['amount']); ?></div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>

            <div class="col-lg-6">
                <h2>Receipt</h2>
                <table class="table-responsive table-hover table-striped" width="100%">
                    <?php
                    foreach ($transactions as $transaction):
                        if ($transaction['Transaction']['transaction_type'] != "Receipt")
                            continue;
                        ?>
                        <tr>
                            <td class="col-lg-10">            
                                <h4> Party Name : <?php echo h($transaction['User']['firstname'] . " " . $transaction['User']['lastname']); ?></h4>
                                <p>Transaction type : <?php echo h($transaction['Transaction']['transaction_type']); ?></p>
                                <p>Is Interest entry : <?php echo h($transaction['Transaction']['is_interest']) == 1 ? "Yes" : "No"; ?></p>
                                <p>Remarks : <?php echo h($transaction['Transaction']['remarks']); ?></p>
                                <p>Transaction date : <?php echo h($transaction['Transaction']['transaction_date']); ?></p>                       
                            </td>
                            <td class="col-lg-2">
                                <div class="text-right"><i class="fa fa-rupee"></i> <?php echo h($transaction['Transaction']['amount']); ?></div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <p>
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
            ));
            ?>	</p>
        <div class="paging">
            <?php
            echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
            echo $this->Paginator->numbers(array('separator' => ''));
            echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
            ?>
        </div>
    </div></div>