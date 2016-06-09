<? session_start();
	
	include "./config/dbconn.php";	
	mysql_query("set names utf8");
	
	$me_email = $_SESSION['ss_email'];
	
	//친구 추가 처리
	$friend_e = $_POST['friend_e'];
	if ($friend_e != NULL && $friend_e != $_SESSION['ss_email']){
		//이메일 존재여부 확인
		$sql = " SELECT * FROM member ";
		$sql .= " WHERE m_email = '$friend_e' LIMIT 1 ";
		$result = mysql_query($sql);
		$row = mysql_fetch_object($result);	
		//친구 중복 확인
		if ($row->m_email != NULL){
			$sql = " SELECT * FROM friend ";
			$sql .= " WHERE me = '$me_email' and friend = '$friend_e'";
			$result = mysql_query($sql);
			$row = mysql_fetch_object($result);			
			if ($row->me == $_SESSION['ss_email'] && $row->friend == $friend_e){
				echo "<script> alert('이미 친구등록 되어 있습니다!'); </script>";						
			} else{
				//친구 입력
				$me = $_SESSION['ss_email'];
				$sql = " INSERT INTO friend (me, friend) ";
				$sql .= " VALUES ('$me', '$friend_e')";
				$result = mysql_query($sql);
				echo "<script> alert('친구등록 완료!'); </script>";
			}
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
	<title>무제 문서</title>
    <style>
	</style>
</head>

<body>
	<table width="85%" border="1">
  		<tr  style="background-color:#000000">
			<form action="contents_middle.php" method="post" >
    		<td><input type="email" name="friend_e" id="friend_e" /></td>
    		<td><input type="submit" value="친구추가" /></td>
			</form>
  		</tr>
        <? include_once "friend_list.php"; ?>
        <tr>
        	<td></td>
        	<td></td>
        </tr>
	</table>
</body>
</html>
