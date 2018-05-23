<?php require_once('../header.php'); ?>
<div class="container">
  <h2>Cadastro de Tarefas</h2>
  <form action="<?php echo $acaoForm; ?>" method="POST">
    <?php if(isset($registro)){ ?>
      <div class="form-group">
        <label for="id">Id:</label>
        <input type="text" class="form-control" id="id" readonly
         name="id" value="<?php if(isset($registro['id'])) echo $registro['id']; ?>" required>
      </div>
    <?php    } ?>
    <div class="form-group">
      <label for="nome">Descrição:</label>
      <textarea class="form-control" id="descricao" name="descricao"
       placeholder="Digite uma descrição para a tarefa"><?php if(isset($registro['descricao'])) echo $registro['descricao']; ?>
     </textarea>
    </div>
    <div class="form-group">
      <label for="dataInicio">Data de Início</label>
      <input type="date" class="form-control" id="dataInicio" name="dataInicio"
         value="<?php if(isset($registro['dataInicio'])) echo $registro['dataInicio']; ?>" required>
    </div>
    <div class="form-group">
      <label for="dataFinal">Data de Conclusão</label>
      <input type="date" class="form-control" id="dataFinal" name="dataFinal"
         value="<?php if(isset($registro['dataFinal'])) echo $registro['dataFinal']; ?>" required>
    </div>
    <div class="form-group">
      <label for="status">Status</label>
      <select name="status" class="form-control">
          <option value="1" <?php if(isset($registro['status'])
                                  && $registro['status']==1) echo "selected"; ?>>Fechada</option>
          <option value="0" <?php if(isset($registro['status'])
                                  && $registro['status']==0) echo "selected"; ?>>Aberta</option>
      </select>
    </div>
    <div class="form-group">
      <label for="prioridade">Prioridade</label>
      <select name="prioridade" class="form-control" required>
          <option value="">Selecione a prioridade</option>
          <option value="1"
          <?php if(isset($registro['prioridade'])
                     && $registro['prioridade']==1) echo "selected"; ?> >Alta</option>
          <option value="2"
          <?php if(isset($registro['prioridade'])
                && $registro['prioridade']==2) echo "selected"; ?>>Média</option>
          <option value="3"
          <?php if(isset($registro['prioridade'])
                && $registro['prioridade']==3) echo "selected"; ?>>Baixa</option>
      </select>
    </div>
    <div class="form-group">
      <label for="pessoa">Pessoa</label>
      <select name="id_pessoa" class="form-control">
        <option value="">Atrele uma pessoa</option>
        <?php foreach($listaPessoas as $item){?>
          <option value="<?= $item['id'];?>"
            <?php if(isset($registro['id_pessoa'])
                  && $registro['id_pessoa']==$item['id']) echo "selected"; ?>>
                  <?= $item['nome']; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="projeto">Projeto</label>
      <select name="id_projeto" class="form-control">
        <option value="">Atrele a um projeto</option>
        <?php foreach($listaProjetos as $item){?>
          <option value="<?= $item['id'];?>"
            <?php if(isset($registro['id_projeto'])
                  && $registro['id_projeto']==$item['id']) echo "selected"; ?>>
                  <?= $item['nome']; ?></option>
        <?php } ?>
      </select>
    </div>
    <button type="submit" class="btn btn-default">Enviar Dados</button>
  </form>
</div>
<?php require_once('../footer.php'); ?>
