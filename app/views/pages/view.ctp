<?php echo $this->element('home_flash')?>
<div class="clearfix"></div>
<div id="left-col">
	<div class="box" style="width:99%">
		<div class="topleft">
			<div class="topright">
				<div>
					<?php echo $page['Page']['content']; ?>
				</div>
			</div>
		</div>
		<div class="bottomleft">
			<div class="bottomright"> </div>
		</div>
	</div>
</div>
<div id="right-col">
	<?php echo $this->element('home_demo');?>
</div>