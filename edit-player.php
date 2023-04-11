<?php
$title = 'Edit Player';
require('shared/header.php');
    require('shared/db.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id = $_POST['id'];
    
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
    else{

    }
  // retrieve the player's id from the query parameter
    

  // use UPDATE to update the player's information
  $sql = "UPDATE players SET name = :name, age = :age, height = :height, weight = :weight, skill = :skill, team = :team WHERE id = :id";
  $cmd = $db->prepare($sql);
  $cmd->bindValue(':name', $player['name'], PDO::PARAM_STR);
  $cmd->bindValue(':age', $player['age'], PDO::PARAM_INT);
  $cmd->bindValue(':height', $player['height'], PDO::PARAM_INT);
  $cmd->bindValue(':weight', $player['weight'], PDO::PARAM_INT);
  $cmd->bindValue(':skill', $player['skill'], PDO::PARAM_STR);
  $cmd->bindValue(':team', $player['team'], PDO::PARAM_STR);
  $cmd->bindValue(':id', $id, PDO::PARAM_INT);
  $cmd->execute();

  // redirect to the player list page
  header('Location: players.php');
  exit();

?>

<main>
<h1>Edit Player Details</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="id" value="<?php echo $player['id']; ?>">
        <fieldset>
            <label for="name">Name: *</label>
            <input type="text" name="name" id="name" required value="<?php echo $player['name']; ?>" />
        </fieldset>
        <fieldset>
            <label for="height">Height (in cm): *</label>
            <input type="number" name="height" id="height" required value="<?php echo $player['height']; ?>" />
        </fieldset>
        <fieldset>
            <label for="weight">Weight (in kg): *</label>
            <input type="number" name="weight" id="weight" required value="<?php echo $player['weight']; ?>" />
        </fieldset>
        <fieldset>
            <label for="age">Age: *</label>
            <input type="number" name="age" id="age" required value="<?php echo $player['age']; ?>" />
        </fieldset>
        <fieldset>
            <label for="skill">Skill: *</label>
            <select name="skill" id="skill" required>
                <option value="" selected disabled>Skill</option>
                <option value="batsman">Batsman</option>
                <option value="bowler">Bowler</option>
                <option value="allrounder">All-Rounder</option>
            </select>
        </fieldset>
        <fieldset>
            <label for="team">Team:</label>
            <select name="team" id="team">
                <option value="" selected disabled>TEAMS</option>
                <option value="Team A">Team A</option>
                <option value="Team B">Team B</option>
                <option value="Team C">Team C</option>
                <option value="Team D">Team D</option>
            </select>
        </fieldset>
       
        <button type="submit" name="submit" value="save">Save</button>
        
    </form>
</main>
