<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos_model extends CI_Model {

    public function getPedidos(){
        
        $this->db->select('pedidos.*, produtos.*, categorias.nome_categoria, clientes.*');
        $this->db->from('pedidos');
        $this->db->join('produtos', 'produtos.id = pedidos.id_produto_ped', 'left');
        $this->db->join('categorias', 'categorias.id = pedidos.id_categoria_ped', 'left');
        $this->db->join('clientes', 'clientes.id = pedidos.id_cliente_ped', 'left');
        $query = $this->db->get();
        return $query->result();
        
    }
    public function getpedidosId($id=NULL){

        if ($id) {
            $this->db->select('produtos.*, marcas.nome_marca, categorias.nome_categoria');
            $this->db->from('produtos');
            $this->db->join('marcas', 'marcas.id = produtos.id_marca', 'left');
            $this->db->join('categorias', 'categorias.id = produtos.id_categoria', 'left');
            $this->db->where('produtos.id', $id);
            $this->db->limit(1);

            $query = $this->db->get();

            return $query->row();
        }
    }


    // LISTAR CATEGORIAS ATIVAS
    public function geIdCategorias(){

        $this->db->where('ativo', 1);
        return $this->db->get('categorias')->result();

    }
    // LISTAR PRODUTOS CATEGORIA
    public function geIdProdutos(){

        $this->db->where('id_categoria', 1);
        return $this->db->get('produtos')->result();

    }//
    public function doInsert($dados=NULL){

        if (is_array($dados)) {
            $this->db->insert('pedidos', $dados);
            if ($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Pedido efetuado com sucesso', 'sucesso');
            }
            else {
                setMsg('msgCadastro',    'erro ao realizar pedido', 'erro');
            }
        }

    }

    //Listar produtos pedidos
    public function getProdutos($id=NULL){

        if ($id) {
            $this->db->select('produtos. nome_produto, produto. id');
            $this->db->from('produtos');
            $this->db->join('categorias', 'categorias.id = produtos.id_categoria', 'inner');
            $this->db->where('categorias.id', $id);
            return $this->db->get()->result();
        }
    }

}