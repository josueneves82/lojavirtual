<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios_model extends CI_Model {

    public function getRelatorio(){
        
        $this->db->select('pedidos.*, produtos.*, categorias.*, clientes.*');
        $this->db->from('pedidos');
        $this->db->join('produtos', 'produtos.cod_produto = pedidos.cod_produto', 'left');
        $this->db->join('categorias', 'categorias.id_categoria = produtos.id_categoria_produto', 'left');
        $this->db->join('clientes', 'clientes.cpf_cliente = pedidos.cpf_pedido', 'left');
        $query = $this->db->get();
        return $query->result();
        
    }

    public function getRelatorioId($id=NULL){

        if ($id) {
            $this->db->select('pedidos.*, produtos.*, categorias.*, clientes.*');
            $this->db->from('pedidos');
            $this->db->join('produtos', 'produtos.cod_produto = pedidos.cod_produto', 'left');
            $this->db->join('categorias', 'categorias.id_categoria = produtos.id_categoria_produto', 'left');
            $this->db->join('clientes', 'clientes.cpf_cliente = pedidos.cpf_pedido', 'left');
            $this->db->where('pedidos.id_ped', $id);
            $this->db->limit(1);

            $query = $this->db->get();

            return $query->row();
        }
    }
   
}