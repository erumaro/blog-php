<?php 
require('../inc/db_connect.php');

if(isset($_POST)){
	$ed_id = $_GET['id'];
    $ed_title = trim($_POST['title']);
    $ed_content = trim($_POST['content']);
    $ed_author = trim($_POST['author']);
    if(!empty($ed_title) && !empty($ed_content) && !empty($ed_author)){
		try{
        $stmt = $db->prepare("
			UPDATE blog_tbl
			SET title = :title,
			content = :content,
			author = :author
			WHERE id = $ed_id
        ");
        $stmt->bindValue(":title", $ed_title);
        $stmt->bindValue(":content", $ed_content);
        $stmt->bindValue(":author", $ed_author);
        $stmt->execute();
		} catch(PDOexception $e){
	echo $e->getMessage();
}
    }
    //header("Location: index.php");
}
?>