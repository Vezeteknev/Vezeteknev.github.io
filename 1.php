<?php
session_start();
unset( $_SESSION['success_mail']);
unset($_SESSION['username']);//очищает сессии
unset($_SESSION['email']);//очищает сессии
unset($_SESSION['subject']);//очищает сессии
unset($_SESSION['message']);//очищает сессии
unset($_SESSION['$error_username']);//очищает сессии
unset($_SESSION['$error_email']);//очищает сессии
unset($_SESSION['$error_subject']);//очищает сессии
unset($_SESSION['$error_message']);//очищает сессии
require_once "header.php";
function redirect(){
    header('Location: index.php');//переадрессуют на какую то страничку
    exit;
}
$user_name= htmlspecialchars(trim($_POST['username']));
$email= htmlspecialchars(trim($_POST['email']));
$subject= htmlspecialchars(trim($_POST['subject']));
$message= htmlspecialchars(trim($_POST['message']));
//что бы данные которые вводил user ,сохранялись в полях
$_SESSION['username']= $user_name;
$_SESSION['email']= $email;
$_SESSION['subject']= $subject;
$_SESSION['message']= $message;
//вывод ошибки в форме
if(strlen($user_name) <=1 ){
   $_SESSION[ '$error_username']="введите имя правльно";
   redirect();}
   
   
   else if(strlen($email)<5 || strpos($email,"@")==false   ){
    $_SESSION[ '$error_email']= "А почту?";
    redirect();
    }
    else if(strlen($subject) <=6 ){
    $_SESSION[ '$error_subject']="где тема?";
    redirect();}
    
    else if(strlen($message) <=16 ){
     $_SESSION[ '$error_message']  ="а где сообщение?";
     redirect();
     }
     else
     $subject= '=?utf-8?B?'.base64_encode($subject)."?=";
     $headers = "From: $email\r\nReply-to: $email\r\nContent-type:text/plain; charset=urf-8\r\n"; 

     mail('arab105ga@gmail.com', $subject,  $message, $headers);

     echo "<div class='answer'>    Джейсон: красава отправил, $user_name!</div>";
     echo "<a  href='index.php' class='back'>Нажми, вернешься.</a>";
     