<?
    session_start();//подключаем сесию с передающего файла
    if($_GET['send']==1 || $_SESSION['to']!='' )  //проверяем или форма была отправлена и чтоб при простом запуске даного файла без GET пусто
    echo "Вы успешно отправили сообщение на email -".$_SESSION['to'];//Извлекаем email

?>

<a href="http://myproject/Form/%D0%A4%D0%BE%D1%80%D0%BC%D0%B0%20%D0%BE%D0%B1%D1%80%D0%B0%D1%82%D0%BD%D0%BE%D0%B9%20%D1%81%D0%B2%D1%8F%D0%B7%D0%B8%20%D1%81%D0%BC%D1%81%20%D0%BD%D0%B0%20email/%D0%A4%D0%BE%D1%80%D0%BC%D0%B0%20%D0%BE%D0%B1%D1%80%D0%B0%D1%82%D0%BD%D0%BE%D0%B9%20%D1%81%D0%B2%D1%8F%D0%B7%D0%B8%20%D0%BE%D1%82%D0%BF%D1%80%D0%B0%D0%B2%D0%BA%D0%B0%20%D1%81%D0%BC%D1%81%20%D0%BD%D0%B0%20%D0%B5%D0%BC%D0%B0%D0%B9%D0%BB.php">
<h1> <br>   Выйти</h1>
</a>