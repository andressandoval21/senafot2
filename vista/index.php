<?php
include_once "../modelo/conexion.php";
include_once "../controlador/validar.php";
$userClass = new userClass();

$errorMsgReg='';
$errorMsgLogin='';
/* Login Form */
if (!empty($_POST['loginSubmit'])) 
{
$email=$_POST['email'];
$pass=$_POST['pass'];
$rol=$_POST['rol'];
if(strlen(trim($email))>1 && strlen(trim($pass))>1 && strlen(trim($rol))>1)
{
$email=$userClass->userLogin($email,$pass,$rol);
if($email)
{

header("Location:../controlador/menuadmin.php"); // Page redirecting to home.php 
}
else
{
$errorMsgLogin="Please check login details.";
}
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link  rel="stylesheet" href="css/style.css">
    <title>SENA SOFT</title>
</head>
<body>
    <div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

    <div class="fadeIn first">
    <img src="img/siigo2.png" id="icon" alt="User Icon" />
    </div>

    <form method="post" action="" name="login">
    
    <input type="text" name="email" class="fadeIn second"placeholder="Correo" autocomplete="off" />

    
    <input type="password" name="pass"class="fadeIn second"placeholder="Contraseña" autocomplete="off"/>

    <div class="form-group">
    
    <div class="col-sm-12">
    <select class="fadeIn second" name="rol">
    <option value="" selected="selected"> - selecccionar rol - </option>
    <option value="admin">Admin</option>
    <option value="personal">Personal</option>


    <div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
    <input type="submit" class="button" name="loginSubmit" value="Login">

    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>
<br>


    
</select>
</div>
</div>
    </form>
    </div>
</body>
</html>
