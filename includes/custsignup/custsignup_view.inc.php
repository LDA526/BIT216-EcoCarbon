<?php

declare(strict_types=1);

function signup_inputs() {

    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["error_signup"]["taken_username"])) {
        echo '<div class="form-floating mb-4">
                <input
                    type="text"
                    name="username"
                    class="form-control form-control-lg"
                    placeholder="JohnDoe123"
                    required
                    value= "' . $_SESSION["signup_data"]["username"] . '"
                />
                <label for="formRegUserName">Username</label>
            </div>';
    } else {
        echo '<div class="form-floating mb-4">
                <input
                    type="text"
                    name="username"
                    class="form-control form-control-lg"
                    placeholder="JohnDoe123"
                    required
                />
                <label for="formRegUserName">Username</label>
            </div>';
    }

    if (isset($_SESSION["signup_data"]["fullname"])) {
        echo '<div class="form-floating mb-4">
                <input
                    type="text"
                    name="fullname"
                    class="form-control form-control-lg"
                    placeholder="John Doe"
                    required
                    value= "' . $_SESSION["signup_data"]["fullname"] . '"
                />
                <label for="formFullName">Full Name</label>
            </div>';
    } else {
        echo '<div class="form-floating mb-4">
                <input
                    type="text"
                    name="fullname"
                    class="form-control form-control-lg"
                    placeholder="John Doe"
                    required
                />
                <label for="formFullName">Full Name</label>
            </div>';
    }

    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["error_signup"]["invalid_email"]) && !isset($_SESSION["error_signup"]["taken_email"])) {
        echo '<div class="form-floating mb-4">
                <input
                    type="email"
                    name="email"
                    class="form-control form-control-lg"
                    placeholder="info@example.com"
                    required
                    value="' . $_SESSION["signup_data"]["email"] . '"
                    />
                    <label for="formEmail">Email Address</label>
                </div>';
    } else {
        echo '<div class="form-floating mb-4">
                <input
                    type="email"
                    name="email"
                    class="form-control form-control-lg"
                    placeholder="info@example.com"
                    required
                />
                <label for="formEmail">Email Address</label>
            </div>';
    }

    if (isset($_SESSION["signup_data"]["contactno"]) && isset($_SESSION["error_signup"]["invalid_number"])) {
        echo '<div class="form-floating mb-4">
                <input
                    type="number"
                    name="contactno"
                    class="form-control form-control-lg"
                    placeholder="1111111"
                    required
                    value="' . $_SESSION["signup_data"]["contactno"] . '"
                />
                <label for="formContactNo">Mobile Number</label>
            </div>';
    } else {
        echo '<div class="form-floating mb-4">
                <input
                    type="number"
                    name="contactno"
                    class="form-control form-control-lg"
                    placeholder="1111111"
                    required
                />
                <label for="formContactNo">Mobile Number</label>
            </div>';
    }

    echo '<div class="mb-4">
        <select class="form-select form-select-lg fs-8" name="commute" aria-label="Default select example" required>
            <option selected value="" disabled>Commuting Preferences</option>
            <option value="personal">Personal Vehicle</option>
            <option value="public">Public Transportation</option>
            <option value="walking">Walking</option>
        </select>
    </div>';

    echo '<div class="mb-4">
        <select class="form-select form-select-lg fs-8" name="energy" aria-label="Default select example" required>
            <option selected value="" disabled>Energy Sources</option>
            <option value="electricity">Electricity</option>
            <option value="solar">Solar Power</option>
        </select>
    </div>';

    echo '<div class="mb-4">
        <select class="form-select form-select-lg fs-8" name="diet" aria-label="Default select example" required>
            <option selected value="" disabled>Dietary Preferences</option>
            <option value="mixed">Mixed Diet</option>
            <option value="vegetarian">Vegetarian</option>
            <option value="vegan">Vegan</option>
        </select>
    </div>';
}

function check_signup_errors() {
    if (isset($_SESSION["error_signup"])) {
        $errors = $_SESSION["error_signup"];

        echo '<script>';
        echo 'alert("Errors: ' . implode('\n', $errors) . '");';
        echo '</script>';

        unset($_SESSION["error_signup"]);
    } elseif (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<script>';
        echo 'alert("Signup Success!");';
        echo '</script>';
    }
}