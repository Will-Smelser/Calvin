<?php
App::uses('AppController', 'Controller');
/**
 * FacilityAddresses Controller
 *
 * @property FacilityAddress $FacilityAddress
 * @property PaginatorComponent $Paginator
 */
class FacilityAddressesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->FacilityAddress->recursive = 0;
		$this->set('facilityAddresses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacilityAddress->exists($id)) {
			throw new NotFoundException(__('Invalid facility address'));
		}
		$options = array('conditions' => array('FacilityAddress.' . $this->FacilityAddress->primaryKey => $id));
		$this->set('facilityAddress', $this->FacilityAddress->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacilityAddress->create();
			if ($this->FacilityAddress->save($this->request->data)) {
				$this->Session->setFlash(__('The facility address has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facility address could not be saved. Please, try again.'));
			}
		}
		$facilities = $this->FacilityAddress->Facility->find('list');
		$stateCodes = $this->FacilityAddress->StateCode->find('list');
		$countryCodes = $this->FacilityAddress->CountryCode->find('list');
		$this->set(compact('facilities', 'stateCodes', 'countryCodes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacilityAddress->exists($id)) {
			throw new NotFoundException(__('Invalid facility address'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacilityAddress->save($this->request->data)) {
				$this->Session->setFlash(__('The facility address has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facility address could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacilityAddress.' . $this->FacilityAddress->primaryKey => $id));
			$this->request->data = $this->FacilityAddress->find('first', $options);
		}
		$facilities = $this->FacilityAddress->Facility->find('list');
		$stateCodes = $this->FacilityAddress->StateCode->find('list');
		$countryCodes = $this->FacilityAddress->CountryCode->find('list');
		$this->set(compact('facilities', 'stateCodes', 'countryCodes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacilityAddress->id = $id;
		if (!$this->FacilityAddress->exists()) {
			throw new NotFoundException(__('Invalid facility address'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FacilityAddress->delete()) {
			$this->Session->setFlash(__('The facility address has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facility address could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
