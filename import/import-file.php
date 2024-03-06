<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le formulaire a été soumis via POST

    // Vérifier si un fichier a été téléchargé avec succès
    if (isset($_FILES["csv_file"]) && $_FILES["csv_file"]["error"] == 0) {

        // Définir le chemin de destination du fichier sur le serveur
        $destination_path = "upload/";

        // Construire le chemin complet du fichier sur le serveur
        $file_path = $destination_path . $_FILES["csv_file"]["name"];

        // Déplacer le fichier téléchargé vers le répertoire de destination
        if (move_uploaded_file($_FILES["csv_file"]["tmp_name"], $file_path)) {

            // Le fichier a été téléchargé avec succès

            // Traitement du fichier CSV
            $file_handle = fopen($file_path, "r");

            // Ignorer la première ligne (entêtes)
            fgetcsv($file_handle, 1000, ",");

            while (($data = fgetcsv($file_handle, 1000, ",")) !== FALSE) {
                // Traitement des données de chaque ligne du CSV
                $produkt = $data[0];
                $preis = $data[1];
                $lagerbestand = $data[2];
                $lieferzeit = $data[3];
                $kategorie = $data[4];
                $dateiname = $data[5];

                // Faire quelque chose avec les données (par exemple, les insérer dans une base de données)
                // Exemple : echo "Produkt: $produkt, Preis: $preis, Lagerbestand: $lagerbestand, Lieferzeit: $lieferzeit, Kategorie: $kategorie, Dateiname: $dateiname<br>";
            }

            // Fermer le gestionnaire de fichier
            fclose($file_handle);

            // Afficher un message de succès
            echo "Le fichier CSV a été importé avec succès.";

        } else {
            // Échec du déplacement du fichier
            echo "Erreur lors du déplacement du fichier.";
        }

    } else {
        // Aucun fichier téléchargé ou erreur de téléchargement
        echo "Erreur lors du téléchargement du fichier.";
    }
}
?>


