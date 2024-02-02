<?php
include '@/db.php';

if (isset($_GET['project_id']) && is_numeric($_GET['project_id'])) {
    $projectId = $_GET['project_id'];
    $visitorIP = $user->getRealIP();

    // Vérifiez d'abord si une visite unique est déjà enregistrée
    $checkVisit = $bdd->prepare("SELECT id FROM unique_visits WHERE project_id = :projectId AND visitor_ip = :visitorIP");
    $checkVisit->execute([':projectId' => $projectId, ':visitorIP' => $visitorIP]);
    $visitExists = $checkVisit->fetch();

    // Récupérer le lien du projet
    $stmt = $bdd->prepare("SELECT link FROM works WHERE id = ?");
    $stmt->execute([$projectId]);
    $project = $stmt->fetch();

    if ($project) {
        // Si la visite n'existe pas, enregistrez la visite et mettez à jour les statistiques
        if (!$visitExists) {
            // Enregistrez la visite unique
            $recordVisit = $bdd->prepare("INSERT INTO unique_visits (project_id, visitor_ip) VALUES (:projectId, :visitorIP)");
            $recordVisit->execute([':projectId' => $projectId, ':visitorIP' => $visitorIP]);

            // Mettez à jour les statistiques
            $updateStats = $bdd->prepare("INSERT INTO stats (project_id, show_projects) VALUES (:id, 1) ON DUPLICATE KEY UPDATE show_projects = show_projects + 1");
            $updateStats->execute([':id' => $projectId]);
        }

        // Redirection vers le lien du projet
        header("Location: " . $project['link']);
        exit;
    } else {
        header("Location: /");
        exit;
    }
} else {
    header("Location: /");
    exit;
}
?>
