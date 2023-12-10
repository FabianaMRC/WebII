<?php

namespace App\Model;

use \JsonSerializable;

class Carro implements JsonSerializable {

    private ?int $id;
    private ?string $cor;
    private ?float $preco;
    private ?string $automatico;
    private ?int $ano_fabricacao;
    private ?string $modelo;
    private ?string $marca;
    

    public function __construct() {
        $this->id = 0;
        $this->cor = null;
        $this->preco = null;
        $this->automatico = null;
        $this->ano_fabricacao = null;
        $this->modelo = null;
        $this->marca = null;
    }

    public function jsonSerialize(): array
    {
        return array("id"=> $this->id,
        "cor"=> $this->cor,
        "preco" => $this->preco,
        "automatico" => $this->automatico,
        "ano_fabricacao"=> $this->ano_fabricacao,
        "modelo"=>$this->modelo,
        "marca"=>$this->marca
        );
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of cor
     */ 
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * Set the value of cor
     *
     * @return  self
     */ 
    public function setCor($cor)
    {
        $this->cor = $cor;

        return $this;
    }

    /**
     * Get the value of preco
     */ 
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * Set the value of preco
     *
     * @return  self
     */ 
    public function setPreco($preco)
    {
        $this->preco = $preco;

        return $this;
    }

    /**
     * Get the value of automatico
     */ 
    public function getAutomatico()
    {
        return $this->automatico;
    }

       /**
     * Set the value of automatico
     *
     * @return  self
     */ 
    public function setAutomatico($automatico)
    {
        $this->automatico = $automatico;

        return $this;
    }

    /**
     * Get the value of ano_fabricacao
     */ 
    public function getAno_fabricacao()
    {
        return $this->ano_fabricacao;
    }

    /**
     * Set the value of ano_fabricacao
     *
     * @return  self
     */ 
    public function setAno_fabricacao($ano_fabricacao)
    {
        $this->ano_fabricacao = $ano_fabricacao;

        return $this;
    }

    /**
     * Get the value of marca
     */ 
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     *
     * @return  self
     */ 
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get the value of modelo
     */ 
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set the value of modelo
     *
     * @return  self
     */ 
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }
}

