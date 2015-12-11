<script>
<?php if(isset($_GET["info"])) { ?>
	var text=<?php echo json_encode($_GET["info"]);?>;
bootbox.alert('<p class="lead">'+text+'</p>');
<?php } ?>
</script>