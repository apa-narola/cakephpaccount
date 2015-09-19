<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            View Transaction
            <!--<small>Subheading</small>-->
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  
                <?php echo $this->Html->link(__("Home", true), "/") ?>                
            </li>
            <li>
                <i class="fa fa-users fa-fw"></i>  <a href="<?php echo $this->webroot ?>allUsers">Users</a>
            </li>
            <li class="active">
                <i class="fa fa-user"></i> View Transaction
            </li>
        </ol>

        <table class="table table-hover table-striped" width="100%" cellpadding="5">
            <tbody>
                <?php if (!empty($transaction)) { ?>
                    <tr>
                        <td class="col-lg-2"><strong><?php echo __('Transaction ID'); ?></strong></td>
                        <td class="col-lg-10"><?php echo h($transaction['Transaction']['id']); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('User'); ?></strong></td>
                        <td><?php echo $this->Html->link($transaction['User']['username'], array('controller' => 'users', 'action' => 'view', $transaction['User']['id'])); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Amount'); ?></strong></td>
                        <td><?php echo h($transaction['Transaction']['amount']); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Transaction Type'); ?></strong></td>
                        <td><?php echo h($transaction['Transaction']['transaction_type']); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Is Interest'); ?></strong></td>
                        <td><?php echo h($transaction['Transaction']['is_interest']); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Remarks'); ?></strong></td>
                        <td><?php echo h($transaction['Transaction']['remarks']); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Transaction Date'); ?></strong></td>
                        <td><?php echo h($transaction['Transaction']['transaction_date']); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Transaction Created Date'); ?></strong></td>
                        <td><?php echo h($transaction['Transaction']['created']); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Transaction Modified Date'); ?></strong></td>
                        <td><?php echo h($transaction['Transaction']['modified']); ?>
                        </td>
                    </tr>
                    
                    <?php
                } else {
                    echo "<tr><td colspan=2><br/><br/>No Data</td></tr>";
                }
                ?>
            </tbody>
        </table>        
    </div>
</div>