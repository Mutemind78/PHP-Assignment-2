<?php
try {
    

    // identify which player to remove. use $_GET to read the url param called "playerId"
    $player_id = $_GET['id'];

    // connect to db
    require('shared/db.php');
    
    $sql = "SELECT * FROM players WHERE id = :id";
    $cmd = $db->prepare($sql);
    

    // populate the SQL with the selected postId
    $cmd->bindParam(':id', $player_id, PDO::PARAM_INT);
    

    // execute query in the database
    $cmd->execute();
    $player = $cmd->fetch();   

    // create SQL delete statement
    $sql = "DELETE FROM players WHERE id = :id";
    $cmd = $db->prepare($sql);

    // populate the SQL delete with the selected playerId
    $cmd->bindParam(':id', $player_id, PDO::PARAM_INT);

    // execute delete in the database
    $cmd->execute();

    // disconnect 
    $db = null;

    // redirect to updated players list 
    header('location:players.php');
}
catch (Exception $error) {
    header('location:error.php');
    exit();
}
?>  