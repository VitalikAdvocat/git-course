<?php
session_start();//Означает что в даном скрипте будет использаваться сесия 
$er_to="";
$er_from="";
$er_subject="";
$er_message="";
$er=false;
if (isset($_POST["send"])) //Проверяем или отправлены данные
{
    //var_dump($_POST); 
$from=htmlspecialchars($_POST["from"]);// Обезопасиваем наши введеные даные уберая из них спец теги во избежании проблем
$to=htmlspecialchars($_POST["to"]);
$subject=htmlspecialchars($_POST["subject"]);
$message=htmlspecialchars($_POST["message"]);

//Для того что бы пользователь вслучаи не коректного ввода даных повторно не вводил во все поля даные заново, используем $_SESSION
$_SESSION['from']=$from;
$_SESSION['to']=$to;
$_SESSION['subject']=$subject;
$_SESSION['message']=$message;
if ($from==""|| !preg_match("#^[a-zA-Z0-9_.-]+@[a-z_.-]+\.[a-z]{2,}$#", $from))
{
$er_from="Введите коректный email ";
$er=true;
}
if ($to==""|| !preg_match("#^[a-zA-Z0-9_.-]+@[a-z_.-]+\.[a-z]{2,}$#", $to))
{
$er_to="Введите коректный email";
$er=true;
}
if (strlen($subject)==0)
{
$er_subject="Укажите тему";
$er=true;
}
if (strlen($message)==0)
{
$er_message="Пустое сообщение";
$er=true;  
}

if (!$er) //Если нету ошибок надо отправить письмо
{
 $subject="?utf-8?B?".base64_encode($subject)."?=";
 $headers="FROM: $from\r\n Reply-to:$from\r\n  content-type:text/plain; charset:utf-8\r\n";
 mail($to, $subject, $message,$headers);
 header("Location: session_back_feel.php?send=1");
 exit; }
}
?>
<html>
<head>
<title>Обратная Связь отправка email </title>
<meta charset="utf8">
<style type="text/css">
   	TABLE{align : center;
	
	}
   TD {
    border: 1px solid #333; /* Граница вокруг ячеек черные */
    padding: 5px; /* Поля в ячейках */
	text-align : center;
   }
   .block1
 { 
  width:32%;
  margin:0 auto; /*Отступ 0 и автоматическое выравнивание по центру*/
  background-image: url(../../mysql/seria-white-tekstura.png);
  /*border-radius:20px;*/
  float :left; 
  padding :5px;
  border: 1px solid #333;  
  /*margin:0 auto;*/ 
 $error
}
 </style>
 </head>
 <body>
<div class=block1>
<h3>Форма обратной Связи</h3>
<form name="feedback" action="" method="post">
<label>От кого </label><br/>
<input type="text" name="from" value="<?if (isset($_SESSION['from'])) {echo $_SESSION['from'];} else {echo"";} ?>" > <span style="color:red"><?=$er_from?> </span><br/>
<label>Кому </label><br/>
<input type="text" name="to" value="<?if (isset($_SESSION['to'])) {echo $_SESSION['to'];} else {echo"";}  ?>" > <span style="color:red"><?=$er_to?> </span><br/><br/>
<label>Тема </label><br/>
<input type="text" name="subject" value="<? if (isset($_SESSION['subject'])) {echo $_SESSION['subject'];} else {echo"";}  ?>" > <span style="color:red"><?=$er_subject?> </span><br/><br/>
<textarea cols="20" rows="10" name="message" ><?if (isset($_SESSION['from'])) {echo $_SESSION['from'];} else {echo"";} ?> </textarea> <span style="color:red"><?=$er_message?> </span><br> 
                                                                                       
<input type="submit" name="send" value="Отправить">
</form>
</div>
 </body>
 </html>