<!DOCTYPE html>

<html>
<head>
	<title>Cricket Management System</title>
    <link rel="stylesheet" href="./css/header.css">
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="home.php">BCCI</a></li>
				<li><a href="newplayer.php">New Player</a></li>
				<li><a href="players.php">Players</a></li>
				<li><a href="team.php">Teams</a></li>
				<li><a href="matchschedule.php">Match Schedule</a></li>
			</ul>
			<?php
				session_start();
				if(isset($_SESSION['player_id']) && $_SESSION['status'] == "logged_in"){
					echo '<a href="logout.php">Logout</a>';
				}else{
					echo '<a href="login.php">Login</a>';
				}
			?>
		</nav>
	</header>

  