<!DOCTYPE html>

<html>
<head>
	<title>Cricket Management System</title>
    <link rel="stylesheet" href="./css/header.css">
</head>
<?php session_start(); ?>
    
<body>
	<header>
		<nav>
			<ul>
				<li><a href="home.php">BCCI</a></li>
				<li><a href="newplayer.php">New Player</a></li>
                <?php
				if(isset($_SESSION['status'])) { ?>
				<li><a href="players.php">Players</a></li>
				<li><a href="team.php">Teams</a></li>
				<li><a href="matchschedule.php">Match Schedule</a></li>
                <?php } ?>
			</ul>
			<?php
				if(isset($_SESSION['status'])){
                    if($_SESSION['status']) {
                        echo '<a href="logout.php">Logout</a>';  
                    }
				}else{
					echo '<a href="login.php">Login</a>';
				}
			?>
		</nav>
	</header>

  