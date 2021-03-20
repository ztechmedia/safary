<?php

function asset($path) {
    return base_url("assets/$path");
}

function toJson($data)
{
    echo json_encode($data);
    die();
}

function resJson($data)
{
    header('Content-Type:application/json');
    echo json_encode($data);
    die();
}

function fileGetContent()
{
    $json = file_get_contents("php://input");
    $obj = json_decode($json);
    return $obj;
}