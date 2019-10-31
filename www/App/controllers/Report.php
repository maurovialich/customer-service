<?php

include "../models/Report.php";


$action = $_GET["action"] ? $_GET["action"] : $_GET["action"];

switch ($action) 
{
    case 'index':
        index();
        break;
    case 'create':
        create();
        break;
}

function create()
{
  $title = $_POST["title"];
  $additional_description = $_POST["additional_description"];
  if(insert($title, $additional_description))
  {
    header('Location: ../views/Report/successful.php');
  }
}

function index ()
{
    include '../../App/views/Report/index.php';
}

