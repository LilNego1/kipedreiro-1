<?php
namespace App\Backend\Controllers;
use App\Backend\Model\Servico;
use App\Backend\Database\Database;
use App\Backend\Model\Produto;
use App\Backend\Model\Pedido;

class PublicApiController {
    public $servico;
    public $db;
    public $produtoModel;
    public $pedidoModel;

    public function __construct() {
        $this->db = Database::getInstance();
        $this->servico = new Servico($this->db);
        $this->produtoModel = new Produto($this->db);
        $this->pedidoModel = new Pedido($this->db);
    }

    public function getServicos() {
        $dados = $this->servico->buscarServicosAtivos();
        foreach ($dados as &$servico) {
            $servico['caminho_imagem'] = '/backend/upload' . $servico['foto_servico'];
        }
        unset($servico);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'success',
            'data' => $dados
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        exit;
    }

    public function getProdutos() {
        header('Content-Type: application/json');
        $dados = $this->produtoModel->buscarProdutosAtivos();
        http_response_code(200);
        echo json_encode([
            'status' => 'success',
            'data' => $dados
        ], JSON_UNESCAPED_SLASHES);
        exit;
    }
    public function salvarPedido(){
        header('Content-Type: application/json');
        $carrinho = json_decode(file_get_contents('php://input'), true);
        if(empty($carrinho) || !is_array($carrinho)){
            http_response_code(400);
            echo json_encode([
                'status' => 'error',
                'message' => 'Carrinho vazio.'
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            exit;
        }
        $novoPedido = $this->pedidoModel->criarPedido($carrinho);
        if($novoPedido){
            http_response_code(201);
            echo json_encode([
                'status' => 'success',
                'message' => 'Pedido salvo com sucesso.',
                'pedido_id' => $novoPedido
            ]);
            exit;
        } else {
            http_response_code(500);
            echo json_encode([
                'status' => 'error',
                'message' => 'Erro ao salvar o pedido.'
            ]);
            exit;
        }

    }
}