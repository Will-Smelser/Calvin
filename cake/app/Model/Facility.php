<?php
App::uses('AppModel', 'Model');
/**
 * Facility Model
 *
 * @property facilityAddress $facilityAddress
 * @property Company $Company
 */
class Facility extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'facility';

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
		'facilityAddress' => array(
			'className' => 'facilityAddress',
			'foreignKey' => 'facility_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

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
		)
	);
}
