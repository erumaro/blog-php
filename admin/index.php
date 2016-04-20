<?php
require("../inc/db_connect.php");

try{
$stmt = $db->query("SELECT * FROM blog_tbl;");
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOexception $e){
	echo $e->getMessage();
}
?>
<?php include('../header.php'); ?>
    <main>
        <h1>Inlägg <a href="createPost.php">Skapa nytt</a></h1>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($items as $item){ ?>
                <tr>
                    <td><?php echo $item['title']; ?></td>
                    <td><?php echo $item['author']; ?></td>
                    <td><?php echo $item['published_date']; ?></td>
                    <td><a href="editPost.php">Edit</a></td>
                    <td><a href="deletePost.php">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
<?php include('../footer.php'); ?>