<? session_start();
	include "./config/dbconn.php";	
	mysql_query("set names utf8");
	
	$room_no = $_GET['room'];
	$_SESSION['ss_room'] = $room_no;
	
	$sql = " SELECT room_member FROM room_list ";
	$sql .= " WHERE room_no = $room_no ";
	$result = mysql_query($sql);
	
	//채팅 참가 리스트
	$room_list;
	if (mysql_num_rows($result) > 0) {
		while ($rows = mysql_fetch_object($result)){
			$room_list .= $rows->room_member . ' ';			
		}
	}
	
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<title>Ajax Polling Sample Code</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="chat.js"></script>
	<link rel="stylesheet" type="text/css" href="css/chat.css" />
    <link type="text/css" rel="stylesheet" href="css/default.css" />
    <link type="text/css" rel="stylesheet" href="css/main.css" />
</head>
<body>
    <table width="100%" border="0">
  		<tr style="background-color:#000000;">
    		<td><button onClick="exitChat();" style="width:100%;">방 나가기</button></td>
            <td><button onClick="friend()" style="width:100%;">초대하기</button></td>
  		</tr> 
  			<tr>
    			<td colspan="2">채팅방 : <?=$room_no?> <br/> <?=$room_list?></td>
  			</tr>
	</table>
	<dl id="list" style="height:620px; overflow:auto;"></dl>
	<form onsubmit="chatManager.write(this); return false;">
    	<input name="room" id="room" type="hidden" value="<?=$room_no?>" />
		<input name="name" id="name" type="hidden" value="<?=$_SESSION['ss_name'];?>" />
		<input name="msg" id="msg" type="text"/>
		<input name="btn" id="btn" type="submit" value="입력"/>
	</form>
</body>
<script>
	function exitChat(){
		location.replace("room_select.php");
	}
	function friend(){
		window.open('friend_select.php','popup','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=yes,width=300,height=300');
	}
</script>
</html>
