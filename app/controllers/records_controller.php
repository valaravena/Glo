<?php
class RecordsController extends AppController {

	var $name = 'Records';
	var $uses = array();
	
	function beforeFilter() {
        parent::beforeFilter();

	#	$this->Security->requireLogin('authenticate');
    }

	
	function records() {
		$records['Records'] = array('record' => 
			array(
				'emp_rating' => 33,
				'avm' => 12,
				'ami_ready' => true,
				'sources' => array(
					'id' => '1',
					'name' => 'SOLAR',
				),
				'ev_station' => false,
				'leed_cert' => array(
					'id' => 1,
					'name' => 'PLATINUM',
				)
			),
			array(
				'emp_rating' => 33,
				'avm' => 12,
				'ami_ready' => true,
				'sources' => array(
					'id' => '1',
					'name' => 'SOLAR',
				),
				'ev_station' => false,
				'leed_cert' => array(
					'id' => 1,
					'name' => 'PLATINUM',
				)
			),
			array(
				'emp_rating' => 33,
				'avm' => 12,
				'ami_ready' => true,
				'sources' => array(
					'id' => '1',
					'name' => 'SOLAR',
				),
				'ev_station' => false,
				'leed_cert' => array(
					'id' => 1,
					'name' => 'PLATINUM',
				)
			),
			array(
				'emp_rating' => 33,
				'avm' => 12,
				'ami_ready' => true,
				'sources' => array(
					'id' => '1',
					'name' => 'SOLAR',
				),
				'ev_station' => false,
				'leed_cert' => array(
					'id' => 1,
					'name' => 'PLATINUM',
				)
			),
			array(
				'emp_rating' => 33,
				'avm' => 12,
				'ami_ready' => true,
				'sources' => array(
					'id' => '1',
					'name' => 'SOLAR',
				),
				'ev_station' => false,
				'leed_cert' => array(
					'id' => 1,
					'name' => 'PLATINUM',
				)
			),
		);
		
		$this->set('records', $records);
	}
	
	
}
?>