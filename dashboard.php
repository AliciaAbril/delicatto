<?php
include_once("templates/header_admin.php");
include_once("process/bolo.php");

// Verifica se $bolos está definida. Se não estiver, inicializa como array vazio
if (!isset($bolos)) {
    $bolos = []; // Define $bolos como um array vazio caso não tenha sido definido
}

// Recupera os status da tabela estatus
$statusQuery = $conn->query("SELECT * FROM estatus;");
$status = $statusQuery->fetch_all(MYSQLI_ASSOC);
?>

<div id="main-container">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Gerenciar pedidos:</h2>
      </div>
      <div class="col-md-12 table-container">
        <table class="table">
          <thead>
            <tr>
              <th scope="col"><span>Pedido</span></th>
              <th scope="col">Cobertura</th>
              <th scope="col">Massa</th>
              <th scope="col">Recheios</th>
              <th scope="col">Status</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($bolos as $bolo): ?>
              <tr>
                <td><?= $bolo["id_bolo"] ?></td>
                <td><?= $bolo["cobertura"] ?></td>
                <td><?= $bolo["massa"] ?></td>
                <td>
                  <ul>
                    <?php foreach($bolo["recheios"] as $recheio): ?>
                      <li><?= $recheio; ?></li>
                    <?php endforeach; ?>
                  </ul>
                </td>
                <td>
                  <form action="process/bolo.php" method="POST" class="form-group update-form">
                    <input type="hidden" name="type" value="update">
                    <input type="hidden" name="id" value="<?= $bolo["id_bolo"] ?>">
                    <select name="status" class="form-control status-input">
                      <?php foreach($status as $s): ?>
                        <option value="<?= $s["id_status"] ?>" <?php echo ($s["tipo"] == $bolo["status"]) ? "selected" : ""; ?>><?= $s["tipo"] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <button type="submit" class="update-btn">
                      <i class="fas fa-sync-alt"></i>
                    </button>
                  </form>
                </td>
                <td>
                  <form action="process/bolo.php" method="POST">
                    <input type="hidden" name="type" value="delete">
                    <input type="hidden" name="id" value="<?= $bolo["id_bolo"] ?>">
                    <button type="submit" class="delete-btn">
                      <i class="fas fa-times"></i>
                    </button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php
include("templates/footer.php");
?>
