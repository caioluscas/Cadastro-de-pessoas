<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pessoas extends CI_Controller
{   

    public function index()
    {
        $this->load->model('PessoasModel');

        $variaveis_view = [];

        $pessoas = $this->PessoasModel->getPessoas($this->input->get());
        $variaveis_view['pessoas'] = $pessoas;

        $this->load->view('Pessoas/index', $variaveis_view);
    }

    public function form()
    {
        $this->load->model('PessoasModel');
        $variaveis_view = [];

        $id = $this->input->get('id');
        if ($id) {
            $pessoa = $this->PessoasModel->getPessoa($id);
            $variaveis_view['pessoa'] = $pessoa;
        }
        $this->load->view('Pessoas/form',$variaveis_view);
    }

    public function salvar()
    {
        $this->load->model('PessoasModel');
        $id = $this->input->post('id');
        $dados = $this->input->post();
        // unset($dados['salvar']);
        if($id){
            $ok= $this->PessoasModel->alterarPessoa($id,$dados);
        }
        else{
            $ok=$this->PessoasModel->inserirPessoa($dados);
        }
        if($ok){
            echo 'Operação realizada com sucesso';
            echo '<br><br><a href="'. base_url('Pessoas/') .'">Voltar</a>';
        }
        else{
            echo 'ERRO';
        }
    }

    public function excluir($id){
        $this->load->model('PessoasModel');
        $ok=$this->PessoasModel->excluirPessoa($id);

        if($ok){
            echo 'Operação realizada com sucesso';
            echo '<br><br><a href="'. base_url('Pessoas/') .'">Voltar</a>';
        }
        else{
            echo 'ERRO';
        }
        
    }
}