<?php

include "../models/FrequentlyAsked.php";

$action = $_GET["action"];

//Simulating controller actions
switch ($action) 
{
    case 'index':
        index();
        break;
    case 'show':
        show();
        break;
}

function index()
{
    $frequentlyAskedQuestions = find_all();
    include '../../App/views/FrequentlyAsked/index.php';

}

function show()
{
    $frequentlyAskedQuestion = find_by_id($_GET['id']);
    include '../../App/views/FrequentlyAsked/show.php';
}
