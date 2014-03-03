<div class="facilities form">
<?php echo $this->Form->create('Facility'); ?>
	<fieldset>
		<legend><?php echo __('Add Facility'); ?></legend>
	<?php
		echo $this->Form->input('company_id');
		echo $this->Form->input('Facility ID');
		echo $this->Form->input('Name');
		echo $this->Form->input('Facility Type');
		echo $this->Form->input('Facility Scope');
		echo $this->Form->input('Multi-Product Operations');
		echo $this->Form->input('FDA FEI Number');
		echo $this->Form->input('Site QA Head');
		echo $this->Form->input('QA Head Phone Number');
		echo $this->Form->input('Qualified');
		echo $this->Form->input('Compliance Status');
		echo $this->Form->input('Compliance Date');
		echo $this->Form->input('Coordinator');
		echo $this->Form->input('Next Audit Mo');
		echo $this->Form->input('Next Audit Qtr');
		echo $this->Form->input('Next Audit Year');
		echo $this->Form->input('a001 PA');
		echo $this->Form->input('a011 PA');
		echo $this->Form->input('a021 PA');
		echo $this->Form->input('a031 PA');
		echo $this->Form->input('a041 PA');
		echo $this->Form->input('a051 PA');
		echo $this->Form->input('a061 PA');
		echo $this->Form->input('a071 PA');
		echo $this->Form->input('a081 PA');
		echo $this->Form->input('a091 PA');
		echo $this->Form->input('a101 PA');
		echo $this->Form->input('a111 PA');
		echo $this->Form->input('a121 PA');
		echo $this->Form->input('a131 PA');
		echo $this->Form->input('a141 PA');
		echo $this->Form->input('a142 PA');
		echo $this->Form->input('a151 PA');
		echo $this->Form->input('a161 PA');
		echo $this->Form->input('a171 PA');
		echo $this->Form->input('a172 PA');
		echo $this->Form->input('b011 PA');
		echo $this->Form->input('b012 PA');
		echo $this->Form->input('b013 PA');
		echo $this->Form->input('b021 PA');
		echo $this->Form->input('b022 PA');
		echo $this->Form->input('b023 PA');
		echo $this->Form->input('b024 PA');
		echo $this->Form->input('b031 PA');
		echo $this->Form->input('b041 PA');
		echo $this->Form->input('b042 PA');
		echo $this->Form->input('b043 PA');
		echo $this->Form->input('b051 PA');
		echo $this->Form->input('b052 PA');
		echo $this->Form->input('b053 PA');
		echo $this->Form->input('b061 PA');
		echo $this->Form->input('b062 PA');
		echo $this->Form->input('b063 PA');
		echo $this->Form->input('b064 PA');
		echo $this->Form->input('b065 PA');
		echo $this->Form->input('b066 PA');
		echo $this->Form->input('b067 PA');
		echo $this->Form->input('b068 PA');
		echo $this->Form->input('b069 PA');
		echo $this->Form->input('b0610 PA');
		echo $this->Form->input('c011 PA');
		echo $this->Form->input('c021 PA');
		echo $this->Form->input('c022 PA');
		echo $this->Form->input('c023 PA');
		echo $this->Form->input('c031 PA');
		echo $this->Form->input('c032 PA');
		echo $this->Form->input('c041 PA');
		echo $this->Form->input('c051 PA');
		echo $this->Form->input('d011 PA');
		echo $this->Form->input('d021 PA');
		echo $this->Form->input('d022 PA');
		echo $this->Form->input('d031 PA');
		echo $this->Form->input('d032 PA');
		echo $this->Form->input('d033 PA');
		echo $this->Form->input('d034 PA');
		echo $this->Form->input('d035 PA');
		echo $this->Form->input('d041 PA');
		echo $this->Form->input('d051 PA');
		echo $this->Form->input('d052 PA');
		echo $this->Form->input('d053 PA');
		echo $this->Form->input('D054 PA');
		echo $this->Form->input('d061 PA');
		echo $this->Form->input('d071 PA');
		echo $this->Form->input('x011 PA');
		echo $this->Form->input('d081 PA');
		echo $this->Form->input('d082 PA');
		echo $this->Form->input('d091 PA');
		echo $this->Form->input('d092 PA');
		echo $this->Form->input('d093 PA');
		echo $this->Form->input('d094 PA');
		echo $this->Form->input('e011 PA');
		echo $this->Form->input('e021 PA');
		echo $this->Form->input('e031 PA');
		echo $this->Form->input('f011 PA');
		echo $this->Form->input('f012 PA');
		echo $this->Form->input('f021 PA');
		echo $this->Form->input('f031 PA');
		echo $this->Form->input('f041 PA');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Facilities'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Facility Addresses'), array('controller' => 'facility_addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Facility Address'), array('controller' => 'facility_addresses', 'action' => 'add')); ?> </li>
	</ul>
</div>
