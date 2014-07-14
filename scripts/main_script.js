$("#submitbutton").click( function() {
	 	$.post( $("#employee_form").attr("action"),
	    $("#employee_form :input").serializeArray(),
	    function(info){ $("#result").html(info);
  });
});

$("#employee_form").submit( function() {
  return false;
});
