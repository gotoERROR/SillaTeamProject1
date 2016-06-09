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
    <style>
	</style>
</head>
<body>
	<div style="height:40px; background-color:#CCCCCC; display:inline;">
    	<table width="100%" border="0">
  			<tr>
    			<td>채팅방 : <?=$room_no?> <br/> <?=$room_list?></td>
    			<td><button onClick="exitChat();">방 나가기</button>
                	<button onClick="">초대하기</button></td>
  			</tr>
		</table>
	</div>
	<dl id="list" style="height:625px; overflow:auto;"></dl>
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
</script>
</html>
