<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_loja_model extends CI_Model {


    /* Pegar daos da tabela*/
    public function getConfig(){

         $this->db->where('id', 1);
         $this->db->limit(1);
         $query = $this->db->get('config_loja');
         return $query->row();
    }

    /* atualizar dados da tabela*/
    public function doUpdate($dados=NULL){
        if (is_array($dados)) {
            $this->db->update('config_loja', $dados, array('id' => 1));
            if ($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Configuração atualizada com sucesso', 'sucesso');
            }
            else {
                setMsg('msgCadastro', 'erro na atualização', 'erro');
                redirect('admin/config', refresh);
            }
        }
    }
    
    
}