<div class="panel panel-default">
	<div class="list-group">
        <span class="list-group-item active"><?php echo $heading_title; ?></span>
        
        	<?php echo $test; foreach($manufactures as $manufacture) {?>
        	<a href="<?php echo $manufacture['href']; ?>" class="list-group-item"><?php echo $manufacture['name']; ?></a>	
	
<?php } ?>
	</div>
</div>
