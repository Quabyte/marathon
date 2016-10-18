function proceed1() {
	var data = $( "#rooms1" ).val();
	if(data != "") {
		$( "#proceed1" ).removeClass( "disabled" );
	} else {
		$( "#proceed1" ).addClass("disabled");
	}
}

$( "select" ).change( proceed1 );
proceed1();

function proceed2() {
	var data = $( "#rooms2" ).val();
	if(data != "") {
		$( "#proceed2" ).removeClass( "disabled" );
	} else {
		$( "#proceed2" ).addClass("disabled");
	}
}

$( "select" ).change( proceed2 );
proceed2();