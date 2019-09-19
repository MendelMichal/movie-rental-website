$('document').ready(function() { 
	$("#login-form").validate({
		submitHandler: submitForm	
	});	   

	function submitForm() {		
		var data = $("#login-form").serialize();				
		$.ajax({				
			type : 'POST',
			url  : 'php/spr_logowanie.php',
			data : data,
			beforeSend: function(){	
				$("#error").fadeOut();
				$("#login_button").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Sprawdzanie ...');
			},
			success : function(response){						
				if(response=="ok"){									
					$("#login_button").html('&nbsp; Logowanie ...');
					setTimeout(' window.location.href = "../index.php"; ',4000);
				} else {									
					$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger"> &nbsp; '+response+'. </div>');
						$("#login_button").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
					});
				}
			}
		});
		return false;
	}   
});