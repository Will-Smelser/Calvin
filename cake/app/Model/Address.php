<?php
App::uses('AppModel', 'Model');
/**
 * Address Model
 *
 * @property Company $Company
 * @property StateCode $StateCode
 * @property CountryCode $CountryCode
 */
class Address extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'address';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Company' => array(
			'className' => 'Company',
			'foreignKey' => 'company_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'StateCode' => array(
			'className' => 'StateCode',
			'foreignKey' => 'state_code_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CountryCode' => array(
			'className' => 'CountryCode',
			'foreignKey' => 'country_code_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
