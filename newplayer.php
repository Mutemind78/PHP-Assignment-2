<?php
$title = 'New Player Registration';
require('shared/header.php');
?>

<main>
    <h1>New Player Registration</h1>
    <form method="post" action="success.php">
        <fieldset>
            <label for="name">Name: *</label>
            <input type="text" name="name" id="name" required />
        </fieldset>
        <fieldset>
            <label for="height">Height (in cm): *</label>
            <input type="number" name="height" id="height" required />
        </fieldset>
        <fieldset>
            <label for="weight">Weight (in kg): *</label>
            <input type="number" name="weight" id="weight" required />
        </fieldset>
        <fieldset>
            <label for="age">Age: *</label>
            <input type="number" name="age" id="age" required />
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
        <fieldset>
            <label for="email">Email: *</label>
            <input type="email" name="email" id="email" required />
        </fieldset>
        <fieldset>
            <label for="username">Username: *</label>
            <input type="text" name="username" id="username" required />
        </fieldset>
        <fieldset>
            <label for="password">Password: *</label>
            <input type="password" name="password" id="password" required
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
            <img id="imgShowHide" src="img/show.png" alt="Show/Hide"
                onclick="showHide();" />
        </fieldset>
        <fieldset>
            <label for="confirm">Confirm Password: *</label>
            <input type="password" name="confirm" id="confirm" required
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                onkeyup="return comparePasswords();" />
            <span id="pwMsg" class="error"></span>
        </fieldset>
        <button class="btnOffset" onclick="return comparePasswords();">Register</button>
        
    </form>
</main>

<?php require('shared/footer.php'); ?>
