<?php
class Account extends AppModel {
	var $name = 'Account';
	var $displayField = 'account_type_id';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
     
	var $actsAs = array(
		'FileUpload'  => array(
			'image' => array(
				'required'				=> array('add' => true, 'edit' => false),
				'directory'				=> 'img/publicacion',
				'allowed_mime'			=> array('image/jpg', 'image/jpeg'),
				'allowed_extensions'	=> array('.jpg', '.jpeg'),
				'allowed_size'			=> 2097152,
				'random_filename'		=> true,
				'resize'	=> array(      
					'70' => array(
						'directory' => 'img/140',
						'width'         => 140,
						'phpThumb'      => array(
							'far'   => 1,
							'bg'    => 'FFFFFF'   
						)                             
			   	    )                              
				)
		    )
	    )                                                                     
	);  
	
	var $belongsTo = array(
		'AccountType' => array(
			'className' => 'AccountType',
			'foreignKey' => 'account_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Gender' => array(
			'className' => 'Gender',
			'foreignKey' => 'gender_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Source' => array(
			'className' => 'Source',
			'foreignKey' => 'source_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	
	function getAccountByIdOrUsername($id = null) {
		if (!empty($id)) {
			$account = $this->find('first', 
				array(
					'conditions' => array(
						'OR' => array(
							array('User.id' => $id),
							array('User.username' => $id)
						),
					),
				)
			);

			if (!empty($account)) {
				return $account;
			}
		}
		return false;
	}
}
?>