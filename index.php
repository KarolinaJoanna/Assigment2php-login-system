<?php

session_start();

require'database.php';
if(isset($_SESSION['user_id'])){
     $records=$conn->prepare('SELECT id,email,password FROM users WHERE id=:id');
    $records->bindParam(':id',$_SESSION['user_id']);
    $records->execute();
    $results=$records->fetch(PDO::FETCH_ASSOC);
    
    $user=NULL;s
    
    if(count($results)>0){
        $user=$results;
    }
}

?>

<!DOCTYPE>
//created with tutorial : https://www.youtube.com/watch?v=bjT5PJn0Mu8//
<html>
<head>
    <title>Welcome to my first made form</title>
    <link rel="stylesheet" type="text/css" href="assec/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>



<body>
      <div class="header">
        <a href="index.php">Karolina App</a>
    </div>
   
    <?php if(isset($_SESSION['user_id'])): ?>
    <br/>Welcome. You are successfuly logged in!
    
    <a href="logout.php">Logout?</a>
    
    <?php else: ?>
    <h1>Please Login or Register</h1>
    <a href="login.php">Login</a>or
    <a href="register.php">Register</a>
    <?php endif; ?>

</body>
</html>
