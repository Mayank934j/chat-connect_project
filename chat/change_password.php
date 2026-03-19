<?php
session_start();
if (!isset($_SESSION["USER_DETAILS"])) {
    echo "<script>alert('Login required.'); window.location.href='index.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Change Password</title>
  <meta charset="UTF-8">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f5f5f5;
      padding: 40px;
    }
    .change-password-form {
      background: white;
      padding: 30px;
      max-width: 400px;
      margin: auto;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .change-password-form input {
      width: 100%;
      padding: 10px;
      margin-top: 8px;
      margin-bottom: 16px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    .change-password-form button {
      padding: 10px 20px;
      background-color: #0078d4;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .change-password-form button:hover {
      background-color: #005ea3;
    }
  </style>
</head>
<body>

<div class="change-password-form">
  <h2>Change Password</h2>
  <form method="POST" action="change_password_backend.php">
    <label>Old Password:</label>
    <input type="password" name="old_password" required>

    <label>New Password:</label>
    <input type="password" name="new_password" required>

    <label>Confirm New Password:</label>
    <input type="password" name="confirm_password" required>

    <button type="submit">Change Password</button>
  </form>
</div>

</body>
</html>
