<div class="addresses form">
<?php echo $this->Form->create('Address'); ?>
	<fieldset>
		<legend><?php echo __('Add Address'); ?></legend>
	<?php
		echo $this->Form->input('company_id');
		echo $this->Form->input('line1');
		echo $this->Form->input('line2');
		echo $this->Form->input('city');
		echo $this->Form->input('state_code_id');
		echo $this->Form->input('zip');
		echo $this->Form->input('country_code_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Addresses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List State Codes'), array('controller' => 'state_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State Code'), array('controller' => 'state_codes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Country Codes'), array('controller' => 'country_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country Code'), array('controller' => 'country_codes', 'action' => 'add')); ?> </li>
	</ul>
</div>
