<?php
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $name = $_POST['name'];

    $description = $_POST['description'];
    
    $image_url = $_POST['image_url'];
    
    $prep_time = $_POST['prep_time'];
    
    $difficulty = $_POST['difficulty'];

    $query = "INSERT INTO recipes (name, description, image_url, prep_time, difficulty) VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $pdo->prepare($query);
    
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $description);
    $stmt->bindParam(3, $image_url);
    $stmt->bindParam(4, $prep_time, PDO::PARAM_INT);
    $stmt->bindParam(5, $difficulty);
    
    $stmt->execute();
    
    header('Location: list.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Ajouter une recette</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="container">

        <form class="add-form" method="POST" action="add.php">
            <label for="name">Nom de la recette:</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Description de la recette:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="image_url">URL de l'image:</label>
            <input type="text" id="image_url" name="image_url" required>

            <label for="prep_time">Temps de préparation (en minutes):</label>
            <input type="number" id="prep_time" name="prep_time" required>

            <label for="difficulty">Difficulté:</label>
            <select id="difficulty" name="difficulty">
                <option value="Facile">Facile</option>
                <option value="Moyen">Moyen</option>
                <option value="Difficile">Difficile</option>
            </select>

            <button type="submit">Ajouter la recette</button>
            
        </form>
    </div>

    
    <?php include 'includes/footer.php'; ?>

</body>
</html>
