<?php

class PessoasModel extends CI_Model
{

    public function getPessoas($filtros = [])
    {
        $this->db->from('pessoa');

        if ($filtros)
        { 
            $nome        = $filtros['nome'];
            $data_inicio = $filtros['data_inicio'];
            $data_fim    = $filtros['data_fim'];
            $tipo_pessoa = $filtros['tipo_pessoa'];
            if ($nome)
            {
                $this->db->like('nome', $nome);
            }

            if ($data_inicio)
            {
                $this->db->where('data_nascimento >=', $data_inicio);
            }

            if ($data_fim)
            {
                $this->db->where('data_nascimento >=', $data_fim);
            }

            if ($tipo_pessoa)
            {
                $this->db->like('tipoPessoa', $tipo_pessoa);
            }
        }
        $resultado = $this->db->get();

        //echo $this->db->last_query();

        return $resultado->result_array();
    }

    public function getPessoa($id)
    {
        $resultado = $this->db->where('id', $id)
                ->get('pessoa');

        return $resultado->row_array();
    }

    public function inserirPessoa($dados)
    {
        $dados['data_criacao'] = date('Y-m-d H:i:s');
        $dados['data_atualizacao'] = date('Y-m-d H:i:s');
        return $this->db->insert('pessoa', $dados);
    }

    public function alterarPessoa($id, $dados)
    {
        return $this->db->where('id', $id)
                        ->update('pessoa', $dados);
    }

    public function excluirPessoa($id)
    {
        return $this->db->where('id', $id)
                        ->delete('pessoa');
    }

}
    