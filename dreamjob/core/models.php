<?php 
require_once 'dbConfig.php';

function insertNewUser($pdo, $first_name, $last_name, $email, $gender, $address, $state, $nationality) {
    $sql = "INSERT INTO web_designers (first_name, last_name, email, gender, address, state, nationality) VALUES (?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $email, $gender, $address, $state, $nationality]);
}

function getAllUsers($pdo) {
    $sql = "SELECT * FROM web_designers";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getUserByID($pdo, $id) {
    $sql = "SELECT * FROM web_designers WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function updateUser($pdo, $id, $first_name, $last_name, $email, $gender, $address, $state, $nationality) {
    $sql = "UPDATE web_designers SET first_name = ?, last_name = ?, email = ?, gender = ?, address = ?, state = ?, nationality = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $email, $gender, $address, $state, $nationality, $id]);
}

function deleteUser($pdo, $id) {
    $sql = "DELETE FROM web_designers WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}
?>