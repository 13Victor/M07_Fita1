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
				"fragata" => [array(), 1, "red"],
				"submari" => [array(), 2, "blue"],
				"destructor" => [array(), 3, "green"],  
				"portaavions" => [array(), 4, "black"]  
			];

			foreach ($vaixells as $nombre => $vaixell) {
				$ship_length = $vaixell[1];
				$ship_positions = [];

				// Elegir aleatoriamente la orientación del barco
				$orientation = rand(0, 1); // 0 = horizontal, 1 = vertical
				
				if ($orientation == 0) { // Horizontal
					$start_row = rand(1, 10);
					$start_col = rand(0, 10 - $ship_length); // Ajustamos la columna para que el barco no se salga del tablero

					for ($j = 0; $j < $ship_length; $j++) {
						$ship_positions[] = [$start_row, $letras[$start_col + $j]];
					}
				} else { // Vertical
					$start_row = rand(1, 10 - $ship_length); // Ajustamos la fila para que el barco no se salga del tablero
					$start_col = rand(0, 9);

					for ($j = 0; $j < $ship_length; $j++) {
						$ship_positions[] = [$start_row + $j, $letras[$start_col]];
					}
				}

				$vaixells[$nombre][0] = $ship_positions; // Asignar las posiciones al array original
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
					$ship_found = false;
					$ship_color = null;

					// Verificar si en esta celda hay un barco
					foreach ($vaixells as $vaixell) {
						foreach ($vaixell[0] as $pos) {
							if ($i == $pos[0] && $pos[1] == $letra) {
								$ship_found = true;
								$ship_color = $vaixell[2];
							}
						}
					}

					// Pintamos la celda
					if ($ship_found) {
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
