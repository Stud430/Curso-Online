
<?php
  include '../banco/conexao.php';
  $conectar = getConnection();
?>

<?php

// Consulta ao banco de dados
  $listagem = "SELECT id,curso, plataforma, endereco, status_curso, usuario, senha ";
  $listagem .= "FROM cursos WHERE status_curso IN ('A Fazer','Em Andamento')";
  
  $consulta = $conectar->prepare ($listagem);
  $consulta->execute();

  if (!$consulta) {
    die("Erro no Banco");
  }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Listagem</title>

	<!-- Link Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css">

  	<nav class="navbar navbar-expand-lg navbar-light bg-light">    
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="navbar-brand">
        <img src="../img/user_mulher.png" width="30" height="30" alt="">
        </a>

        <a class="nav-item nav-link active" href="cursos.php">
          Cadastrar Curso 
          <span class="sr-only">(current)</span>
        </a>

        <a class="nav-item nav-link active" href="listagem.php">
          Listagem 
          <span class="sr-only">(current)</span>
        </a>

        <a class="nav-item nav-link active" href="concluidos.php">
          Cursos Concluídos 
          <span class="sr-only">(current)</span>
        </a>
      </div>
    </div>
  </nav>


<style> 
  
    div.listagem{
      width: 1000px;
      padding-left: 250px;
    }

</style>

</head>

<br><br>

<body>

<div class="listagem"> 
<a class="btn btn-info" name="zerar" href="listagem.php">Zerar Listagem</a> <br><br>

  <?php
  echo"<table class='table table-striped'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th><center>Curso</center></th>";
    echo "<th><center>Plataforma</center></th>";
    echo "<th><center>Site</center></th>";
    echo "<th><center>Status</center></th>";
    echo "<th><center>Açöes</center></th>";
    echo "</tr>";
    echo "</thead>";

    echo "<tbody>";

    while ( $linha = $consulta->fetch(PDO::FETCH_ASSOC) ) {   
?> 
    <tr>
    <td> <?php echo $linha["curso"] ?> </td>
    <td> <?php echo $linha["plataforma"] ?> </td>
    <td> <?php echo $linha["endereco"] ?> </td>
    <td> <?php echo $linha["status_curso"] ?> 
      <br>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter<?php echo $linha['id']?>">
        Acessar Site
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter<?php echo $linha["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalCenterTitle">Acesso ao Login</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="login">
                <br>
                <label><h5>Usuário: </h5></label>
                <?php echo $linha["usuario"]; ?>
                <br>
                <label><h5>Senha: </h5></label>
                <?php echo $linha["senha"]; ?>

                <br><br>
                <a class="btn btn-info" href="<?php echo $linha['endereco'] ?>">Acessar Site</a>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>
    </td>
    <td>
      <?php if ($linha["status_curso"]=="A Fazer") {
        ?>
       <a class="btn btn-warning" href="../model/editar.php?id=<?php echo $linha["id"]?>" width="30" height="30" name="emandamento">
        Em Andamento
       </a>
       <a class="btn btn-success" href="../model/editar.php?id=<?php echo $linha["id"]?>" width="30" height="30" name="concluido">
            Concluído
       </a>
       <a class="btn btn-danger" href="../model/excluir.php?id=<?php echo $linha['id']?>">
          Excluir
            <!-- <img src="../img/excluir.png" width="30" height="30"> -->
       </a>
    <?php
      } 
    ?>
     
     <!-- 2 IF -->
    <?php if ($linha["status_curso"]=="Em Andamento") 
      {
    ?>
       <a class="btn btn-success" href="../model/editar.php?id=<?php echo $linha["id"]?>" width="30" height="30" name="concluido">
            Concluído
       </a>
       <a class="btn btn-danger" href="../model/excluir.php?id=<?php echo $linha['id']?>">
          Excluir
            <!-- <img src="../img/excluir.png" width="30" height="30"> -->
       </a>
    <?php
      } 
    ?>

    </td>
    </tr>

<?php
  }
  echo "</tbody>";
  echo "</table>";

?>

  
  </div>

</body>

<!-- Permite o MODAL funcionar -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


</html>