<?php
	require 'inc/first_config.php';
	require 'config.php';
	require 'inc/main_menu.inc.php';
	require 'inc/explore/explore_menu.inc.php';
	require 'inc/idea_collection.inc.php';
	require 'inc/footer.inc.php';
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
	}else{
		header("location: index.php");
	}
	
	$json_idea = file_get_contents($main_link."/api/?action=get_idea&id=".$id."&comments=active");
	$json_idea = json_decode($json_idea);
	
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
</head>
<body>
	<div class="container">
      <?php echo $main_menu; ?>
      	<div class="row">
	      	<h2><?php echo $json_idea->title; ?></h2>
	      	<div class="panel panel-default">
			  <div class="panel-body">
			  	<?php echo $json_idea->content; ?>
			  </div>
			</div>
			<div class="col-lg-12">
	          <a class="btn btn-sm btn-default" href="#" role="button"><?php echo $content['idea_colletion']['engage_idea_button']; ?></a>
	          <a class="btn btn-sm btn-success" href="#" role="button">
	          	<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo $json_idea->likes;?>
	          </a>
	          <a class="btn btn-sm btn-danger" href="#" role="button">
	          	<i class="fa fa-thumbs-o-down" aria-hidden="true"></i> <?php echo $json_idea->unlikes;?>
	          </a>
	          <?php echo returnPDFIfExists($idea->pdf); ?>
	        </div>
        </div>
        <div class="row">
			<h3><?php echo $content['idea_colletion']['replys_text']; ?>:</h3>
			<div class="well col-md-12">
			  	<?php
				  	if($json_idea->comments > 0){
					  		foreach ($json_idea->comments as $comment) {
					  			echo "
						  			<div class=\"panel panel-default\">
									  <div class=\"panel-heading\">".$comment->owner."</div>
									  <div class=\"panel-body\">".$comment->comment."</div>
									</div>
						  		";
					  		}
				  		}else{
				  			echo "
						  			<h4 class=\"text-center\">".$content['idea_colletion']['replys_noreplys']."</h4>
						  		";
				  		}
			  	?>
			</div>
			<div class="form-group">
			  <textarea class="form-control" rows="5" id="comment"></textarea>
			  <a class="btn btn-lg btn-default pull-right btn-space" href="#" role="button"><?php echo $content['idea_colletion']['post_reply_button']; ?></a>
			</div>
		</div>
      <?php echo $footer; ?>
    </div>
    <script type="text/javascript">
    	$("#menu-randidea").attr("class","active");
    </script> 
</body>
</html>