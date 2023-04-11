<?php
$title = 'Edit Player';
require('shared/header.php');

// check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // retrieve the form data
  $id = $_POST['id'];
  $name = $_POST['name'];
  $age = $_POST['age'];
  $height = $_POST['height'];
  $weight = $_POST['weight'];
  $skill = $_POST['skill'];
  $email = $_POST['email'];
  $team = $_POST['team'];

  // connect to the database
  require('shared/db.php');

  // use UPDATE to update the player's information
  $sql = "UPDATE players SET name = :name, age = :age, height = :height, weight = :weight, skill = :skill, email = :email, team = :team WHERE id = :id";
  $cmd = $db->prepare($sql);
  $cmd->bindValue(':name', $name, PDO::PARAM_STR);
  $cmd->bindValue(':age', $age, PDO::PARAM_INT);
  $cmd->bindValue(':height', $height, PDO::PARAM_INT);
  $cmd->bindValue(':weight', $weight, PDO::PARAM_INT);
  $cmd->bindValue(':skill', $skill, PDO::PARAM_STR);
  $cmd->bindValue(':email', $email, PDO::PARAM_STR);
  $cmd->bindValue(':team', $team, PDO::PARAM_STR);
  $cmd->bindValue(':id', $id, PDO::PARAM_INT);
  $cmd->execute();

  // redirect to the player list page
  header('Location: players.php');
  exit();
} else {
  // retrieve the player's id from the query parameter
  $id = $_GET['id'];

  // connect to the database
  require('shared/db.php');

  // use SELECT to fetch the player's information
  $sql = "SELECT * FROM players WHERE id = :id";
  $cmd = $db->prepare($sql);
  $cmd->bindValue(':id', $id, PDO::PARAM_INT);
  $cmd->execute();
  $player = $cmd->fetch();

  // check if the player was found
  if (!$player) {
    // show an error message and redirect to the player list page
    echo '<p>Player not found.</p>';
    echo '<p><a href="players.php">Go back to player list</a></p>';
    exit();
  }
}
?>

<main>
  <h1>Edit Player</h1>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $player['id']; ?>">
    <div>
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" value="<?php echo $player['name']; ?>">
    </div>
    <div>
      <label for="age">Age:</label>
      <input type="number" name="age" id="age" value="<?php echo $player['age']; ?>">
    </div>
    <div>
      <label for="height">Height:</label>
      <input type="number" name="height" id="height" value="<?php echo $player['height']; ?>">
    </div>
    <div>
      <label for="weight">Weight:</label>
      <input type="number" name="weight" id="weight" value="<?php echo$player['weight']; ?>">
    </div>
    <div>
    <label for="skill">Skill:</label>
    <select name="skill" id="skill">
        <option value="Batsman"<?php if ($player['skill'] == 'Batsman') { echo ' selected'; } ?>>Batsman</option>
        <option value="Bowler"<?php if ($player['skill'] == 'Bowler') { echo ' selected'; } ?>>Bowler</option>
        <option value="Allrounder"<?php if ($player['skill'] == 'Allrounder') { echo ' selected'; } ?>>Allrounder</option>
    </select>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $player['email']; ?>">
    </div>
    <div>
    <label for="team">team:</label>
    <select name="team" id="team">
        <option value="Team A"<?php if ($player['team'] == 'Team A') { echo ' selected'; } ?>>Team A</option>
        <option value="Team B"<?php if ($player['team'] == 'Team B') { echo ' selected'; } ?>>Team B</option>
        <option value="Team C"<?php if ($player['team'] == 'Team C') { echo ' selected'; } ?>>Team C</option>
        <option value="Team D"<?php if ($player['team'] == 'Team D') { echo ' selected'; } ?>>Team D</option>
    </select>
</div>

    <div>
    </select>
    </div>
    <button type="submit" name="submit" value="save">Save</button>

  </form>
</main>
