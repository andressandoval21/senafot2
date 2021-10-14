<?php
include_once '../modelo/daoVendedor.php';
include_once "../modelo/conexion.php"
?>

<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<title>Crud PDO PHP Y MySQL</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="../vista/assets/sticky-footer-navbar.css" rel="stylesheet">
<script type="text/javascript" src="../vista/js/jquery-3.2.1.min.js"></script>
</head>
<body>

    
<h3 class="container "> Insertar Registros </h3>


<div class="row"> 

<div class="col-12 col col-md-12"> 
<div class="container">
<form rol = "form" method = "POST" action="<?php echo $_SERVER['PHP_SELF'] ?>"> 
        
        <div class="form-row"> 
        <div class="form-group col-md-6"><br>  
        <label for="id"> Id</label> </label>
        <input name = "id" type = "text" class="form-control" id="id" placeholder="id">
        </div>

        <div class="form-row">
        <div class="form-group col-md-6"><br> 
        <label for="nombre">  Nombre </label>
        <input name = "nombre" type = "text" class="form-control" id="nombre" placeholder="nombre">
        </div>
        
        <div class="form-row"> 
        <div class="form-group col-md-6"> <br> 
        <label for="email"> Email </label>
        <input name = "email" type = "text" class="form-control" id="email" placeholder="email">
        </div>

        <div class="form-row">
        <div class="form-group col-md-6"> <br> 
        <label for="pass"> Password </label>
        <input name = "pass" type = "password" class="form-control" id="pass" placeholder="password">
        </div>
        
        <div class="form-row">
        <div class="form-group col-md-12"><br>  
        <label for="rol"> Rol </label>
        <input name = "rol" type = "text" class="form-control" id="rol" placeholder="rol">
        </div>
    </div>

    
    <div class="form-group"><br>
        <button name="insertar" type= "submit" class="btn btn-primary btn-block"> Guardar </button>
        <a href="../controlador/menuadmin.php">
            <button type="button" class="btn btn-primary">Salir</button>
    </div>
    
    </form>
</div>
</div>
</body>
</html>


<?php
    if(isset($_POST['insertar'])){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $rol=$_POST['rol'];
        

    $daoVendedor =  new DaoVendedor();
    $reg = $daoVendedor->insertVendedor($id,$nombre,$email,$pass,$rol);

    if($reg > 0)
    {
        echo "<div class=´ content alert alert-primary´>
        Gracias : $reg registro ha sido agregado  </div>";
    }
    else{
        echo "<div class=´ content alert alert-danger' > No se pudo agregar el registro </div>";
    }
}
?>