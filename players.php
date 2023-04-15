<?php
$title = 'Player List';
require('shared/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>players</title>
    <link rel="stylesheet" href="./css/players.css">
    
</head>
<body>
    
</body>
</html>
<main>
 <h1>Players List</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Height</th>
        <th>Weight</th>
        <th>Skill</th>
        <th>Email</th>
        <th>Team</th>
        <th>Photo</th>
        <th>Edit</th>
        <th>Delete</th>
        
      </tr>
    </thead>
    <tbody>
      <?php
      // connect to the database
      require('shared/db.php');

      // use SELECT to fetch the players
      $sql = "SELECT * FROM players";

      // run the query
      $cmd = $db->prepare($sql);
      $cmd->execute();
      $players = $cmd->fetchAll();

      // loop through the player data to create a table row for each
      foreach ($players as $player) {
        echo '<tr>';
        echo '<td>' . $player['id'] . '</td>';
        echo '<td>' . $player['name'] . '</td>';
        echo '<td>' . $player['age'] . '</td>';
        echo '<td>' . $player['height'] . '</td>';
        echo '<td>' . $player['weight'] . '</td>';
        echo '<td>' . $player['skill'] . '</td>';
        echo '<td>' . $player['email'] . '</td>';
        echo '<td>' . $player['team'] . '</td>';
        echo '<td><img src="img/' . $player['photo'] . '" alt="Upload Photo" /></td>';
        echo '<td><button onclick="location.href=\'editplayer.php?id=' . $player['id'] . '\'">Edit</button></td>';
        echo '<td><button onclick="location.href=\'delete.php?id=' . $player['id'] . '\'">Delete</button></td>';
        echo '</tr>';
      }
      ?>
    </tbody>
  </table>
</main>
<?php require('shared/footer.php'); ?>

