<?php
require_once 'config/database.php';

$query = "SELECT * FROM recipes";

$result = $pdo->query($query);

$recipes = $result->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon site de recettes</title>
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
    <?php include 'includes/header.php'; ?>

    <div class="container">
        <?php foreach ($recipes as $recipe): ?>
            <div class="recipe-card">
                <img src="<?php echo $recipe['image_url']; ?>" alt="<?php echo $recipe['name']; ?>">
                <h2><?php echo $recipe['name']; ?></h2>
                <p>Temps de préparation : <?php echo $recipe['prep_time']; ?> minutes</p>
                <p><?php echo $recipe['description']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>


    <?php include 'includes/footer.php'; ?>
</body>
</html>
