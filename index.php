<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials", "true");
header('Access-Control-Allow-Methods : GET, POST, OPTIONS, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding");
header('Content-Type', 'application/json');

function get() {
    include 'get.php';
}

function delete() {
    include 'delete.php';
}

function post() {
    include 'post.php';
}

function put() {
    include 'put.php';
}

switch(filter_input( INPUT_SERVER, 'REQUEST_METHOD' )){
    case "GET":
        get();
        break;
    case "PUT":
        put();
        break;
    case "DELETE":
        delete();
        break;
    case "POST":
        post();
        break;
}