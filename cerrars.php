<?php
//iniciar sesion antes que todo
session_start();

//libera la sesión actual, elimina cualquier dato de la sesión.
session_destroy();

/* liberarán las variables de sesión registradas, quitandoles el valor contenido en ellas
si no se hace esto aunque la pagina sea cerrada siempre conservaran su valor y cualquier
persona podra ingresar a la sesion*/
unset($_SESSION["UseT"]);
unset($_SESSION["idtecc"]);
unset($_SESSION["UserA"]);
//libera la sesion
session_unset();

//dirigirse a la pagina que se desea ver
echo "<script>document.location.href='Login.php';</script>";


//NOTA: ESTE CODIGO NO ELIMINA DATOS DE LAS COOKIES, EN CASO QUE LA PAGINA TENGA COOKIES
?>
