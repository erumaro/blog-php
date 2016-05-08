<?php
require("/inc/db_connect.php");

try{
$stmt = $db->query("SELECT * FROM blog_tbl;");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOexception $e){
	echo $e->getMessage();
}
?>

<?php foreach(array_reverse($rows) as $row){ ?>
<article id="article-<?php echo $row['id']; ?>">
<header>
    <h1><?php echo $row['title']; ?></h1>
</header>
<div>
    <?php echo $row['content']; ?>
</div>
<footer>
    By <?php echo $row['author']; ?> | <?php echo $row['published_date']; ?>
</footer>
</article>
<?php } ?>