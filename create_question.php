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

<?php
if(isset($_GET["qtype"])) {
	if(isset($_POST["question-name"]))
		$question = $_POST["question-name"];

	if(isset($_POST["sa-answer-name"])) {
		$sa_answer = $_POST["sa-answer-name"];
	} else if(isset($_POST["mc"])) {
		for($i = 0; $i < 4; $i++)
		$option[$i] = $_POST["v" . ($i+1)];
		$mc_checked = $_POST["mc"];
	} else if(isset($_POST["tf"])) {
		$tf_checked = $_POST["tf"];
	}
}
?>

<body>

	<!-- navigation bar -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">JEOPARDY!</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="#">Home</a></li>
				<li class="active"><a href="create_question.php">Create Questions</a></li>
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
					<a href="create_question.php?qtype=sa" id="sa" class= "question-type list-group-item list-group-item-action <?php if($_GET["qtype"] == "sa") echo "active" ?>"><h4>Short Answer</h4></a>
					<a href="create_question.php?qtype=mcq" id="mcq" class="question-type list-group-item list-group-item-action <?php if($_GET["qtype"] == "mcq") echo "active" ?>"><h4>Multiple Choice</h4></a>
					<a href="create_question.php?qtype=tf" id="tf" class="question-type list-group-item list-group-item-action <?php if($_GET["qtype"] == "tf") echo "active" ?>"><h4>True or False</h4></a>
				</div>
			</div>

			<?php if(isset($_GET["qtype"])) { ?>
				<!-- QUESTION FORM DIV -->
				<div class="col-md-7" id="mid">
					<h3>Create the Question</h3>
					<br>

					<?php if($_GET["qtype"] == "sa") { ?>

						<!-- SHORT ANSWER FORM -->
						<form id="short_answer" action="display_question.php?qtype=sa" method="POST" onsubmit="return sa_validation()">
							<div class="form-group">
								<label>Question:</label><br>
								<textarea class="form-control" id="sa-question" name="question-name" rows="2"><?php if(isset($question)) echo $question ?></textarea>
								<p id="sa_valid_q" align="left" style="color:red"></p>
							</div>
							<div class="form-group">
								<label>Answer:</label><br>
								<textarea class="form-control" id="sa-answer" name="sa-answer-name" rows="5"><?php if(isset($sa_answer)) echo $sa_answer ?></textarea>
								<p id="sa_valid_a" align="left" style="color:red"></p>
							</div>
							<button type="submit" id="sa_submit" class="btn btn-success">Submit</button>
							<button type="submit" id="sa_clear" class="btn btn-danger">Clear</button>
						</form>

					<?php } else if($_GET["qtype"] == "mcq") { ?>
						<!-- MULTIPLE CHOICE FORM -->
						<form id="multiple_choice" action="display_question.php?qtype=mcq" method="POST" onsubmit="return mc_validation()">
							<div class="form-group">
								<label>Question:</label><br>
								<textarea class="form-control" id="mc-question" name="question-name" rows="2"><?php if(isset($question)) echo $question ?></textarea>
								<p id="mc_valid_q" align="left" style="color:red"></p>
							</div>
							<label>Options:</label><br>
							<fieldset class="form-group">
								<?php for($i = 0; $i < 4; $i++) { ?>
									<div class="form-check">
										<label class="form-check-label">
											<input type="radio" class="form-check-input" name="mc" value="<?php echo ($i+1)?>" <?php if(isset($mc_checked) && $mc_checked == ($i+1)) echo "checked"?>> &nbsp;&nbsp; <input type="text" name="v<?php echo ($i+1)?>" id="v<?php echo ($i+1)?>" class="mc_text" value="<?php if(isset($option)) echo $option[$i] ?>"></input></input>
										</label>
									</div>
									<?php } ?>
									<p id="mc_valid_t" align="left" style="color:red"></p>
									<p id="mc_valid_c" align="left" style="color:red"></p>
								</fieldset>
								<button type="submit" id="mc_submit" class="btn btn-success" >Submit</button>
								<button type="submit" id="mc_clear" class="btn btn-danger" >Clear</button>
							</form>

					<?php } else if($_GET["qtype"] == "tf") { ?>
						<!-- TRUE OR FALSE FORM -->
						<form id="true_false" action="display_question.php?qtype=tf" method="POST" onsubmit="return tf_validation()">
							<div class="form-group">
								<label>Question:</label><br>
								<textarea class="form-control" id="tf-question" name="question-name" rows="2"><?php if(isset($question)) echo $question ?></textarea>
								<p id="tf_valid_q" align="left" style="color:red"></p>
							</div>
							<label>Answer:</label><br>
							<fieldset class="form-group">
								<div class="form-check">
									<label class="form-check-label">
										<!-- <p><?php if(isset($tf_checked)) echo "checked"?></p> -->
										<input type="radio" class="form-check-input" name="tf" id="true" value="True" <?php if(isset($tf_checked) && $tf_checked == "True") echo "checked"?>>&nbsp;&nbsp;True</input>
									</label>
								</div>
								<div class="form-check">
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="tf" id="false" value="False" <?php if(isset($tf_checked) && $tf_checked == "False") echo "checked"?>>&nbsp;&nbsp;False</input>
									</label>
								</div>
								<p id="tf_valid_a" align="left" style="color:red"></p>
							</fieldset>

							<button type="submit" id="tf_submit" class="btn btn-success" >Submit</button>
							<button type="submit" id="tf_clear" class="btn btn-danger" >Clear</button>
						</form>

					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</body>

<!-- Footer -->
<footer class="footer">
	<p> Copyright 2017, Rohan S Raval (rsr3ve) and Vamshi K Garikapati (vkg5xt)</p>
</footer>
</html>
