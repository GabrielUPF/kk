<?php require_once('../header.php'); ?>
<div class="container">
  <h2>Lista de Tarefas</h2>
  <a class="btn btn-info" href="controladorTarefa.php?acao=novo">
    <i class="glyphicon glyphicon-plus"></i> Adicionar</a>
  <table class="table table-striped table-hover">
    <th>#</th>
    <th>Data de Início</th>
    <th>Data de Fim</th>
    <th>Status</th>
    <th>Prioridade</th>
    <th>Pessoa</th>
    <th>Projeto</th>
    <th>Editar</th>
    <th>Excluir</th>
    <?php foreach($dados as $p){ ?>
             <tr>
                <td><?= $p['id']; ?></td>
                <td><?= $p['dataInicio']; ?></td>
                <td><?= $p['dataFinal']; ?></td>
                <td><?php echo ($p['status']==0)? "Aberta" : "Fechada"; ?></td>
                <td>
                     <?php if($p['prioridade'] == 1) echo "Alta";
                           else if($p['prioridade'] == 2) echo "Média";
                           else if($p['prioridade'] == 3) echo "Baixa"; ?>
                </td>
                <td><?= $p['pessoa']; ?></td>
                <td><?= $p['projeto']; ?></td>
                <td>
                  <a class="btn btn-info" href="controladorTarefa.php?acao=buscar&id=<?= $p['id']; ?>">
                    <i class="glyphicon glyphicon-pencil"></i>
                  </a>
                </td>
                <td>
                  <a class="btn btn-danger" href="controladorTarefa.php?acao=excluir&id=<?= $p['id']; ?>">
                    <i class="glyphicon glyphicon-remove"></i>
                  </a>
                </td>
             </tr>
    <?php } ?>
  </table>
</div>
<?php require_once('../footer.php'); ?>
