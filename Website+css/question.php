<?php include('functions.php') ?>
<?php require_once "header.php"; ?>
<?php
$quiz_id = 14;
$conection = db_connect();
//$questionTable = "questions";
//$answerTable="answers";
//$questionColumns="question_id","content","quiz_id","answers_id","content","question_id","is_right";
//$fetchData = 
//function fetch_data($conection)
//{
//
//    $query = "SELECT * from questions,answers Where questions.question_id = answers.question_id ORDER BY question_id  ASC";
//    $result = $db->query($query);
//    if ($result == true) {
//      if ($result->num_rows > 0) {
//        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
//        $msg = $row;
//      } else {
//        $msg = "No Data Found";
//      }
//    } else {
//      $msg = mysqli_error($db);
//    }
//  }
//  return $msg;
//}

//$fetchQuiz = get_quiz_by_id($conection,$quiz_id);
//$fetchQuestion = get_questions_by_quiz_id($conection, $fetchQuiz);
//$fetchAnswers = get_answer_by_quiz_id($conection, $fetchQuestion);

?>
<body>

	<div id="page-wrap">

		<h1>Name of the quiz</h1>
		
		<form action="result.php" method="post" id="quiz">
		
            <ol class="questionpage-container">
            
                <li class="question-container">
                
                    <h3>WordPress is a...</h3>
                    
                    <div class="options-container">
                        <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                        <label for="question-1-answers-A">A) Software </label>
                    </div>
                    
                    <div class="options-container">
                        <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                        <label for="question-1-answers-B">B) Web App</label>
                    </div>
                    
                    <div class="options-container">
                        <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                        <label for="question-1-answers-C">C) CMS</label>
                    </div>
                    
                    <div class="options-container">
                        <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
                        <label for="question-1-answers-D">D) Other</label>
                    </div>
                
                </li>
                
                <li class="question-container">
                
                    <h3>SEO is Part Of...</h3>
                    
                    <div class="options-container">
                        <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                        <label for="question-2-answers-A">A) Video Editing</label>
                    </div>
                    
                    <div class="options-container">
                        <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                        <label for="question-2-answers-B">B) Graphic Designing</label>
                    </div>
                    
                    <div class="options-container">
                        <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
                        <label for="question-2-answers-C">C) Web Designing</label>
                    </div>
                    
                    <div class="options-container">
                        <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" />
                        <label for="question-2-answers-D">D) Digital Marketing</label>
                    </div>
                
                </li>
                
                <li class="question-container">
                
                    <h3>PHP is a....</h3>
                    
                    <div class="options-container">
                        <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                        <label for="question-3-answers-A">A) Server Side Script</label>
                    </div>
                    
                    <div class="options-container">
                        <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                        <label for="question-3-answers-B">B) Programming Language</label>
                    </div>
                    
                    <div class="options-container">
                        <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
                        <label for="question-3-answers-C">C) Markup Language</label>
                    </div>
                    
                    <div class="options-container">
                        <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
                        <label for="question-3-answers-D">D) None Of Above These</label>
                    </div>
                
                </li>
                
            
            </ol>
            
            <input class="quiz-submit" type="submit" value="Submit" class="submitbtn" />
		
		</form>
	
	</div>


</body>

</html>
