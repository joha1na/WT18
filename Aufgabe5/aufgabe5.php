<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Zufallszahlen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css " />
    <style>
      .table {
        text-align: right;
      }
    </style>
    <?php

    function zufzahl($max, $anzahl, $stellen)
    {
        echo "<table class='table table-bordered table-sm'><tr><th>Zufallszahl</th>";
        for($j=1; $j<=$stellen; $j++)
        {
            echo "<th>ersten $j Stellen</th>";
        }
        for($i=1; $i<=$anzahl; $i++)
        {
            echo "</tr>";
            $zzahl = rand(1,$max);
            if($zzahl>=100000)      {   echo "<tr style='background-color:lightgrey'>";}
            elseif($zzahl>=10000)   {   echo "<tr style='background-color:green'>";}
            elseif($zzahl>=1000)    {   echo "<tr style='background-color:yellow'>";}
            elseif($zzahl>=100)     {   echo "<tr style='background-color:orange'>";}
            else                    {   echo "<tr style='background-color:white'>";}
            // for($k=0; $k<=$stellen; $k++)
            // {
            //     $gerundet = abschneiden($zzahl, $stellen-$k);
            //     echo "<td> $gerundet </td>";
            // }
            echo "<td> $zzahl </td>";
            for($k=1; $k<=$stellen; $k++)
            {
              if(strlen($zzahl)-$k>=0){
                $gerundet = abschneiden($zzahl, strlen($zzahl)-$k);
                echo "<td> $gerundet </td>";
              }
              else {
                echo "<td> $zzahl </td>";
              }
            }
        }
        echo "</tr></table>";
    }

    function abschneiden($zahl, $stellen)
    {
        $base = pow(10, $stellen);
        return $zahl - ($zahl % $base);
    }

    ?>
  </head>
  <body>
    <div class="container">
      <h1>Zufallszahlen</h1>
      <p><a href="../index.html">Startseite</a></p>
      <div>
          <?php zufzahl(200000, 20, 5);?>
      </div>
    </div>
</body>
