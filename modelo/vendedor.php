<?php
include_once 'conexion.php';


class VENDEDOR extends bdconnect{

     private $id;
     private $nombre;
     private $email;
     private $pass;
     private $rol;


     public function __construct($id,$nombre,$email,$pass,$rol)
     {
      $this->id=$id;
      $this->nombre=$nombre;
      $this->email=$email;
      $this->pass=$pass;
      $this->rol=$rol;


     }
     public function setId($id){
         $this->id=$id;}
     public function getId(){
         return $this->id;
     }

     public function setNombre($nombre){
            $this->nombre=$nombre;}
     public function getNombre(){
         return $this->nombre;}

     public function setEmail($email){
        $this->email=$email;}
     public function getEmail(){
        return $this->email;}

     public function setPass($pass){
         $this->pass=$pass;}
     public function getPass(){
         return $this->pass;}

     public function setRol($rol){
         $this->rol=$rol;}
     public function getRol(){
     return $this->rol;}


     
     




}