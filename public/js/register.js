function register() {
	var data1 = $( "#attendees1" ).val();
  	var data2 = $( "#attendees2" ).val();
  	var data3 = $( "#attendees3" ).val();
  	if(data1 != "0" || data2 != "0" || data3 != "0") {
  		$( "#register" ).removeClass( "disabled" );
  	} else {
  		$( "#register" ).addClass("disabled");
  	}
}

$( "select" ).change( register );
register();