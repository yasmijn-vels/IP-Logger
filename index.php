<?php

$show_json 				= "on";
$redirect_url 			= "https://google.nl";

if($show_json === "on") {
	include "root/ipshow.html";
} elseif($show_json === "off") {
	require "includes/function.php";
	header('Location: '.$redirect_url);
}