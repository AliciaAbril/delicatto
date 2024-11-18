<?php
  session_start();  // Inicia a sessão
  include_once("templates/header.php");
  include_once("process/bolo.php");

  // Exibe a mensagem de sucesso ou erro, se existir
  if (isset($_SESSION["msg"])): 
      $msg = $_SESSION["msg"];
      $status = $_SESSION["status"];
      unset($_SESSION["msg"]);
      unset($_SESSION["status"]);
?>

<div class="alert alert-<?= $status ?>" role="alert">
    <?= $msg ?>
</div>

<?php endif; ?>

<div id="main-banner">
  <h1>Personalize seu bolo</h1>
</div>

<!--Container principal-->
<div id="main-container">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Monte o bolo como desejar:</h2>

        <form action="process/bolo.php" method="POST" id="bolo-form">
          <div class="form-group">
            <label for="cobertura">Cobertura:</label>
            <select name="cobertura" id="cobertura" class="form-control">
              <option value="">Selecione a cobertura</option>
              <?php foreach($coberturas as $cobertura): ?> 
                <option value="<?= $cobertura["id_cobertura"] ?>"><?= $cobertura["tipo"] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="massa">Massa:</label>
            <select name="massa" id="massa" class="form-control">
              <option value="">Selecione a massa</option>
              <?php foreach($massas as $massa): ?>
                <option value="<?= $massa["id_massa"] ?>"><?= $massa["tipo"] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <div class="recheio"><label for="recheios">Recheio: (Máximo 4)</label></div>
            <select name="recheio[]" id="recheios" class="form-control" multiple>
              <?php foreach($recheios as $recheio): ?>
                <option value="<?= $recheio["id_recheio"] ?>"><?= $recheio["tipo"] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Fazer Pedido!">
          </div>
        </form>
        
        <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
        <script>
          new MultiSelectTag('recheios');  // id
        </script>
      </div>
    </div>
  </div>
</div>

<?php
  include_once("templates/footer.php");
?>

