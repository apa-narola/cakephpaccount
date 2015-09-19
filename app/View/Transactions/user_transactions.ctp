<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php
            echo __('Transactions for ');
            echo h($fullname);
            ?>
            <!--<small>Subheading</small>-->
        </h1>        
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  
                <?php echo $this->Html->link(__("Home", true), "/") ?>                
            </li>                       
            <li>
                <i class="fa fa-users"></i> <a href="<?php echo $this->webroot ?>allUsers">Users</a>
            </li>
            <li class="active">
                <i class="fa fa-money"></i> <?php
                echo __('Transactions for ');
                echo h($fullname);
                ?></li>
        </ol>
        <div class="row">
            <h3 style="padding-left: 15px;">Search Transaction</h3>
            <?php
            // The base url is the url where we'll pass the filter parameters
            $url = array(
    'controller' => 'transactions',
    'action' => 'userTransactions'
);

$my_params = array(
    'user_id' => $user_id,    
);

            $base_url = $this->Html->url(array_merge($url, $my_params),true);
            //$base_url = array('controller' => 'transactions', 'action' => 'userTransactions',$user_id);
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
<?php echo $this->Session->flash(); ?>
        <div class="col-lg-12">
            <div class="table-responsive">                
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('amount'); ?></th>
                            <th><?php echo $this->Paginator->sort('transaction_type'); ?></th>
                            <th><?php echo $this->Paginator->sort('is_interest'); ?></th>
                            <th><?php echo $this->Paginator->sort('remarks'); ?></th>
                            <th><?php echo $this->Paginator->sort('transaction_date'); ?></th>
                            <th><?php echo $this->Paginator->sort('created'); ?></th>
                            <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($transactions)) {
                            $sl = 0;
                            foreach ($transactions as $transaction):
                                ?>
                                <tr>
                                    <td><?php echo h($transaction['Transaction']['id']); ?>&nbsp;</td>
                                    <td>
        <?php echo $this->Html->link($transaction['User']['username'], "/viewUser/" . $transaction['User']['id']); ?>
                                    </td>
                                    <td><?php echo h($transaction['Transaction']['amount']); ?>&nbsp;</td>
                                    <td><?php echo h($transaction['Transaction']['transaction_type']); ?>&nbsp;</td>
                                    <td><?php echo h($transaction['Transaction']['is_interest']) == 1 ? "Yes" : "No" ; ?>&nbsp;</td>
                                    <td><?php echo h($transaction['Transaction']['remarks']); ?>&nbsp;</td>
                                    <td><?php echo h($transaction['Transaction']['transaction_date']); ?>&nbsp;</td>
                                    <td><?php echo h($transaction['Transaction']['created']); ?>&nbsp;</td>
                                    <td><?php echo h($transaction['Transaction']['modified']); ?>&nbsp;</td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $transaction['Transaction']['id'])); ?>
                                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transaction['Transaction']['id'])); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transaction['Transaction']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transaction['Transaction']['id']))); ?>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                        } else {
                            echo "<tr><td colspan=10>No records found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <div class="pull-right">
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
                </div>
            </div>
        </div>
    </div>
</div>