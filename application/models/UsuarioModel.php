<?php

class UsuarioModel extends CI_Model{
    public function create(){
        if(sizeof($_POST) == 0) return;


        $celular = $this->input->post('celular');
        $email = $this->input->post('email');
        
        $data['nome'] = $this->input->post('nome');
        $data['snome'] = $this->input->post('snome');
        $data['senha'] = $this->input->post('senha');

        $this->load->library('pessoa');
        $id= $this->pessoa->create($data);

        $fone['numero'] = $this->input->post('telefone');
        $fone['id_pessoa'] = $id;
        $this->load->library('telefone');
        $this->telefone->create($fone);

        $mail['endereco'] = $this->input->post('email'); //ou muda pra email depende da coluna da tabela
        $mail['id_pessoa'] = $id;
        $this->load->library('mail');
        $this->mail->create($mail);


    }
}