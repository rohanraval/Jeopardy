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
	$question = $_POST["question-name"];

	if($_GET["qtype"] == "sa") {
		$sa_answer = $_POST["sa-answer-name"];
	} else if($_GET["qtype"] == "mcq") {
		for($i = 0; $i < 4; $i++)
		$option[$i] = $_POST["v" . ($i+1)];
		$mc_checked = $_POST["mc"];
	} else {
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
				<li><a href="create_question.php">Create Questions</a></li>
				<li><a href="#">Play the Game</a></li>
				<li><a href="#">About Us</a></li>
			</ul>
		</div>
	</nav>

	<!-- Heading Div -->
	<div class="container theme-showcase" id="header-div" role="main" >
		<div class="jumbotron">
			<h3>Submission Page</h3>
			<p>Please confirm the submission of this question.</p>
		</div>
	</div>

	<!-- Main Content Div -->
	<div class="container" style = "height:400px;">
		<div class="row" style = "height:100%;">
			<?php if(isset($_GET["qtype"])) { ?>
				<div class="col-md-3" style = "height:100%;">
					<div style = "height:100%; ">
						<button type="submit" class="btn btn-danger btn-block" style = "height:100%;" form="<?php
							if($_GET["qtype"] == "sa")
								echo "short_answer";
							else if($_GET["qtype"] == "mcq")
								echo "multiple_choice";
							else echo "true_false";
							?>">
							<h3>&#8678; Edit</h3>
						</button>
					</div>
				</div>

				<div class="col-md-6" id="display-mid">

					<?php if($_GET["qtype"] == "sa") { ?>
						<h3>Short Answer Question</h3><br>
						<!-- SHORT ANSWER FORM -->
						<form id="short_answer" action="create_question.php?qtype=sa" method="POST">
							<div class="form-group">
								<label>Submitted Question:</label><br>
								<textarea class="form-control" id="sa-question" name="question-name" rows="2" readonly><?php if(isset($question)) echo $question ?></textarea>
							</div>
							<div class="form-group">
								<label>Submitted Answer:</label><br>
								<textarea class="form-control" id="sa-answer" name="sa-answer-name" rows="5" readonly><?php if(isset($sa_answer)) echo $sa_answer ?></textarea>
							</div>
						</form>

					<?php } else if($_GET["qtype"] == "mcq") { ?>
						<h3>Multiple Choice Question</h3><br>
						<!-- MULTIPLE CHOICE FORM -->
						<form id="multiple_choice" action="create_question.php?qtype=mcq" method="POST">
							<div class="form-group">
								<label>Submitted Question:</label><br>
								<textarea class="form-control" id="mc-question" name="question-name" rows="2" readonly><?php if(isset($question)) echo $question ?></textarea>
							</div>
							<label>Submitted Options:</label><br>
							<fieldset class="form-group">
								<?php for($i = 0; $i < 4; $i++) { ?>
									<div class="form-check">
										<label class="form-check-label">
											<input type="radio" class="form-check-input" name="mc" value="<?php echo ($i+1)?>" <?php echo ($mc_checked == ($i+1)) ? "checked" : "disabled" ?>>&nbsp;&nbsp;<input type="text" name="v<?php echo ($i+1)?>" id= "v<?php echo ($i+1)?>" class="mc_text" value="<?php echo $option[$i] ?>" readonly></input></input>
										</label>
									</div>
								<?php } ?>
							</fieldset>
						</form>

					<?php } else { ?>
						<h3>True or False Question</h3><br>
						<!-- TRUE OR FALSE FORM -->
						<form id="true_false" action="create_question.php?qtype=tf" method="POST">
							<div class="form-group">
								<label>Submitted Question:</label><br>
								<textarea class="form-control" id="tf-question" name="question-name" rows="2" readonly><?php if(isset($question)) echo $question ?></textarea>
							</div>
							<label>Submitted Answer:</label><br>
							<fieldset class="form-group">
								<div class="form-check">
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="tf" id="true" value="True" <?php echo ($tf_checked == "True") ? "checked" : "disabled" ?>>&nbsp;&nbsp;True</input>
									</label>
								</div>
								<div class="form-check">
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="tf" id="false" value="False" <?php echo ($tf_checked == "False") ? "checked" : "disabled" ?>>&nbsp;&nbsp;False</input>
									</label>
								</div>
							</fieldset>
						</form>
					<?php } ?>

				</div>

				<div class="col-md-3" style = "height:100%;">
					<div style = "height:100%;">
						<button type="button" class="btn btn-success btn-block" style = "height:100%;"><h3> Confirm &#8680;</h3></button>
					</div>
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
