<?php include('functions.php') ?>
<?php require_once "header.php"; ?>
<?php


$db = db_connect();

  $sql = "SELECT * FROM products";
  $product_set = db_query($db, $sql);

?>
<body>
    
    <div class="box">

        <h2>Log in</h2>
    
        <form action="login.php" method="post">
    
            <div class="inputBox">
                <input type="email" name="email" required>
                <label for = "email">Email</label>
            </div>
            <div class="inputBox">
                <input type="password" name="password_1" required>
                <label for = "password">Password</label>
    
            </div>
            <input type="submit" name="login_users" value="Submit">
            <a href="register.html">I do not have an account</a>
        </form>
    </div>
</body>