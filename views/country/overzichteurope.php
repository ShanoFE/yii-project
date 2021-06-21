<?php
    foreach ($countries as $country) {
        echo $country->Name;
        echo "<tr></tr> ";
        echo number_format ($country->SurfaceArea, 0, ',', ' ');
        echo "<br>";
    }
?>