<?php 
include('../inc/db_connect.php');

try{
$stmt = $db->prepare("UPDATE blog_tbl SET title = :title, content = :content, author = :author WHERE id = :id");
$stmt->execute(array(
    ':title' => $title,
    ':content' => $content,
    ':author' => $author,
    ':id' => $id
));	
    
header('Location: index.php?action=updated');
exit;
} catch(PDOexception $e){
	echo $e->getMessage();
}