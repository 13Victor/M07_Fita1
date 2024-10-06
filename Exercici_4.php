<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ex4</title>
	<style>
		td {
			border: 1px solid black;
			padding: 5px;
			width: 10px;
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
			$n = 13;
			$letras = ['A', 'B', 'C', 'D'];

			echo "<tr><td></td>";
			for ($i = 1; $i <= $n; $i++) {
				echo "<td>$i</td>";
			}
			echo "</tr>";

			foreach ($letras as $letra) {
				echo "<tr><td>$letra</td>";
				for ($i = 1; $i <= $n; $i++) {
					echo "<td></td>";
				}
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>
