// JavaScript Document
$(function() {
	$("#mensaje").hide();
	$("#mensaje2").hide();
	$("#mensaje1").hide();
    $("#ingresarForm").submit( function (e) {
		e.preventDefault();
		$.ajax({
		  url: 'index.php/log/in/' + $("#user").val() + "/" + $("#pass").val(),
		  beforeSend: function () {
				$("#mensaje").hide();
				$("#mensaje2").hide();
				$("#mensaje1").show();
		  },
		  success: function(content){
				$("#mensaje1").hide();
				if (content == "true")
					window.location.reload();
				else if (content == "-1")
					$("#mensaje2").show();
				else
					$("#mensaje").show();
		  }
		});
	});

});
