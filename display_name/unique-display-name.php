<?php
// TARKISTAA ONKO UUSI NÄYTÖNIMI JO KÄYTÖSSÄ
// pre_user_display_name koska tarkistaa asian ENNEN tiedon tallentamista
add_filter( 'pre_user_display_name', 'check_display_name' );
	
//Funktio saa syötetyn näyttönimen parametriksi
function check_display_name($nameToCheck) {
	//Siirtää syötetyn näyttönimen edelleen funktiolle, joka tarkistaa sen
	if (display_name_exists($nameToCheck)) {
		//Käyttäjää jolla syötetty näyttönimi on olemassa
		//Etsii nykyisen käyttäjän käyttäjänimen ja palauttaa sen -> käyttäjän uusi näyttönimi on käyttäjänimi
		$current_user = wp_get_current_user();
		$user_username = $current_user->user_login;
		wc_add_notice(sprintf(__('Nimi on jo käytössä, yritä uudelleen.', 'woocommerce')), 'error');
		return $user_username;
	} else {
		//Käyttäjä jolla syötetty näyttönimi ei ollut olemassa
		//Palauttaa syötetyn näyttönimen ja se on kyttäjän uusi näyttönimi
		return $nameToCheck;
	}
}
//Näyttönimen tarkistusfunktio
function display_name_exists($nameToCheck) {
	global $wpdb;
    //Tarkistaa tietokannasta onko olemassa (1) käyttäjä, jolla syötetty näyttönimi
    $countResult = $wpdb->get_var($wpdb->prepare("SELECT 1 FROM $wpdb->users WHERE display_name = %s", $nameToCheck));
	//Tarkistaa tietokannasta id:n, joka kuuluu näyttönimen omaavalle käyttäjälle 
	$idOfDisplayName = $wpdb->get_var($wpdb->prepare("SELECT id FROM $wpdb->users WHERE display_name = %s", $nameToCheck));
	//Etsii nykyisen käyttäjän id:n
	$checkedUserId = get_current_user_id();
	//Jos tietokannasta löytyi tulos JA nykyisen käyttäjän id ei ole sama näyttönimen omaavan käyttäjän kanssa 
	if($countResult>0 && $idOfDisplayName!=$checkedUserId){
		return true;
	} else {
		return false;
	}
}
?>