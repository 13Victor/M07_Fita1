<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Batalla naval</title>
	<style>
		td, th {
			border: 1px solid black;
			padding: 5px;
			font-size: 40px;
			width: 50px;
			height: 50px;
			text-align: center;
		}

		table {
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<table>
		<?php

			$letras = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
			$vaixells = [ "submari" => [[rand(1, 10), $letras[rand(0, count($letras) - 1)]], 2]];

			$n = 10;

			echo "<tr><td></td>";
			for ($i = 1; $i <= $n; $i++) {
				echo "<th>$i</th>";
			}
			echo "</tr>";

			foreach ($letras as $letra) {
				echo "<tr><th>$letra</th>";
				for ($i = 1; $i <= $n; $i++) {
					if ($i == $vaixells["submari"][0][0] && $vaixells["submari"][0][1] == $letra) {
						echo "<td style='background: red;'></td>";

					}
					else {
						echo "<td></td>";
					}
					
				}
				echo "</tr>";
			}
			
		?>
	</table>
</body>
</html>
