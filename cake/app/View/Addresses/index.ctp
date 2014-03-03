<div class="addresses index">
	<h2><?php echo __('Addresses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('company_id'); ?></th>
			<th><?php echo $this->Paginator->sort('line1'); ?></th>
			<th><?php echo $this->Paginator->sort('line2'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('state_code_id'); ?></th>
			<th><?php echo $this->Paginator->sort('zip'); ?></th>
			<th><?php echo $this->Paginator->sort('country_code_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($addresses as $address): ?>
	<tr>
		<td><?php echo h($address['Address']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($address['Company']['Name'], array('controller' => 'companies', 'action' => 'view', $address['Company']['id'])); ?>
		</td>
		<td><?php echo h($address['Address']['line1']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['line2']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['city']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($address['StateCode']['State'], array('controller' => 'state_codes', 'action' => 'view', $address['StateCode']['id'])); ?>
		</td>
		<td><?php echo h($address['Address']['zip']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($address['CountryCode']['Country'], array('controller' => 'country_codes', 'action' => 'view', $address['CountryCode']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $address['Address']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $address['Address']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $address['Address']['id']), null, __('Are you sure you want to delete # %s?', $address['Address']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
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
		<li><?php echo $this->Html->link(__('New Address'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List State Codes'), array('controller' => 'state_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State Code'), array('controller' => 'state_codes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Country Codes'), array('controller' => 'country_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country Code'), array('controller' => 'country_codes', 'action' => 'add')); ?> </li>
	</ul>
</div>
