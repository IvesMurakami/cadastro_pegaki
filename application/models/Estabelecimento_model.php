<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estabelecimento_model extends CI_Model {

     public function get($id = null){

         if ($id) {
             $this->db->where('estabelecimento_id', $id);
         }
         $this->db->order_by("nomefantasia", 'desc');
         return $this->db->get('estabelecimentos');
    }

    public function save($data = null, $id = null) {

        if ($data) {
            if ($id) {
                if ($this->db->query("
                      UPDATE `estabelecimentos`
                         SET nomefantasia = '$data[0]',
                             cep = '$data[1]',
                             rua = '$data[2]',
                             bairro = '$data[3]',
                             cidade = '$data[4]',
                             uf = '$data[5]'
                       WHERE `estabelecimento_id` = $id
                      ")){
                    return true;
                } else {
                    return false;
                }
            } else {
                if ($this->db->query("
                      INSERT INTO ESTABELECIMENTOS(NOMEFANTASIA, CEP, RUA, BAIRRO, CIDADE, UF )
                           VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')
                      ")) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    public function delete($id = null){
        if ($id) {
            return $this->db->where('estabelecimento_id', $id)->delete('estabelecimentos');
        }
    }
}
