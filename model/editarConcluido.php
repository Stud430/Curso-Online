
<?php
  include '../banco/conexao.php';
  $conectar = getConnection();

  // pega o ID da URL
	//$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

	function data($data){
	    return date("d/m/Y",strtotime($data));
	    // Y = Ano inteiro (ex: 2020)
	    // y = Ano pelo metade (ex: 20) 
	}
?>

<?php

    if(isset($_POST['update_item'])){
        $sql = 'UPDATE cursos SET termino = :termino, status_curso = :status WHERE id = :id';

        $termino = $_POST["data_termino"];
        $status = "Concluído";
        $id = $_POST["edit_item_id"];

        $stmt = $conectar->prepare($sql);
        $stmt->bindParam(':termino', $termino);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);

        if($stmt->execute()){
             //echo 'Atualizado com sucesso!';

            //Redirecionado para a pagina de Listagem
            header("Location: ../view/concluidos.php");
        }else{
            echo 'Erro ao atualizar!';
        }
    }    
?>

<!-- NAO ESTÁ ATUALIZANDO -->
























