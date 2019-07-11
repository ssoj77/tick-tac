function onglet(el,ca,ma) {
    if ( $(ca).is( ":hidden" ) ) {
		$(ca).show( "slow" );
		$(ma).hide( "slow" );
		$(el).show( "slow" );
	} else {
		$(ca).hide( "slow" );
		$(ma).show("slow");
		$(el).hide("slow");
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