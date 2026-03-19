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
  <title>Change Username</title>
  <meta charset="UTF-8">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f5f5f5;
      padding: 40px;
    }
    .change-username-form {
      background: white;
      padding: 30px;
      max-width: 400px;
      margin: auto;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .change-username-form input {
      width: 100%;
      padding: 10px;
      margin-top: 8px;
      margin-bottom: 16px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    .change-username-form button {
      padding: 10px 20px;
      background-color: #0078d4;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .change-username-form button:hover {
      background-color: #005ea3;
    }
  </style>
</head>
<body>

<div class="change-username-form">
  <h2>Change Username</h2>
  <form method="POST" action="change_user_name_backend.php">
    <label>New Username:</label>
    <input type="text" name="new_username" required>

    <label>Confirm Username:</label>
    <input type="text" name="confirm_username" required>

    <button type="submit">Update Username</button>
  </form>
</div>

</body>
</html>
