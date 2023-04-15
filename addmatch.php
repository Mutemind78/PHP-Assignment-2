<link rel="stylesheet" href="./css/addmatch.css">

<?php
// include header
$title = "Add Matches";
require("shared/header.php");

// connect to database
require("shared/db.php");

// check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get form data
    $match_date = $_POST['match_date'];
    $opposition_team = $_POST['opposition_team'];
    $venue = $_POST['venue'];
    $team = $_POST['team'];

    // insert data into match_schedule table
    $sql = "INSERT INTO match_schedule (match_id, match_date, opposition_team, venue, team) 
        VALUES (NULL, :match_date, :opposition_team, :venue, :team)";
    $cmd = $db->prepare($sql);
    $cmd->bindValue(':match_date', $match_date, PDO::PARAM_STR);
    $cmd->bindValue(':opposition_team', $opposition_team, PDO::PARAM_STR);
    $cmd->bindValue(':venue', $venue, PDO::PARAM_STR);
    $cmd->bindValue(':team', $team, PDO::PARAM_STR);
    $cmd->execute();

    // redirect to match schedule page
    header("Location: matchschedule.php");
    exit();
}
?>


<body>
    

<form method="post">
<h1>Add Matches</h1>
    <label for="match_date">Match Date:</label>
    <input type="date" id="match_date" name="match_date" required><br><br>

    <label for="opposition_team">Opposition Team:</label>
    <input type="text" id="opposition_team" name="opposition_team" required><br><br>

    <label for="venue">Venue:</label>
    <input type="text" id="venue" name="venue" required><br><br>

    <label for="team">Team:</label>
    <select id="team" name="team" required>
        <option value="" selected disabled>Select a team</option>
        <option value="Team A">Team A</option>
        <option value="Team B">Team B</option>
        <option value="Team C">Team C</option>
        <option value="Team D">Team D</option>
    </select><br><br>

    <input type="submit" value="Add Match">
</form>
</body>
<?php
// include footer
require("shared/footer.php");
?>
