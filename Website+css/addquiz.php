<?php require_once "header.php"; ?>
<?php include('functions.php') ?>

<div class="box">  
    <h2>Add Quiz</h2>
    <form action = "addquiz.php" method="POST">
        
        <label class="img_pro" for="avatar">Choose a quiz image:</label>

        <input type="file"
            class="img_pro" name="img_pro"
            accept="image/png, image/jpeg"
        >

        
        <div class="inputBox">
            <input type="text" name="title" required>
            <label for = "title">Title</label>
           </div>
           <div class="inputBox">
            <input type="text" name="category" required>
            <label for = "category">Category</label>
           </div>
        <div class="inputBox" >
            <input type="question" name="question" required>
            <label for = "question">Question</label>
            
        </div>
        <div class="inputBox" >
            <input type="answer1" name="answer1" required>
            <label for = "answer1">Answer 1</label>
            
        </div>
        <div class="inputBox" >
            <input type="answer2" name="answer2" required>
            <label for = "answer2">Answer 2</label>
            
        </div>
        <div class="inputBox" >
            <input type="answer3" name="answer3" required>
            <label for = "answer3">Answer 3</label>
            
        </div>
        <input type="submit" name="addquiz" value="Add Quiz">
        
    </form>
</div>

