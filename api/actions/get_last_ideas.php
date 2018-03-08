<?php
	if (!$inside) {
		exit("You don't have permission to make this!");
	}
	
	class Idea{
		public $id;
		public $title;
		public $content;
		public $likes;
		public $unlikes;
		public $lang;
		public $category;
	}

	$mysqli = new MySQLi($mysql['servidor'], $mysql['usuario'], $mysql['senha'], $mysql['banco']);
	if (mysqli_connect_errno()){
    	exit('erro');
	}	

	$query = 'SELECT * FROM ideas ORDER BY id DESC LIMIT 3';
	$result = $mysqli->query($query)
	or exit('erro');
	$ideas = array();
	header('Content-type: application/json');
	while ($row = $result->fetch_array(MYSQL_BOTH)) {
		$idea = new Idea();
		$idea->id = $row['id'];
		$idea->title = $row['title'];
		$idea->content = $row['content'];
		$idea->likes = $row['likes'];
		$idea->unlikes = $row['unlikes'];
		$idea->lang = $row['lang'];
		$idea->category = $row['category'];
		$idea->owner = $row['owner'];
		$idea->source = $row['source'];
		$idea->pdf = $row['pdf'];
		array_push($ideas, $idea);
	}
	echo json_encode($ideas);
	
	
?>