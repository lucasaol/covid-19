<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$json = array('status' => $status);

if (isset($message)) {
    $json['message'] = $message;
}

if (isset($response)) {
    $json['response'] = $response;
}
echo json_encode($json);
