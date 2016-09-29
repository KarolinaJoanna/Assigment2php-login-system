# Assigment2php-login-system
This time I didn’t had much problems, mostly all content of the project was understoodable for me. I went through several tutorials on youtube.com, but one, that, seemed mostly convinient I did use for creating my login assigment. (https://www.youtube.com/watch?v=bjT5PJn0Mu8) I did code it with the tutorial line by line, dot by dot.
My project contains : login.php, register.php, index.php, logout.php, database.php (file with database connection), and style.css.

The only one considarations that I had was with secured connection. Instead MySql I did used PDO, which is more secured and it is a new standart in database to make transactions. You will find it in my database.php file:
 (try{
    $conn=new PDO("mysql:host=$server;dbname=$database;",$username,$password);
}catch(PDOExeption $e){
    die( "Connection failed:" ) . $e->getMessage());)

I also did use password_hash function with bcrypted function. You will find it in register.php file:
$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
