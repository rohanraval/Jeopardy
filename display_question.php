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
	          <h3>Create Questions</h3>
			  <p>Welcome! Here you can create your own Jeopardy questions.</p>
	        </div>
		</div>

		<!-- Main Content Div -->
		<div class="container">
			<div class="row">

				<!-- SELECT QUESTION TYPE DIV -->
				<div class="col-md-4" id="left">
				<h3>Choose Question Type</h3>
					<div class="list-group">
					  <a href="#" id="sa" class="question-type list-group-item list-group-item-action"><h4>Short Answer</h4></a>
					  <a href="#" id="mcq" class="question-type list-group-item list-group-item-action"><h4>Multiple Choice</h4></a>
					  <a href="#" id="tf" class="question-type list-group-item list-group-item-action"><h4>True or False</h4></a>
					</div>
				</div>


				<!-- QUESTION FORM DIV -->
				<div class="col-md-7" id="mid">
					<h3>Create the Question</h3>
					<br>

					<!-- SHORT ANSWER FORM -->
					<form id="short_answer" action="formHandler.php" method="POST" onsubmit="return sa_validation()">
					  <div class="form-group">
					    <label>Question:</label><br>
					    <textarea class="form-control" id="sa-question" name="question-name" rows="2"></textarea>
					  </div>
					  <div class="form-group">
						  <label>Answer:</label><br>
						  <textarea class="form-control" id="sa-answer" name="sa-answer-name" rows="5"></textarea>
					  </div>
					  <button type="submit" id="sa_submit" class="btn btn-success">Submit</button>
					  <button type="submit" id="sa_clear" class="btn btn-danger">Clear</button>
					</form>

					<!-- MULTIPLE CHOICE FORM -->
					<form id="multiple_choice" action="formHandler.php" method="POST" onsubmit="return mc_validation()">
						<div class="form-group">
  					    	<label>Question:</label><br>
  					    	<textarea class="form-control" id="mc-question" name="question-name" rows="2"></textarea>
  					  	</div>
					  	<label>Options:</label><br>
						<fieldset class="form-group">
					      <div class="form-check">
					        <label class="form-check-label">
					          <input type="radio" class="form-check-input" name="mc" value = "1">&nbsp;&nbsp;<input type="text" name="v1" class="mc_text"></input></input>
					        </label>
					      </div>
						  <div class="form-check">
					        <label class="form-check-label">
					          <input type="radio" class="form-check-input" name="mc" value = "2">&nbsp;&nbsp;<input type="text" name="v2" class="mc_text"></input></input>
					        </label>
					      </div>
						  <div class="form-check">
					        <label class="form-check-label">
					          <input type="radio" class="form-check-input" name="mc" value = "3">&nbsp;&nbsp;<input type="text" name="v3" class="mc_text"></input></input>
					        </label>
					      </div>
						  <div class="form-check">
					        <label class="form-check-label">
					          <input type="radio" class="form-check-input" name="mc" value = "4">&nbsp;&nbsp;<input type="text" name="v4" class="mc_text"></input></input>
					        </label>
					      </div>

					    </fieldset>
					  	<button type="submit" id="mc_submit" class="btn btn-success" >Submit</button>
					  	<button type="submit" id="mc_clear" class="btn btn-danger" >Clear</button>
					</form>

					<!-- TRUE OR FALSE FORM -->
					<form id="true_false" action="formHandler.php" method="POST" onsubmit="return tf_validation()">
					  <div class="form-group">
					    <label>Question:</label><br>
					    <textarea class="form-control" id="tf-question" name="question-name" rows="2"></textarea>
					  </div>

					  <fieldset class="form-group">
						  <div class="form-check">
					        <label class="form-check-label">
					          <input type="radio" class="form-check-input" name="tf" id="true" value="True">&nbsp;&nbsp;True</input>
					        </label>
					      </div>
						  <div class="form-check">
					        <label class="form-check-label">
					          <input type="radio" class="form-check-input" name="tf" id="false" value="False">&nbsp;&nbsp;False</input>
					        </label>
					      </div>
					  </fieldset>

					  <button type="submit" id="tf_submit" class="btn btn-success" >Submit</button>
					  <button type="submit" id="tf_clear" class="btn btn-danger" >Clear</button>
					</form>
				</div>

			</div>

		</div>

	</body>
 	<!-- Footer -->
	<footer class="footer">
		<p> Copyright 2017, Rohan S Raval (rsr3ve) and Vamshi K Garikapati (vkg5xt)</p>
	</footer>

</html>
