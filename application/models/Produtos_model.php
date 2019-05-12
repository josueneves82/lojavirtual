<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_model extends CI_Model {

    public function getProdutos(){
        
        $this->db->select('produtos.*, marcas.nome_marca, categorias.nome_categoria');
        $this->db->from('produtos');
        $this->db->join('marcas', 'marcas.id = produtos.id_marca', 'left');
        $this->db->join('categorias', 'categorias.id = produtos.id_categoria', 'left');
        $query = $this->db->get();
        return $query->result();
        
    }
    public function getProdutoId($id=NULL){

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
    // LISTAR MARCAS ATIVAS
    public function getIdMarcas(){

        $this->db->where('ativo', 1);
        return $this->db->get('marcas')->result();

    }

    // LISTAR CATEGORIAS ATIVAS
    public function geIdCategorias(){

        $this->db->where('ativo', 1);
        return $this->db->get('categorias')->result();

    }

    public function doUpdate($dados=NULL, $id_produto=NULL){

        if (is_array($dados) && $id_produto) {
            $this->db->update('produtos', $dados, array('id' => $id_produto));

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
                setMsg('msgCadastro', 'Produto cadastrado', 'sucesso');
            }
            else {
                setMsg('msgCadastro',    'erro ao cadastrar produto', 'erro');
            }
        }

    }
    public function doDelete($id_produto=NULL){

        if ($id_produto) {
            $this->db->delete('produtos', array('id' => $id_produto));
            
            if ($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'produto deletado com sucesso!', 'sucesso');
            }
            else {
                setMsg('msgCadastro', 'erro ao deletar produto', 'erro');
            }
        }
    }
}