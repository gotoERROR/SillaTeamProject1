<? session_start();
	$room_id = $_SESSION['ss_room_id'];
	
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Team Project</title>
    <link type="text/css" rel="stylesheet" href="css/default.css" />
    <link type="text/css" rel="stylesheet" href="css/main.css" />
    <style>
		iframe{
			padding:0px;
		}
	</style>
</head>

<body>
	<div id="main_title">
    	산학실무 프로젝트
    </div>
    <div id="main_content">
    	<table id="main_contents" height="750px" width="100%" border="0" cellpadding="0">
  			<tr id="contents">
    			<td id="main_contents_l">
                <!--좌측 iframe-->
                	<iframe src="http://hackertyper.com/" height="100%"> </iframe>
                </td>
    			<td id="main_contents_f">
                <!--친구추가 iframe-->
                	<iframe src="contents_middle.php" height="100%"> </iframe>
                </td>
    			<td id="main_contents_r">
                <!--채팅 iframe-->
                <? if ($room_id != NULL) { ?>
                	<iframe src="chat.php" height="100%"> </iframe>
                <? } else { ?>
                	<iframe src="room_select.php" height="100%"> </iframe>
                <? } ?>
                </td>
  			</tr>
        </table>    	
    </div>
</body>
</html>
