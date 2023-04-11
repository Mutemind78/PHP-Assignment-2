<?php
$title = "Team Information";
require("shared/header.php");
?>

<main>
    <h1>Team Information</h1>

    <table>
        <tr>
            <th>Team Name</th>
            <th>Team Captain</th>
            <th>Coach Name</th>
        </tr>

        

        <?php

        // connect to the database
         require('shared/db.php');

        $query = "SELECT * FROM team";
        $cmd = $db->prepare($query);
        $cmd->execute();
        $rows = $cmd->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['team_name'] . "</td>";
            echo "<td>" . $row['team_captain'] . "</td>";
            echo "<td>" . $row['coach_name'] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>
</main>

<?php require("shared/footer.php"); ?>
