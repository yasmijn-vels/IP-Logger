<?php

require_once "dbconn.php";

function getUserIP_JSON() {
    $client 		= $_SERVER['HTTP_CLIENT_IP'];
    $HTTP 			= $_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote 		= $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($HTTP, FILTER_VALIDATE_IP)) {
        $ip = $HTTP;
    } else {
        $ip = $remote;
    }

    $data = [
			'status' 		=> 200,
			'message' 		=> 'your IP has been fetched',
			'data'			=> $ip,
			'LMAO'			=> 'IP Logged 😂'
	];
	
	return json_encode($data);
}

function getUserIP() {
    $client 		= $_SERVER['HTTP_CLIENT_IP'];
    $HTTP 			= $_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote 		= $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($HTTP, FILTER_VALIDATE_IP)) {
        $ip = $HTTP;
    } else {
        $ip = $remote;
    }

    return $ip;
}