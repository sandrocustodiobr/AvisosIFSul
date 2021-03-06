<?php
$nome_modulo = "NOTÍCIAS";
$nome_tela = "editar";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php
if (isset($_GET["id"])) {
    $obj3 = new Noticia();
    $obj3->id = $_GET["id"];
    $item78 = $obj3->retornarunico();
    //$item78->MostraDados();
//    echo "<pre>";
//    var_dump($item78);
//    echo "</pre>";
} else {
    header("ID não informado.");
}

function DataParaTela($pData) {
    $data = new Data($pData);
    return $data->FormatoParaTela();
}
?>

<form method="POST" action="noticias-up-ok.php" enctype="multipart/form-data">
        </div>
    </div>
    <div id="form_noticia_up">

        <div class="row">
            <div class="col-md-5">
                <!-- ID e Data publicacao -->
                <input class="form-control-static" name="id" type="number" value="<?php echo $item78->id; ?>" readonly hidden/>
                <input class="form-control-static" name="data_publicacao" type="date" value="<?php echo $item78->data_publicacao; ?>" readonly hidden/>
                <!-- Responsável: -->
                <input name="id_responsavel" type="number" value="<?php echo $_SESSION['id']; ?>" readonly hidden>
                
                <?php
                // MONTANDO A LISTA DE ASSUNTOS DO SELECT
                $complemento_sql = " where id_responsavel=" . $_SESSION['id'];
                $obj = new RespAssunto();
                $listar = $obj->listar($complemento_sql);
                $saida = '<option value="0">(nenhum selecionado) Aqui você pode selecionar um...</option>';
                foreach ($listar as $dados) {
//              echo "<pre>";
//              echo var_dump($dados);
//              echo "</pre>";
                    $saida .= '<option value="' . $dados->id_assunto . '"';
                    if ($dados->id_assunto == $item78->id_assunto) {
                        $saida .= " selected";
                    }
                    $saida .= '>';
                    $saida .= ($dados->id_curso > 0) ? $dados->nome_curso : '(Todos)';
                    //$saida .= $dados->id_curso." - ".$dados->nome_curso;
                    $saida .= " - " . $dados->nome_assunto . '</option>';
                }
                ?>
                <label>Assunto:</label>&nbsp;&nbsp;<small>( <a href="../responsaveis/resp-assuntos.php">gereciar assuntos</a> )</small><br>
                <select name="id_assunto" class="form-control-static">
                    <?php echo $saida; ?>
                </select>
            </div>
            <div class="col-md-7">
                <label>TÍTULO:</label>
                <input class="form-control" name="titulo" type="text" maxlength="50" value="<?php echo $item78->titulo; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <br><br>
                <label>Data Evento: </label>&nbsp;&nbsp;&nbsp;&nbsp;
                <?php //echo DataParaTela($item78->data_evento); // PADRÃO USADO ANTERIORMENTE NOS INPUT TYPE=DATE ?>
                <input class="form-control-static" name="data_evento"     type="date" value="<?php echo $item78->data_evento; ?>"/> &nbsp;&nbsp;&nbsp;&nbsp;
                
                <br><br><br>
                <label>Data Validade:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-control-static" name="data_validade"   type="date" value="<?php echo $item78->data_validade; ?>"/> &nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <div class="col-md-7">
                <br>
                <label>TEXTO:</label>
                <textarea class="form-control" name="texto"  type="text" rows="8" cols="30" maxlength="300"><?php echo $item78->texto; ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <br>
                <label>Imagem:</label>
                <a href="<?php echo "${pasta_upload}$item78->imagem"; ?>" target="_blank" class='btn btn-default'>Ver/abrir</a> &nbsp;&nbsp;
                <!-- <a id="limpa_imagem" class='btn btn-warning' onclick="LimpaImagem()">Limpar</a> &nbsp;&nbsp; -->
                <input name="limpa_imagem" type="checkbox" maxlength="150"/>Remover
                <input class="form-control" name="imagem" type="text" maxlength="150" value="<?php echo $item78->imagem; ?>" readonly/>
                <br>Alterar/Incluir:
                <input name="imagem" type="file" maxlength="150"/>
            </div>
            <div class="col-md-7">
                <br>
                <label>Anexo:</label>
                <a href="<?php echo "${pasta_upload}$item78->anexo"; ?>" target="_blank" class='btn btn-default'>Ver/abrir</a> &nbsp;&nbsp;
                <input name="limpa_anexo" type="checkbox" maxlength="150"/>Remover
                <input class="form-control" name="anexo" type="text" maxlength="150" value="<?php echo $item78->anexo; ?>" readonly/>
                <br>Alterar/Incluir: <input name="anexo" type="file" maxlength="150"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <br><br>
                <button type="submit" name="botao" value="Enviar" class="btn btn-success">Enviar</button> &nbsp;&nbsp;
                <button type="reset" class="btn btn-warning">Limpar</button> &nbsp;&nbsp;
                <a href='noticias.php' class='btn btn-default'>Voltar</a>
            </div>
</form>

<?php
include_once '../sistema/rodape.php';
?>