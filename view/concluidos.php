
<?php
  include '../banco/conexao.php';
  $conectar = getConnection();
?>

<?php

// Consulta ao banco de dados
  $listagem = "SELECT id,curso, plataforma,inicio,termino ";
  $listagem .= "FROM cursos WHERE status_curso = 'Concluído' ORDER BY termino";
  
  $consulta = $conectar->prepare ($listagem);
  $consulta->execute();

  if (!$consulta) {
    die("Erro no Banco");
  }
?>

<?php
  $total = $conectar->prepare("SELECT * FROM cursos WHERE status_curso = 'Concluído'");
  $total->execute();

  $Concluidos = $total->fetchAll();
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

<center><h4>Cursos Concluídos</h4></center>  
<center><h5><?php print count($Concluidos); ?></h5></center>
<br>

<div class="listagem"> 
  <?php
  echo"<table class='table table-striped'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th><center>ID</center></th>";
    echo "<th><center>Curso</center></th>";
    echo "<th><center>Plataforma</center></th>";
    echo "<th><center>Início</center></th>";
    echo "<th><center>Término</center></th>";
    echo "</tr>";
    echo "</thead>";

    echo "<tbody>";

    while ( $linha = $consulta->fetch(PDO::FETCH_ASSOC) ) {   
?> 
    <tr>
    <td><center> <?php echo $linha["id"] ?> </center></td>
    <td> <?php echo $linha["curso"] ?> </td>
    <td><center> <?php echo $linha["plataforma"] ?> </center></td>
    <td><center> <?php echo $linha["inicio"] ?> </center></td>
    <td><center> <?php echo $linha["termino"] ?> </center></td>
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