<?php
    header('Content-Type: application/json'); // La réponse sera du JSON

    //require_once("connexion_bdd.php");
    require_once("../BDD/connexion_bdd.php");

    session_start();

    $id_utilisateur = $_SESSION['id_utilisateur'] ?? null;

    if (!isset($id_utilisateur)) {
        echo json_encode(['status' => 'disconnected']);
        exit();
    }

    $data = file_get_contents('php://input');
    $decodedData = json_decode($data, true);

    if (isset($decodedData['score']) && is_numeric($decodedData['score'])) {

        $score = intval($decodedData['score']);
        $jeu = $decodedData['jeu'];

        // Vérifier si un score existe déjà pour cet utilisateur
        $checkSql = "SELECT score FROM score_".$jeu." WHERE id_utilisateur = ?";
        $stmt = $conn->prepare($checkSql);
        $stmt->bind_param("s", $id_utilisateur);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows>0) {
            // Récupérer les informations
            $stmt->bind_result($ancien_score);
            $stmt->fetch();

            // Verifie si le score est meilleur. Sinon signale de ne pas enregistrer
            $modif_score = 0;
            if ($jeu == "reflexe") {
                if ($ancien_score > $score) {
                    $modif_score = 1;
                }
            } else {
                if ($ancien_score < $score) {
                    $modif_score = 1;
                }
            }

            // Si l'utilisateur a déjà un score moins bon, mettre à jour le score existant
            if ($modif_score == 1) {
                $updateSql = "UPDATE score_".$jeu." SET `score` = ? WHERE `id_utilisateur` = ?";
                $updateStmt = $conn->prepare($updateSql);
                $updateStmt->bind_param("is", $score, $id_utilisateur);
                $updateStmt->execute();

                if ($updateStmt->affected_rows > 0) {
                    echo json_encode(['status' => 'success', 'action' => 'updated']);
                } else {
                    echo json_encode(['status' => 'failure', 'message' => 'Update failed.']);
                }

                $updateStmt->close();

            } else {
                // Aucune modification
                echo json_encode(['status' => 'success', 'action' => 'no-update']);
            }

            

        } else {
            // Si aucun score n'existe, insérer un nouveau score
            $insertSql = "INSERT INTO score_".$jeu." (`id_score`, `id_utilisateur`, `score`) VALUES (NULL, ?, ?)";
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bind_param("ss", $id_utilisateur, $score);
            $insertStmt->execute();

            if ($insertStmt->affected_rows > 0) {
                echo json_encode(['status' => 'success', 'action' => 'inserted']);
            } else {
                echo json_encode(['status' => 'failure', 'message' => 'Insertion failed.']);
            }

            $insertStmt->close();
        }

        // Fermer la connexion
        $stmt->close();
        $conn->close();

        exit();
    }
    echo json_encode(['status' => 'failure', 'message' => 'Méthode non autorisée.']);
    exit();
?>