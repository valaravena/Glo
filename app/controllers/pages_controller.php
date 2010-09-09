<?php

class PagesController extends AppController {
	
	var $name = 'Pages';
	
	var $helpers = array('Recaptcha');
	
	var $components = array('Recaptcha');
	
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	function view($slug = null) {
		if (empty($slug)) {
			$this->Session->setFlash(__('Invalid Page', true));
			$this->redirect('/');
		}
		
		$page = $this->Page->findBySlug($slug);
		if (!empty($page)) {
			$this->set('page', $page);
		} else {
			$this->Session->setFlash(__('Invalid Page', true));
			$this->redirect('/');
		}
		$this->set('title_for_layout', $page['Page']['title']);
		if (!empty($page['Page']['meta_description'])) {
			$this->set('meta_description', $page['Page']['meta_description']);
		}
		if (!empty($page['Page']['meta_keywords'])) {
			$this->set('meta_keywords', $page['Page']['meta_keywords']);
		}
	}
	
	function contact() {
		if (!empty($this->data)) {
			if (Configure::read('Recaptcha.enabled') == false || $this->Recaptcha->isValid()) {
				$this->Page->set($this->data);
				if ($this->Page->validates()) {
					$data['Page'] = $this->data['Page'];
					$data['delivery'] = 'mail';
					$data['from'] = $this->data['Page']['name'].' <'.$this->data['Page']['email'].'>';
					$data['to'] = $this->appConfigurations['email'];
					$data['subject'] = sprintf(__('%s - Contact Form Submited', true), $this->appConfigurations['name']);
					$data['template'] = 'pages/contact';
					$this->_sendEmail($data);
					
					$this->Session->setFlash(__('The contact form was sucessfully submited', true), 'success', array('class' => 'success'));
					$this->redirect('/contact');
				} else {
					$this->Session->setFlash(__('There was a problem submitting the contact form.  Please review the errors below and try again', true), 'error');
				}
			} else {
				$this->Session->setFlash(__('The captcha form was not valid, please try again.', true), 'message', array('class' => 'message'));
				$this->set('recaptchaError', $this->Recaptcha->error);
			}
		}
		$this->set('title_for_layout', __('Contact Us', true));
	}
	
	function getpages($position = 'top') {
		return $this->Page->find('all', array('conditions' => 'Page.'.$position.'_show > 0', 'order' => 'Page.'.$position.'_order ASC'));
	}
	
	function home() {
		
	}
	
	
	function admin_index() {
		$this->set('title_for_layout', __('Pages', true));
	}
}

