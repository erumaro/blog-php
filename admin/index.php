<?php
require("../inc/db_connect.php");

try{
$stmt = $db->query("SELECT * FROM blog_tbl;");
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                <?php foreach($items as $item){ ?>
                <tr>
                    <td><?php echo $item['title']; ?></td>
                    <?php $content = $item['content']; ?>
                    <td><?php echo substr($content, 0, 30); ?></td>
                    <td><?php echo $item['author']; ?></td>
                    <td><?php echo $item['published_date']; ?></td>
                    <td><a href="editPost.php?id=<?php echo $item['id'];?>">Edit</a></td>
                    <td><a href="javascript:deletePost('<?php echo $item['id']; ?>')">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
<?php include('../footer.php'); ?>