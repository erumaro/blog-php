<?php 
require('../inc/db_connect.php');

try{
$stmt = $db->query("SELECT * FROM blog_tbl");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);	
} catch(PDOexception $e){
	echo $e->getMessage();
}

if(isset($_POST)){
    $title = test_input($_POST["title"]);
    $content = test_input($_POST["content"]);
    $author = test_input($_POST["author"]);
    if(!empty($title) && !empty($content) && !empty($author)){
        $stmt = $db->prepare("
            INSERT INTO blog_tbl (title, content, author)
            VALUES (:title, :content, :author)
        ");
        $stmt->bindValue(":title", $title);
        $stmt->bindValue(":content", $content);
        $stmt->bindValue(":author", $author);
        $stmt->execute();
		header("Location: index.php?status=success");
    } else{
	if(empty($title) || empty($content) || empty($author)){
	echo "<ul>";
	if(empty($title)){
		echo "<li>Title is required</li>";
	}
	if(empty($content)){
		echo "<li>Content is required</li>";
	}
	if(empty($author)){
		echo "<li>Author is required</li>";
	}
	echo "</ul>";
	echo '<a href="createPost.php">Tillbaka</a>';
	}
}
} 

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}