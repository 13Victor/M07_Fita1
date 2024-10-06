<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ex1</title>
</head>
<body>
    <table style="border: 1px solid black; border-collapse: collapse;">
        <tr style="text-align: center;">
            <?php

                $n = 12;

                for($i = 0; $i <= $n; $i++){

                    echo "<td style='border: 1px solid black; border-collapse: collapse; padding: 3px;'> $i </td>";

                }
            ?>

        </tr>

    </table>
    
</body>
</html>