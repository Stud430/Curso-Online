
<?php
  include '../banco/conexao.php';
  $conectar = getConnection();
?>

<?php

// Consulta ao banco de dados
  $listagem = "SELECT id,curso, plataforma, endereco, status_curso, usuario, senha, inicio, termino ";
  $listagem .= "FROM cursos WHERE status_curso IN ('A Fazer','Em Andamento') ORDER BY plataforma";
  
  $consulta = $conectar->prepare ($listagem);
  $consulta->execute();

  if (!$consulta) {
    die("Erro no Banco");
  }
?>

<?php
  $contar1 = $conectar->prepare("SELECT * FROM cursos WHERE status_curso = 'A Fazer'");
  $contar1->execute();

  $AFazer = $contar1->fetchAll();
?>

<?php
  $contar2 = $conectar->prepare("SELECT * FROM cursos WHERE status_curso = 'Em Andamento'");
  $contar2->execute();

  $EmAndamento = $contar2->fetchAll();
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
      width: 1250px;
      padding-left: 10px;
      padding-right: -60px;
    }

    div.contagem{
      width: 2000px;
      padding-left: 10px;
      padding-right: -50px;
    }

    #lblAFazer{
      padding-left: 720px;
    }

    #lblEmAndamento{
      padding-left: 30px;
    }

    #lblAFazer{
      padding-left: 720px;
    }

    .btn-info{
    color: #FFDE96;
    }

    #lbldata_termino{
    width: 155px;
  }

  #alinhardt{
    padding-left: 15px;
  }

  #alinhardi{
    width: 170px;
    padding-left: 15px;
  }

  #lblconcluido{
    padding-left: 15px;
  }
  #lblinicio{
    padding-left: 15px;
  }
</style>

</head>

<br><br>

<body>

<div class="contagem">
<!-- <form method="post" action="../model/editar.php"> -->
  <a class="btn btn-dark" name="lblzerar" href="../model/zerar.php">Zerar Listagem</a>
<!-- </form> -->
  <a class="btn btn-dark" name="lblrelatorio" href="relatorioafazeremandamento.php">
      Baixar Listagem
  </a>


  <label id="lblAFazer"> A Fazer:  
    <?php 
      print count($AFazer); 
    ?>  
  </label>
  <label id="lblEmAndamento"> Em Andamento:  
    <?php 
      print count($EmAndamento); 
    ?> 
  </label>   
</div>
  
<br>

<div class="listagem"> 

  <?php
  echo"<table class='table table-sm table-striped'>";
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
      <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalCenter<?php echo $linha['id']?>">
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
              <button type="button" class="btn btn-secondary " data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>
    </td>
    <td>
    <?php if ($linha["status_curso"]=="A Fazer") 
      {
    ?>
      
    <!-- Button trigger modal -->
<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $linha['id']?>">
  Em Andamento
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $linha["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Curso A Fazer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="POST" action="../model/editarEmandamento.php">
        <div class="form-group row">
          <label id="lblinicio"><h5>Início: </h5></label>
          <div id="alinhardi">
          <input type="date" name="data_inicio" id="data_inicio" class="form-control form-control-sm">
          </div>
        </div>
                    <input type="text" value="<?php echo $linha['id']?>" name="id" disabled>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="cadastrarinicio">Cadastrar</button>
        </div>
      </form>

      </div>
      
    </div>
  </div>
</div>

<a class="btn btn-danger btn-sm" href="../model/excluir.php?id=<?php echo $linha['id']?>">
  Excluir
</a>
    <?php
      } 
    ?>
     
     <!-- 2 IF -->
    <?php if ($linha["status_curso"]=="Em Andamento") 
      {
    ?>

    <a class="btn btn-danger btn-sm" href="../model/excluir.php?id=<?php echo $linha['id']?>">
        Excluir
    </a>


    <a href="#edit<?php echo $linha['id'];?>" data-toggle="modal">
      <button type='button' class="btn btn-success btn-sm">
        <span class='glyphicon glyphicon-edit' aria-hidden='true'>
          Concluído
        </span>
      </button>
    </a>


    <!--Edit Item Modal -->
                    <div id="edit<?php echo $linha['id']; ?>" class="modal fade" role="dialog">
                        <form method="post" class="form-horizontal" action="../model/editarConcluido.php">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3>Concluindo Curso</h3>
                                        <button class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                                    
                                    <div class="modal-body">
                                        <input type="hidden" name="edit_item_id" value="<?php echo $linha['id']; ?>">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">
                                                Início: <?php echo $linha['inicio'];?>                                                
                                            </label>

                                            <label class="control-label col-sm-2" for="item_code">Término:</label>
                                              <input type="date" class="form-control" id="item_category" name="data_termino" value="<?php echo $linha['termino']; ?>" placeholder="Category" required> 
                                          </div>  
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="update_item"> 
                                            Edit
                                        </button>
                                </div>

                                </div>
                            </div>
                        </form>
                    </div>
     
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