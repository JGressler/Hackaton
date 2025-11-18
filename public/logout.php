<?php
require '../src/auth.php';

session_destroy();

header("Location: login.php");
exit;
