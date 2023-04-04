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
