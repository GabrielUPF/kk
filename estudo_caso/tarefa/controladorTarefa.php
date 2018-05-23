<?php
  session_start();

  if(!isset($_SESSION['autenticado'])){
    header('location: ../login.php');
  }
  
  require_once '../classeConexao.php';

  $acao = NULL;

  if( !isset($_GET['acao']) ) $acao='listar';
  else $acao = $_GET['acao'];

  //instancia do objeto do tipo Conexao
  $con = new Conexao();
  // var_dump($con); exit; //para avaliar a conexão com o banco de dados

  if($acao=='listar'){
      // $consulta="SELECT * FROM tarefa";
      //conulta deve trazer o nome da pessoa ao invés do id (chave estrangeiro)
      $consulta = "SELECT tarefa.id, descricao, dataInicio, dataFinal,
                    tarefa.status, prioridade, pessoa.nome as pessoa,
                    projeto.nome as projeto
                    FROM tarefa
                    INNER JOIN pessoa ON pessoa.id=tarefa.id_pessoa
                    INNER JOIN projeto ON projeto.id=tarefa.id_projeto ";
      $dados = $con->getLista($consulta);
      // echo "<pre>"; print_r($dados); echo "</pre>";
      require_once ('listaTarefa.php');
  }
  else if($acao=='excluir'){
      $id  = $_GET['id'];
      $sql = "DELETE FROM tarefa WHERE id = :id";
      $dados  = array('id'=>$id);
      $result = $con->executaQuery($sql, $dados);
      if($result==true) header('location: controladorTarefa.php');
      else echo "Deu ruim";
  }
  else if($acao=='novo'){
      $acaoForm = "controladorTarefa.php?acao=cadastrar";
      $listaPessoas  = $con->getLista("SELECT id, nome FROM pessoa");
      $listaProjetos = $con->getLista("SELECT id, nome FROM projeto");
      require_once('formTarefa.php');
  }
  else if($acao=='cadastrar'){
      $dados  = $_POST;
      $dados['dataInicio'] = date('Y-m-d', strtotime($dados['dataInicio']));
      $dados['dataFinal']  = date('Y-m-d', strtotime($dados['dataFinal']));
      // echo "<pre>";
      // print_r($dados);
      // print_r(array_keys($_POST));
      // echo "</pre>";
      // exit;
      $sql    =  "INSERT INTO tarefa(descricao, dataInicio, dataFinal, status, prioridade, id_pessoa, id_projeto) "
                  . " VALUES(:descricao, :dataInicio, :dataFinal, :status, :prioridade, :id_pessoa, :id_projeto)";
      $result = $con->executaQuery($sql, $dados);
      if($result==true) header('location: controladorTarefa.php');
      else echo "Deu ruim :(";
  }
  else if($acao=='buscar'){
      $id       = $_GET['id'];
      $sql      = "SELECT * FROM tarefa WHERE id = :id";
      $chave    = array('id'=>$id);
      $registro = $con->getRegistro($sql, $chave);

      // print_r($registro); exit;
      // $acaoForm = "controlador".CONTROLADOR.".php?acao=atualizar&id=".$id;
      $acaoForm = "controladorTarefa.php?acao=atualizar&id=".$id;
      // require_once('form'.CONTROLADOR.'.php');
      $listaPessoas  = $con->getLista("SELECT id, nome FROM pessoa");
      $listaProjetos = $con->getLista("SELECT id, nome FROM projeto");
      require_once('formTarefa.php');
  }
  else if($acao=='atualizar'){
      $registro = $_POST;
      $sql = "UPDATE tarefa SET descricao= :descricao, dataInicio=:dataInicio, dataFinal=:dataFinal, "
             ." status=:status, prioridade=:prioridade, id_pessoa=:id_pessoa, id_projeto=:id_projeto "
             . " WHERE id = :id";
      $result = $con->executaQuery($sql, $registro);
      if($result==true) header('location: controladorTarefa.php');
      else echo "Deu ruim :(";
  }
 ?>
