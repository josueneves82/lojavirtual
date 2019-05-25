<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_model extends CI_Model {

    public function getProdutos(){
        
        $this->db->select('produtos.*, marcas.nome_marca, categorias.nome_categoria');
        $this->db->from('produtos');
        $this->db->join('marcas', 'marcas.id_marca = produtos.id_marca_produto', 'left');
        $this->db->join('categorias', 'categorias.id_categoria = produtos.id_categoria_produto', 'left');
        $query = $this->db->get();
        return $query->result();
        
    }
    public function getProdutoId($id_produto=NULL){

        if ($id_produto) {
            $this->db->where('id_produto', $id_produto);
            $this->db->limit(1);
            $query = $this->db->get('produtos');

            return $query->row();
        }
    }
    // LISTAR MARCAS ATIVAS
    public function getIdMarcas(){

        $this->db->where('ativo_marca', 1);
        return $this->db->get('marcas')->result();

    }

    // LISTAR CATEGORIAS ATIVAS
    public function geIdCategorias(){

        $this->db->where('ativo_categoria', 1);
        return $this->db->get('categorias')->result();

    }

    public function doUpdate($dados=NULL, $id_produto=NULL){

        if (is_array($dados)) {
            $this->db->update('produtos', $dados, array('id_produto' => $id_produto));

            // verificar auteraçao no bd
            if ($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Produtos atualizado', 'sucesso');
            }
            else {
                setMsg('msgCadastro', 'erro ao atualizar Produtos', 'erro');
            }
        }

    }

    public function doInsert($dados=NULL){

        if (is_array($dados)) {
            $this->db->insert('produtos', $dados);
            if ($this->db->affected_rows() > 0) {

                $last_id= $this->db->insert_id();
                $this->session->set_userdata('last_id', $last_id);

                setMsg('msgCadastro', 'Produto cadastrado', 'sucesso');
            }
            else {
                setMsg('msgCadastro',    'erro ao cadastrar produto', 'erro');
            }
        }

    }
    public function doDelete($id_produto=NULL){

        if ($id_produto) {
            $this->db->delete('produtos', array('id_produto' => $id_produto));
            
            if ($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'produto deletado com sucesso!', 'sucesso');
            }
            else {
                setMsg('msgCadastro', 'erro ao deletar produto', 'erro');
            }
        }
    }
    public function doInsertFoto($dados=NULL){

        if (is_array($dados)) {
            $this->db->insert('produto_fotos', $dados);
        }
    }
    public function getFotoProduto($id_produto=NULL){
        if ($id_produto) {
            $this->db->where('id_produto_foto', $id_produto);
            return $this->db->get('produto_fotos')->result();
        }
    }
    public function doDeleteFotoProduto($id_produto=NULL){
        if ($id_produto) {
            $this->db->delete('produto_fotos', ['id_produto_foto' => $id_produto]);
        }
    }
}