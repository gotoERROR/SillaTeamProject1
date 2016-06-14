<? session_start();
	$room_id = $_SESSION['ss_room_id'];
	
	//플랫폼에 맞추어 화면 처리
	$flatform = $_SESSION['ss_flatform'];
	
	if ($_POST['logout'] == "logout") 
	{
		session_destroy();
		echo "<script>alert('로그아웃!');</script>";
		echo "<script>location.href='login.php'</script>";
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
	</style>
</head>

<body>
	<div id="main_title">
    	<table width="100%" border="0" cellpadding="0" >
  			<tr>
    			<td>산학실무 프로젝트</td>
				<td align="right" width="150px">
                	<form action="main.php" method="post" > 
                    	<input type="hidden" name="logout" value="logout" />
                    	<input type="submit" value="로그아웃" style="width:50%; height:30px;" />
                	</form>
                </td>
  			</tr>
		</table>
    </div>
    <div id="main_content">
    	<table id="main_contents" height="780px" width="100%" border="0" cellpadding="0">
  			<tr id="contents">
            <? if ($flatform != "desktop") { ?>
    			<td id="main_contents_l">
                	<iframe src="http://hackertyper.com/" height="100%"> </iframe>
                </td>
            <? } ?>
    			<td id="main_contents_r">
                <!--채팅 iframe-->
                	<iframe src="main_contents.php" height="100%"> </iframe>                	
                	<!-- -->
                </td>
  			</tr>
        </table>    	
    </div>
</body>
</html>
