<?php
$nome_modulo = "NOTÍCIAS";
$nome_tela = "cadastrando";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>


<form method="POST" action="noticias-add-ok.php" enctype="multipart/form-data">
    <div id="form_resp_add">
        
        
        <label>Data Publicação:</label> &nbsp;&nbsp;&nbsp;&nbsp;
        <input class="form-control-static" name="data_publicacao" type="date" value="<?php echo date('Y-m-d');?>" readonly/> &nbsp;&nbsp;&nbsp;&nbsp;

        <label>Data Evento:</label>&nbsp;&nbsp;&nbsp;&nbsp;
        <input class="form-control-static" name="data_evento"     type="date" value="<?php echo date('Y-m-d', strtotime("+30 days",strtotime(date("Y-m-d"))));?>"/> &nbsp;&nbsp;&nbsp;&nbsp;
        
        <label>Data Validade:</label>&nbsp;&nbsp;&nbsp;&nbsp;
        <input class="form-control-static" name="data_validade"   type="date" value="<?php echo date('Y-m-d', strtotime("+180 days",strtotime(date("Y-m-d"))));?>"/> &nbsp;&nbsp;&nbsp;&nbsp;
        
        <br><br>

        <table>
         <tbody>
             <tr><td>
<?php // MONTANDO A LISTA DE RESPONSAVEIS DO SELECT
$objCurso = new Tiponoticia();
$listar=$objCurso->listar($complemento_sql);		
$saida='<option value="0">(nenhum selecionado) Aqui você pode selecionar um...</option>';
foreach ($listar as $dados){
    $saida .= '<option value="'.$dados->id.'"';
    if ( $dados->id == $_GET['id_tiponoticia'] ) { 
        $saida .= " selected";
    }
    $saida .= '>'.$dados->id." - ".$dados->descricao.'</option>';
}
?>
        <label>Tipo Aviso/Notícia:</label><br>
        <select name="id_tiponoticia" class="form-control-static">
            <?php echo $saida; ?>
        </select><br><br>
        
        
<?php // MONTANDO A LISTA DE ASSUNTOS DO SELECT
$obj = new Assunto();
$listar=$obj->listar($complemento_sql);		
$saida='<option value="0">(nenhum selecionado) Aqui você pode selecionar um...</option>';
foreach ($listar as $dados){
    $saida .= '<option value="'.$dados->id.'"';
    if ( $dados->id == $_GET['id_assunto'] ) { 
        $saida .= " selected";
    }
    $saida .= '>'.$dados->nome_curso." - ".$dados->nomecurto.'</option>';
}
?>
        <label>Assunto:</label><br>
        <select name="id_assunto" class="form-control-static">
            <?php echo $saida; ?>
        </select><br><br>

<?php // MONTANDO A LISTA DE RESPONSAVEIS DO SELECT
$obj = new Responsavel();
$listar=$obj->listar($complemento_sql);		
$saida='<option value="0">(nenhum selecionado) Aqui você pode selecionar um...</option>';
foreach ($listar as $dados){
    $saida .= '<option value="'.$dados->id.'"';
    if ( $dados->id == $_GET['id_responsavel'] ) { 
        $saida .= " selected";
    }
    $saida .= '>'.$dados->nome.'</option>';
}
?>
        <label>Responsável:</label><br>
        <select name="id_responsavel" class="form-control-static">
            <?php echo $saida; ?>
        </select><br><br>

        </td><td>
        
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
        </td><td>

        <br>
        <label>TÍTULO:</label>
        <input class="form-control" name="titulo" type="text" maxlength="50">
            
        <br>
        <label>TEXTO:</label>
        <textarea class="form-control" name="texto"  type="text" rows="10" cols="30" maxlength="300"></textarea>
        
        </td></tr>
        </tbody>
        </table>
        
        <label>Imagem:</label>
        <input name="imagem" type="file" maxlength="150"/><br>
        
        <label>Anexo:</label>
        <input name="anexo"  type="file" maxlength="150"/><br>

        <button type="submit" name="botao" value="Enviar" class="btn btn-success">Enviar</button> &nbsp;&nbsp;
        <button type="reset" class="btn btn-danger">Limpar</button> &nbsp;&nbsp;
        <a href='noticias.php' class='btn btn-default'>Voltar</a>
    </div>
</form>

<?php
include_once '../sistema/rodape.php';
?>