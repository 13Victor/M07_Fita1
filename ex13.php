<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ex3</title>
</head>
<body>
	<table style="border: 1px solid black; border-collapse: collapse;">
        <?php
            $m = 4; // Número de filas
            $n = 7; // Número de columnas
            
            for ($j = 0; $j < $m; $j++) {
	            echo "<tr>";
		            for ($i = 0; $i < $n; $i++) {
		                echo "<td style='border: 1px solid black; padding: 5px;'>".($i + $j)."</td>";
	            	}
	            echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
