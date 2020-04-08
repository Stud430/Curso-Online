
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

    //$sql = 'INSERT INTO produto (descricao,qtd,valor) VALUES (:desc,:qtd,:valor)';
    $sql = 'INSERT INTO cursos (curso,plataforma,duracao,endereco,inicio, termino, usuario,senha,status_curso,created) 
            VALUES (:curso,:plataforma,:duracao,:endereco,:data_inicio, :data_termino, :usuario,:senha,:status_curso,:created)';

    date_default_timezone_set('America/Sao_Paulo');
    setlocale(LC_TIME, "pt_BR");
            
    $agora = getdate();

    $a = $agora["year"];
    $m = $agora["mon"];//utf8_encode(strftime("%B"));
    $d = $agora["mday"];
 
    $created = $d . "/" . $m . "/" . $a;

    $curso = $_POST["curso"];
    $plataforma = $_POST["plataforma"];
    $duracao = $_POST["duracao"];
    $endereco = $_POST["endereco"];
    $di = $_POST["data_inicio"];
    $data_inicio = data($di);
    $dt = $_POST["data_termino"];
    $data_termino = data($dt);
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $status_curso = $_POST["status"];
 
    $stmt = $conectar->prepare($sql);
    $stmt->bindParam(':curso', $curso);
    $stmt->bindParam(':plataforma', $plataforma);
    $stmt->bindParam(':duracao', $duracao);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':data_inicio', $data_inicio);
    $stmt->bindParam(':data_termino', $data_termino);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':status_curso', $status_curso);
    $stmt->bindParam(':created', $created);
   

    if($stmt->execute()){
        //echo 'Salvo com sucesso!';
        echo '<script>
            $(document).ready(function(){
                swal("Ops...","Preencha todos os campos obrigatórios!","warning");
            });
            </script>';
        header("location:../view/cursos.php");
    }else{
        echo ' Erro ao salvar!';
        //die($stmt->execute());
    }

?>
