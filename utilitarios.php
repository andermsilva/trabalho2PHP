<?php

function menu()
{

  echo "<button class='btn btn-secondary dropdown-toggle posBtn' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
          Exercícios
        </button>
        <ul class='dropdown-menu'>
          <li><button class='dropdown-item' type='button'>Exercício 1</button></li>
          <li><button class='dropdown-item' type='button'>Exercício 2</button></li>
          <li><button class='dropdown-item' type='button'>
              Exercício 3</button></li>
        </ul>";
}

function numero_primo($n)
{
  $divisores = 0;

  for ($count = 2; $count < $n; $count++) {
    if ($n % $count == 0) {
      //echo "Multiplo de $count<br />";

      $divisores++;
    }
  }

  if ($divisores)
    //echo "Não é, tem $divisores divisores além de 1 e ele mesmo";
    return
      false;
  else
    //echo "É primo! $divisores";
    return true;
}

function ordernar_vetor($vet){

  $menor = 0;
  for ($j = 0; $j < count($vet); $j++) {
    $i = $j + 1;
    $k = $j;
    while ($i < count($vet)) {
      if ($vet[$i] < $vet[$k]) {
        $k = $i;
      }
      $i++;
    }
    $menor = $vet[$j];
    $vet[$j] = $vet[$k];
    $vet[$k] = $menor;
  }
  return $vet;
}

function aposta($n, $qn){
  $jogo = array();
  while ($n > 0) {
    $temp = rand(1, $qn - 1);
    while (in_array($temp, $jogo)) {
      if( ($temp + 1) % $qn > 0)
         $temp = ($temp + 1) % $qn;
    }
    $jogo[] = $temp;
    $n--;
  }
  return  ordernar_vetor($jogo);
}