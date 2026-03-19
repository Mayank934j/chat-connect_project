<?php
session_start();
include("../pdoConfig.php");
include("../pdoFunction.php");

if (!isset($_SESSION["USER_DETAILS"]["id"])) {
    echo "<script>
        alert('You must be logged in.');
        window.location.href = 'index.php';
    </script>";
    exit;
}

$user_id = $_SESSION["USER_DETAILS"]["id"];
$old_pass = $_POST['old_password'] ?? '';
$new_pass = $_POST['new_password'] ?? '';
$confirm_pass = $_POST['confirm_password'] ?? '';

// Validate passwords
if ($new_pass !== $confirm_pass) {
    echo "<script>
        alert('New passwords do not match.');
        window.history.back();
    </script>";
    exit;
}

// Hash password (weak, just for example — better to use password_hash in real projects)
$new_hashed = md5($new_pass);

$Query = "UPDATE user SET password = '$new_hashed' WHERE id = '$user_id'";

try {
    $r = runPdoQuery($Query, $CONNECT_WITH);
    if (isset($r) && isset($r[0])) {
        // ✅ Logout user
session_destroy();
session_start(); // start fresh session

// ✅ Set temporary success message
$_SESSION['password_reset_success'] = true;
echo "<script>
  window.location.href = 'index.php';
</script>";
exit;
    } else {
        echo "<script>
            alert('Update failed.');
            window.history.back();
        </script>";
        exit;
    }
} catch (Exception $e) {
    echo "<script>
        alert('System error occurred.');
        window.history.back();
    </script>";
    exit;
}
?>
