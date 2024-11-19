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

<div class="container mt-5">
    <!-- Três carrosséis em colunas -->
    <div class="carrossel-coluna">
        
        <!-- Carrossel 1 (Coberturas - 10 imagens) -->
        <div id="carousel1" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="4" aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="5" aria-label="Slide 6"></button>
                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="6" aria-label="Slide 7"></button>
                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="7" aria-label="Slide 8"></button>
                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="8" aria-label="Slide 9"></button>
            </div>
            <div class="carousel-inner">
                <!-- 10 Imagens -->
                <div class="carousel-item active">
                    <img src="carrosel/c_buttercream.jpeg" class="d-block w-100" alt="Buttercream Suíço de Baunilha">
                    <div class="carousel-caption d-none d-md-block">Buttercream Suíço de Baunilha</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/c_chant_frutas.jpeg" class="d-block w-100" alt="Chantilly com Frutas Frescas">
                    <div class="carousel-caption d-none d-md-block">Chantilly com Frutas Frescas</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/c_chantilly_ganache.jpeg" class="d-block w-100" alt="Drip Cake">
                    <div class="carousel-caption d-none d-md-block">Drip Cake</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/c_chantilly.jpeg" class="d-block w-100" alt="Chantilly">
                    <div class="carousel-caption d-none d-md-block">Chantilly</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/c_ganache_choc.jpeg" class="d-block w-100" alt="Ganache de Chocolate Brilhante">
                    <div class="carousel-caption d-none d-md-block">Ganache de Chocolate Brilhante</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/c_glace_real.jpeg" class="d-block w-100" alt="Glacê Real com Decoração de Flores">
                    <div class="carousel-caption d-none d-md-block">Glacê Real com Decoração de Flores</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/c_limao_siciliano.jpeg" class="d-block w-100" alt="Glacê de Limão Siciliano">
                    <div class="carousel-caption d-none d-md-block">Glacê de Limão Siciliano</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/c_marshmallow.jpeg" class="d-block w-100" alt="Marshmallow Tostado">
                    <div class="carousel-caption d-none d-md-block">Marshmallow Tostado</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/c_croc_caramelo.jpeg" class="d-block w-100" alt="Crocante de Carameo e Nozes">
                    <div class="carousel-caption d-none d-md-block">Crocante de Caramelo e Nozes</div>
                </div>
            </div>
            <!-- Controles -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel1" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>

        <!-- Carrossel 2 (Massas - 7 imagens) -->
        <div id="carousel2" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel2" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel2" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carousel2" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carousel2" data-bs-slide-to="4" aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#carousel2" data-bs-slide-to="5" aria-label="Slide 6"></button>
                <button type="button" data-bs-target="#carousel2" data-bs-slide-to="6" aria-label="Slide 7"></button>
            </div>
            <div class="carousel-inner">
                <!-- 7 Imagens -->
                <div class="carousel-item active">
                    <img src="carrosel/m_baunilha.jpeg" class="d-block w-100" alt="Massa de Baunilha Clássica">
                    <div class="carousel-caption d-none d-md-block">Baunilha Clássica</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/m_limao.jpeg" class="d-block w-100" alt="Massa de Limão Siciliano">
                    <div class="carousel-caption d-none d-md-block">Limão Siciliano</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/m_amendoas.jpeg" class="d-block w-100" alt="Massa de Amêndoas">
                    <div class="carousel-caption d-none d-md-block">Amêndoas</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/m_cenoura.jpeg" class="d-block w-100" alt="Massa de Cenoura">
                    <div class="carousel-caption d-none d-md-block">Cenoura</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/m_chocolate.jpeg" class="d-block w-100" alt="Massa de Chocolate Belga">
                    <div class="carousel-caption d-none d-md-block">Chocolate Belga</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/m_coco.jpeg" class="d-block w-100" alt="Massa de Coco">
                    <div class="carousel-caption d-none d-md-block">Coco</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/m_redvelvet.jpeg" class="d-block w-100" alt="Massa Red Velvet">
                    <div class="carousel-caption d-none d-md-block">Red Velvet</div>
                </div>
            </div>
            <!-- Controles -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>

        <!-- Carrossel 3 (Recheios - 13 imagens) -->
        <div id="carousel3" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel3" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel3" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carousel3" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carousel3" data-bs-slide-to="4" aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#carousel3" data-bs-slide-to="5" aria-label="Slide 6"></button>
                <button type="button" data-bs-target="#carousel3" data-bs-slide-to="6" aria-label="Slide 7"></button>
                <button type="button" data-bs-target="#carousel3" data-bs-slide-to="7" aria-label="Slide 8"></button>
                <button type="button" data-bs-target="#carousel3" data-bs-slide-to="8" aria-label="Slide 9"></button>
                <button type="button" data-bs-target="#carousel3" data-bs-slide-to="9" aria-label="Slide 10"></button>
                <button type="button" data-bs-target="#carousel3" data-bs-slide-to="10" aria-label="Slide 11"></button>
                <button type="button" data-bs-target="#carousel3" data-bs-slide-to="11" aria-label="Slide 12"></button>
                <button type="button" data-bs-target="#carousel3" data-bs-slide-to="12" aria-label="Slide 13"></button>
            </div>
            <div class="carousel-inner">
                <!-- 13 Imagens -->
                <div class="carousel-item active">
                    <img src="carrosel/r_brigadeiro.jpeg" class="d-block w-100" alt="Brigadeiro Gourmet">
                    <div class="carousel-caption d-none d-md-block">Brigadeiro Gourmet</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/r_doce_nozes.jpeg" class="d-block w-100" alt="Doce de Leite com Nozes">
                    <div class="carousel-caption d-none d-md-block">Doce de Leite com Nozes</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/r_limao_fruta.jpeg" class="d-block w-100" alt="Creme de Limão com Frutas Vermelhas">
                    <div class="carousel-caption d-none d-md-block">Creme de Limão com Frutas Vermelhas</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/r_ganache_amargo.jpeg" class="d-block w-100" alt="Ganache de Chocolate Meio Amargo">
                    <div class="carousel-caption d-none d-md-block">Ganache de Chocolate Meio Amargo</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/r_mousse_marac.jpeg" class="d-block w-100" alt="Mousse de Maracujá com Chocolate Branco">
                    <div class="carousel-caption d-none d-md-block">Mousse de Maracujá com Chocolate Branco</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/r_ninho_morango.jpeg" class="d-block w-100" alt="Recheio de Ninho com Morangos">
                    <div class="carousel-caption d-none d-md-block">Recheio de Ninho com Morangos</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/r_framboesa.jpeg" class="d-block w-100" alt="Mousse de Framboesa com Chocolate Branco">
                    <div class="carousel-caption d-none d-md-block">Mousse de Framboesa com Chocolate Branco</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/r_coco_abacaxi.jpeg" class="d-block w-100" alt="Creme de Coco com Abacaxi">
                    <div class="carousel-caption d-none d-md-block">Creme de Coco com Abacaxi</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/r_pistache.jpeg" class="d-block w-100" alt="Creme de Pistache">
                    <div class="carousel-caption d-none d-md-block">Creme de Pistache</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/r_ovomaltine.jpeg" class="d-block w-100" alt="Creme de Ovomaltine com Brigadeiro">
                    <div class="carousel-caption d-none d-md-block">Creme de Ovomaltine com Brigadeiro</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/r_creme_avela_croc.jpeg" class="d-block w-100" alt="Creme de Avelã com Chocolate Crocante">
                    <div class="carousel-caption d-none d-md-block">Creme de Avelã com Chocolate Crocante</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/r_mousse_morang.jpeg" class="d-block w-100" alt="Mousse de Morango com Chocolate Meio Amargo">
                    <div class="carousel-caption d-none d-md-block">Mousse de Morango com Chocolate Meio Amargo</div>
                </div>
                <div class="carousel-item">
                    <img src="carrosel/r_brigadeiro_branco.jpeg" class="d-block w-100" alt="Brigadeiro Branco">
                    <div class="carousel-caption d-none d-md-block">Brigadeiro Branco</div>
                </div>
            </div>
            <!-- Controles -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel3" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel3" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
    </div>
</div>


<!--Container principal-->
<div id="main-container">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 id="bolo">Monte o bolo como desejar:</h2>

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
            <div class="recheios"><label for="recheios">Recheio: (Máximo 4)</label></div>
            <select name="recheio[]" id="recheios"  multiple>
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

