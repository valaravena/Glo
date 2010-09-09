<?php
class AccountsController extends AppController {

	var $name = 'Accounts';
	
	var $helpers = array('Gravatar');
	
	function beforeFilter() {
        parent::beforeFilter();

		$this->Security->requireLogin('authenticate');
    }

	function index() {
		$this->Account->recursive = 0;
		$this->set('accounts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid account', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('account', $this->Account->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Account->create();
			if ($this->Account->save($this->data)) {
				$this->Session->setFlash(__('The account has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The account could not be saved. Please, try again.', true));
			}
		}
		$accountTypes = $this->Account->AccountType->find('list');
		$users = $this->Account->User->find('list');
		$genders = $this->Account->Gender->find('list');
		$sources = $this->Account->Source->find('list');
		$this->set(compact('accountTypes', 'users', 'genders', 'sources'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid account', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Account->save($this->data)) {
				$this->Session->setFlash(__('The account has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The account could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Account->read(null, $id);
		}
		$accountTypes = $this->Account->AccountType->find('list');
		$users = $this->Account->User->find('list');
		$genders = $this->Account->Gender->find('list');
		$sources = $this->Account->Source->find('list');
		$this->set(compact('accountTypes', 'users', 'genders', 'sources'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for account', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Account->delete($id)) {
			$this->Session->setFlash(__('Account deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Account was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function profile() {
		$this->set('title_for_layout', __('Account Profile', true));
		if ($this->Auth->user()) {
			$account = $this->Account->findByUserId($this->Auth->user('id'));
			$account['Account']['full_name'] = $account['Account']['first_name'] . " ". $account['Account']['last_name'];
			if (!empty($this->data)) {         
				$fullName = explode(" ", trim($this->data['Account']['full_name']));
				list($lastName) = $fullName;  
				die($lastName);
				
				if ($user = $this->Account->register($this->data, $this->Auth->user('id'))) {
					$this->Session->setFlash(__('Your profile as been updated.', true), 'success');
					$this->redirect(array('action' => 'account'));
				} else {
					$this->Session->setFlash(__('Your profile could not be saved. Please, try again.', true), 'error');
				}
			}
			$this->data =$account;
		} else {
			$this->redirect('/login');
		}
	}
	
	function admin_index() {
		$this->Account->recursive = 0;
		$this->set('accounts', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid account', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('account', $this->Account->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Account->create();
			if ($this->Account->save($this->data)) {
				$this->Session->setFlash(__('The account has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The account could not be saved. Please, try again.', true));
			}
		}
		$accountTypes = $this->Account->AccountType->find('list');
		$users = $this->Account->User->find('list');
		$genders = $this->Account->Gender->find('list');
		$sources = $this->Account->Source->find('list');
		$this->set(compact('accountTypes', 'users', 'genders', 'sources'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid account', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Account->save($this->data)) {
				$this->Session->setFlash(__('The account has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The account could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Account->read(null, $id);
		}
		$accountTypes = $this->Account->AccountType->find('list');
		$users = $this->Account->User->find('list');
		$genders = $this->Account->Gender->find('list');
		$sources = $this->Account->Source->find('list');
		$this->set(compact('accountTypes', 'users', 'genders', 'sources'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for account', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Account->delete($id)) {
			$this->Session->setFlash(__('Account deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Account was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function authenticate() {
		$account = array();
		if ($this->Auth->user('id')) {
			$this->Account->recursive = 0;
			$account = $this->Account->getAccountByIdOrUsername($this->Auth->user('id'));
			if (!empty($account)) {
			#	$account['User'] = 
			#	$return['User'] = 
			#	$account['Account'] = array($account['Account'][])
				
				#$account = am($account['User'], $account['Account']);
			}
		}
		$this->set(compact('account'));
	}   
	
	
	function location() {    
		debug($this->params);
		if (!$this->RequestHandler->isAjax()) {
            $this->redirect(array('action' => 'index'));
        }
		if (!empty($location)) {
			echo $location;
		}                   
		echo "NO Location";
		
		
	}
	
	
}
?>