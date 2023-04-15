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
  $photo = $_FILES['photo'];
  

  // connect to the database
  require('shared/db.php');

  // use UPDATE to update the player's information
  $sql = "UPDATE players SET name = :name, age = :age, height = :height, weight = :weight, skill = :skill, email = :email, photo = :photo, team = :team WHERE id = :id";
  $cmd = $db->prepare($sql);
  $cmd->bindValue(':name', $name, PDO::PARAM_STR);
  $cmd->bindValue(':age', $age, PDO::PARAM_INT);
  $cmd->bindValue(':height', $height, PDO::PARAM_INT);
  $cmd->bindValue(':weight', $weight, PDO::PARAM_INT);
  $cmd->bindValue(':skill', $skill, PDO::PARAM_STR);
  $cmd->bindValue(':email', $email, PDO::PARAM_STR);
  $cmd->bindParam(':photo', $photo_name, PDO::PARAM_STR, 100);
  $cmd->bindValue(':team', $team, PDO::PARAM_STR);
  $cmd->bindValue(':id', $id, PDO::PARAM_INT);
  $cmd->execute();

  // if a photo was uploaded, validate & save it 
if (!empty($photo['name'])) {
  $tmp_name = $photo['tmp_name'];
  
  // ensure file is jpg or png
  $type = mime_content_type($tmp_name);
  if ($type != 'image/png' && $type != 'image/jpeg') {
      echo 'Please upload a .png or .jpg';
      $ok = false;
  }

  // create a unique name and save the photo
  $photo_name = session_id() . '-' . $photo['name'];
  move_uploaded_file($tmp_name, 'img/' . $photo_name);
}


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
  <link rel="stylesheet" href="./css/editplayer.css">

  <h1>Edit Player</h1>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data"> 
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
    <fieldset>
        <label for="photo">Photo:</label>
        <input type="file" name="photo" accept=".png,.jpg" />
     </fieldset>
            <?php
         if (!empty($post['photo'])) {
                echo '<img src="img/' . $post['photo'] . '" alt="Upload Photo" />';
           }
            ?> 
        <fieldset>
                <label for="photo">Photo:</label>
                <input type="file" name="photo" accept=".png,.jpg" />
        </fieldset>
    </div>



    <div>
    <label for="team">Team:</label>
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

<?php require('shared/footer.php'); ?>

