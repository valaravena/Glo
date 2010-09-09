<?php echo $javascript->codeBlock(); ?>
$(function(){
       $('.editable').inlineEdit({
			save: function(e, data) {  
				$.post("<?php echo $html->url(array('controller' => 'accounts', 'action' => 'location')); ?>", data);
			}
		});
   });
<?php echo $javascript->blockEnd(); ?>

<?php $pages = $this->requestAction('/pages/getpages/top');?>
<ul class="menu">
	<li><?php echo $html->link(__('Home', true), '/');?></li>
	<?php if(!empty($pages)): ?>
		<?php foreach ($pages as $page): ?>
			<li><?php echo $html->link($page['Page']['name'], array('controller' => 'pages', 'action' => 'view', $page['Page']['slug'])); ?></li>
		<?php endforeach; ?>
	<?php endif; ?>
</ul>
<?php if ($session->check('Auth.User')): ?>        
	
		<div style="float:right; margin:-25px 25px 0 0;">
	   		<div class="current-city">
	   			<?php echo sprintf(__('Currently in %s', true), $html->tag('span', 'Some City, St', array('class' => 'editable'))); ?>
			</div>      
		</div>
<!--	<div style="float:right; border: 1px solid #666;">
		<dl>
			<dt>test</dt>
			<dd>EPM</dd>
		</dl>
		<div class="settings-menu">
			<div class="settings-menu-top">
				<?php echo $html->link($html->tag('span', 'Test'), array(), array('class' => '', 'escape' => false))?>
			</div>
			<div class="settings-menu-dropdown">
				<ul>
					<li><?php echo $html->link(__('Profile', true), array('controller' => 'accounts', 'action' => 'profile')); ?></li>
				</ul>
			</div>
		</div>
	</div>    -->
<?php endif; ?>
