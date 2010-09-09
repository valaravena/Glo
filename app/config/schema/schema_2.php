<?php 
/* SVN FILE: $Id$ */
/* App schema generated on: 2010-09-09 16:09:43 : 1284064963*/
class AppSchema extends CakeSchema {
	var $name = 'App';

	var $file = 'schema_2.php';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	var $account_types = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array(),
		'tableParameters' => array()
	);
	var $accounts = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'account_type_id' => array('type' => 'text', 'null' => false, 'default' => NULL, 'length' => 11),
		'user_id' => array('type' => 'text', 'null' => false, 'default' => NULL, 'length' => 11),
		'first_name' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'last_name' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'bio' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'location' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'date_of_birth' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'gender_id' => array('type' => 'text', 'null' => true, 'default' => NULL, 'length' => 11),
		'image' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'newsletter' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 1),
		'active' => array('type' => 'text', 'null' => true, 'default' => NULL, 'length' => 1),
		'key' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'source_id' => array('type' => 'text', 'null' => true, 'default' => NULL, 'length' => 11),
		'source_extra' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'ip' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array(),
		'tableParameters' => array()
	);
	var $acos = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'model' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'foreign_key' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'alias' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'indexes' => array(),
		'tableParameters' => array()
	);
	var $aros = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'model' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'foreign_key' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'alias' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'indexes' => array(),
		'tableParameters' => array()
	);
	var $aros_acos = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'aro_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'aco_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'_create' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
		'_read' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
		'_update' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
		'_delete' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
		'indexes' => array(),
		'tableParameters' => array()
	);
	var $core_resources = array(
		'code' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'key' => 'primary'),
		'version' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
		'indexes' => array(),
		'tableParameters' => array()
	);
	var $genders = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'indexes' => array(),
		'tableParameters' => array()
	);
	var $groups = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array(),
		'tableParameters' => array()
	);
	var $pages = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'title' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'meta_description' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'meta_keywords' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'slug' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'content' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'top_show' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'bottom_show' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'top_order' => array('type' => 'text', 'null' => true, 'default' => '0', 'length' => 3),
		'bottom_order' => array('type' => 'text', 'null' => true, 'default' => '0', 'length' => 3),
		'indexes' => array(),
		'tableParameters' => array()
	);
	var $sources = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'indexes' => array(),
		'tableParameters' => array()
	);
	var $users = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'group_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'username' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'password' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'email' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'key' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'ip' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array(),
		'tableParameters' => array()
	);
}
?>