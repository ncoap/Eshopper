<?php
class Conexion{
    public function getConexion() {
        $pdo = new PDO("mysql:host=localhost;dbname=security_innova", "root", "10200092", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES  \"UTF8\"", PDO::ATTR_EMULATE_PREPARES => false));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
