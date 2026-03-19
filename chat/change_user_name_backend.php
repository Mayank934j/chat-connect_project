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
$new_username = $_POST['new_username'] ?? '';
$confirm_username = $_POST['confirm_username'] ?? '';

if ($new_username !== $confirm_username) {
    echo "<script>
        alert('Usernames do not match.');
        window.history.back();
    </script>";
    exit;
}

$new_username = htmlspecialchars(trim($new_username));

$Query = "UPDATE user SET name = '$new_username' WHERE id = '$user_id'";

try {
    $r = runPdoQuery($Query, $CONNECT_WITH);
    if (isset($r) && isset($r[0])) {
        // ✅ Update session too
        $_SESSION["USER_DETAILS"]["name"] = $new_username;

        echo "<script>
            alert('Username updated successfully!');
            window.location.href = 'chathome.php';
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
