<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Full stack app</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .form-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .form-box {
      width: 100%;
      max-width: 400px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
    }
  </style>
</head>
<body>
  <div class="container form-container">
    <div class="form-box">
      <h2 class="text-center mb-4">Users</h2>

      <?php
  include_once("user_manager.php");
  include_once("db.php");
  include_once("user_controller.php");
  include_once("user_service.php");

  
      $db = new Database();
      $conn = $db->connect();
      $user = new UserManager($conn);
      $service = new UserService();


      $controller = new UserController($user,$service);

      if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])){
          $action = $_POST['action'];

          if($action){
            $name =  $_POST["name"];
            $email =  $_POST["email"];
            $password =  $_POST["password"];

            $controller->createUser($name,$email,$password);

          }
      }

      ?>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" name="name" placeholder="Enter your name">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="text" class="form-control" name="email" placeholder="Enter your email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="text" class="form-control" name="password" placeholder="Enter your password">
        </div>
        <input type="submit" name="action" class="btn btn-primary w-100" value="PUSH ME">
      </form>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
