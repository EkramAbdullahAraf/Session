<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Profile Picture</th>
    </tr>
    <?php
    $file = fopen('users.csv', 'r');
    while (($data = fgetcsv($file)) !== false) {
        echo '<tr>';
        foreach($data as $value) {
            echo '<td>' . $value . '</td>';
        }
        echo '</tr>';
    }
    fclose($file);
    ?>
</table>
</body>
</html>
