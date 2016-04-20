<?php 
include('../inc/db_connect.php');

try{
$stmt = $db->query("SELECT * FROM blog_tbl");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);	
} catch(PDOexception $e){
	echo $e->getMessage();
}

if(isset($_POST)){
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $author = trim($_POST['author']);
    if(!empty($title) && !empty($content) && !empty($author)){
        $stmt = $db->prepare("
            INSERT INTO blog_tbl (title, content, author)
            VALUES (:title, :content, :author)
        ");
        $stmt->bindValue(":title", $title);
        $stmt->bindValue(":content", $content);
        $stmt->bindValue(":author", $author);
        $stmt->execute();
    }
    header("Location: index.php");
}