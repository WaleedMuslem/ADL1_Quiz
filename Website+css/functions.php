<?php
require_once('config.php');

session_start();

function is_post() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

// Connects to the database
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

function confirm_query($result_set) {
    if(!$result_set) {
      exit("Database query failed.");
    }
}

// Looks if the user exists in the database and allows him to log in if he does
function login($connection, $email, $password){
   /* $username = mysqli_real_escape_string($connection, $_POST['username']);
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
    }*/
    if (empty($email)) {
        return 0;
    }

    if (empty($password)) {
        return 0;
    }

    $encrypted_password = md5($password);
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$encrypted_password'";
    $results = $connection->query($query);
    $row = mysqli_fetch_all($results, MYSQLI_ASSOC);
    return $row;
}

// Allows the registration of an user by writing his data into the database. Of course, the data has some checks on it
function register($connection, $username, $email, $password){

    if (empty($username)) {
        return 0;
        //array_push($errors, "Username is required");
    }

    if (empty($email)) {
        return 0;
        //array_push($errors, "Email is required");
    }

    if (empty($password)) {
        return 0;
        //array_push($errors, "Password is required");
    }

    //if (count($errors) == 0) {
        $encoded_password = md5($password);

        $query = "INSERT INTO users (user_name, email, password, level_of_user)
        values ('$username', '$email', '$encoded_password', '3')";
        $results = mysqli_query($connection, $query);
        return $results;

    //}
}

// Fetches the list of all quizes with coresponding data
function get_all_quizes($connection){
    if (empty($connection)) {
        $msg = "Database connection error";
      //} elseif (empty($quiz_columns) || !is_array($quiz_columns)) {
      //  $msg = "Columns name for quiz table must be defined in an indexed array";
      //} elseif (empty($quiz_table)) {
      //  $msg = "Quiz table is empty";
      } else {

        //array_walk($quiz_columns, function ($val /*$key*/) {
        //    $val = 'quizes.' . $val;
        //}); //add quizes. at the beginning of each data in array
        //$columnName = implode(", ", $quiz_columns); // add each data but with (,) in between

        $query = "SELECT * from quizzes ORDER BY quiz_id  ASC";
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

// Creates a quiz and attaches user's id to it. He'll e considered to be a creator
function create_quiz($connection, $category, $image, $title, $user_id){

    if (empty($title)) {
        return 0;
        //array_push($errors, "Title is required");
    }

    if (empty($category)) {
        return 0;
        //array_push($errors, "Category is required");
    }

    if (empty($image)) {
        return 0;
        //array_push($errors, "Image is required");
    }

    //if (count($errors) == 0) { 
        $query = "INSERT INTO quizzes(category, image, title, user_id)
                    values ($category, $image, $title, $user_id)";
        $results = mysqli_query($connection, $query);
        return $results;
    //}
}

// Edits quizes if the user is permited to.
//The lvl 0 admin can edit everything,
//while lvl 1 teacher can edit only those things that were created by him and have his user id attached
function edit_quiz($connection, $user_id, $quiz_id, $category, $image, $title){
    $user_lvl = mysqli_query($connection, "SELECT level_of_user FROM users WHERE $user_id = user_id limit 1");
    $quiz_owner_id = mysqli_query($connection, "SELECT user_id FROM quizzes WHERE quiz_id = $quiz_id limit 1");
    if ($user_lvl == 0 || $quiz_owner_id == $user_id){
        $query = "UPDATE quizzes set category = '$category', image = '$image', title = '$title'";
        $results = mysqli_query($connection, $query);
        return $results;
    } else {return 0;}
}

// Edits questions if the user is permited to.
//The lvl 0 admin can edit everything,
//while lvl 1 teacher can edit only those things that were created by him and have his user id attached
function edit_questions($connection, $user_id, $quiz_id, $content){
    $user_lvl = mysqli_query($connection, "SELECT level_of_user FROM users WHERE $user_id = user_id limit 1");
    $quiz_owner_id = mysqli_query($connection, "SELECT user_id FROM quizzes WHERE quiz_id = $quiz_id limit 1");
    if ($user_lvl == 0 || $quiz_owner_id == $user_id){
        $query = "UPDATE questions set content = '$content'";
        $results = mysqli_query($connection, $query);
        return $results;
    } else {return 0;}
}

// Edits answers if the user is permited to.
//The lvl 0 admin can edit everything,
//while lvl 1 teacher can edit only those things that were created by him and have his user id attached
function edit_answers($connection, $user_id, $quiz_id, $content, $is_right){
    $user_lvl = mysqli_query($connection, "SELECT level_of_user FROM users WHERE $user_id = user_id limit 1");
    $quiz_owner_id = mysqli_query($connection, "SELECT user_id FROM quizzes WHERE quiz_id = $quiz_id limit 1");
    if ($user_lvl == 0 || $quiz_owner_id == $user_id){
        $query = "UPDATE answers set content = '$content', is_right = '$is_right'";
        $results = mysqli_query($connection, $query);
        return $results;
    } else {return 0;}
}

// Fetches questions that are attached to a quiz's id
function get_questions_by_quiz_id($connection, $quiz_id){
    $query = "SELECT * FROM questions WHERE quiz_id = $quiz_id";
    $results = $connection->query($query);
    $row = mysqli_fetch_all($results, MYSQLI_ASSOC);
    return $row;
}

// Fetches answers that are attached to a question's id
function get_answer_by_question_id($connection, $question_id){
    $query = "SELECT * FROM answers WHERE question_id = $question_id";
    $results = $connection->query($query);
    $row = mysqli_fetch_all($results, MYSQLI_ASSOC);
    return $row;
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