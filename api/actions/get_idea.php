<?php
	if (!$inside) {
		exit("You don't have permission to make this!");
	}
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
	}else{
		exit("Invalid id!");
	}

	class Idea{
		public $id;
		public $title;
		public $content;
		public $likes;
		public $unlikes;
		public $lang;
		public $category;
		public $comments;
	}
	class Comment{
		public $id;
		public $owner;
		public $comment;
	}

	$mysqli = new MySQLi($mysql['servidor'], $mysql['usuario'], $mysql['senha'], $mysql['banco']);
	if (mysqli_connect_errno()){
    	exit('erro');
	}	
	header('Content-type: application/json');

	$stmt = $mysqli->prepare("SELECT * FROM ideas WHERE id=?");
	$stmt->bind_param("s", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$idea = new Idea();
	while ($row = $result->fetch_array()) {
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
	}
	if(!empty($_GET['comments']) && $_GET['comments'] == "active"){
		$stmt2 = $mysqli->prepare("SELECT * FROM ideas_comments WHERE idea_id=?");
		$stmt2->bind_param("s", $id);
		$stmt2->execute();
		$result = $stmt2->get_result();
		if($result->num_rows > 0){
			$idea->comments = array();
			while ($row = $result->fetch_array()) {
				$comment = new Comment();
				$comment->id = $row['id'];
				$comment->owner = $row['owner'];
				$comment->comment = $row['comment'];
				array_push($idea->comments, $comment);
			}
		}
		$stmt2->close();
	}

	$stmt->close();
	$mysqli->close();

	exit(json_encode($idea));
	
?>