/*
 * JavaScript for Elo Rating Shortcode plugin.
 */


/*
 * elo_rating shortcode
 */
jQuery(document).ready(function($) {
	jQuery( "#elo_rating_change input.button" ).click(function() {
		var elo1 = parseFloat( jQuery( "#elo_rating_change .elo1" ).val() ) * 1;
		var elo2 = parseFloat( jQuery( "#elo_rating_change .elo2" ).val() ) * 1;
		var K    = parseFloat( jQuery( "#elo_rating_change .K" ).val() ) * 1;
		var elodifference = elo2 - elo1;
		var percentage = 1 / ( 1 + Math.pow( 10, elodifference / 400 ) );
		var win = Math.round( K * ( 1 - percentage ) );
		var draw = Math.round( K * ( .5 - percentage ) );

		if (win > 0 ) {
			win = "+" + win;
		}
		if (draw > 0 ) {
			draw = "+" + draw;
		}

		jQuery( "#elo_rating_change .win" ).val(win);
		jQuery( "#elo_rating_change .draw" ).val(draw);
		jQuery( "#elo_rating_change .loss" ).val( Math.round( K * ( 0 - percentage ) ) );
		jQuery( "#elo_rating_change .percent" ).val( Math.round( percentage * 100 ) + "%" );
	});
});


/*
 * elo_rating_extended shortcode
 */
jQuery(document).ready(function($) {
	jQuery( "#elo_rating_score input.button" ).click(function() {
		var wins   = parseFloat( jQuery( "#elo_rating_score .wins" ).val() ) * 1;
		var draws  = parseFloat( jQuery( "#elo_rating_score .draws" ).val() ) * 1;
		var losses = parseFloat( jQuery( "#elo_rating_score .losses" ).val() ) * 1;
		if ( wins == 0 && draws == 0 && losses == 0 ) { return; }
		var points = wins + draws/2;
		var total = wins + draws + losses;
		var percentage = (points /  total);
		var elodifference = -400 * Math.log(1 / percentage - 1) / Math.LN10;
		var sign = "";

		if ( elodifference > 0 ) {
			sign="+";
		}

		jQuery( "#elo_rating_points .points" ).val( points );
		jQuery( "#elo_rating_points .totalgames" ).val( total );
		jQuery( "#elo_rating_percent .winning" ).val( Math.round(percentage*10000)/100 + "%" );
		jQuery( "#elo_rating_percent .difference" ).val( sign + Math.round(elodifference) );
	});
});


jQuery(document).ready(function($) {
	jQuery( "#elo_rating_points input.button" ).click(function() {
		var points = parseFloat( jQuery( "#elo_rating_points .points" ).val() );
		var total  = parseFloat( jQuery( "#elo_rating_points .totalgames" ).val() );
		if ( points == 0 && total == 0 ) { return; }

		var percentage = ( points /  total );
		var elodifference = -400 * Math.log( 1 / percentage - 1 ) / Math.LN10;
		var sign = "";

		if ( elodifference > 0 ) {
			sign="+";
		}

		jQuery( "#elo_rating_percent .winning" ).val( Math.round(percentage*10000)/100 + "%" );
		jQuery( "#elo_rating_percent .difference" ).val( sign + Math.round(elodifference) );
	});
});


jQuery(document).ready(function($) {
	jQuery( "#elo_rating_percent input.button" ).click(function() {
		var percentage    = parseFloat( jQuery( "#elo_rating_percent .winning" ).val() ) / 100;
		var elodifference = -400 * Math.log(1 / percentage - 1) / Math.LN10;
		var sign = "";

		if ( elodifference > 0 ) {
			sign="+";
		}

		jQuery( "#elo_rating_percent .difference" ).val( sign + Math.round(elodifference) );
	});
});
