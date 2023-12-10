<?php

namespace App\Mapper;


use App\Dao\MarcaDAO;
use App\Model\Carro;


class CarroMapper {

    public function mapFromDatabaseArrayToObjectArray($regArray) {
        $arrayObj = array();

        foreach($regArray as $reg) {
            $regObj = $this->mapFromDatabaseToObject($reg);
            array_push($arrayObj, $regObj); 
        }

        return $arrayObj;
    }

    public function mapFromDatabaseToObject($regDatabase) {
        $obj = new Carro();
        if(isset($regDatabase['id'])) 
            $obj->setId($regDatabase['id']);
        
        if(isset($regDatabase['cor']))
            $obj->setCor($regDatabase['cor']);

        if(isset($regDatabase['preco']))
            $obj->setPreco($regDatabase['preco']);
        
        if(isset($regDatabase['automatico']))
            $obj->setAutomatico($regDatabase['automatico']);

        if(isset($regDatabase['ano_fabricacao']))
            $obj->setAno_fabricacao($regDatabase['ano_fabricacao']);

        if(isset($regDatabase['modelo']))
            $obj->setModelo($regDatabase['modelo']);

        if(isset($regDatabase['marca']))
            $obj->setMarca($regDatabase['marca']);
                     
        return $obj;
    }
    
    public function mapFromJsonToObject($regJson) {
                return $this->mapFromDatabaseToObject($regJson);
           
    }
}
