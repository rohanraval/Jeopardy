$(document).ready(function(){

	/* VIEWING FORM */
	$('#mid').hide();
	$('#short_answer').hide();
	$('#multiple_choice').hide();
	$('#true_false').hide();

	/* CLICKING QUESTION TYPE FORM */
	$('.question-type').click( function () {
		$('#mid').show();
		if(this.id == "sa") {
			$('#sa').siblings('a').removeClass('active');
			$('#sa').addClass('active');

			$('#short_answer').show();
			$('#multiple_choice').hide();
			$('#true_false').hide();
		}
		if (this.id == "mcq") {
			$('#mcq').siblings('a').removeClass('active');
			$('#mcq').addClass('active');

			$('#multiple_choice').show();
			$('#short_answer').hide();
			$('#true_false').hide();
		}
		if (this.id == "tf") {
			$('#tf').siblings('a').removeClass('active');
			$('#tf').addClass('active');

			$('#true_false').show();
			$('#short_answer').hide();
			$('#multiple_choice').hide();
		}
	});

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
		alert("Please fill out the question.");
		isQuestion = false;
	}
	if($('#sa-answer').val() == "") {
		alert("Please fill out the answer.");
		isAnswer = false;
	}
	return isQuestion && isAnswer;
}
function mc_validation() {
	var isQuestion = true;
	var isText = true;
	var isChecked = true;

	if($('#mc-question').val() == "") {
		alert("Please fill out the question.");
		isQuestion = false;
	}
	if($(".mc_text").val() == "") {
		alert("Please fill out all the options.");
		isText = false;
	}
	if( $("input[name='mc']:checked").length == 0) {
		alert("Please indicate the correct option.");
		isChecked = false;
	}
	return isQuestion && isText && isChecked;
}
function tf_validation() {
	var isQuestion = true;
	var isChecked = true;
	if($('#tf-question').val() == "") {
		alert("Please fill out the question.");
		isQuestion = false;
	}
	if( $("input[name='tf']:checked").length == 0 ) {
		alert("Please select either true or false.");
		isChecked = false;
	}
	return isQuestion && isChecked;
}

/* CLEAR BUTTON */
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
