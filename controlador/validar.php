<?php
include_once '../modelo/conexion.php';
session_start();
class userClass
{
/* User Login */
public function userLogin($email,$pass,$rol)
{
try{
$conn= new bdconnect();
$conn = $conn->connect();
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql =$conn->prepare("SELECT rol,pass,email FROM mainlogin WHERE (pass=:pass) AND email=:email AND rol=:rol");
$sql->bindParam(":email",$email,PDO::PARAM_STR);
$sql->bindParam(":pass",$pass,PDO::PARAM_STR);
$sql->bindParam(":rol",$rol,PDO::PARAM_STR);
$sql->execute();
$count=$sql->rowCount();
$data=$sql->fetch(PDO::FETCH_OBJ);
$db = null;
if($count)
{
$_SESSION['email']=$data->email; 
return true;
}
else
{
return false;
} 
}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';
}

}




}
?>