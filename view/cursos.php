<!DOCTYPE html>
<html>
<head>
	<title> Cadastro de Cursos </title>


	 <!-- Link Bootstrap -->
 	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 

  <nav class="navbar navbar-expand-lg navbar-light bg-light">    
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="navbar-brand">
        <img src="../img/user_mulher.png" width="30" height="30" alt="">
        </a>

        <a class="nav-item nav-link active" href="cursos.php">
          Cadastrar Curso 
          <span class="sr-only">(current)</span></a>

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
  div.formulario{
    width: 800px;
    padding-left: 180px;
  }

 div.form-group{
  margin: 0 auto;
  width: 150%; /* Valor da Largura */
  float: center;
  } 

  div.contexto{
  	float: center;
    width: 600px;
  }

  div.col-auto{
    float: center;
    width: 500px;
  }

  div.curso{
  	float: center;
    width: 210px;
    padding-left: 15px;
  }
  
  div.duracao{
  	float: center;
    width: 200px;
    padding-left: 15px;
  }  
  
  
  label.lblsenha{
    padding-left: 15px;
  }

  label.lbltermino{
    padding-left: -05px;
  }

  label.lblduracao{
    padding-left: 10px;
  }

  label.lblstatus{
    padding-left: 10px;
  }  

  label.lblplataforma{
  	width: 50px;
    padding-left: 10px;
  }


  div.plataforma{
  	width: 252px;    
    padding-left: 55px;
  }

  div.endereco{
    width: 600px;
    padding-left: 15px;
  }

  div.usuario{
    width: 180px;
    padding-left: 15px;
  }

  div.senha{
    width: 180px;
    padding-left: 15px;
  }

  div.datainicio{
    width: 200px;
    padding-left: 15px;
  }

  div.datatermino{
    width: 200px;
    padding-left: 15px;
  }

  #data_inicio{
  	width: 155px;
  }

  #data_termino{
    width: 155px;
  }



  .btn-info{
  	color: #FFDE96;
  }

  #cadastrar, #limpar{
  	background-color: #B6FF80;
  	border-color: #B6FF80;
  	color: black;
  }

  hr{
    background-color: #92AFB3; 
    border-color: #92AFB3;
    border-width: 5px;
    width: 950px;
    color: black;
  }
</style> 

<!-- https://www.maujor.com/tutorial/propriedades-css-para-estilizacao-de-bordas.php -->
</head>


<br><br>
<center><legend>Cadastro de Cursos para Estudar</legend></center>
<br>
<hr>

<body background="../img/background.jpeg" width=34%>
<form method="post" action="../model/salvar.php">

<div class="formulario">

<div class="form-group row">
	<label><font color="red">*</font>Curso: </label>
	<div class="curso">
		<input type="text" name="curso" class="form-control form-control-sm" placeholder="Nome do Curso">
	</div>	

	<label class="lblplataforma"><font color="red">*</font>Plataforma: </label>
  <div class="plataforma">
    <input type="text" name="plataforma" class="form-control form-control-sm" placeholder="Plataforma do Curso">
  </div>

  <label class="lblduracao">Duracao: </label>
  <div class="duracao">
    <input type="text" name="duracao" class="form-control form-control-sm" placeholder="Duracao do Curso">
  </div>  
</div>		

<!-- https://www.w3schools.com/tags/att_font_color.asp -->
<p>
<div class="form-group row">
  <label><font color="red">*</font>Endereco: </label>
    <div class="endereco">
    <input type="text" name="endereco" class="form-control form-control-sm" placeholder="Site do Curso">
  </div>
</div>  
</p>


<p>
<div class="form-group row">
	<label class="lblinicio">Início: </label>
	<div class="datainicio">
		<input type="date" name="data_inicio" class="form-control form-control-sm" id="data_inicio" placeholder="Data de Início">
	</div>

  <label class="lbltermino">Término: </label>
  <div class="datatermino">
    <input type="date" name="data_termino" class="form-control form-control-sm" id="data_termino" placeholder="Data do Término">
  </div>
</div>
</p>


<p>
<div class="form-group row">
	<label><font color="red">*</font>Usuário: </label>
    <div class="usuario">
    <input type="text" name="usuario" class="form-control form-control-sm" placeholder="Usuário">
  </div>

  <label class="lblsenha"><font color="red">*</font>Senha: </label>
    <div class="senha">
    <input type="text" name="senha" class="form-control form-control-sm" placeholder="Senha">
  </div>

  <label class="lblstatus"><font color="red">*</font>Status: </label>
  <div class="form-check">       
      <label class="radio-inline"> 
      <input type="radio" name="status" value="A Fazer">
        <span class="label label-success">
          A Fazer
        </span> 
      </label>
  </div>

  <div class="form-check">
    <label class="radio-inline"> 
      <input type="radio" name="status" value="Em Andamento">
        <span class="label label-success">
          Em Andamento
        </span> 
    </label>
  </div>

  <div class="form-check">  
    <label class="radio-inline"> 
      <input type="radio" name="status" value="Concluído">
        <span class="label label-success">
            Concluído
        </span> 
    </label>
  </div>  
</div>	
</p>

<div class="form-group row">
  
</div>

<br>
<center>
<button type="submit" class="btn btn-info" id="cadastrar">Cadastrar</button>
<button type="reset" class="btn btn-info" id="limpar">Limpar</button>
</center>

</div>
</form>

<hr>
<br>
</body>



</html>