<? session_start();
	
	include "./config/dbconn.php";	
	mysql_query("set names utf8");	
	
	//방 목록 정보
	$sql = " SELECT * FROM room_list ";
	$sql .= " WHERE room_member = '$me_email' ";
	$result_room = mysql_query($sql);

?>

<!--방 목록-->
<? if (mysql_num_rows($result_room) > 0) {
		while ($rows = mysql_fetch_object($result_room)){
			$room = $rows->room_no 
?>
 		<tr>
    		<td><p>Room - <?=$room?></p></td>
  		</tr>
<? 		}//while mysql_fetch_object
	}//if mysql_num_rows
	else echo "<tr><td><p>방 없음...</p></td></tr>"; 
?>