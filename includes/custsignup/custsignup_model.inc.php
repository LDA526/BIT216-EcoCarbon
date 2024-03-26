<?php

declare(strict_types = 1);

function get_username(object $mysqli, string $username): bool {
    $query = "SELECT username FROM user WHERE username = ?";

    $stmt = $mysqli->prepare($query);

    $stmt->bind_param("s", $username);

    $stmt->execute();

    $result = $stmt->get_result();

    $username_exists = $result->num_rows > 0; // If rows are found, the username exists

    $stmt->close();

    return $username_exists;
}

function get_email(object $mysqli, string $email): bool {

    $query = "SELECT email FROM user WHERE email = ?";

    $stmt = $mysqli->prepare($query);

    $stmt->bind_param("s", $email);

    $stmt->execute();

    $result = $stmt->get_result();

    $email_exists = $result->num_rows > 0; // If rows are found, the username exists

    $stmt->close();

    return $email_exists;
}

function set_user(object $mysqli, string $username, string $pwd, string $email, string $contactno, string $commute, string $energy, string $diet) {
    $query = "INSERT INTO user (username, pwd, email, contactno, commute, energy, diet) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sssssss", $username, $pwd, $email, $contactno, $commute, $energy, $diet);
    $stmt->execute();    
    $stmt->close();
}
