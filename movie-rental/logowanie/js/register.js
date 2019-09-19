$('document').ready(function() { 
	$("#register-form").validate({
		submitHandler: submitForm	
	});	   

	function submitForm() {		
		var data = $("#register-form").serialize();				
		$.ajax({				
			type : 'POST',
			url  : 'php/rejestracja.php',
			data : data,
			beforeSend: function(){	
				$("#error").fadeOut();
				$("#register_button").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Rejestrowanie ...');
			},
			success : function(response){						
				if(response=="ok"){									
					$("#register_button").html('&nbsp; Rejestrowanie ...');
					setTimeout(' window.location.href = "../index.php"; ',4000);
				} else {									
					$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger"> &nbsp; '+response+'. </div>');
						$("#register_button").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
					});
				}
			}
		});
		return false;
	}   
});