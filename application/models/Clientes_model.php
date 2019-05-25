<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {

    public function getClientes(){
        
        return $this->db->get('clientes')->result();
        
    }

    // add novo cliente
    public function doInsert($dados=NULL){

        if (is_array($dados)) {
            $this->db->insert('clientes', $dados);
            if ($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Cliente cadastrado', 'sucesso');
            }
            else {
                setMsg('msgCadastro',    'erro ao cadastrar cliente', 'erro');
            }
        }

    }

    // listar cliente id
    public function getClienteId($id_cliente=NULL){

        if ($id_cliente) {
            $this->db->where('id_cliente', $id_cliente);
            $this->db->limit(1);
            $query = $this->db->get('clientes');
            return $query->row();
        }
    }
    // update cliente
    public function doUpdate($dados=NULL, $id_cliente=NULL){

        if (is_array($dados) && $id_cliente) {
            $this->db->update('clientes', $dados, array('id_cliente' => $id_cliente));

            // verificar auteraçao no bd
            if ($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Cliente atualizado', 'sucesso');
            }
            else {
                setMsg('msgCadastro', 'erro ao atualizar cliente', 'erro');
            }
        }

    }
    // deletar cliente
    public function doDelete($id_cliente=NULL){

        if ($id_cliente) {
            $this->db->delete('clientes', array('id_cliente' => $id_cliente));
            
            if ($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Cliente deletado com sucesso!', 'sucesso');
            }
            else {
                setMsg('msgCadastro', 'erro ao deletar cliente', 'erro');
            }
        }
        
    }





}
  