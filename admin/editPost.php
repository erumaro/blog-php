<?php
require("../inc/db_connect.php");

try{
$stmt = $db->prepare('SELECT id, title, content, author FROM blog_tbl WHERE id = :id');
$stmt->execute(array(':id' => $_GET['id']));
$item = $stmt->fetch();
} catch(PDOexception $e){
	echo $e->getMessage();
}
?>
<?php include('../header.php'); ?>
    <main>
        <h1>Skapa nytt inlägg</h1>
        <form id="post" action="edit.php" method="post">
            <input type="text" name="title" required value="<?php echo $item['title']; ?>">
            <textarea name="content"><?php echo $item['content']; ?></textarea>
            <input type="text" name="author" value="<?php echo $item['author']; ?>" required>
            <input class="submit" type="submit" value="Redigera inlägg">
        </form>
    </main>
<?php include('../footer.php'); ?>