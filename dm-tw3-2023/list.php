<?php require_once 'config/database.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des recettes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <h1>Liste des recettes</h1>

    <form method="GET">
        <label for="difficulty">Filtrer selon la difficulté :</label>
        <select name="difficulty" id="difficulty">
            <option value="">Toutes</option>
            <option value="Facile">Facile</option>
            <option value="Moyen">Moyen</option>
            <option value="Difficile">Difficile</option>
        </select>
        <input type="submit" value="Filtrer">
    </form>

    <?php
    $difficulty = isset($_GET['difficulty']) ? $_GET['difficulty'] : '';

    if ($difficulty) 
    {
        $query = "SELECT * FROM recipes WHERE difficulty = :difficulty";
    
        $stmt = $pdo->prepare($query);
    
        $stmt->bindParam(':difficulty', $difficulty);
    
        $stmt->execute();
    }
    else 
    {
    
        $query = "SELECT * FROM recipes";
    
        $stmt = $pdo->query($query);
    }

    if ($stmt->rowCount() > 0) 
    {
        echo "<table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Temps de préparation (minutes)</th>
                        <th>Difficulté</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
        {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['prep_time']}</td>
                    <td>{$row['difficulty']}</td>
                    <td>
                        <a href='view.php?id={$row['id']}'>Voir</a>
                        <a href='update.php?id={$row['id']}'>Modifier</a>
                        <a href='delete.php?id={$row['id']}'>Supprimer</a>
                    </td>
                  </tr>";
        }

        echo "</tbody>
            </table>";
    }

    else 
    {
        echo "<p>Aucune recette trouvée.</p>";
    }

    ?>

    <a href="add.php" class="add-recipe-link">Ajouter une nouvelle recette</a>

    <?php include 'includes/footer.php'; ?>
    
</body>
</html>