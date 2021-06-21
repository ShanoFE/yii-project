<?php
    foreach ($countries as $country) {
        echo $country->Name;
        echo "<tr> - </tr> ";
        echo $country->Code;
        echo "<td> - </td>";
        echo number_format($country->Population, 0, ',', ' ');
        echo "<br>";
    }
?>