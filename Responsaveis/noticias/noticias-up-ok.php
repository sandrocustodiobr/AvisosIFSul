<?php
$nome_modulo = "NOTÍCIAS";
$nome_tela = "editar";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>


<?php
function DataParaGravacao($pData) {
    $data = new Data($pData);
    return $data->FormatoParaGravacao();
}

// DEBUG
/*echo $_POST['id']            ."<br>";
echo DataParaGravacao($_POST['data_publicacao'])."<br>";
echo DataParaGravacao($_POST['data_evento'])    ."<br>";
echo DataParaGravacao($_POST['data_validade'])  ."<br>";
echo $_POST['id_tiponoticia']."<br>";
echo $_POST['id_assunto']    ."<br>";
echo $_POST['id_responsavel']."<br>";
echo $_POST['texto']         ."<br>";
//echo $nome_imagem."<br>";
//echo $nome_anexo ."<br>";
//print_r($_FILES);
echo "<br>";*/

$obj= new Noticia();
$obj->id            =$_POST['id'];
$obj->data_publicacao=$_POST['data_publicacao']; // DataParaGravacao($_POST['data_publicacao']); // modo anterior
$obj->data_evento    =$_POST['data_evento'];
$obj->data_validade  =$_POST['data_validade'];
$obj->id_tiponoticia=$_POST['id_tiponoticia'];
$obj->id_assunto    =$_POST['id_assunto'];
$obj->id_responsavel=$_POST['id_responsavel'];
$obj->titulo        = strip_tags($_POST['titulo']);
$obj->texto         = strip_tags($_POST['texto']);
$obj->imagem        =$_POST['imagem'];  // pode vir a ser alterado pelo $_FILES ou pelo limpa_imagem
$obj->anexo         =$_POST['anexo'];   // pode vir a ser alterado pelo $_FILES ou pelo limpa_anexo

if ( $_POST['limpa_imagem'] == "on" ) { 
    if ( unlink($pasta_upload.$_POST['imagem']) ) {
        $obj->imagem = "";
        echo "Imagem removida.<br>";
    } else {
        echo "Erro ao remover imagem.<br>";
    }
}

if ( $_POST['limpa_anexo'] == "on" ) { 
    if ( unlink($pasta_upload.$_POST['anexo']) ) {
        $obj->anexo = "";
        echo "Anexo removido.<br>";
    } else {
        echo "Erro ao remover anexo.<br>";
    }
}
//echo $_POST['limpa_anexo']." / ".$_POST['limpa_imagem']."<br>";

if( $_FILES ) { // Verificando se existe o envio de arquivos.
	
	if( $_FILES['imagem'] && strlen($_FILES['imagem']['name']) > 0 ) { // Verifica se o campo não está vazio.
		$dir = '../../arquivos_upload/'; // Diretório que vai receber o arquivo.
		$tmpName = $_FILES['imagem']['tmp_name']; // Recebe o arquivo temporário.
		$name = $_FILES['imagem']['name']; // Recebe o nome do arquivo.
                $agora = date('Ymd_Hi_'); // YYYY/mm/ddHHMM_
                echo "Enviando ".$name." ...";
                if( move_uploaded_file( $tmpName, $dir.$agora.$name ) )  {
                    echo "ok.<br>";
                    $obj->imagem = $agora.$name; // ALTERA PARA O UPDATE
                } else {
                    echo "ERRO!<br>";
                }
        }
        
        if( $_FILES['anexo'] && strlen($_FILES['anexo']['name']) > 0 ) { // Verifica se o campo não está vazio.
		$dir = '../../arquivos_upload/'; // Diretório que vai receber o arquivo.
		$tmpName = $_FILES['anexo']['tmp_name']; // Recebe o arquivo temporário.
		$name = $_FILES['anexo']['name']; // Recebe o nome do arquivo.
                $agora = date('Ymd_Hi_'); // YYYY/mm/ddHHMM_
                echo "Enviando ".$name." ...";
                if( move_uploaded_file( $tmpName, $dir.$agora.$name ) )  {
                    echo "ok.<br>";
                    $obj->anexo = $agora.$name; // ALTERA PARA O UPDATE
                } else {
                    echo "ERRO!<br>";
                }
        }
        
} else {
    echo "FILES vazio.<br>";
}

//$obj->MostraDados();
//$feito=true;
$feito = $obj->editar();

if ($feito) {
        echo "Atualizado com sucesso.";
} else {
        echo "ERRO AO ATUALIZAR.";
}

?>
<br>
<br>
<a href='noticias.php' class='btn btn-default'>Voltar</a>


<?php
include_once '../sistema/rodape.php';
?>