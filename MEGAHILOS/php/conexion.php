<?php 



class Database {
    private $hostname = "localhost";
    private $database = "scythe";
    private $username = "root";
    private $password = "";
    private $charset = "utf8";
    private $port = 3306; // Aquí agregas el número de puerto si es necesario

    public function conectar() {
        
        $conexion = "mysql:host={$this->hostname};port={$this->port};dbname={$this->database};charset={$this->charset}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $pdo = new PDO($conexion, $this->username, $this->password, $options);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Error conexión: ' . $e->getMessage();
            exit;
        }
    }
}



?>