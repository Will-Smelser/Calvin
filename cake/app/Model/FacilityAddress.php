<?php
App::uses('AppModel', 'Model');
/**
 * FacilityAddress Model
 *
 * @property Facility $Facility
 * @property StateCode $StateCode
 * @property CountryCode $CountryCode
 */
class FacilityAddress extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'facility_address';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Facility' => array(
			'className' => 'Facility',
			'foreignKey' => 'facility_id',
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
