<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loja_model extends CI_Model {

    public function getDadosLoja(){

        $this->db->where('id', 1);
        return $this->db->get('config_loja')->row();

        
    }
    public function getCategoriaLoja(){

        $this->db->where('ativo_categoria', 1);
        return $this->db->get('categorias')->result();

        
    }
    public function getProdutoDestaque($total_produto=NULL){

        if ($total_produto) {

            $this->db->select(
                'produtos.nome_produto,
                 produtos.valor_produto,
                 produtos.meta_link_produto,
                 produto_fotos.foto');
            
            $this->db->from('produtos');
            $this->db->join('produto_fotos','produto_fotos.id_produto_foto = produtos.id_produto', 'left');
            $this->db->where(['produtos.ativo_produto' => 1,'produtos.destaque_produto' => 1]);
            $this->db->limit($total_produto);
            $this->db->order_by('produtos.id_produto', 'RANDOM');
            $this->db->distinct();
            return $this->db->get()->result();
        }
    }
    
}