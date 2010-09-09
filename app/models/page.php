<?php
class Page extends AppModel {
	var $name = 'Page';
	var $displayField = 'name';
	
	function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		
		$this->validate = array(
			'name' => array(
				'name' => array(
					'rule' => 'notEmpty',
					'message' => __('Name is required', true)
				)
			),
			'title' => array(
				'title' => array(
					'rule' => 'notEmpty',
					'message' => __('Title is required', true)
				)
			),
			'content' => array(
				'content' => array(
					'rule' => 'notEmpty',
					'message' => __('Content is required', true)
				)
			),
			'email' => array(
				'email' => array(
					'email' => array(
						'rule' => 'email',
						'message' => __('The email address you entered is not valid.', true)
					),
					'notEmpty' => array(
						'rule' => 'notEmpty',
						'message' => __('Email address is required', true)
					)
				)
			
			),
			'message' => array(
				'message' => array(
					'rule' => 'notEmpty',
					'message' => __('If you don\'t enter a questions, we won\'t be able to answer it.', true)
				)
			),
		);
	}
	
}
?>