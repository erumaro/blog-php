<?php include('../header.php'); ?>
    <main>
        <h1>Skapa nytt inlägg</h1>
        <form id="post" action="post.php" method="post">
            <input type="text" name="title" placeholder="Ange titel här" required>
            <textarea name="content"></textarea>
            <input type="text" name="author" placeholder="Ange författare" required>
            <input class="submit" type="submit" value="Skapa inlägg">
        </form>
    </main>
<?php include('../footer.php'); ?>