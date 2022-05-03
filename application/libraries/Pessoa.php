<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/dao/Dao.php';


class Pessoa extends Dao {

    function __construct(){
        parent::__construct('pessoa');
    }


    public function listaPessoa(){
        $sql = "SELECT pessoa.id, nome, snome, endereco AS email, numero AS telefone FROM pessoa, email, telefone WHERE pessoa.id = telefone.id_pessoa AND pessoa.id = email.id_pessoa;";
        
        $res = $this->db->query($sql);
        return $res->result_array();
    }




    // public function create($data){
    //     $this->db->insert('pessoa', $data);
    //     return $this->db->insert_id();
    // }

}