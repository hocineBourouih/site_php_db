<?php
require_once 'config/database.php';

if (isset($_GET['id'])) 
{
    $id = intval($_GET['id']);

    $query = "SELECT * FROM recipes WHERE id = :id";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();

    if ($stmt->rowCount() > 0) 
    {
        $recipe = $stmt->fetch(PDO::FETCH_ASSOC);
    } 
    else 
    {
        header('Location: list.php');
    
        exit();
    }
}
else 
{

    header('Location: list.php');

    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $recipe['name']; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <h1><?php echo $recipe['name']; ?></h1>
    <p>Description : <?php echo $recipe['description']; ?></p>
    <p>Temps de préparation : <?php echo $recipe['prep_time']; ?> minutes</p>

    <a href="list.php" class="back-to-list">Retour à la liste des recettes</a>


    <?php include 'includes/footer.php'; ?>
</body>
</html>
