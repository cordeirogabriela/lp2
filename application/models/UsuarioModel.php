<?php

include_once APPPATH . 'libraries/component/Table.php';
include_once APPPATH . 'libraries/util/ButtonGenerator.php';

class UsuarioModel extends CI_Model
{

    function __construct()
    {
        $this->load->library('pessoa');   
    }

    public function create()
    {
        if (sizeof($_POST) == 0) return;

        if ($this->validator->validateUser()) {

            $data = $this->readPostData();
            // $celular = $this->input->post('celular');
            // $email = $this->input->post('email');

            // $data['nome'] = $this->input->post('nome');
            // $data['snome'] = $this->input->post('snome');

            // $pass = $this->input->post('senha');
            // $data['senha'] = md5($pass);
           
            $id = $this->pessoa->create($data);

            $fone['numero'] = $this->input->post('telefone');
            $fone['id_pessoa'] = $id;
            $this->load->library('telefone');
            $this->telefone->create($fone);

            $mail['endereco'] = $this->input->post('email'); //ou muda pra email depende da coluna da tabela
            $mail['id_pessoa'] = $id;
            $this->load->library('mail');
            $this->mail->create($mail);
        } else {
            return validation_errors();
        }
    }

    private function readPostData(){
        $data['nome'] = $this->input->post('nome');
        $data['snome'] = $this->input->post('snome');
        $pass = $this->input->post('senha');
        $data['senha'] = md5($pass);

        return $data;
    }

    public function update(){
        if(sizeof($_POST) == 0) return;

        if ($this->validator->validateUser(true)){

        }else{
            return validation_errors();
        }


    }


    public function listUser()
    {
        $this->load->library('pessoa');
        $data = $this->pessoa->listaPessoa();

        $url = base_url('usuario/editar');

        foreach ($data as $key => $row) {
            //$data[$key]['btn'] = ButtonGesnerator::editHandler($row);
            $data[$key]['btn'] = ButtonGenerator::editHandler($row, $url);
        }



        $label = ['', 'Nome', 'Sobrenome', 'Email', 'Telefone', ''];
        $table = new Table($data, $label);
        return $table->getHTML();
    }


    public function loadUser($id)
    {
        $pessoa = $this->pessoa->getById($id);

        

        unset($pessoa['senha']);

        $this->load->library('mail'); 
        $email = $this->mail->getByUserId($id);
        $v['email']= $email['endereco'];


        $this->load->library('telefone'); 
        $telefone = $this->telefone->getByUserId($id);
        $v['telefone']= $telefone['numero'];

        

        $_POST = array_merge($pessoa, $v);

    }


    // public function editHandler($row){
    //     $html = '<a><i id="'.$row['id'];
    //     $html .= '"class="fas fa-edit mr-3 ';
    //     $html .= 'indigo-text edit_btn"></i></a>';
    //     return $html;
    // }
}
