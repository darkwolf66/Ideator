<?php
	require 'inc/first_config.php';
	require 'config.php';
	require 'inc/main_menu.inc.php';
	require 'inc/explore/explore_menu.inc.php';
	require 'inc/idea_collection.inc.php';
	require 'inc/footer.inc.php';
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ideator - <?php echo $content['main_title']['idea']; ?></title>
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
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<!-- include summernote css/js-->
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
</head>
<body>
	<div class="container">
      <?php echo $main_menu; ?>
	      	<h3>Publish your Idea!</h3>
	      	<h4>Title: <input id="title"></input></h4>
			<div id="content"></div>
			<h5>PDF link: <input id="pdf"></input></h5>
			<h5>
				Category: 
				<select id="category">
					<option>App</option>
					<option>Tecnology</option>
					<option>Bunisses</option>
				</select>
			</h5>
			<div class="col-md-12 text-center">
				<div class="g-recaptcha" data-sitekey="6Lf2yScTAAAAAB3DNp-b62wbGPhKa5ys0EM7Xgob"></div>
				<button class="btn btn-success btn-lg btn-space" onclick="publish()">Publish</button>
			</div>
			<textarea id="final"></textarea>
        	
      <?php echo $footer; ?>
    </div>
    <script type="text/javascript">
    	function publish(){
    		$.post(<?php echo "\"".$main_link."/api?action=publish_idea\""; ?>,
    			{title: $('#title').val()},
    			function(result){
			        console.log(result);
			    });
    		$("#final").html($('#content').summernote('code'));
    	}
	    $(document).ready(function() {
	        $('#content').summernote({
	        	height: 300,                 // set editor height
				minHeight: null,             // set minimum height of editor
				maxHeight: null,             // set maximum height of editor
				focus: true                  // set focus to editable area after initializing summernote
	        });
	    });
    	$("#menu-publish").attr("class","active");
    </script> 
</body>
</html>