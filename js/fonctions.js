function onglet(el,ca) {
    if ( $ca.is( ":hidden" ) ) {
		$ca.show( "slow" );
		$el.animate({tranform: rotate(0deg)}, 2000);
	} else {
		$ca.hide( "slow" );
		$el.animate({tranform: rotate(90deg)}, 2000);
	}
}

function moins() {
	$(".elem").hide("slow");
	$("#moins").hide("slow");
	$("#plus").show("slow");
	$("#menu").animate({width: "5%"}, 2000 );
	$("section").animate({width: "74%",
    	left: "6%"}, 2000);
}

function plus() {
	$(".elem").show("slow");
	$("#plus").hide("slow");
	$("#moins").show("slow");
	$("#menu").animate({width: "13%"}, 2000);
	$("section").animate({width: "64%",
		left: "15%"}, 2000);
}