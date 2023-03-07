<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listagem</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    
        <style>
            h1{
                display:flex;
                justify-content: center;   
            }
            table{
                margin-top:40px;
            }
        </style>

    </head>
    <body>
        <div class="container">
            <div>
                <h1>Listar Usuarios</h1>
                <form method="GET" action="<?= base_url('Pessoas') ?>">
                    <input type="hidden" name="buscar" value="1">
                    Nome: <input type="text" name="nome" class="form-control" value="<?= $this->input->get('nome') ? $this->input->get('nome') : '' ?>">
                    Dt. Nascimento: De: <input type="date" class="form-control" name="data_inicio" value="<?= $this->input->get('data_inicio') ? $this->input->get('data_inicio') : '' ?>"> a <input type="date" name="data_fim" class="form-control" value="<?= isset($_GET['data_fim']) ? $_GET['data_fim'] : '' ?>">
                    
                    Tipo de Pessoa: 
                    <?php
                        $opcoes = ["-" => "", "PF" => "PF", "PJ" => "PJ" ];
                    ?>
                    
                    <select class="form-control" name="tipo_pessoa" id="tipo_pessoa">
                        <?php foreach($opcoes as $label => $valor): ?>
                            <option value="<?=$valor?>" <?=$this->input->get('tipo_pessoa') && $this->input->get('tipo_pessoa') == $valor ? 'selected':""?>><?=$label?></option>
                        <?php endforeach;?>
                    </select><br>
                    <button type="button" class="btn btn-primary"  onclick="window.location = '<?= base_url('Pessoas/') ?>'">Limpar</button>
                    <button type="submit" class="btn btn-primary" >Buscar</button>
                </form>
            </div>
            
            <a href="<?= base_url('Pessoas/form/') ?>">Incluir</a>
            <?php
            if (count($pessoas) > 0)
            {
                ?>
                <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">...</th>
                    </tr>
                </thead>                    
                    </tr>
                    <?php
                    foreach ($pessoas as $pessoa)
                    {
                        ?>
                        <tr>
                            <td>
                                <?= $pessoa['id'] ?>
                            </td>
                            <td>
                                <?= $pessoa['nome'] ?>
                            </td>
                            <td>
                                <?= $pessoa['cpf'] ?>
                            </td>
                            <td>
                                <a href="<?= base_url('Pessoas/form/') ?>?id=<?= $pessoa['id'] ?>">Editar</a>
                                <a href="javascript:if(confirm('Tem certeza?')){window.location='<?= base_url("Pessoas/excluir/" . $pessoa['id'] . "/") ?>'}">Excluir</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <?php
            }
            else
            {
                ?>
                Não há registro no cadastro.
            <?php } ?>
        </div>
    </body>
</html>