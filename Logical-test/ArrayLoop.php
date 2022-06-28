<?php

/** Lanjutkan skrip berikut dengan menggunakan perulangan while untuk
 *  menampilkan semua data pada array ke web browser:
 */

$aplikasi = ['gtAkademik', 'gtFinansi', 'gtPerizinan', 'eCampuz', 'eOviz'];
$i = 0;
while ($i < count($aplikasi)) {
  echo 1 + $i . ':' . $aplikasi[$i] . "<br>";
  $i++;
}
