<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="adminmenu">
	<?php		
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,			
		));
	?>
	
</div>


	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->


<?php $this->endContent(); ?>