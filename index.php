<?php
session_start();

require_once "header.php";
?>

<h1 class="font" >Введите данные для отправки</h1>


<form class="text-right" action="1.php" method="post">

    <!-- форма обратной связи-->
    <input type="text" name="username" value="<?=$_SESSION['username']?>"  placeholder="введите имя" class="form-control-lg"><br><!-- value - устанавливает какое-то значение внутрь самого поля-->
   <div class="text-danger"><?=$_SESSION['$error_username']?></div><br>
    <input type="email" name="email" value="<?=$_SESSION['email']?>" placeholder="введите почту" class="form-control-lg"><br>
    <div class="text-danger"><?=$_SESSION['$error_email']?></div><br>
    <input type="text" name="subject"  value="<?=$_SESSION['subject']?>"placeholder="Тема сообщения " class="form-control-lg"><br>
    <div class="text-danger"><?=$_SESSION['$error_subject']?></div><br>
    <textarea name="message"  <?=$_SESSION['message'] ?> placeholder="ваше сообщение " class="form-control-lg"></textarea>
    <div class="text-danger"><?=$_SESSION['$error_message']?></div><br>
    <button type="submit" class="btn btn-success">Отправить</button><!-- submit перезагружает страничку-->
    

</form>


<?php


require_once "footer.php";


