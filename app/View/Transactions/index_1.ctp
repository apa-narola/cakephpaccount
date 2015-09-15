<div class="transactions index">
    <h2><?php echo __('Transactions'); ?></h2>
    <table cellpadding="0" cellspacing="0">
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
            <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?php echo h($transaction['Transaction']['id']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($transaction['User']['id'], array('controller' => 'users', 'action' => 'view', $transaction['User']['id'])); ?>
                    </td>
                    <td><?php echo h($transaction['Transaction']['amount']); ?>&nbsp;</td>
                    <td><?php echo h($transaction['Transaction']['transaction_type']); ?>&nbsp;</td>
                    <td><?php echo h($transaction['Transaction']['is_interest']); ?>&nbsp;</td>
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
            <?php endforeach; ?>
        </tbody>
    </table>
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
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Transaction'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>

<div class="row marketing">
    <div class="col-lg-6">
        <h2>Payment</h2>
        <div class="col-lg-10">
            <h4>Subheading</h4>
            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

            <h4>Subheading</h4>
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

            <h4>Subheading</h4>
            <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>
        <div class="col-lg-2">
            <div class="text-right">10000</div>
        </div>
    </div>

    <div class="col-lg-6">
        <h2>Receipt</h2>
        <div class="col-lg-10">
            <h4>Subheading</h4>
            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

            <h4>Subheading</h4>
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

            <h4>Subheading</h4>
            <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>
        <div class="col-lg-2">
            <div class="text-right">10000</div>
        </div>
    </div>
</div>
