<!--친구 목록-->
<?
	
	//친구 목록 정보
	$sql = " SELECT friend FROM friend ";
	$sql .= " WHERE me = '$me_email' ";
	$result_friend = mysql_query($sql);	
	
 	if (mysql_num_rows($result_friend) > 0) { ?>
    	<tr style="background-color:#999999">
        	<td colspan="2">친구 목록 <?=mysql_num_rows($result_friend)?>명 </td>
        </tr>
    <?
		while ($rows = mysql_fetch_object($result_friend)){
			$friend_name = $rows->friend ?>
		<tr style="background-color:#F9F9F9">
  			<td><p><?=$friend_name?></p></td>
  			<td><button>아직 기능 없음</button></td>
		</tr>
<? 		}//while mysql_fetch_object
			}//if mysql_num_rows
		else echo "<tr><td><p>친구 없음...</p></td></tr>"; ?>
