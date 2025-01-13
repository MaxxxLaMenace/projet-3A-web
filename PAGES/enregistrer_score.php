<?php
header('Content-Type: application/json'); // La réponse sera du JSON
echo json_encode(['status' => 'success', 'message' => 'Méthode non autorisée.']);
?>