<?php
	if(empty($inside) || !$inside){
		exit("You don't have permission to make this!");
	}
	
	class Idea{
		public $title;
		public $content;
		public $likes;
		public $unlikes;
		public $lang;
		public $category;
	}
	$idea = new Idea();
	if(!empty($_POST['title'])){
			$idea->title = $_POST['title'];
	}else{
		exit("CAMPO_INVALIDO");
	}
echo $idea->title;
/*
	$mysqli = new MySQLi($mysql['servidor'], $mysql['usuario'], $mysql['senha'], $mysql['banco']);
	if (mysqli_connect_errno()){
    	exit('erro');
	}	

	$idea_stmt = $mysqli->prepare("INSERT INTO dc_processos(title, content, lang, category) VALUES (?, ?, ?, ?)");

	$idea_stmt->bind_param("ssss", $rnome, $rautostart);
	if($idea_stmt->execute()){
		echo "SUCESSO";
	}else{
		echo "PROCESSO_EXISTENTE";
	}

	$idea_stmt->close();
	$mysqli->close();
	*/
?>