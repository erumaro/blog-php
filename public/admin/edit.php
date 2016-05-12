<?php 
require('../../inc/db_connect.php');

try{
$stmt = $db->query("SELECT * FROM blog_tbl");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);	
} catch(PDOexception $e){
	echo $e->getMessage();
}

if(isset($_POST)){
    $ed_id = $_GET['id'];
    $ed_title = test_input($_POST["title"]);
    $ed_content = test_input($_POST["content"]);
    $ed_author = test_input($_POST["author"]);
    if(!empty($title) && !empty($content) && !empty($author)){
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
		header("Location: index.php?status=success");
    } else{
	if(empty($ed_title) || empty($ed_content) || empty($ed_author)){
	echo "<ul>";
	if(empty($ed_title)){
		echo "<li>Title is required</li>";
	}
	if(empty($ed_content)){
		echo "<li>Content is required</li>";
	}
	if(empty($ed_author)){
		echo "<li>Author is required</li>";
	}
	echo "</ul>"; ?>
	<a href="editPost.php?id=<?php echo $_GET['id'];?>">Tillbaka</a>
    <?php
	}
}
} 

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}