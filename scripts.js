function deletePost(id){
    if(confirm("You are about to delete the post '" + id + "'")){
        window.location.href = 'index.php?deletePost=' + id;
    };
}