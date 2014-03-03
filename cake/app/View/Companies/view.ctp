<div class="companies view">
<h2><?php echo __('Company'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($company['Company']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Abbreviation'); ?></dt>
		<dd>
			<?php echo h($company['Company']['Abbreviation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($company['Company']['Active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($company['Company']['Name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Representative'); ?></dt>
		<dd>
			<?php echo h($company['Company']['Company Representative']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone Number'); ?></dt>
		<dd>
			<?php echo h($company['Company']['Phone Number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Website'); ?></dt>
		<dd>
			<?php echo h($company['Company']['Company Website']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Company'), array('action' => 'edit', $company['Company']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Company'), array('action' => 'delete', $company['Company']['id']), null, __('Are you sure you want to delete # %s?', $company['Company']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Facilities'), array('controller' => 'facilities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Facility'), array('controller' => 'facilities', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Addresses'); ?></h3>
	<?php if (!empty($company['Address'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $company['Address']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Company Id'); ?></dt>
		<dd>
	<?php echo $company['Address']['company_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Line1'); ?></dt>
		<dd>
	<?php echo $company['Address']['line1']; ?>
&nbsp;</dd>
		<dt><?php echo __('Line2'); ?></dt>
		<dd>
	<?php echo $company['Address']['line2']; ?>
&nbsp;</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
	<?php echo $company['Address']['city']; ?>
&nbsp;</dd>
		<dt><?php echo __('State Code Id'); ?></dt>
		<dd>
	<?php echo $company['Address']['state_code_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
	<?php echo $company['Address']['zip']; ?>
&nbsp;</dd>
		<dt><?php echo __('Country Code Id'); ?></dt>
		<dd>
	<?php echo $company['Address']['country_code_id']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Address'), array('controller' => 'addresses', 'action' => 'edit', $company['Address']['id'])); ?></li>
			</ul>
		</div>
	</div>
	<div class="related">
	<h3><?php echo __('Related Facilities'); ?></h3>
	<?php if (!empty($company['Facility'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Facility ID'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Facility Type'); ?></th>
		<th><?php echo __('Facility Scope'); ?></th>
		<th><?php echo __('Multi-Product Operations'); ?></th>
		<th><?php echo __('FDA FEI Number'); ?></th>
		<th><?php echo __('Site QA Head'); ?></th>
		<th><?php echo __('QA Head Phone Number'); ?></th>
		<th><?php echo __('Qualified'); ?></th>
		<th><?php echo __('Compliance Status'); ?></th>
		<th><?php echo __('Compliance Date'); ?></th>
		<th><?php echo __('Coordinator'); ?></th>
		<th><?php echo __('Next Audit Mo'); ?></th>
		<th><?php echo __('Next Audit Qtr'); ?></th>
		<th><?php echo __('Next Audit Year'); ?></th>
		<th><?php echo __('A001 PA'); ?></th>
		<th><?php echo __('A011 PA'); ?></th>
		<th><?php echo __('A021 PA'); ?></th>
		<th><?php echo __('A031 PA'); ?></th>
		<th><?php echo __('A041 PA'); ?></th>
		<th><?php echo __('A051 PA'); ?></th>
		<th><?php echo __('A061 PA'); ?></th>
		<th><?php echo __('A071 PA'); ?></th>
		<th><?php echo __('A081 PA'); ?></th>
		<th><?php echo __('A091 PA'); ?></th>
		<th><?php echo __('A101 PA'); ?></th>
		<th><?php echo __('A111 PA'); ?></th>
		<th><?php echo __('A121 PA'); ?></th>
		<th><?php echo __('A131 PA'); ?></th>
		<th><?php echo __('A141 PA'); ?></th>
		<th><?php echo __('A142 PA'); ?></th>
		<th><?php echo __('A151 PA'); ?></th>
		<th><?php echo __('A161 PA'); ?></th>
		<th><?php echo __('A171 PA'); ?></th>
		<th><?php echo __('A172 PA'); ?></th>
		<th><?php echo __('B011 PA'); ?></th>
		<th><?php echo __('B012 PA'); ?></th>
		<th><?php echo __('B013 PA'); ?></th>
		<th><?php echo __('B021 PA'); ?></th>
		<th><?php echo __('B022 PA'); ?></th>
		<th><?php echo __('B023 PA'); ?></th>
		<th><?php echo __('B024 PA'); ?></th>
		<th><?php echo __('B031 PA'); ?></th>
		<th><?php echo __('B041 PA'); ?></th>
		<th><?php echo __('B042 PA'); ?></th>
		<th><?php echo __('B043 PA'); ?></th>
		<th><?php echo __('B051 PA'); ?></th>
		<th><?php echo __('B052 PA'); ?></th>
		<th><?php echo __('B053 PA'); ?></th>
		<th><?php echo __('B061 PA'); ?></th>
		<th><?php echo __('B062 PA'); ?></th>
		<th><?php echo __('B063 PA'); ?></th>
		<th><?php echo __('B064 PA'); ?></th>
		<th><?php echo __('B065 PA'); ?></th>
		<th><?php echo __('B066 PA'); ?></th>
		<th><?php echo __('B067 PA'); ?></th>
		<th><?php echo __('B068 PA'); ?></th>
		<th><?php echo __('B069 PA'); ?></th>
		<th><?php echo __('B0610 PA'); ?></th>
		<th><?php echo __('C011 PA'); ?></th>
		<th><?php echo __('C021 PA'); ?></th>
		<th><?php echo __('C022 PA'); ?></th>
		<th><?php echo __('C023 PA'); ?></th>
		<th><?php echo __('C031 PA'); ?></th>
		<th><?php echo __('C032 PA'); ?></th>
		<th><?php echo __('C041 PA'); ?></th>
		<th><?php echo __('C051 PA'); ?></th>
		<th><?php echo __('D011 PA'); ?></th>
		<th><?php echo __('D021 PA'); ?></th>
		<th><?php echo __('D022 PA'); ?></th>
		<th><?php echo __('D031 PA'); ?></th>
		<th><?php echo __('D032 PA'); ?></th>
		<th><?php echo __('D033 PA'); ?></th>
		<th><?php echo __('D034 PA'); ?></th>
		<th><?php echo __('D035 PA'); ?></th>
		<th><?php echo __('D041 PA'); ?></th>
		<th><?php echo __('D051 PA'); ?></th>
		<th><?php echo __('D052 PA'); ?></th>
		<th><?php echo __('D053 PA'); ?></th>
		<th><?php echo __('D054 PA'); ?></th>
		<th><?php echo __('D061 PA'); ?></th>
		<th><?php echo __('D071 PA'); ?></th>
		<th><?php echo __('X011 PA'); ?></th>
		<th><?php echo __('D081 PA'); ?></th>
		<th><?php echo __('D082 PA'); ?></th>
		<th><?php echo __('D091 PA'); ?></th>
		<th><?php echo __('D092 PA'); ?></th>
		<th><?php echo __('D093 PA'); ?></th>
		<th><?php echo __('D094 PA'); ?></th>
		<th><?php echo __('E011 PA'); ?></th>
		<th><?php echo __('E021 PA'); ?></th>
		<th><?php echo __('E031 PA'); ?></th>
		<th><?php echo __('F011 PA'); ?></th>
		<th><?php echo __('F012 PA'); ?></th>
		<th><?php echo __('F021 PA'); ?></th>
		<th><?php echo __('F031 PA'); ?></th>
		<th><?php echo __('F041 PA'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($company['Facility'] as $facility): ?>
		<tr>
			<td><?php echo $facility['id']; ?></td>
			<td><?php echo $facility['company_id']; ?></td>
			<td><?php echo $facility['Facility ID']; ?></td>
			<td><?php echo $facility['Name']; ?></td>
			<td><?php echo $facility['Facility Type']; ?></td>
			<td><?php echo $facility['Facility Scope']; ?></td>
			<td><?php echo $facility['Multi-Product Operations']; ?></td>
			<td><?php echo $facility['FDA FEI Number']; ?></td>
			<td><?php echo $facility['Site QA Head']; ?></td>
			<td><?php echo $facility['QA Head Phone Number']; ?></td>
			<td><?php echo $facility['Qualified']; ?></td>
			<td><?php echo $facility['Compliance Status']; ?></td>
			<td><?php echo $facility['Compliance Date']; ?></td>
			<td><?php echo $facility['Coordinator']; ?></td>
			<td><?php echo $facility['Next Audit Mo']; ?></td>
			<td><?php echo $facility['Next Audit Qtr']; ?></td>
			<td><?php echo $facility['Next Audit Year']; ?></td>
			<td><?php echo $facility['a001 PA']; ?></td>
			<td><?php echo $facility['a011 PA']; ?></td>
			<td><?php echo $facility['a021 PA']; ?></td>
			<td><?php echo $facility['a031 PA']; ?></td>
			<td><?php echo $facility['a041 PA']; ?></td>
			<td><?php echo $facility['a051 PA']; ?></td>
			<td><?php echo $facility['a061 PA']; ?></td>
			<td><?php echo $facility['a071 PA']; ?></td>
			<td><?php echo $facility['a081 PA']; ?></td>
			<td><?php echo $facility['a091 PA']; ?></td>
			<td><?php echo $facility['a101 PA']; ?></td>
			<td><?php echo $facility['a111 PA']; ?></td>
			<td><?php echo $facility['a121 PA']; ?></td>
			<td><?php echo $facility['a131 PA']; ?></td>
			<td><?php echo $facility['a141 PA']; ?></td>
			<td><?php echo $facility['a142 PA']; ?></td>
			<td><?php echo $facility['a151 PA']; ?></td>
			<td><?php echo $facility['a161 PA']; ?></td>
			<td><?php echo $facility['a171 PA']; ?></td>
			<td><?php echo $facility['a172 PA']; ?></td>
			<td><?php echo $facility['b011 PA']; ?></td>
			<td><?php echo $facility['b012 PA']; ?></td>
			<td><?php echo $facility['b013 PA']; ?></td>
			<td><?php echo $facility['b021 PA']; ?></td>
			<td><?php echo $facility['b022 PA']; ?></td>
			<td><?php echo $facility['b023 PA']; ?></td>
			<td><?php echo $facility['b024 PA']; ?></td>
			<td><?php echo $facility['b031 PA']; ?></td>
			<td><?php echo $facility['b041 PA']; ?></td>
			<td><?php echo $facility['b042 PA']; ?></td>
			<td><?php echo $facility['b043 PA']; ?></td>
			<td><?php echo $facility['b051 PA']; ?></td>
			<td><?php echo $facility['b052 PA']; ?></td>
			<td><?php echo $facility['b053 PA']; ?></td>
			<td><?php echo $facility['b061 PA']; ?></td>
			<td><?php echo $facility['b062 PA']; ?></td>
			<td><?php echo $facility['b063 PA']; ?></td>
			<td><?php echo $facility['b064 PA']; ?></td>
			<td><?php echo $facility['b065 PA']; ?></td>
			<td><?php echo $facility['b066 PA']; ?></td>
			<td><?php echo $facility['b067 PA']; ?></td>
			<td><?php echo $facility['b068 PA']; ?></td>
			<td><?php echo $facility['b069 PA']; ?></td>
			<td><?php echo $facility['b0610 PA']; ?></td>
			<td><?php echo $facility['c011 PA']; ?></td>
			<td><?php echo $facility['c021 PA']; ?></td>
			<td><?php echo $facility['c022 PA']; ?></td>
			<td><?php echo $facility['c023 PA']; ?></td>
			<td><?php echo $facility['c031 PA']; ?></td>
			<td><?php echo $facility['c032 PA']; ?></td>
			<td><?php echo $facility['c041 PA']; ?></td>
			<td><?php echo $facility['c051 PA']; ?></td>
			<td><?php echo $facility['d011 PA']; ?></td>
			<td><?php echo $facility['d021 PA']; ?></td>
			<td><?php echo $facility['d022 PA']; ?></td>
			<td><?php echo $facility['d031 PA']; ?></td>
			<td><?php echo $facility['d032 PA']; ?></td>
			<td><?php echo $facility['d033 PA']; ?></td>
			<td><?php echo $facility['d034 PA']; ?></td>
			<td><?php echo $facility['d035 PA']; ?></td>
			<td><?php echo $facility['d041 PA']; ?></td>
			<td><?php echo $facility['d051 PA']; ?></td>
			<td><?php echo $facility['d052 PA']; ?></td>
			<td><?php echo $facility['d053 PA']; ?></td>
			<td><?php echo $facility['D054 PA']; ?></td>
			<td><?php echo $facility['d061 PA']; ?></td>
			<td><?php echo $facility['d071 PA']; ?></td>
			<td><?php echo $facility['x011 PA']; ?></td>
			<td><?php echo $facility['d081 PA']; ?></td>
			<td><?php echo $facility['d082 PA']; ?></td>
			<td><?php echo $facility['d091 PA']; ?></td>
			<td><?php echo $facility['d092 PA']; ?></td>
			<td><?php echo $facility['d093 PA']; ?></td>
			<td><?php echo $facility['d094 PA']; ?></td>
			<td><?php echo $facility['e011 PA']; ?></td>
			<td><?php echo $facility['e021 PA']; ?></td>
			<td><?php echo $facility['e031 PA']; ?></td>
			<td><?php echo $facility['f011 PA']; ?></td>
			<td><?php echo $facility['f012 PA']; ?></td>
			<td><?php echo $facility['f021 PA']; ?></td>
			<td><?php echo $facility['f031 PA']; ?></td>
			<td><?php echo $facility['f041 PA']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'facilities', 'action' => 'view', $facility['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'facilities', 'action' => 'edit', $facility['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'facilities', 'action' => 'delete', $facility['id']), null, __('Are you sure you want to delete # %s?', $facility['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Facility'), array('controller' => 'facilities', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
