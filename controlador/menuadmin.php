<?php

include_once '../modelo/daoproducto.php';




?>

<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<title>SENASOFT</title>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<link href="../vista/assets/sticky-footer-navbar.css" rel="stylesheet">
<script type="text/javascript" src="../vista/js/jquery-3.2.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){
            $(".content").fadeOut(1500);
        },3000);
    });

    </script>
</head>
<body>
<header>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> 
  <a class="navbar-brand" href="#">SENASOFT </a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"> <a class="nav-link" href="../controlador/menuadmin.php">Inicio <span class="sr-only"></span></a> </li>
        
      </ul>  
    </div>
  </nav>
</header>
<div class="container">
<?php
    if(isset($_POST['eliminar'])){
        $codigo=$_POST['codigo'];
        

    $daoProducto =  new DaoArticulo();
    $reg = $daoProducto->deleteArticulo($codigo);



    if($reg > 0 ) {
        echo "<div class='content alert alert-primary'> Gracias : $reg registro ha sido eliminado </div>";
    }

        else{
            echo "<div class='content alert alert-danger'> No se pudo eliminar el registro </div>";
        }
    }
?>













<ul class="nav nav-pills">
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="menuadmin.php">Inicio</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../vista/index.php">Cerrar Seccion</a>

    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Productos</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../controlador/buscarProducto.php">Buscar Productos</a>
      <a class="dropdown-item" href="../controlador/registroProducto.php">Registrar Productos</a>
      <a class="dropdown-item" href="../controlador/editarProducto.php">Editar Producto</a>

    </div>

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="menuadmin.php">Vendedor</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../controlador/registroVendedor.php">Registrar Nuevo Vendedor</a>
      <a class="dropdown-item" href="../vista/index.php">Eliminar  Vendedor</a>
      <a class="dropdown-item" href="../vista/index.php">Actualizar  Vendedor</a>

    </div>
  </li>
</ul>


<?php

    if(isset($_POST['actualizar'])){
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $proveedor= $_POST['proveedor'];
      

        $daoProducto =  new DaoArticulo();
        $reg = $daoProducto->updateArticulo($codigo,$nombre,$precio,$cantidad,$proveedor);

            if ($reg >0)
            {
                echo "<div class=´ content alert alert-primary´>
                Gracias : $reg registro ha sido actualizado </div>";
            }
            else{
                echo "<div class=´ content alert alert-danger' > $reg No se pudo Actualizar el registro </div>";
            }

    }
?>

<?php 

    if(isset($_POST['editar'])){
        $codigo = $_POST['codigo'];
        $sql = "SELECT * FROM productos WHERE codigo = :codigo";

        $conectar = new  bdconnect;
        $conn = $conectar->connect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':codigo', $codigo, PDO::PARAM_STR,10);
        $stmt->execute();
  
      $obj = $stmt->fetchObject();
?>



<div class="col-12 col col-md-12"> 

<form role = "form" method = "POST" action="<?php echo $_SERVER['PHP_SELF'] ?>"> 
<input value = "<?php echo $obj->codigo ;?>" name = "codigo" type="hidden">
    <div class="form-row"> 

    <div class="form-group col-md-6">  
    <label for="Firstname"> Nombre </label>
    <input value = "<?php echo $obj->nombre?>" name = "nombre" type = "text" class="form-control" id="nombre" placeholder="nombre">
    </div>
   </div>
 <div class="form-row"> 
   <div class="form-group col-md-6">  
    <label for="precio"> Precio </label>
    <input value = "<?php echo $obj->precio; ?>" name = "precio" type = "text" class="form-control" id="precio" placeholder="precio">
    </div>
    <div class="form-row"> 
   <div class="form-group col-md-6">  
    <label for="cantidad"> Cantidad </label>
    <input value = "<?php echo $obj->cantidad; ?>" name = "cantidad" type = "text" class="form-control" id="cantidad" placeholder="cantidad">
    </div>

    <div class="form-group col-md-6">  
    <label for="proveedor"> Proveedor </label>
    <input value = "<?php echo $obj->proveedor; ?>" name = "proveedor" type = "text" class="form-control" id="proveedor" placeholder="proveedor">
    </div>
    

 <div class="form-group"> 
    <button name="actualizar" type= "submit" class="btn btn-primary btn-block">Actualizar Registro</button>
    
 </div>
 <div class="form-group col-md-4">
 <button name="cancelar" type= "submit" class="btn btn-primary btn-block">Cancelar</button>
 </div>
 </form>
</div>

<?php 
} 
?>
 











<div class="table table-hover">  
    <table class="table table-bordered table-striped"> 
        <thead class="thead-dark">
                <th width="28%">Codigo</th>
                <th width="20%">Nombre</th>
                <th width="20%">Precio</th>
                <th width="20%">Cantidad</th>
                <th width="20%">Proveedor</th>    
        </thead>
        <tbody>

<?php 

    $conectar = new bdconnect;
    $conn = $conectar->connect();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM productos";
    $query = $conn->query($sql);
    $query -> execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);


    if($query -> rowCount() > 0){
        foreach($results as $result){
            echo "<tr>
                <td>".$result -> codigo."</td>
                <td>".$result -> nombre."</td>
                <td>".$result -> precio."</td>
                <td>".$result -> cantidad."</td>
                <td>".$result -> proveedor."</td>
                
                

                </td>
                <td> 
                <form onsubmit=\"return confirm('Realmente desea eliminar el registro?';\"method='POST' action='".$_SERVER['PHP_SELF']."'>   
                    <input type='hidden' name='codigo' value = '".$result->codigo."'>
                    <button name='eliminar'>Eliminar</button>
                    </form>
                  <td> 
                    <form method='POST' action='".$_SERVER['PHP_SELF']."'>
                    <input type='hidden' name='codigo' value = '".$result->codigo."'>
                    <button name='editar'>Editar</button>
                    </form>
                </td>

                </td>   
                </td>   
            </tr>";    
        }
    }
?> 
            </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>



<script src="../vista/js/bootstrap.min.js"></script>    
</body>
</html>