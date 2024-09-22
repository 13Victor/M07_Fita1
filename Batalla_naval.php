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
			font-size: 8px;
			width: 10px;
			height: 10px;
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
			// Tamaño del tablero
			$n = 10;

			// Información de los barcos
			$ships = [
				"frigate" => [array(), 1, "#C70039"],
				"submarine" => [array(), 2, "#0057C7"],
				"destroyer" => [array(), 3, "#00C745"],  
				"aircraft_carrier" => [array(), 4, "#EFDF23"]  
			];

			

			// Generar posiciones válidas sin solapamientos y sin barcos adyacentes
			while (!$valid_positions) {
				$valid_positions = false;
				$all_positions = [];
				$board = array_fill(0, $n, array_fill(0, $n, null)); // Matriz NxN vacía
				$valid_positions = true; // Asumimos que será válida hasta que falle algo

				foreach ($ships as $name => $ship) {
					$ship_length = $ship[1];
					$ship_positions = [];
					$placed = false;

					for ($attempts = 0; $attempts < 100 && !$placed; $attempts++) {
						$orientation = rand(0, 1); // 0: horizontal, 1: vertical
						
						// Determinamos posición de inicio
						if ($orientation == 0) { // Colocar horizontalmente
							$start_row = rand(0, $n - 1);
							$start_col = rand(0, $n - $ship_length);
						} else { // Colocar verticalmente
							$start_row = rand(0, $n - $ship_length);
							$start_col = rand(0, $n - 1);
						}

						$can_place = true;

						// Revisar todas las celdas donde el barco se colocará
						for ($i = 0; $i < $ship_length; $i++) {
							if ($orientation == 0) { // Horizontal
								$row = $start_row;
								$col = $start_col + $i;
							} else { // Vertical
								$row = $start_row + $i;
								$col = $start_col;
							}

							// Verificar si las celdas adyacentes están ocupadas o no
							for ($r = $row - 1; $r <= $row + 1 && $can_place; $r++) {
								for ($c = $col - 1; $c <= $col + 1 && $can_place; $c++) {
									// Solo consideramos las celdas dentro del tablero
									if ($r >= 0 && $r < $n && $c >= 0 && $c < $n) {
										if (!empty($board[$r][$c])) {
											$can_place = false; // Hay algo en una celda adyacente
										}
									}
								}
							}
						}

						// Si todas las celdas (y las adyacentes) están vacías, colocamos el barco
						if ($can_place) {
							for ($i = 0; $i < $ship_length; $i++) {
								if ($orientation == 0) {
									$board[$start_row][$start_col + $i] = $name;
									$ship_positions[] = [$start_row, $start_col + $i];
								} else {
									$board[$start_row + $i][$start_col] = $name;
									$ship_positions[] = [$start_row + $i, $start_col];
								}
							}
							$ships[$name][0] = $ship_positions; // Guardamos las posiciones del barco
							$placed = true; // El barco ha sido colocado
						}
					}

					if (!$placed) {
						break; // Si no se puede colocar un barco, rompemos el ciclo
					}
				}

				// Comprobación de solapamientos o cercanía entre barcos
				$all_positions = [];
				foreach ($ships as $ship) {
					foreach ($ship[0] as $pos) {
						$all_positions[] = $pos;	
					}
				}

				// Serializamos las coordenadas y verificamos si hay duplicados
				$serialized_coords = array_map('serialize', $all_positions);
				if (count($serialized_coords) == count(array_unique($serialized_coords))) {
					$valid_positions = true;
				}
			}

			// Cabecera de la tabla (números)
			echo "<tr><td></td>";
			for ($i = 1; $i <= $n; $i++) {
				echo "<th>$i</th>";
			}
			echo "</tr>";

			// Generar letras para las filas (A, B, C, ...)
			$letters = [];
			for ($i = 0; $i < $n; $i++) {
				$letters[] = chr(65 + $i);
			}

			// Rellenar la tabla con barcos y espacios vacíos
			foreach ($letters as $row_index => $letter) {
				echo "<tr><th>$letter</th>"; // Fila con letra
				for ($col = 0; $col < $n; $col++) {
					if ($board[$row_index][$col] !== null) {
						$ship_name = $board[$row_index][$col];
						$ship_color = $ships[$ship_name][2];
						echo "<td style='background: $ship_color;'></td>"; // Pintar barco
					} else {
						echo "<td></td>"; // Espacio vacío
					}
				}
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>
