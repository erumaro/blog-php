<?php
require("/inc/db_connect.php");

try{
$stmt = $db->query("SELECT * FROM blog_tbl;");
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOexception $e){
	echo $e->getMessage();
}
?>

<?php foreach($items as $item){ ?>
<article id="article-<?php echo $item['id']; ?>">
<header>
    <h1><?php echo $item['title']; ?></h1>
</header>
<div>
    <?php echo $item['content']; ?>
</div>
<footer>
    By <?php echo $item['author']; ?> | <?php echo $item['published_date']; ?>
</footer>
</article>
<?php } ?>