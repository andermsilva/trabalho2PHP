<?php
include('utilitarios.php');
$display = null;
$id = null;
$texto = "";
$palavra = "";
$result_sub = null;

if (isset($_GET['enviar'])) {


  if ($_GET['enviar'] == '1') {
    $id = 1;
  }
  if ($_GET['enviar'] == '2') {
    $id = 2;
  }
  if ($_GET['enviar'] == '3') {
    $id = 3;
  }
  if ($_GET['enviar'] == '4') {
    $id = 4;
  }
  if ($_GET['enviar'] == '5') {
    $id = 5;
  }
  if ($_GET['enviar'] == '6') {
    $id = 6;
  }

  if ($_GET['enviar'] == '7') {
    $id = 7;
  }
}
$vetor = [];
$elem = null;
$msg = "";
if (isset($_GET['relatar'])) {
  $id = 6;
  $elem = $_GET['elementos'];

  for ($i = 0; $i < $elem; $i++) {

    $vetor[$i] = random_int(1, 100);
  }

  if ($vetor != null || $vetor != "") {

    $msg = $vetor;
  }
}


if (isset($_GET['buscar'])) {
  $id = 7;

  $vetLetras = [];
  $vetPalavras = [];
  $texto = $_GET['texto'];
  $palavra = $_GET['palavra'];

  $vetPalavras = str_split($palavra);
  $vetLetras = str_split($texto);
  $i = 0;
  foreach ($vetLetras as $key => $value) {
    # code...
    if ($value != " ") {

      $vetLetras[$i] = $value;
      $i++;
    }
  }
  $nLetras = $i;
  $result_sub = "";
  $pos = strripos($texto, $palavra);

  $encontrada = substr($texto, $pos, strlen($palavra));
  $vetPalavras = explode(" ",$texto);
  $result_sub .= "<p class='alert alert-warning mt-4'>";
  if ($encontrada != $palavra) {
    $result_sub .= "Não encontramos a palavra: \"" . $palavra . "\"<br />";
  } elseif ($encontrada != "") {
    $result_sub .= "Encontramos a palavra: \"" . $palavra . "\"<br />";
    $result_sub .= "Com inicio na posição " . $pos . " e termina na posição" . (strlen($palavra) + $pos - 1) . "<br />";
  }

  //$result_sub .= substr($texto,$pos,(strlen($palavra)))."\"<br />";
  $result_sub .= " O texto tem $nLetras Letras e ".count($vetPalavras)." palavras </p>";
 
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trabalho PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="icon" href="php.png" type="image/x-icon" />
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <main>
    <header class="hdr">
      <div class="dropdown dvMenu">
        <button class='btn btn-secondary dropdown-toggle posBtn' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
          Exercícios
        </button>
        <ul class='dropdown-menu '>
          <form class="">

            <li><button class='dropdown-item' name="enviar" type='submit' value="1">1 Quadrados de 15 a 200</button></li>
            <li><button class='dropdown-item' name="enviar" type='submit' value="2">2 Soma dos 100 primeiros número</button></li>
            <li><button class='dropdown-item' name="enviar" type='submit' value="3">3 Sequencia Fibonacci </button></li>
            <li><button class='dropdown-item' name="enviar" type='submit' value="4">4 Tabuada </button></li>
            <li><button class='dropdown-item' name="enviar" type='submit' value="5">5 Ordenar Vetor </button></li>
            <li><button class='dropdown-item' name="enviar" type='submit' value="6">6 Vetor do usuário. </button></li>
            <li><button class='dropdown-item' name="enviar" type='submit' value="7">7 Pesquisar palavra. </button></li>
          </form>
        </ul>
      </div>

    </header>
    <h1 class="text-center text-primary">Trabalho 2 PHP <img src="icons8-php-logo-1200.svg" /></h1>
    <section class="ex border border-dark-subtle rounded-2">

      <div style="display: <?= (1 == $id) ? '' : 'none' ?> " class="border border-primary-subte text-center p-2 rounded">
        <h5 class="text-info  border-bottom border-info">Quadrados de 15 a 200</h5>
        <div id="div1">
          <?php
          $count = 15;
          $i = 0;
          echo "<p class='text-black'>";
          while ($count <= 200) {
            $i++;
            echo $count . "<sup>2</sup>= <span class='text-danger'>" . pow($count, 2) . "</span> ";
            if ($i < 5) {
              echo ", ";
            }
            if ($i % 5 == 0) {
              $i = 0;
              echo "<br />";
            }
            $count++;
          }
          echo "</p>";
          ?>
        </div>


      </div>
      <div style="display: <?= (2 == $id) ? '' : 'none' ?>" class="border border-success-subtle text-center">
        <h5 class="text-success  border-bottom border-success">Soma dos 100 primeiros número</h5>
        <div class="alert alert-success">

          <?php
          $count = 0;
          $i = 100;

          do {

            $count +=  $i;

            $i--;
          } while ($i > 0)

          ?>
          <p class="text-success">Total: <?= $count ?></p>
        </div>

      </div>
      <div style="display: <?= (3 == $id) ? '' : 'none' ?>" class=" text-center">
        <h5 class="text-warning-emphasis  border-bottom border-warning-subtle">Sequencia Fibonacci 20 primeiros termos...</h5>

        <?php
        echo "<p class='text-warning-emphasis fw-bolder'>São eles: <br />";
        $anterior = 1;
        $prox = 0;
        $result = 0;
        $count = 0;


        for ($j = 0; $j <= 20; $j++) {

          if ($j == 0) {
            echo "0 ";
          }

          if ($j == 1) {
            $prox = 0;
          } else if ($j == 2) {

            $anterior = 1;
          } else {

            $result = $prox + $anterior;
            echo $result;
            if ($j != 20) {
              echo ", ";
            } else {
              echo " . . .";
            }
            $prox = $anterior;
            $anterior = $result;

            if ($count == 5) {
              echo "<br />";
              $count = 0;
            }
          }
          $count++;
        }
        echo "</p>"
        ?>
      </div>
      <div style="display: <?= (4 == $id) ? '' : 'none' ?>" class=" text-center">
        <h5 class="text-secondary border-bottom border-secondary">Tabuadas...</h5>

        <div class="flex-container">

          <?php
          for ($i = 1; $i <= 100; $i++) {
            if ($i % 2 == 0)
              $bg_cor = "bg-info";
            else
              $bg_cor = "bg-info-subtle";
          ?>
            <div class="item-container border border-secondary rounded text-info-emphasis <?= $bg_cor ?> ">
              <h6>Tabuada do <?= $i ?></h6>
              <?php
              for ($j = 1; $j <= 10; $j++) {
                echo $i . " X $j = " . ($j * $i) . "<br />";
              }
              ?>
            </div>
          <?php
          }
          ?>
        </div>
      </div>

      <div style="display: <?= (5 == $id) ? '' : 'none' ?>" class=" text-center">
        <h5 class="text-secondary border-bottom border-secondary">Ordenar Vetor...</h5>
        <div>
          <?php
          $par = 0;
          $impar = 0;
          $nums = [];
          for ($i = 1; $i <= 50; $i++) {
            $nums[$i] = $i;
          }
          shuffle($nums);
          echo "<p class='alert alert-secondary text-info-emphasis' >Vetor: [ ";
          foreach ($nums as $key => $value) {
            echo $value;
            if ($key != count($nums) - 1)
              echo ", ";
          }
          echo " ] </p> ";
          $menor = 0;
          for ($j = 0; $j < count($nums); $j++) {
            $i = $j + 1;
            $k = $j;
            while ($i < count($nums)) {
              if ($nums[$i] < $nums[$k]) {
                $k = $i;
              }
              $i++;
            }
            $menor = $nums[$j];
            $nums[$j] = $nums[$k];
            $nums[$k] = $menor;
          }
          echo "<p class='alert alert-success text-success-emphasis' >Vetor: [ ";
          $l = 0;
          foreach ($nums as $key => $value) {
            if ($value % 2 == 0) {
              $par++;
            } else {
              if (numero_primo($value))
                $impar++;
            }
            echo $value;
            if ($key != count($nums) - 1)
              echo ", ";
          }
          echo " ] </p>";
          echo " <p class='alert alert-info text-info-emphasis' >";
          echo "  $par numeros pares e $impar números primos      </p>";
          ?>

        </div>
      </div>
      <div style="display: <?= (6 == $id) ? '' : 'none' ?>" class=" text-center">
        <h5 class="text-secondary border-bottom border-primary">Vetor do usuário.</h5>

        <div class="flex-container">
          <div class="item-form border rounded border-primary">
            <?php
            $soma = 0;
            $media = 0;
            $maior = 0;
            $menor = 0;
            $pMaior = 0;
            $pMenor = 0;
            $result = null;
            if ($vetor) {
              $result .= "<p class='alert alert-success'> Vetor:";
              foreach ($vetor as $key => $value) {
                # code...

                $result .= " [$key] => $value";
                if ($key != count($vetor) - 1) {
                  $result .= " => ";
                }
                if ($key == 0) {
                  $maior = $value;
                  $menor = $value;
                } else {
                  if ($value > $maior) {
                    $maior = $value;
                    $pMaior = $key;
                  } else {
                    if ($value < $menor) {
                      $menor = $value;
                      $pMenor = $key;
                    }
                  }
                }
                $soma += $value;
              }
              $media = $soma / count($vetor);
            }
            if ($media > 0) {
              $result .= "</p>";

              $result .= "<p class='alert alert-warning'>";
              $result .= "Média: " . number_format($media, 2, ',', '.') . "<br />";
              $result .= "Menor: [$pMenor] => " . $menor . " e ";
              $result .= "Maior:[$pMaior] => " . $maior;
              $result .= "</p>";
            }
            ?>

            <form>
              <label for="elementos" class="form-label text-info fw-bold">Elementos...</label><br />

              <div class="input-group mb-3">
                <input type="text" class="form-control s-3 text-end" name="elementos" id="elementos" aria-describedby="emailHelp">
                <button type="submit" name="relatar" class="btn btn-primary">+</button>
              </div>
            </form><br />


          </div>
          <div class="result_vetor">

            <?php
            echo $result;
            ?>
          </div>
        </div>




      </div>
      <div style="display: <?= (7 == $id) ? '' : 'none' ?> " class="border border-primary-subte text-center p-2 rounded">
        <h5 class="text-info  border-bottom border-info">Buscar palavra</h5>
        <div>
          <form>
            <div class="mb-3">
              <label for="texto" class="form-label text-secondary fw-bold">
                Texto
              </label>
              <input type="text" class="form-control text-center" name="texto" value="<?= $texto ?>" id="texto" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
              <label for="palavra" class="form-label text-secondary fw-bold">
                Buscar palavra
              </label>
              <input type="text" class="form-control" name="palavra" id="palavra" aria-describedby="emailHelp">

            </div>

            <button type="submit" name="buscar" value="7" class="btn btn-primary">Buscar</button>
          </form>
          <?php
          echo $result_sub;
          ?>

        </div>
      </div>
    </section>

  </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</html>