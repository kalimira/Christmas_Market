<?php 
session_start();
if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
{
    header("Location:index.html");  
}
else{
    header("Location: profile.html");
}
?>