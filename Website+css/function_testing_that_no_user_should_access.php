<?php
require_once('functions.php');
$connection = db_connect();
$quizes = get_them_quizes($connection);
$questions = get_questions_by_quiz_id($connection, 1);
$answers = get_da_answer($connection, 1);
//$make = create_quiz($connection, "3","3","4",1);
//$eg = register($connection, "6","6","6");
//$log = login($connection, "'Admin@Admin.com'", "'Admin'");
$log2 = login($connection, '6', '6');

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

debug_to_console(json_encode($quizes));
debug_to_console(json_encode($questions));
debug_to_console(json_encode($answers));
//debug_to_console(json_encode($make));
//debug_to_console(json_encode($eg));
//debug_to_console(json_encode($log));
debug_to_console(json_encode($log2));
