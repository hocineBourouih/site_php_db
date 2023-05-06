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

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

    $name = $_POST['name'];

    $description = $_POST['description'];

    $prep_time = intval($_POST['prep_time']);

    $query = "UPDATE recipes SET name=:name, description=:description, prep_time=:prep_time WHERE id=:id";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);

    $stmt->bindParam(':description', $description, PDO::PARAM_STR);

    $stmt->bindParam(':prep_time', $prep_time, PDO::PARAM_INT);

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) 
    {
    
        header('Location: list.php');
    
        exit();
    } 
    else
    {
        echo "Erreur lors de la mise à jour : " . $stmt->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mise à jour de la recette</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <h1>Mise à jour de la recette</h1>

<form class="add-form" method="post">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" value="<?php echo $recipe['name']; ?>" required>
    <br>
    <label for="description">Description :</label>
    <textarea id="description" name="description" required><?php echo $recipe['description']; ?></textarea>
    <br>
    <label for="prep_time">Temps de préparation (minutes) :</label>
    <input type="number" id="prep_time" name="prep_time" value="<?php echo $recipe['prep_time']; ?>" required>
    <br>
    <input type="submit" value="Mettre à jour">
</form>

<a href="list.php" class="back-to-list">Retour à la liste des recettes</a>

                                                                                                                                                                                                                                                                                                                                    
<?php include 'includes/footer.php'; ?>
</body>
</html>
