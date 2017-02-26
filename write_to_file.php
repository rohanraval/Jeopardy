<?php
	$filename = "submission.txt";

	if(file_exists($filename)) {
		$myfile = fopen($filename, 'a') or die("Unable to open file!");
	} else {
		$myfile = fopen($filename, 'w') or die("Unable to open file!");
	}

	chmod($filename, 0777); //set permission

	$write_text = "Submission {$_SESSION["count"]} \n" . get_write_text() . "\n";

	fwrite($myfile, $write_text);
	fclose($myfile);
	$_SESSION["count"]++;
?>

<?php
	function get_write_text() {
		$write = "";
		global $data;
		if($_GET["qtype"] == "sa") {
			$write .= "\tQuestion Type : Short Answer \n";
			$write .= "\tSubmitted Question : " . $data["question"] . "\n";
			$write .= "\tSubmitted Answer : " . $data["sa_answer"] . "\n";
		}
		elseif($_GET["qtype"] == "mcq") {
			$write .= "\tQuestion Type : Multiple Choice \n";
			$write .= "\tSubmitted Question : " . $data["question"] . "\n";
			$write .= "\tSubmitted Options : " . $data["option0"] . ", " . $data["option1"] . ", " . $data["option2"] . ", " . $data["option3"] . "\n";
			$write .= "\tCorrect Option : " . $data["option" . ($data["mc_checked"]+1)] . "\n";
		}
		elseif($_GET["qtype"] == "tf") {
			$write .= "\tQuestion Type : True or False \n";
			$write .= "\tSubmitted Question : " . $data["question"] . "\n";
			$write .= "\tSubmitted Answer : " . $data["tf_checked"] . "\n";
		}
		return $write;
	}
 ?>
