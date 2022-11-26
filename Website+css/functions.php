<?php
require_once('config.php');

session_start();

function is_post() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function db_connect() {
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
    return $connection;
}

function db_query($connection, $sql) {
    $result_set = mysqli_query($connection, $sql);
    if(substr($sql, 0, 7) == 'SELECT ') {
      confirm_query($result_set);
    }
    return $result_set;
}

function login($connection, $username, $email, $password){
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE user_name = '$username' AND email = '$email' AND password = '$password' ";
        $results = mysqli_query($connection, $query);

        if (mysqli_num_rows($results)) {
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";
            header('location: homepage.php');
        } else {
            array_push($errors, "Wrong username or password. Try again");
        }
    }
}

function register($connection, $username, $email, $password_1, $password_2){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password_1 = mysqli_real_escape_string($connection, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    if (empty($email)) {
        array_push($errors, "Email is required");
    }

    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }

    if (empty($password_2)) {
        array_push($errors, "Please, write your passwrod twice");
    }

    if ($password_2 != $password_1) {
        array_push($errors, "Passwords don't match");
    }

    if (count($errors) == 0) {
        $password = md5($password_1);
        $query = "SELECT * FROM users WHERE user_name = '$username' AND email = '$email' AND password = '$password' ";
        $results = mysqli_query($connection, $query);

        if (mysqli_num_rows($results)) {
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";
            header('location: homepage.php');
        } else {
            array_push($errors, "Wrong username or password. Try again");
        }
    }
}

function confirm_query($result_set) {
    if(!$result_set) {
      exit("Database query failed.");
    }
}

function get_them_quizes($connection, $quiz_table, $quiz_columns){
    if (empty($connection)) {
        $msg = "Database connection error";
      } elseif (empty($quiz_columns) || !is_array($quiz_columns)) {
        $msg = "columns name for news table must be defined in an indexed array";
      } elseif (empty($quiz_table)) {
        $msg = "news table is empty";
      } else {

        array_walk($quiz_columns, function ($val, $key) {
          $val = 'quizes.' . $val;
        }); //add quizes. at the beginning of each data in array
        $columnName = implode(", ", $quiz_columns); // add each data but with (,) in between
    
        $query = "SELECT $columnName from $quiz_table ORDER BY news_id  ASC";
        $result = $connection->query($query);
        if ($result == true) {
          if ($result->num_rows > 0) {
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $msg = $row;
          } else {
            $msg = "No Data Found";
          }
        } else {
          $msg = mysqli_error($connection);
        }
      }
      return $msg;
}

function create_quiz($connection, $id, $category, $image, $title){
    $category = mysqli_real_escape_string($connection, $_POST['category']);
    $image = mysqli_real_escape_string($connection, $_POST['image']);
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    
    if (empty($title)) {
        array_push($errors, "Title is required");
    }

    if (empty($category)) {
        array_push($errors, "Category is required");
    }

    if (empty($image)) {
        array_push($errors, "Image is required");
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM quizzes WHERE category = '$category' AND image = '$image' AND title = '$title' AND user_id = '$id' ";
        $results = mysqli_query($connection, $query);
    }
}

function edit_quiz($connection, $id, $user_id){
    
}

function db_fetch_assoc($result_set) {
    return mysqli_fetch_assoc($result_set);
}

function db_error($connection) {
    return mysqli_error($connection);
}

function db_close($connection) {
    return mysqli_close($connection);
}
?>