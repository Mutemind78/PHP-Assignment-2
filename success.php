<?php
$title = 'Registration Successful';
require('shared/header.php');

// Connect to the database
require('shared/db.php');

// Prepare the SQL statement
$sql = "INSERT INTO players (name, username, height, weight, age, skill, password, confirm_password, email, team, photo)
        VALUES (:name, :username, :height, :height, :age, :skill, :password, :confirm_password, :email, :team, :photo)";


// Bind the parameters
$cmd = $db->prepare($sql);
$name = $_POST['name'];
$username = $_POST['username'];
$height = $_POST['height'];
$height = $_POST['weight'];
$age = $_POST['age'];
$skill = $_POST['skill'];
$team = $_POST['team'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm'];
$email = $_POST['email'];
$photo = $_FILES['photo'];

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

$cmd->bindParam(':name', $name, PDO::PARAM_STR);
$cmd->bindParam(':username', $username);
$cmd->bindParam(':height', $height);
$cmd->bindParam(':weight', $weight);
$cmd->bindParam(':age', $age);
$cmd->bindParam(':skill', $skill);
$cmd->bindParam(':team', $team);
$cmd->bindParam(':password', $password);
$cmd->bindParam(':confirm_password', $confirm_password);
$cmd->bindParam(':email', $email);
$cmd->bindParam(':photo', $photo_name, PDO::PARAM_STR, 100);





// Execute the SQL statement
$cmd->execute();
?>

<main>
    <link rel="stylesheet" href="./css/success.css">
    <h1>You are successfully got registered to BCCI!</h1>
    <p>Enjoy your cricket and click here to <a href="login.php">login</a> into BCCI</p>
</main>

<?php require('shared/footer.php'); ?>
