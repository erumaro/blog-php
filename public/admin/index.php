<?php
require("../../inc/db_connect.php");

try{
$stmt = $db->query("SELECT * FROM blog_tbl;");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOexception $e){
	echo $e->getMessage();
}


if(isset($_GET['deletePost'])){ 
    $stmt = $db->prepare('DELETE FROM blog_tbl WHERE id = :id') ;
    $stmt->execute(array(':id' => $_GET['deletePost']));

    header('Location: index.php?action=deleted');
    exit;
} 
?>
<?php include('../header.php'); ?>
    <main>
		<?php 
        if(isset($_GET['status'])){ $status = $_GET['status']; };
		  if(isset($status)){ ?>
			<p class="msg-success">Nytt inlägg har skapats!</p>
		<?php } else if(isset($_GET['action'])){ ?>
            <p class="msg-deleted">Inlägg borttaget!</p>
        <?php } ?>
        <h1>Inlägg <a href="createPost.php">Skapa nytt</a></h1>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(array_reverse($rows) as $row){ ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <?php $content = $row['content']; ?>
                    <td><?php echo htmlspecialchars(substr($content, 0, 30)); ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['published_date']; ?></td>
                    <td><a href="editPost.php?id=<?php echo $row['id'];?>">Edit</a></td>
                    <td><a href="#" onclick="deletePost('<?php echo $row['id']; ?>')">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
<?php include('../footer.php'); ?>