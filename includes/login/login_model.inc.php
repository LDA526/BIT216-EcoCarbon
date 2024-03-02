<?php

declare(strict_types=1);

function does_username_exist(object $mysqli, string $username): bool {
    $query = "SELECT username FROM user WHERE username = ?";

    $stmt = $mysqli->prepare($query);

    $stmt->bind_param("s", $username);

    $stmt->execute();

    $result = $stmt->get_result();

    $username_exists = $result->num_rows > 0; // If rows are found, the username exists

    $stmt->close();

    return $username_exists;
}

function get_user(object $mysqli, string $username) {
    $query = "SELECT username, pwd FROM user WHERE username = ?";

    $stmt = $mysqli->prepare($query);

    $stmt->bind_param("s", $username);

    $stmt->execute();

    $result = $stmt->get_result();

    $user_info = [];
    while ($row = $result->fetch_assoc()) {
        $user_info[] = $row;
    }

    $stmt->close();

    return $user_info;
}

// function getPasswordsByUsername(object $mysqli, string $username) {
//     $query = "SELECT pwd, default_pwd FROM merchant WHERE username = '$username'";
//     $result = $mysqli->query($query);

//     if ($result) {
//         $row = $result->fetch_assoc();
//         $passwords = array(
//             'pwd' => $row['pwd'],
//             'default_pwd' => $row['default_pwd']
//         );
//         $result->free();
//         return $passwords;
//     } else {
//         return null;
//     }
// }