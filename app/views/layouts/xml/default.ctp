<?php 
echo $this->Xml->header();
echo (!empty($status))?$this->Xml->serialize($status, array('root' => 'rsp')):$content_for_layout;
?>