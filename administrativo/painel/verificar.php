<?php 
@session_start();

if(@$_SESSION['nivel_usuario'] != "Administrador" && @$_SESSION['nivel_usuario'] != "Lojista" && @$_SESSION['nivel_usuario'] != "Gerente"){
    echo "<script>window.location='http://localhost/System_mall/administrativo'</script>";
}


?>