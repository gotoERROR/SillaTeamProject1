<?php session_start();
	include "./config/dbconn.php";	
	mysql_query("set names utf8");
	
	//로그인 처리
	$email = $_POST['email'];
	if ($email != NULL){
		$pw = $_POST['pw'];
		$name = $_POST['name'];
		
		$sql = " SELECT * FROM member ";
		$sql .= " WHERE m_email = '$email' and m_pw = '$pw' LIMIT 1";
		$result = mysql_query($sql);
		$row = mysql_fetch_object($result);
		if ($row->m_email != NULL){
			$_SESSION['ss_email'] = $row->m_email;
			$_SESSION['ss_pw'] = $row->m_pw;
			$_SESSION['ss_name'] = $row->m_name;
			
			echo "<script>location.href='main.php'</script>";			
		} else{
			echo "로그인 실패!";
		}
		
	}
	
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Team Project</title>
    <link type="text/css" rel="stylesheet" href="css/default.css" />
    <link type="text/css" rel="stylesheet" href="css/main.css" />
    <style>
		body{
			background-color:#000000;
		}
		#log{
			display:inline-block;
		}
		#login{
			padding:10px;
			width:500px;
			height:500px;
			background-color:#FFFFFF;
		}
	</style>
</head>

<body>
	<div id="login">
    	<form action="login.php" method="post">
        	<br/><input type="email" name="email" id="email" /> 이메일 
            <br/><input type="password" name="pw" id="pw" /> 비밀번호
            <br/><input type="submit" value="로그인" />
        </form>
        <a href="signin.php"><button>회원가입</button></a>
    </div>
    <script>
	</script>
</body>
</html>
