<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos_model extends CI_Model {

    
    public function getRelatorio(){
        
        return $this->db->get('pedidos')->result();
        
    }



    public function doInsert($dadosPedido=NULL){

        if (is_array($dadosPedido)) {
            $this->db->insert('pedidos', $dadosPedido);

            if ($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Pedido efetuado', 'sucesso');
            }
            else {
                setMsg('msgCadastro',    'erro ao fazer o pedido', 'erro');
            }
        }

    }
   

}