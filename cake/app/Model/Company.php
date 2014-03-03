<?php
App::uses('AppModel', 'Model');
/**
 * Company Model
 *
 * @property Address $Address
 * @property Facility $Facility
 */
class Company extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'company';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'Name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Address' => array(
			'className' => 'Address',
			'foreignKey' => 'company_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Facility' => array(
			'className' => 'Facility',
			'foreignKey' => 'company_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
