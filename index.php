<?php
	require 'inc/first_config.php';
	require 'inc/main_menu.inc.php';
	require 'inc/jumbotron_main.inc.php';
	require 'inc/idea_collection.inc.php';
	require 'inc/footer.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ideator</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<link rel="icon" href="../../favicon.ico">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>
	<div class="container">
      <?php echo $main_menu; ?>
      <?php echo $jumbotron_main;?>
      <?php echo $last_ideas; ?>
      <?php echo $footer; ?>
    </div>
    <script type="text/javascript">
    	$("#menu-home").attr("class","active");
    </script> 
</body>
</html>