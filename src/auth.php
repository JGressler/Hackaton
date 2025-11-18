<?php
session_start();

function isLogged() {
    return isset($_SESSION['user']);
}

function isAdmin() {
    return isset($_SESSION['user']) && $_SESSION['user']['tipo'] === 'admin';
}

function requireLogin() {
    if (!isLogged()) {
        header("Location: ../login.php");
        exit;
    }
}

function requireAdmin() {
    if (!isAdmin()) {
        header("Location: ../dashboard.php");
        exit;
    }
}
