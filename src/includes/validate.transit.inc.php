<?php

function is_valid_phoneNumber ($number) {
	return (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $number))?false:true;
}

function is_valid_email ($str) {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str))?false:true;
}

function contains_numeric ($str) {
	return preg_match('/[0-9]+/', $str);
}

?>