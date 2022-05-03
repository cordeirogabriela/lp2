<?php

include_once APPPATH.'libraries/component/Table.php';

class UsuarioModel extends CI_Model
{
    public function create()
    {
        if (sizeof($_POST) == 0) return;

        if ($this->validator->validateUser()) {
            $celular = $this->input->post('celular');
            $email = $this->input->post('email');

            $data['nome'] = $this->input->post('nome');
            $data['snome'] = $this->input->post('snome');
            $data['senha'] = $this->input->post('senha');

            $this->load->library('pessoa');
            $id = $this->pessoa->create($data);

            $fone['numero'] = $this->input->post('telefone');
            $fone['id_pessoa'] = $id;
            $this->load->library('telefone');
            $this->telefone->create($fone);

            $mail['endereco'] = $this->input->post('email'); //ou muda pra email depende da coluna da tabela
            $mail['id_pessoa'] = $id;
            $this->load->library('mail');
            $this->mail->create($mail);
        }else{
            return validation_errors();
        }
    }

    

    public function listUser()
    {
        $this->load->library('pessoa');
        $data = $this->pessoa->listaPessoa();

        foreach($data as $key => $row){
            $data[$key]['btn'] = $this->editHandler($row);
        }

        $label = ['', 'Nome', 'Sobrenome', 'Email', 'Telefone', ''];
        $table = new Table($data, $label);
        return $table->getHTML();
    }

    public function editHandler($row){
        $html = '<a><i id="'.$row['id'];
        $html .= '"class="fas fa-edit mr-3 ';
        $html .= 'indigo-text edit_btn"></i></a>';
        return $html;
    }
}
