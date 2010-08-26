<?php
header('Pragma: no-cache');
header('Cache-Control: no-store, no-cache, max-age=0, must-revalidate');
header('Content-Type: text/x-JSON');
header('X-JSON: '. (!empty($status))?json_encode(array('rsp' => $status)):$content_for_layout); 
?>
<?php echo (!empty($status))?json_encode(array('rsp' => $status)):$content_for_layout; ?>