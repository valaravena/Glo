<?php
class SimpleGeoLayer extends SimpleGeoAppModel {
	
	var $name = 'SimpleGeoLayer';
	
	var $displayField = 'name';
	
	function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
		$validate = array(
			'name' => array(
				'alphanumeric' => array(
					'rule' => array('alphanumeric'),
					'message' => __('Name can only contain letters a-z and numbers 0-9 (.)', true),
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => __('Layer name can not be empty.', true),
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
			'title' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => __('Please enter a title for this Layer.', true),
					//'message' => 'Your custom message here',
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
		);
	}

}
?>