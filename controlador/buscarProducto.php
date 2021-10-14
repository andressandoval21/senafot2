<?php
include_once '../modelo/daoProducto.php';

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
<header>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> 
  <a class="navbar-brand" href="#">WORKSHOP MVC </a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"> <a class="nav-link" href="../controlador/menuadmin.php">Inicio <span class="sr-only"></span></a> </li>
        
      </ul>  
    </div>
  </nav>
</header>
<div class="container">
        <div class="col-md-6">
          <form action="" method="POST">
						<h2><b>Ingresa Codigo</b></h2>
						<div class="form-group">
							<input type="number" name="codigoproducto" maxlength="15" class="form-control"required>
						</div>
						<input type="submit" name="Buscar producto" value="Buscar producto" class="btn btn-primary" id = "buscar">
					</form>
        </div>
			<div class="col-md-6">
					<br><br>
				<h2><b>El Producto es</b></h2>
        <div class="table-responsive">          
        <table class="table table-bordered table-striped">	
                <thead class="thead-dark">
							    <tr>
						    		
								    <td>Nombre</td>
                <td>Precio</td>
                <td>Cantidad</td>
                                <td>Proveedor</td>
								
							</tr>
						</thead>
					<?php
					error_reporting(0);
					$codigo = $_POST['codigoproducto'];
          $conectar = new bdconnect;
          $conn = $conectar->connect();
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "SELECT * from  productos where codigo = $codigo";
          $query = $conn->query($sql);
          $query -> execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
					
           if($query -> rowCount() > 0){
              foreach($results as $result){
                
                echo "
                <tr>
                <td>".$result -> nombre."</td>
                <td>".$result -> precio."</td>
                <td>".$result -> cantidad."</td>
                <td>".$result -> proveedor."</td>
                </tr>
                </table>";    
        }
    }
?> 
</div>
</body>
</html>
