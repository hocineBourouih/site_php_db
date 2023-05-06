<?php
require_once 'config/database.php';

if (isset($_GET['id'])) 
{
    $id = $_GET['id'];

    $query = "DELETE FROM recipes WHERE id=?";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(1, $id, PDO::PARAM_INT);

    $stmt->execute();

    header('Location: list.php');
}

else
{
    header('Location: list.php');
}
?>