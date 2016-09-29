<?php

session_start();
//when yur logged you shoudnt see login.php, system should remeber that u are alredy logged//
if(isset($_SESSION['user_id'])){
    header("Location:index.php");
}

require'database.php';
$message='';

if(!empty($_POST['email']) && !empty($_POST['password'])):
    

//enter new user in database//

$sql="INSERT INTO users (email, password) VALUES(:email, :password)"; //that is ur query//
$stmt=$conn->prepare($sql);
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT)); //php 5.4 aand above use a password hash function, paasword bcrypt is one of from predefine functions, passwords wont be visible to anybody they will be incrypted f.e as a password in DB u will see smt like that : kjahsifhuhfuihfushgsjkdhgjfdhgj//

//now u have to execute thise statments, true or false//
if($stmt->execute()):
    //die('Success');//
    $message='Succesfully created new user';
    else:
    //die('Fail');//
    $message='Sorry, there must have been an issue with creating your account';
endif; 

endif; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Below</title>
     <link rel="stylesheet" type="text/css" href="assec/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>

    
<body>
    <div class="header">
        <a href="index.php">Go Back</a>
    </div>
    
<?php if(!empty($message)): ?>
    <p>?=$message?</p>
    <?php endif; ?>
    
    <h1>Register</h1>
    <span>or<a href="login.php">Login here</a></span>
    
     <form action="register.php" method="POST">
    <input type="text" placeholder="Enter your email" name="email">
    <input type="password" placeholder="and password" name="password">
    <input type="password" placeholder="confirm password" name="confirm_password">
    <input type="submit">
    </form>
</body>    
</html>
