<?php


require '../vendor/autoload.php';


class Database
{

    private string $host = 'localhost';
    private string $db_name = 'mydb';
    private string $username = 'root';
    private string $password = 'qwerty1';

    public ?PDO $conn = null;

    public function getConnection(): ?PDO
    {

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            $statement = $this->conn->query('SELECT * FROM names');
            while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo $row['id'] . ' ' . $row['name']. ' '. $row['username'].' '. $row['city_id'];
            }
 
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }

}


// $objectDataBase = new Database;
// $objectDataBase->getConnection();



