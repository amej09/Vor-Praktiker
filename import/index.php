<?php include('import-file.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import CSV</title>
</head>
<body>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="csv_file">Sélectionnez un fichier CSV :</label>
        <input type="file" name="csv_file" id="csv_file" accept=".csv">
        <button type="submit">Importer</button>
    </form>

</body>
</html>