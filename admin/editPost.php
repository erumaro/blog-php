<?php require('../inc/db_connect.php');
$uid = $_GET['id'];
$stmt = $db->query("SELECT * FROM blog_tbl WHERE id = '$uid'");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
include('../header.php'); ?>
    <main>
		<?php foreach($rows as $row){ ?>
        <h1>Redigera inlägg</h1>
        <form id="post" action="edit.php?id=<?php echo $row['id'];?>" method="post">
            <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
            <textarea name="content"><?php echo $row['content']; ?></textarea>
            <input type="text" name="author" value="<?php echo $row['author']; ?>" required>
            <input class="submit" type="submit" value="Spara redigering">
        </form>
		<?php } ?>
    </main>
<?php include('../footer.php'); ?>