<?php include('functions.php') ?>
<?php require_once "header.php"; ?>
<?php
$conection = db_connect();
$quizTable = "quizzes";
$quizColums = ['quiz_id','title','category','image','user_id'];
$fetchData = fetch_data($conection, $quizTable, $quizColums);
function fetch_data($conection, $quizTable, $quizColums)
{
  if (empty($conection)) {
    $msg = "Database connection error";
  } elseif (empty($quizColums) || !is_array($quizColums)) {
    $msg = "columns name for news table must be defined in an indexed array";
  } elseif (empty($quizTable)) {
    $msg = "news table is empty";
  } else {

    array_walk($quizColums, function (&$val, $key) {
      $val = 'quizzes.' . $val;
    }); //add news. at the beginning of each data in array
    $columnName = implode(", ", $quizColums); // add each data but with (,) in between

    $query = "SELECT $columnName from $quizTable ORDER BY quiz_id  ASC";
    $result = $conection->query($query);
    if ($result == true) {
      if ($result->num_rows > 0) {
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $msg = $row;
      } else {
        $msg = "No Data Found";
      }
    } else {
      $msg = mysqli_error($conection);
    }
  }
  return $msg;
}



?>
<body>
    
    <div class="content-area">
        <aside>
            <nav>
                <a href="" class="nav-link active">
                    <i class="material-icons">home</i>
                    <span id="active-span">Home</span>
                </a>             
                <a href="" class="nav-link">
                    <i class="material-icons">done</i>
                    <span id="active-span">Result</span>
                </a>
                <a href="addquiz.php" class="nav-link">
                    <i class="material-icons">add</i>
                    <span id="active-span">Add Quiz </span>
                </a>
                <a href="register.php" class="nav-link">
                    <i class="material-icons">person_add</i>
                    <span id="active-span">New Account</span>
                </a>
                <a href="" class="nav-link">
                    <i class="material-icons">language</i>
                    <span id="active-span">Language</span>
                </a>
                <a href="contactus.php" class="nav-link">
                    <i class="material-icons-outlined">alternate_email</i>
                    <span id="active-span">Contact US</span>
                </a>
                
                
                
            </nav>
        </aside>
        <main>
            <div class="qwis-container">
             <?php
                if (is_array($fetchData)) {
                 $sn = 1;
                 foreach ($fetchData as $data) {
                ?>
                <div class="qwis">
                 <?php if ((!empty($data['image']))) {
                 ?>
                    <div class="thumbnail">
                        <a href=""><img src="<?php echo $data['image'] ?? ''; ?>" /></a>
                    </div>
                 <?php } ?>
                    <div class="qwis-details">
                        <div class="creator-img">
                            <img src="<?php echo $data['image'] ?? ''; ?>" />
                        </div>
                        <div class="title">
                            <a href="" class="qwis-title">
                                <?php echo $data['title'] ?? ''; ?>
                            </a>
                            <a href="" class="qwis-creator">
                                <?php echo $data['category'] ?? ''; ?>
                            </a>
                            
                        </div>
                    </div>
                </div>
                <?php
                 $sn++;
                    }
                } ?>
                
                
            </div>
        </main>

        
    </div>
    
</body>