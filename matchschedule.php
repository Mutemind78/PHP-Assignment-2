<link rel="stylesheet" href="./css/matchschedule.css">

<?php
// include header
$title = "Match Schedule";
require("shared/header.php");

// connect to database
require("shared/db.php");

// select data from match_schedule table
$sql = "SELECT * FROM match_schedule";
$cmd = $db->prepare($sql);
$cmd->execute();
$matches = $cmd->fetchAll();

// display table of match schedule
echo "<div class='title-container'><h1>Match Schedule</h1><div class='add-match-link'><a href='addmatch.php'>Add New Match</a></div></div>";
echo "<table>";
echo "<tr><th>ID</th>
      <th>Match Date</th>
      <th>Opposition Team</th>
      <th>Venue</th>
      <th>Team</th></tr>";

foreach ($matches as $match) {
    echo "<tr>";
    echo "<td>" . $match['match_id'] . "</td>";
    echo "<td>" . $match['match_date'] . "</td>";
    echo "<td>" . $match['opposition_team'] . "</td>";
    echo "<td>" . $match['venue'] . "</td>";
    echo "<td>" . $match['team'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// include footer
require("shared/footer.php");
?>
