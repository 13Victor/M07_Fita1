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
				"fragata" => [array(), 1, "#C70039"],
				"submari" => [array(), 2, "#0057C7"],
				"destructor" => [array(), 3, "#00C745"],  
				"portaavions" => [array(), 4, "#EFDF23"]  
			];

			$valid_positions = false;

			// Generar posiciones válidas sin solapamientos
			while (!$valid_positions) {
				$all_positions = [];
				$tablero = array_fill(0, 10, array_fill(0, 10, null));
				
				foreach ($vaixells as $nombre => $vaixell) {
					$ship_length = $vaixell[1];
					$ship_positions = [];
					$orientation = rand(0, 1); // 0: horizontal, 1: vertical

					if ($orientation == 0) { 
						$start_row = rand(0, 9);
						$start_col = rand(0, 10 - $ship_length);
						for ($j = 0; $j < $ship_length; $j++) {
							$ship_positions[] = [$start_row, $start_col + $j];
							$tablero[$start_row][$start_col + $j] = $nombre;
						}
					} else { 
						$start_row = rand(0, 10 - $ship_length);
						$start_col = rand(0, 9);
						for ($j = 0; $j < $ship_length; $j++) {
							$ship_positions[] = [$start_row + $j, $start_col];
							$tablero[$start_row + $j][$start_col] = $nombre;
						}
					}
					$vaixells[$nombre][0] = $ship_positions;
				}

				foreach ($vaixells as $vaixell) {
					foreach ($vaixell[0] as $pos) {
						$all_positions[] = $pos;	
					}
				}

				$coordenadas_serializadas = array_map('serialize', $all_positions);
				if (count($coordenadas_serializadas) == count(array_unique($coordenadas_serializadas))) {
					$valid_positions = true;
				}
			}

			$n = 10;

			// Cabecera de la tabla
			echo "<tr><td></td>";
			for ($i = 1; $i <= $n; $i++) {
				echo "<th>$i</th>";
			}
			echo "</tr>";

			// Rellenar tabla con barcos y espacios vacíos
			foreach ($letras as $fila_index => $letra) {
				echo "<tr><th>$letra</th>";
				for ($col = 0; $col < $n; $col++) {
					if ($tablero[$fila_index][$col] !== null) {
						$nombre_barco = $tablero[$fila_index][$col];
						$ship_color = $vaixells[$nombre_barco][2];
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
