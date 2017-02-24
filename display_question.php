<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Jeopardy!</title>

		<!-- Bootstrap -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- jQuery library -->
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>

		<!-- Javascript file -->
		<script src="create_question.js"></script>
		<!-- CSS file -->
		<link href="stylesheet.css" rel="stylesheet">
	</head>

	<body>

		<!-- navigation bar -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
	      	<div class="navbar-header">
	          <a class="navbar-brand" href="#">JEOPARDY!</a>
	        </div>
	          <ul class="nav navbar-nav">
	            <li><a href="#">Home</a></li>
	            <li><a href="create_question.php">Create Questions</a></li>
				<li class="active"><a href="display_question.php">Display Question</a></li>
	            <li><a href="#">Play the Game</a></li>
				<li><a href="#">About Us</a></li>
	          </ul>
	        </div>
	    </nav>

		<!-- Heading Div -->
		<div class="container theme-showcase" id="header-div" role="main" >
			<div class="jumbotron">
	          <h3>Display Question</h3>
			  <p>This page displays your most recently submitted question.</p>
	        </div>
		</div>

		<!-- Main Content Div -->
		<div class="container">
			<div class="row">
				<div class="col-md-7">

				</div>
			</div>
		</div>

	</body>
 	<!-- Footer -->
	<footer class="footer">
		<p> Copyright 2017, Rohan S Raval (rsr3ve) and Vamshi K Garikapati (vkg5xt)</p>
	</footer>

</html>
