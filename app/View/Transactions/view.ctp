<div class="transactions view">
<h2><?php echo __('Transaction'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transaction['User']['id'], array('controller' => 'users', 'action' => 'view', $transaction['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transaction Type'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['transaction_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Interest'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['is_interest']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remarks'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['remarks']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transaction Date'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['transaction_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transaction'), array('action' => 'edit', $transaction['Transaction']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transaction'), array('action' => 'delete', $transaction['Transaction']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transaction['Transaction']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
