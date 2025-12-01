<?php 
require_once 'core/dbConfig.php'; 
require_once 'core/models.php';

if (isset($_POST['insertBtn'])) {
    $query = insertNewUser($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['gender'], $_POST['address'], $_POST['state'], $_POST['nationality']);

    if ($query) {
        header("Location: index.php");
    } else {
        echo "Insertion failed";
    }
}

if (isset($_POST['editBtn'])) {
    $query = updateUser($pdo, $_GET['id'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['gender'], $_POST['address'], $_POST['state'], $_POST['nationality']);

    if ($query) {
        header("Location: index.php");
    } else {
        echo "Edit failed";
    }
}

if (isset($_POST['deleteBtn'])) {
    $query = deleteUser($pdo, $_GET['id']);

    if ($query) {
        header("Location: index.php");
    } else {
        echo "Deletion failed";
    }
}
?>