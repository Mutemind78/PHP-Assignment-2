<?php
// include header
$title = "Match Schedule";
require("shared/header.php");

// connect to database
require("shared/db.php");

// select data from match_schedule table
$sql = "SELECT * FROM match_schedule";
$stmt = $db->prepare($sql);
$stmt->execute();
$matches = $stmt->fetchAll();

// display table of match schedule
echo "<h1>Match Schedule</h1>";
echo "<table>";
echo "<tr><th>ID</th>
      <th>Match Date</th>
      <th>Opposition Team</th>
      <th>Venue</th></tr>";
foreach ($matches as $match) {
    echo "<tr>";
    echo "<td>" . $match['match_id'] . "</td>";
    echo "<td>" . $match['match_date'] . "</td>";
    echo "<td>" . $match['opposition_team'] . "</td>";
    echo "<td>" . $match['venue'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// include footer
require("shared/footer.php");
?>
