<?php

namespace App\Controller;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Dao\CarroDAO;
use App\Mapper\CarroMapper;
use App\Util\MensagemErro;

use \PDOException;

class CarroController {

	private $carroDAO;
	private $carroMapper;
	

	public function __construct() {
		$this->carroDAO = new CarroDAO();
		$this->carroMapper = new CarroMapper();
		
	}

    public function listar(Request $request, Response $response, array $args): Response {
		
		$carros = $this->carroDAO->list();
		$json = json_encode($carros, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);

		$response->getBody()->write($json);
		return $response
			->withStatus(200)
			->withHeader("Content-Type", "application/json");
    }

	public function buscarPorId(Request $request, Response $response, array $args): Response {
		$id = $args["id"];
		$carro = $this->carroDAO->findById($id);
		if($carro){
		$json = json_encode($carro, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);

		$response->getBody()->write($json);
		return $response
				->withStatus(200) 
				->withHeader("Content-Type", "application/json");
		}
		return $response-> withStatus(404);
    }

	public function inserir(Request $request, Response $response, array $args): Response {
		$jsonArrayAssoc = $request->getParsedBody();
		$carro = $this->carroMapper->mapFromJsonToObject($jsonArrayAssoc);

				
		$carro = $this->carroDAO->insert($carro);

		$json = json_encode($carro, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);

			$response->getBody()->write($json);
			return $response
				->withStatus(201) 
				->withHeader("Content-Type", "application/json");
		
    }

}