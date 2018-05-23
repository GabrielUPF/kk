<?php require_once('../header.php'); ?>
<div class="container">
  <h2>Cadastro de Pessoa</h2>
  <form action="<?php echo $acaoForm; ?>" method="POST">
    <?php if(isset($pessoa)){ ?>
      <div class="form-group">
        <label for="id">Id:</label>
        <input type="text" class="form-control" id="id" readonly
         name="id" value="<?php if(isset($pessoa['id'])) echo $pessoa['id']; ?>" required>
      </div>
    <?php    } ?>
    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" placeholder="Entre o nome"
       name="nome" value="<?php if(isset($pessoa['nome'])) echo $pessoa['nome']; ?>" required>
    </div>
    <div class="form-group">
      <label for="idade">Idade</label>
      <input type="number" class="form-control" id="idade" placeholder="Informe sua Idade" name="idade" min='0' max='120'
         value="<?php if(isset($pessoa['idade'])) echo $pessoa['idade']; ?>" required>
    </div>
    <div class="form-group">
      <label for="matricula">Matricula</label>
      <input type="text" class="form-control" id="matricula" placeholder="Informe sua matricula" name="matricula"
              value="<?php if(isset($pessoa['matricula'])) echo $pessoa['matricula']; ?>" required>
    </div>

    <button type="submit" class="btn btn-default">Enviar Dados</button>
  </form>
</div>
<?php require_once('../footer.php'); ?>
