<?php  
	$rsp = array('rsp' => array('account'));
	$rsp['rsp']['records'] = $records;
	echo json_encode($rsp);
?>