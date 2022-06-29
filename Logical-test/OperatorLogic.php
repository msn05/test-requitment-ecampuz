<?php
function pembagianBilanganBulat($nilai, $pembagi)
{
    $hasil = 1;
    $sisa  = $nilai - $pembagi;
    while ($sisa >= $pembagi) {
        $sisa = $sisa - $pembagi;
        if ($sisa) {
            if ($pembagi - $sisa == 1)
                $hasil += 1;
            $hasil++;
        } else {
            $hasil++;
        }
    }
    echo $hasil;
}
// pembagianBilanganBulat(7, 3);

function perkalianBilangan($nilai, $value)
{
    $hasil = 0;
    for ($i = 0; $i < $value; $i++) {
        $hasil += $nilai;
    }
    echo $hasil;
}
// perkalianBilangan(3, 5);

function pembagianBilanganBulat2($nilai, $value)
{
    $hasil = 1;
    $sisa = $nilai - $value;
    while ($sisa >= $value) {
        $sisa = $sisa - $value;
        if ($value - $sisa == 1) $hasil++ + 1;
        $hasil++;
    }
    echo $hasil;
}

// pembagianBilanganBulat2(19, 3);
