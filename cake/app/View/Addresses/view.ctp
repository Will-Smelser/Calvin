<div class="addresses view">
<h2><?php echo __('Address'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($address['Address']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($address['Company']['Name'], array('controller' => 'companies', 'action' => 'view', $address['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Line1'); ?></dt>
		<dd>
			<?php echo h($address['Address']['line1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Line2'); ?></dt>
		<dd>
			<?php echo h($address['Address']['line2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($address['Address']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State Code'); ?></dt>
		<dd>
			<?php echo $this->Html->link($address['StateCode']['State'], array('controller' => 'state_codes', 'action' => 'view', $address['StateCode']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($address['Address']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country Code'); ?></dt>
		<dd>
			<?php echo $this->Html->link($address['CountryCode']['Country'], array('controller' => 'country_codes', 'action' => 'view', $address['CountryCode']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Address'), array('action' => 'edit', $address['Address']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Address'), array('action' => 'delete', $address['Address']['id']), null, __('Are you sure you want to delete # %s?', $address['Address']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List State Codes'), array('controller' => 'state_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State Code'), array('controller' => 'state_codes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Country Codes'), array('controller' => 'country_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country Code'), array('controller' => 'country_codes', 'action' => 'add')); ?> </li>
	</ul>
</div>
