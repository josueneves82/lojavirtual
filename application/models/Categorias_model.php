<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model{

    public function getCategorias(){

        return $this->db->get('categorias')->result();
    }

    public function doInsert($dados=NULL){

        if (is_array($dados)) {
            $this->db->insert('categorias', $dados);
            // msg de alteração no BD
            if ($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Categoria cadastrada com sucesso!', 'sucesso');
            }
            else {
                setMsg('msgCadastro', 'Erro ao cadastrar categoria', 'erro');
            }
        }
    }

    public function getCategoriaId($id_categoria=NULL){

        if ($id_categoria) {
            $this->db->where('id', $id_categoria);
            $query= $this->db->get('categorias');
            return $query->row();
        }
    }

    public function doUpdate($dados=NULL, $id_categoria=NULL){

        if (is_array($dados)) {
            
            $this->db->update('categorias', $dados, array('id' => $id_categoria));
            if ($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Categoria atualizado com sucesso!', 'sucesso');
            }
            else {
                setMsg('msgCadastro', 'Erro ao atualizar categoria', 'erro');
            }
        }
    }

    public function doDelete($id_categoria=NULL){

        if ($id_categoria) {
            $this->db->delete('categorias', array('id' => $id_categoria));
            
            if ($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Categoria deletado com sucesso!', 'sucesso');
            }
            else {
                setMsg('msgCadastro', 'erro ao deletar Categoria', 'erro');
            }
        }
        
    }

    
}