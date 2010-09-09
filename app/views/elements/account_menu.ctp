<div>
	<ul class="menu">
		<li><?php echo $html->link(sprintf(__('My %s', true), $appConfigurations['name']), array('controller' => 'users', 'action' => 'index')); ?></li>
		<li><?php echo $html->link(__('Edit Profile', true), array('controller' => 'accounts', 'action' => 'profile')); ?></li>
		<li><?php echo $html->link(__('Change Password', true), array('controller' => 'users', 'action' => 'changepassword'));?></li>
	   <!-- <li><?php echo $html->link(__('Notifications', true), array('controller' => 'addresses', 'action' => 'index'));?></li>  -->
		<!-- <li><?php echo $html->link(__('My Addresses', true), array('controller' => 'addresses', 'action' => 'index'));?></li>      -->
		<!-- <li><?php echo $html->link(__('Connections', true), array('controller' => 'addresses', 'action' => 'index'));?></li>     -->
	</ul>

</div>