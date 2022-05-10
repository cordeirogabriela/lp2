<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/util/CI_Object.php';

class Validator extends CI_Object{
    public function validateUser($update = false) {
        $this->form_validation->set_rules('nome', 'Nome da Pessoa', 'required | min_length(2) | max_length(19)');
        $this->form_validation->set_rules('snome', 'Sobrenome da Pessoa', 'required | min_length(2)  max_length(256)');
        $this->form_validation->set_rules('email', 'Endereço eletronico', 'required | valid_email');
        $this->form_validation->set_rules('telefone', 'Telefone', 'min_length(10) | max_lenght(14)');

        $cpl = $update ? '' : 'required | '; 
        $this->form_validation->set_rules('senha', 'senha', $cpl.'min_length(8) | max_length(32)');
        $this->form_validation->set_rules('conf_senha', 'Confirmação senha', $cpl.'matches[senha]');

        
        return $this->form_validation->run();
    }

}