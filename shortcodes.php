<?php

 
/*
 * Shortcode for simple Elo calculator.
 */
function er_elo_rating_shortcode( $atts ) {
	elo_rating_shortcode_init();

	$shortcode_atts = shortcode_atts( array(
		'k_factor' => 25,
	), $atts );

	$shortcode = '
	<h2>' . __('Elo Rating Change Calculator', 'elo-rating-shortcode') . '</h2>

	' . __("This section will calculate the change in a player's Elo rating after playing a	single game against another player. The value K is the maximum change in rating.", 'elo-rating-shortcode') . '

	<form action="#" name="elo_rating_change" id="elo_rating_change">
		<table>
			<tr>
				<td>
					' . __('Player Elo:', 'elo-rating-shortcode') . '
				</td>
				<td>
					<input name="elo1" class="elo1" value="2000" size="8"/>
				</td>
			</tr>
			<tr>
				<td>
					' . __('Against Elo:', 'elo-rating-shortcode') . '
				</td>
				<td>
					<input name="elo2" class="elo2" value="2000" size="8"/>
				</td>
			</tr>
			<tr>
				<td>
					' . __('K factor:', 'elo-rating-shortcode') . '
				</td>
				<td>
					<input name="K" class="K" value="' . $shortcode_atts['k_factor'] . '" size="4"/>
				</td>
			</tr>
		</table>

		<input type="button" value="' . __('Calculate Change', 'elo-rating-shortcode') . '" class="button"/>

		<table>
			<tr>
				<td width="33%">' . __('Win', 'elo-rating-shortcode') . '</td>
				<td width="33%">' . __('Draw', 'elo-rating-shortcode') . '</td>
				<td width="33%">' . __('Loss', 'elo-rating-shortcode') . '</td>
			</tr>
			<tr>
				<td><input name="win"  class="win"  value="0" size="8" /></td>
				<td><input name="draw" class="draw" value="0" size="8" /></td>
				<td><input name="loss" class="loss" value="0" size="8" /></td>
			</tr>
		</table>

		' . __('Expected Percentage:', 'elo-rating-shortcode') . ' <input name="percent" class="percent" value="0" size="8" />

	</form>
	';

	return $shortcode;
}
add_shortcode( 'elo_rating_shortcode', 'er_elo_rating_shortcode' );


/*
 * Shortcode for extended Elo calculations.
 */
function er_elo_rating_shortcode_extended( $atts ) {
	elo_rating_shortcode_init();

	$shortcode = '
	<h2>' . __('Elo Rating Difference Calculator', 'elo-rating-shortcode') . '</h2>

	' . __('This section will calculate the difference in Elo rating between two players from match results or winning percentage.', 'elo-rating-shortcode') . '

	<form name="elo_rating_score" id="elo_rating_score" action="#">
		<table>
			<tr>
				<td>' . __('Wins', 'elo-rating-shortcode') . '</td>
				<td>' . __('Losses', 'elo-rating-shortcode') . '</td>
				<td>' . __('Draws', 'elo-rating-shortcode') . '</td>
			</tr>
			<tr>
				<td><input name="wins"   class="wins"   value="0" size="5"/></td>
				<td><input name="losses" class="losses" value="0" size="5"/></td>
				<td><input name="draws"  class="draws"  value="0" size="5"/></td>
			</tr>
		</table>

		<input type="button" value="' . __('Calculate Elo', 'elo-rating-shortcode') . '" class="button"/>
	</form>


	<form name="elo_rating_points" id="elo_rating_points" action="#">
		<table>
			<tr>
				<td>' . __('Points', 'elo-rating-shortcode') . '</td>
				<td></td>
				<td>' . __('Games', 'elo-rating-shortcode') . '</td>
			</tr>
			<tr>
				<td><input name="points" class="points" value="0" size="5"/></td>
				<td>/</td>
				<td><input name="totalgames" class="totalgames" value="0" size="5"/></td>
			</tr>
		</table>

		<input type="button" value="' . __('Calculate Elo', 'elo-rating-shortcode') . '" class="button"/>
	</form>


	<form name="elo_rating_percent" id="elo_rating_percent" action="#">
		<table>
			<tr>
				<td>' . __('Winning percentage', 'elo-rating-shortcode') . '</td>
			</tr>
			<tr>
				<td><input name="winning" class="winning" value="50" size="5"/></td>
			</tr>
		</table>

		<input type="button" value="' . __('Calculate Elo', 'elo-rating-shortcode') . '" class="button"/>

		<table>
			<tr>
				<td>' . __('Elo Difference:', 'elo-rating-shortcode') . ' <input name="difference" class="difference" value="+0" size="8"/></td>
			</tr>
		</table>

	</form>
	';

	return $shortcode;

}
add_shortcode( 'elo_rating_shortcode_extended', 'er_elo_rating_shortcode_extended' );
