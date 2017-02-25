$(document).ready(function(){

	/* ONCLICK HANDLER FOR THE CLEAR BUTTONS*/
	$('#sa_clear').click( function() {
		sa_clear();
	});
	$('#mc_clear').click( function() {
		mc_clear();
	});
	$('#tf_clear').click( function() {
		tf_clear();
	});
});

/* VALIDATIONS FOR FORM INPUT */

function sa_validation() {
	var isQuestion = true;
	var isAnswer = true;

	if($('#sa-question').val() == "") {
		//changed from modal to text pop up
		document.getElementById("sa_valid_q").innerHTML = "Please enter a question.";
		isQuestion = false;
	} else {
		document.getElementById("sa_valid_q").innerHTML = "";
		isQuestion = true;
	}

	if($('#sa-answer').val() == "") {
		document.getElementById("sa_valid_a").innerHTML = "Please enter an answer.";
		isAnswer = false;
	} else {
		document.getElementById("sa_valid_a").innerHTML = "";
		isAnswer = true;
	}

	if(isQuestion && isAnswer)
		return true;
	else
		event.preventDefault();
	return false;
}
function mc_validation() {
	var isQuestion = true;
	var isText = true;
	var isChecked = true;

	if($('#mc-question').val() == "") {
		document.getElementById("mc_valid_q").innerHTML = "Please enter a question.";
		isQuestion = false;
	} else {
		document.getElementById("mc_valid_q").innerHTML = "";
		isQuestion = true;
	}

	if($("#v1").val() == "" || $("#v2").val() == "" || $("#v3").val() == "" || $("#v4").val() == "") {
		document.getElementById("mc_valid_t").innerHTML = "Please fill out all the options.";
		isText = false;
	} else {
		document.getElementById("mc_valid_t").innerHTML = "";
		isText = true;
	}

	if( $("input[name='mc']:checked").length == 0) {
		document.getElementById("mc_valid_c").innerHTML = "Please indicate the correct option.";
		isChecked = false;
	} else {
		document.getElementById("mc_valid_c").innerHTML = "";
		isChecked = true;
	}

	if(isQuestion && isText && isChecked)
		return true;
	else
		event.preventDefault();
	return false;
}
function tf_validation() {
	var isQuestion = true;
	var isChecked = true;

	if($('#tf-question').val() == "") {
		document.getElementById("tf_valid_q").innerHTML = "Please enter a question.";
		isQuestion = false;
	} else {
		document.getElementById("tf_valid_q").innerHTML = "";
		isQuestion = true;
	}

	if( $("input[name='tf']:checked").length == 0 ) {
		document.getElementById("tf_valid_a").innerHTML = "Please select either true or false.";
		isChecked = false;
	} else {
		document.getElementById("tf_valid_a").innerHTML = "";
		isChecked = true;
	}

	if(isQuestion && isChecked)
		return true;
	else
		event.preventDefault();
	return false;
}

/* CLEAR BUTTON FUNCTIONALITY */

function sa_clear() {
	$('#sa-question').val("");
	$('#sa-answer').val("");
	event.preventDefault();
}
function mc_clear() {
	$('#mc-question').val("");
	$("input:radio[name='mc']").prop("checked", false);
	$(".mc_text").val("");
	event.preventDefault();
}
function tf_clear() {
	$('#tf-question').val("");
	$("#true").prop("checked", false);
	$("#false").prop("checked", false);
	event.preventDefault();
}
