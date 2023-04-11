<?php
//require('shared/auth.php');
try {
    // no html required as this is an invisible page
    // it deletes the post then redirects to the updated feed

    // identify which post to remove. use $_GET to read the url param called "postId"
    $player_id = $_GET['id'];

    // connect to db
    require('shared/db.php');
    
    // access control check: does the current user own this post?
    $sql = "SELECT * FROM players WHERE id = :id";
    $cmd = $db->prepare($sql);
    

    // populate the SQL with the selected postId
    $cmd->bindParam(':id', $player_id, PDO::PARAM_INT);
    

    // execute query in the database
    $cmd->execute();
    $player = $cmd->fetch();


    // // ownership check
    // if ($post['user'] != $_SESSION['user']) {
    //     $db = null;
    //     header('location:403.php'); // forbidden
    //     exit();
    // }

    // create SQL delete statement
    $sql = "DELETE FROM players WHERE id = :id";
    $cmd = $db->prepare($sql);

    // populate the SQL delete with the selected postId
    $cmd->bindParam(':id', $player_id, PDO::PARAM_INT);

    // execute delete in the database
    $cmd->execute();

    // disconnect 
    $db = null;

    // redirect to updated feed
    header('location:players.php');
}
catch (Exception $error) {
    header('location:error.php');
    exit();
}
?>