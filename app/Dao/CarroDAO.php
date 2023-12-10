<?php

namespace App\Dao;

use App\Util\Connection;
use App\Mapper\CarroMapper;
use App\Model\Carro;

use \Exception;

class CarroDAO {

    private $conn;
    private $carroMapper;

    public function __construct() {
        $this->conn = Connection::getConnection();
        $this->carroMapper = new CarroMapper();
    }

    public function list() {
        $sql = 'SELECT * FROM carros ORDER BY id';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $this->carroMapper->mapFromDatabaseArrayToObjectArray($result);
    }

    public function findById(int $id) {
        $sql = 'SELECT * FROM carros WHERE id = :id';
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
    
        $arrayObj = $this->carroMapper->mapFromDatabaseArrayToObjectArray($result);
    
        if (count($arrayObj) == 0) {
            return null;
        } elseif (count($arrayObj) > 1) {
            throw new Exception("Mais de um registro encontrado para o ID " . $id);
        } else {
            return $arrayObj[0];
        }
    }
    

    public function insert(Carro $carro) {
                    
        $sql = 'INSERT INTO carros (cor, preco, automatico, ano_fabricacao, modelo, marca) VALUES (:cor, :preco, :automatico, :ano_fabricacao, :modelo, :marca)';
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("cor", $carro->getCor());
        $stmt->bindValue("preco", $carro->getPreco());
        $stmt->bindValue("automatico", $carro->getAutomatico());
        $stmt->bindValue("ano_fabricacao", $carro->getAno_Fabricacao());
        $stmt->bindValue("modelo", $carro->getModelo());
        $stmt->bindValue("marca", $carro->getMarca()); 
        
        $stmt->execute();        
            
        $id = $this->conn->lastInsertId();
        $carro->setId($id);
        return $carro;
    }
       
   
}
    
