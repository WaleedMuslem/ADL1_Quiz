<?php require_once "header.php"; ?>

<body>
<div class="box">  
    <h2>Register</h2>
    <form action = "register.php" method="POST">
        
        <label class="img_pro" for="avatar">Choose a profile picture:</label>

        <input type="file"
            class="img_pro" name="img_pro"
            accept="image/png, image/jpeg"
        >

        
        <div class="inputBox">
            <input type="text" name="username" required>
            <label for = "username">User Name</label>
           </div>
           <div class="inputBox">
            <input type="email" name="email" required>
            <label for = "email">Email</label>
           </div>
        <div class="inputBox" >
            <input type="password" name="password_1" required>
            <label for = "password">Password</label>
            
        </div>
        <div class="inputBox" >
            <input type="password" name="password_2" required>
            <label for = "password">Confirm Password</label>
            
        </div>
        <input type="submit" name="register" value="Submit">
        <a href="login.html">I do have an account</a>
    </form>
</div>
</body>