<?php require_once('../header.php'); ?>
<div class="container">
  <h2>Lista de Pessoas</h2>
  <a class="btn btn-info" href="controladorPessoa.php?acao=novo">
    <i class="glyphicon glyphicon-plus"></i> Adicionar</a>
  <table class="table table-striped table-hover">
    <th>#</th>
    <th>Nome</th>
    <th>Idade</th>
    <th>Matrícula</th>
    <th>Editar</th>
    <th>Excluir</th>
    <?php foreach($dados as $p){ ?>
             <tr>
                <td><?= $p['id']; ?></td>
                <td><?= $p['nome']; ?></td>
                <td><?= $p['idade']; ?></td>
                <td><?= $p['matricula']; ?></td>
                <td>
                  <a class="btn btn-info" href="controladorPessoa.php?acao=buscar&id=<?= $p['id']; ?>">
                    <i class="glyphicon glyphicon-pencil"></i>
                  </a>
                </td>
                <td>
                  <a class="btn btn-danger" href="controladorPessoa.php?acao=excluir&id=<?= $p['id']; ?>">
                    <i class="glyphicon glyphicon-remove"></i>
                  </a>
                </td>
             </tr>
    <?php } ?>
  </table>
</div>
<?php require_once('../footer.php'); ?>
