<html>
<head>
    <title>Login PHP | Belajar 1</title>
</head>
<?php
session_start();
if(isset($_POST['login'])){
	require 'koneksi.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$result = mysqli_query($con, 'select * from admin where username="'.$username.'" and password="'.$password.'"');
	if(mysqli_num_rows($result)==1){
		$_SESSION['username'] = $username;
		header('Location: welcome.php');
	}else
		echo "Username Salah";
}
if(isset($_GET['logout'])){
	session_unregister('username');
}
	
?>
<body>
    <form method="post">
        <table>
            <tr>
                <td>username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="password"</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="login" value="Log In"</td>
            </tr>
        </table>    
    </form>
</body>
</html>