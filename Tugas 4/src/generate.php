<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Generate Result</title>
</head>
<body>
<table border="1">
    <tr>
        <th>NPM</th>
        <th>Nama</th>
        <th>Angkatan</th>
    </tr>
    <tbody>
    <?php 
        $rows = array();
        for ($i = 1; $i <= $_POST['length-of-row']; ++$i)
            $rows[$i] = array('NPM' => "170810100$i", 'Nama' => "George $i", 'Angkatan' => "Angkatan $i");

        foreach ($rows as $row) {
            echo "<tr>";
            foreach ($row as $columnName => $columnValue)
                echo "<td>$columnValue</td>";
            echo "</tr>";
        }
    ?>
    </tbody>
</table>
</body>
</html>