<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理登录-<?php echo C("site_name");?></title>
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin-login.css' />
<script>var version="<?php echo L("ppvod_version");?>";</script>
</head>
<body>
<center>
<div id="nifty">
<b class="rtop"><b class="r1"></b><b class="r2"></b><b class="r3"></b><b class="r4"></b></b>
<div style="width:403px; height:26px; line-height:26px; background:none; font-size:12px; text-align:left;"><?php echo C("site_name");?> -- 管理登录</div>
<div style="width:403px; height:46px; background:#1e6003;"><img src="__PUBLIC__/images/admin/login.gif" alt="管理登录" /></div>
<div style="width:401px !important; width:403px; height:auto; background:#fff; border-left:1px solid #1e6003; border-right:1px solid #1e6003; ">
<table width="60%" border="0" cellspacing="3" cellpadding="0">
<form action="?s=Admin-Login-Check" method="post">
<tr>
    <td align="right"><b>用户名：</b></td>
    <td align="left"><input name="user_name" type="text" tabindex="4" style="width:150px" onfocus="this.style.borderColor='#fc9938'" onblur="this.style.borderColor='#dcdcdc'"/></td>
</tr>
<tr>
    <td align="right"><b>密　码：</b></td>
    <td align="left"><input name="user_pwd" type="password" tabindex="5" style="width:150px" onfocus="this.style.borderColor='#fc9938'" onblur="this.style.borderColor='#dcdcdc'"/></td>
</tr>
<tr>
<td align="right"></td>
<td align="left"><input class="button" type="submit" name="submit" value="登 录"/></td>
</tr>	
</form>
</table>
</div>
<div style="width:401px !important; width:403px; height:30px; background:#1e6003; border:1px solid #1e6003; border-top:1px solid #ddd; margin-bottom:5px; font-size:12px; line-height:30px; font-family:'微软雅黑'" id="tips">@2006-2014 GxlCms <?php echo L("ppvod_version");?></div>
<b class="rbottom"><b class="r4"></b><b class="r3"></b><b class="r2"></b><b class="r1"></b></b>
</div>
</center>
<span style="display:none"><script type="text/javascript" src="http://js.users.51.la/17248850.js"></script></span>
</body>
</html>