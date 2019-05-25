<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas_model extends CI_Model {

    // listar marcas
    public function getMarcas(){
        
        return $this->db->get('marcas')->result();
        
    }

    // listar marca id
    public function getMarcaId($id_marca=NULL){

        if ($id_marca) {
            $this->db->where('id_marca', $id_marca);
            $this->db->limit(1);
            $query = $this->db->get('marcas');
            return $query->row();
        }
    }

    // add novo marca
    public function doInsert($dados=NULL){

        if (is_array($dados)) {
            $this->db->insert('marcas', $dados);
            if ($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Fornecedor cadastrado', 'sucesso');
            }
            else {
                setMsg('msgCadastro',    'erro ao cadastrar Fornecedor', 'erro');
            }
        }

    }
    // update cliente
    public function doUpdate($dados=NULL, $id_marca=NULL){

        if (is_array($dados) && $id_marca) {
            $this->db->update('marcas', $dados, array('id_marca' => $id_marca));

            // verificar auteraçao no bd
            if ($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Fornecedor atualizado', 'sucesso');
            }
            else {
                setMsg('msgCadastro', 'erro ao atualizar Fornecedor', 'erro');
            }
        }

    }
    // deletar cliente
    public function doDelete($id_marca=NULL){

        if ($id_marca) {
            $this->db->delete('marcas', array('id_marca' => $id_marca));
            
            if ($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Fornecedor deletado com sucesso!', 'sucesso');
            }
            else {
                setMsg('msgCadastro', 'erro ao deletar Fornecedor', 'erro');
            }
        }
        
    }
}