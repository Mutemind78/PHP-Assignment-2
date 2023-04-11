<?php
$title = 'Registration Successful';
require('shared/header.php');

// Connect to the database
require('shared/db.php');

// Prepare the SQL statement
$sql = "INSERT INTO players (name, username, height, weight, age, skill, password, confirm_password, email, team)
        VALUES (:name, :username, :height, :height, :age, :skill, :password, :confirm_password, :email, :team)";

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




// Execute the SQL statement
$cmd->execute();
?>

<main>
    <h1>Registration Successful</h1>
    <p>Thank you for registering!</p>
</main>

<?php require('shared/footer.php'); ?>
