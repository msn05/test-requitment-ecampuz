<?php

/** Buatlah sebuah program yang mencetak baris angka dari 1 sampai dengan 50
 *  dengan ketentuan sebagai berikut:
 *  Jika angka yang akan tercetak merupakan kelipatan tiga, maka program akan
 *  mencetak kata “Foo”
 *  Jika angka yang akan tercetak merupakan kelipatan lima, maka program akan  
 *  mencetak kata “Bar”
 *  Jika angka yang akan tercetak merupakan kelipatan tiga dan lima sekaligus,
 *  maka program akan mencetak kata “FooBar”.
 */
function loopingCondition($int)
{
  $i = 1;
  while ($i <= $int) {
    // echo $i++;
    if ($i % 3 == 0)
      echo $i . ' : Foo';
    if ($i % 5 == 0)
      echo $i . ' : Bar';
    if ($i % 3 && $i % 5 == 0)
      echo $i . ' :FooBar';
    echo $i . ': <br>';
    $i++;
  }
}

loopingCondition(50);
