<?php

function find_all()
{
    $sql = "SELECT * FROM FrequentlyAskeds";
    $frequentlyAskedQuestions = retrieve_from_database($sql);
    return $frequentlyAskedQuestions;
}

function find_by_id($id){
    $sql = "SELECT * FROM FrequentlyAskeds WHERE id={$id}";
    $singleQuestion = retrieve_from_database($sql);
    return $singleQuestion;
}

function retrieve_from_database($sql)
{
    $conn = mysqli_connect("db", "root", "phprs", "myDB");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}