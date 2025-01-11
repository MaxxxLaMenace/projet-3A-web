<?php
    //require_once("connexion_bdd.php");
    require_once("connexion_bdd_wamp_eric.php");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT prenom FROM utilisateurs_site_TP WHERE username = ? AND password = ?;";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        // Afficher l'erreur SQL si la préparation échoue
        die('Erreur de préparation de la requête : ' . $conn->error);
    }
    $stmt->bind_param("ss", $username, $password); // Sécurisation de la requête
    $stmt->execute();
    $stmt->store_result();

    // Vérifier si l'utilisateur existe
    if($stmt->num_rows>0)
    {
        // Récupérer le prénom
        $stmt->bind_result($prenom);
        $stmt->fetch();

        //Afficher le resultat
        echo "<h2>Bonjour ".htmlspecialchars($prenom)."!</h2>";
    } else{
        // Si l'utilisateur n'est pas trouvé
        echo "Login ou password incorrect";
        echo "<p><a href='inscription.html'>Retour</a></p>";
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();
?>