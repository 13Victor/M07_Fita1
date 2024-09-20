<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ex2</title>
</head>
<body>
    <table style="border: 1px solid black; border-collapse: collapse;">
        <tr>
            <?php
                $n = 4;
                for($i = 0; $i <= $n; $i++){
                    echo "<td style='border: 1px solid black; border-collapse: collapse;'>".chr($i+65)."</td>";
                }
            ?>
        </tr>
        <tr>
            <?php
                for($i = 0; $i <= $n; $i++){
                    echo "<td style='border: 1px solid black; border-collapse: collapse;'>$i</td>";
                }
            ?>
        </tr>
    </table>
</body>
</html>
