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
			font-size: 18px;
			width: 30px;
			height: 30px;
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
			$vaixells = [
				"submari" => [array(), 2, "red"],
				"aaaaaaa" => [array(), 3, "blue"]
			];

			foreach ($vaixells as &$vaixell) {
				$ship_length = $vaixell[1];
				$ship_positions = [];
				$start_row = rand(1, 10 - $ship_length + 1);
				$start_col = $letras[rand(0, count($letras) - 1)];
				
				// Horizontal
				for ($j = 0; $j < $ship_length; $j++) {
					$ship_positions[] = [$start_row + $j, $start_col];
				}

				$vaixell[0] = $ship_positions; // Asigna las posiciones
			}

			$n = 10;

			// Cabecera de la tabla
			echo "<tr><td></td>";
			for ($i = 1; $i <= $n; $i++) {
				echo "<th>$i</th>";
			}
			echo "</tr>";

			// Recorremos las filas
			foreach ($letras as $letra) {
				echo "<tr><th>$letra</th>";

				// Recorremos las columnas
				for ($i = 1; $i <= $n; $i++) {
					$ship_color = null; 

					// Verificar si en esta celda hay un barco
					foreach ($vaixells as $vaixell) {
						foreach ($vaixell[0] as $pos) {
							if ($i == $pos[0] && $pos[1] == $letra) {
								$ship_color = $vaixell[2];
							}
						}
					}

					// Pintamos la celda
					if ($ship_color) {
						echo "<td style='background: $ship_color;'></td>";
					} else {
						echo "<td></td>";
					}
				}
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>
