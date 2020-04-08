

<?php
  include '../banco/conexao.php';
  $conectar = getConnection();
?>

<?php
	function data($data){
	    return date("d/m/Y",strtotime($data));
	    // Y = Ano inteiro (ex: 2020)
	    // y = Ano pelo metade (ex: 20) 
	}

    date_default_timezone_set('America/Sao_Paulo');
    setlocale(LC_TIME, "pt_BR");
            
    $agora = getdate();

    $a = $agora["year"];
    $m = $agora["mon"];//utf8_encode(strftime("%B"));
    $d = $agora["mday"];
 
    $created = $d . "/" . $m . "/" . $a;
?>


<?php

	if(isset($_POST['emandamento']))
	{
		$id = $_POST['id'];
		$emandamento = "Em Andamento";

	    //atualizado dados na tabela
	    $sql = "UPDATE cursos SET status_curso = :status_curso WHERE id=:id";

	    $query = $conectar->prepare($sql);

	    $query->bindparam(':id', $id);
	    $query->bindparam(':status_curso', $emandamento);
	    $query->execute();
	    
	    //Redirecionado para a pagina de Listagem
	    header("Location: ../view/listagem.php");
	    
	}

	if(isset($_POST['concluido']))
	{
		$id = $_POST['id'];
		$concluido = "Concluído";

	    //atualizado dados na tabela
	    $sql = "UPDATE cursos SET status_curso = :status_curso WHERE id=:id";

	    $query = $conectar->prepare($sql);

	    $query->bindparam(':id', $id);
	    $query->bindparam(':status_curso', $concluido);
	    $query->execute();
	    
	    //Redirecionado para a pagina de Listagem
	    header("Location: ../view/listagem.php");
	}

	
?>
