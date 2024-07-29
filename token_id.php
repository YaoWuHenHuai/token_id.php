<?php
//this is not the same dbh as the original one
session_start();

function create_token(){
        echo "jdd";
        $dbserver ="db";
        $dbusername ="user";
        $dbpassword ="pd";
        $dbname ="db_name";
        $conn = mysqli_connect($dbserver, $dbusername, $dbpassword, $dbname);
          if (!$conn) {
        echo "not there";
} else {

//prepare with try and catch to avoid the page for breaking 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $token = '';
        for ($i = 0; $i < 14; $i++) {
                $token .= $characters[random_int(0, $charactersLength - 1)];
        }
        echo " token:";
        echo $token;
        echo "mail of the user:";
        $mail = $_POST['mail'];
        $_SESSION['mail'] = $_POST['mail'];
        $_SESSION['token'] = $token;
        echo "$mail";
        $TESTING_QUERY = "INSERT IGNORE INTO DB_FOR_TOKENS.tokens (token, issued, mail) VALUES ('$token', 'FALSE', '$mail');";
        $INSERT_PROMPT = mysqli_query($conn, $TESTING_QUERY);
} 
///could get the message within a text file instead also, for testing more convenient at echo
catch (Exception $e) {
    $total_message = "Error#". mysqli_connect_errno(). " ". $e->getMessage();
    mysqli_connect_errno(). " ". $e->getMessage();
    echo "$total_message\n";
                }
        }
}
