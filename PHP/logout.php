<?php
// php/logout.php
session_start();

// Hapus semua variabel sesi
$_SESSION = array();

// Hapus cookie sesi
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Hancurkan sesi
session_destroy();

// Redirect ke halaman landing atau login
header('Location: ../landing.php'); // Sesuaikan path ini jika landing.html ada di direktori yang berbeda
exit();
?>