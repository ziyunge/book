<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台用户管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin-style.css' />
<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/jquery/jquery-1.7.2.min.js"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/js/admin.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/editor/kindeditor.js"></script>
<script language="javascript">
$(document).ready(function(){
	$("#myform").submit(function(){
		if($feifeicms.form.empty('myform','vod_name') == false){
			return false;
		}
		if($("#vod_cid").val()==0){
			alert('请选择分类');
			return false;
		}
	});
	$("#tabs>a").click(function(){
		var no = $(this).attr('id');
		var n = $("#tabs>a").length;
		showtab('tabs',no,n);
		$("#tabs>a").removeClass("on");
		$(this).addClass("on");
		return false;
	});
});
</script>
</head>
<body class="body">
<!--图片预览框-->
<div id="showpic" class="showpic" style="display:none;"><img name="showpic_img" id="showpic_img" width="120" height="160"></div>
<script language="javascript">
// 显示标签框
function showtags($sid){
	var offset = $(".xy_tag").offset();
	var left = offset.left;
	var top = offset.top+30;
	var html = $.ajax({
		url: "?s=Admin-Tag-Showajax-sid-"+$sid,
		async: false
	}).responseText;
	$("#showtags").html(html);
	$("#showtags").css({left:left,top:top,display:""});
}
// 添加标签
function addtag($tag,$sid){
	if($sid == 1){
		var val = $('#vod_keywords').val();
		if(val!=''){
			val = val+','+$tag;
		}else{
			val = $tag;
		}
		$('#vod_keywords').val(val);		
	}else if($sid == 1){
		var val = $('#news_keywords').val();
		if(val!=''){
			val = val+','+$tag;
		}else{
			val = $tag;
		}
		$('#news_keywords').val(val);			
	}else{
		alert('tag error');
	}
}
// 关闭标签框
function tag_close(){
	$("#showtags").css('display','none');
}
</script>
<!--标签选择框-->
<div id="showtags" style="position:absolute;display:none;" class="showtags"><a href="javascript:tag_close()">关闭</a></div>
<?php if(($vod_id)  >  "0"): ?><form name="update" action="?s=Admin-Vod-Update" method="post" name="myform" id="myform">
<input type="hidden" name="vod_id" value="<?php echo ($vod_id); ?>">
<?php else: ?>
<form name="add" action="?s=Admin-Vod-Insert" method="post" name="myform" id="myform"><?php endif; ?> 
<div class="title">
	<div class="tabs" id="tabs"><a href="javascript:void(0)" class="on" id="1"><?php echo ($vod_tplname); ?>小说</a><a href="javascript:void(0)" id="2">其它设置</a></div>
    <div class="right"><a href="?s=Admin-Vod-Show">返回小说管理</a></div>
</div>
<div class="form">
<table border="0" cellpadding="0" cellspacing="0" class="table" id="tabs1">
  <tr>
    <td class="tl">小说名称：</td>
    <td class="tr"><input type="text" name="vod_name" id="vod_name" value="<?php echo ($vod_name); ?>" maxlength="255" error="* 名称不能为空" class="w300 ti_5">
    <label><select name="vod_cid" id="vod_cid" style="width:100px"><option value=0>选择分类</option><?php if(is_array($listvod)): $i = 0; $__LIST__ = $listvod;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($ppvod["list_id"]); ?>" <?php if(($ppvod["list_id"])  ==  $vod_cid): ?>selected<?php endif; ?>><?php echo ($ppvod["list_name"]); ?></option><?php if(is_array($ppvod['son'])): $i = 0; $__LIST__ = $ppvod['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($ppvod["list_id"]); ?>" <?php if(($ppvod["list_id"])  ==  $vod_cid): ?>selected<?php endif; ?>>├ <?php echo ($ppvod["list_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif; ?></select></label> <label><select name="vod_status"><option value="1">显示</option><option value="0" <?php if(($vod_status)  ==  "0"): ?>selected<?php endif; ?>>隐藏</option></select></label> <label><select name="vod_language" id="vod_language" class="w70"><?php if(!empty($vod_language)): ?><option value='<?php echo ($vod_language); ?>'><?php echo ($vod_language); ?></option><?php endif; ?><option value=''>对白</option><?php if(is_array($vod_language_list)): $i = 0; $__LIST__ = $vod_language_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($val); ?>"><?php echo ($val); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></label> 小说时长：<label><input type="text" name="vod_length" id="vod_length" maxlength="3" value="<?php echo ($vod_length); ?>" class="w50 ct" title="单位：分钟"></label></td>
  </tr>
  <tr>
    <td class="tl">小说备注：</td>
    <td class="tr"><input type="text" name="vod_title" id="vod_title" maxlength="255" value="<?php echo ($vod_title); ?>" class="w300 ti_5"> <label><select name="vod_area" id="vod_area" style="width:100px"><?php if(!empty($vod_area)): ?><option value='<?php echo ($vod_area); ?>'><?php echo ($vod_area); ?></option><?php endif; ?><option value=''>出产地区</option><?php if(is_array($vod_area_list)): $i = 0; $__LIST__ = $vod_area_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($val); ?>"><?php echo ($val); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></label> <lable><select name="vod_year" id="vod_year"><?php if(!empty($vod_year)): ?><option value='<?php echo ($vod_year); ?>'><?php echo ($vod_year); ?></option><?php endif; ?><option value=''>年代</option><?php if(is_array($vod_year_list)): $i = 0; $__LIST__ = $vod_year_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($val); ?>"><?php echo ($val); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></label> <lable><select name="vod_isfilm" class="w70"><option value="1">已上映</option><option value="2" <?php if(($vod_isfilm)  ==  "2"): ?>selected<?php endif; ?>>未上映</option><option value="3" <?php if(($vod_isfilm)  ==  "3"): ?>selected<?php endif; ?>>热映中</option></select></lable> 节目周期：<label><input type="text" name="vod_weekday" id="vod_weekday" maxlength="7" value="<?php echo ($vod_weekday); ?>" class="w50 ct" title="周1-周日(1-7)/周1+周2(12)"></label></td>
  </tr>
  <tr>
    <td class="tl">小说演播：</td>
    <td class="tr" style="position:relative"><input type="text" name="vod_actor" id="vod_actor" maxlength="255" value="<?php echo ($vod_actor); ?>" class="w300 ti_5" title="可使用半角逗号,分隔"> 上映日期：<label><input type="text" name="vod_filmtime" id="vod_filmtime" maxlength="10" value="<?php if(!empty($vod_filmtime)): ?><?php echo (date('Y-m-d',$vod_filmtime)); ?><?php endif; ?>" class="w100 ct" title="如：2013-07-20"></label> 更新日期：<label><input type="text" name="vod_addtime" id="vod_addtime" value="<?php echo (date('Y-m-d H:i:s',$vod_addtime)); ?>" class="w120"> <input name="checktime" type="checkbox" style="border:none;width:auto; position:absolute; top:5px" value="1" <?php echo ($checktime); ?> title="勾选则使用系统当前时间"></label></td>
  </tr>
  <tr>
    <td class="tl">小说作者：</td>
    <td class="tr"><input type="text" name="vod_director" id="vod_director" maxlength="255" value="<?php echo ($vod_director); ?>" class="w300 ti_5"> 总共集数：<label><input type="text" name="vod_total" id="vod_total" maxlength="10" value="<?php echo ($vod_total); ?>" class="w100 ct" title="如：共40集"></label> 连载信息：<label><input type="text" name="vod_continu" id="vod_continu" maxlength="15" value="<?php echo ($vod_continu); ?>" class="w120 ct" title="留空为完结"></label></td>
  </tr>      
  <tr>
    <td class="tl">海报剧照：</td>
    <td class="tr"><label style="float:left; margin-top:3px; margin-right:5px"><input type="text" name="vod_pic" id="vod_pic" maxlength="255" value="<?php echo ($vod_pic); ?>" class="w300 ti_5" onMouseOver="if(this.value)showpic(event,this.value,'<?php echo C("upload_path");?>/');" onMouseOut="hiddenpic();"></label><iframe src="?s=Admin-Upload-Show-sid-vod" scrolling="no" topmargin="0" width="280" height="26" marginwidth="0" marginheight="0" frameborder="0" align="left" style="margin-top:3px; float:left"></iframe></span></td>
  </tr>
  <tr>
    <td class="tl">小说TAG：</td>
    <td class="tr"><input type="text" name="vod_keywords" id="vod_keywords"  maxlength="255" value="<?php echo ($vod_keywords); ?>" class="w300 xy_tag ti_5"> <img src="__PUBLIC__/images/admin/edit.gif" onClick="javascript:showtags(1);" class="navpoint" ></td>
  </tr>
  <script language="javascript">
	var $urln=<?php echo count($vod_url);?>;
	function addurl(){
		var $old = $("#urllist>tr:last").html();
		$urln = $("#urllist>tr").length;
		$old = $old.replace("播放地址"+$urln,"播放地址"+($urln+1));
		$("#urllist>tr:last-child").after('<tr>'+$old+'</tr>');
		$("#urllist>tr:last #vod_play").val($("#vod_play:last option").val());
		$("#urllist>tr:last #vod_server").val($("#vod_server:last option").val());
		$("#urllist>tr:last textarea").val('');
	}
  </script>
  <!--地址列表 -->
  <tbody id="urllist">
  <?php if(is_array($vod_url)): $uu = 0; $__LIST__ = $vod_url;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$url): ++$uu;$mod = ($uu % 2 )?><?php $playername=$vod_play[$uu-1];$serverdown=$vod_server[$uu-1]; ?>
  <tr>
    <td class="tl">播放地址<?php echo ($uu); ?><br /></td>
    <td class="tr" style="padding-bottom:5px"><select name="vod_play[]" id="vod_play"><?php if(is_array($vod_play_list)): $i = 0; $__LIST__ = $vod_play_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$play): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($key); ?>" <?php if($key == $playername): ?>selected<?php endif; ?>><?php echo ($i); ?>.<?php echo ($key); ?>.<?php echo ($play[1]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select> <select name="vod_server[]" id="vod_server" style="width:140px"><option value="">不使用公共前缀</option><?php if(is_array($vod_server_list)): $i = 0; $__LIST__ = $vod_server_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$server): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($key); ?>" <?php if($key == $serverdown): ?>selected<?php endif; ?>><?php echo ($server); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select> <label style=" color:#666666">注：自定义分集名称用"$"分隔，一行一集播放地址，留空则删除该组地址。</label><br><textarea name='vod_url[]' style="width:98%;height:150px;color:#333333"><?php echo ($url); ?></textarea></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </tbody>
  <!-- --> 
  <tr>
    <td class="tl">增加播放地址：</td>
    <td class="tr"><a href="javascript:addurl();" style="color:#FF0000;font-weight:bold;font-size:14px"><img src="__PUBLIC__/images/admin/add.gif" border="0">点击这里添加一组观看地址</a></td>
  </tr>    
  <tr>
    <td class="tl">小说简介：</td>
    <td class="tr padding-5050"><textarea name="vod_content" id="content" style="width:99%;height:300px;"><?php echo ($vod_content); ?></textarea></td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="table" id="tabs2" style="display:none">
  <tr>
    <td class="tl">推荐星级：</td>
    <td class="tr" id="abc"><input name="vod_stars" id="vod_stars" type="hidden" value="<?php echo ($vod_stars); ?>"><?php if(is_array($vod_starsarr)): $i = 0; $__LIST__ = $vod_starsarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ajaxstar): ++$i;$mod = ($i % 2 )?><img src="__PUBLIC__/images/admin/star<?php echo ($ajaxstar); ?>.gif" onClick="addstars('vod',<?php echo ($i); ?>);" id="star_<?php echo ($i); ?>" class="navpoint"><?php endforeach; endif; else: echo "" ;endif; ?></td>
  </tr>  
  <tr>
    <td class="tl">标题颜色：</td>
    <td class="tr" id="abc"><select name="vod_color" id="vod_color" class="w70">
    <?php if(!empty($vod_color)): ?><option value='<?php echo ($vod_color); ?>'><?php echo ($vod_color); ?></option><?php endif; ?><option value="">颜色</option>                               
    <option value='#000000' style='background-color:#000000' <?php if(($news_color)  ==  "#000000"): ?>selected<?php endif; ?>></option>
    <option value='#FFFFFF' style='background-color:#FFFFFF' <?php if(($news_color)  ==  "#FFFFFF"): ?>selected<?php endif; ?>></option>
    <option value='#008000' style='background-color:#008000' <?php if(($news_color)  ==  "#008000"): ?>selected<?php endif; ?>></option>
    <option value='#FFFF00' style='background-color:#FFFF00' <?php if(($news_color)  ==  "#FFFF00"): ?>selected<?php endif; ?>></option>
    <option value='#FF0000' style='background-color:#FF0000' <?php if(($news_color)  ==  "#FF0000"): ?>selected<?php endif; ?>></option>
    <option value='#0000FF' style='background-color:#0000FF' <?php if(($news_color)  ==  "#0000FF"): ?>selected<?php endif; ?>></option>
    <option value=''>无色</option></select></td>
  </tr>
  <tr>
    <td class="tl">首字母：</td>
    <td class="tr"><input type="text" name="vod_letter" id="vod_letter" value="<?php echo ($vod_letter); ?>" maxlength="1" class="w50"></td>
  </tr>
  <tr>
    <td class="tl">总人气：</td>
    <td class="tr"><input type="text" name="vod_hits" id="vod_hits" maxlength="15" value="<?php echo ($vod_hits); ?>" class="w50"></td>
  </tr>       
  <tr>
    <td class="tl">月人气：</td>
    <td class="tr"><input type="text" name="vod_hits_month" id="vod_hits_month" maxlength="15" value="<?php echo ($vod_hits_month); ?>" class="w50"></td>
  </tr> 
  <tr>
    <td class="tl">周人气：</td>
    <td class="tr"><input type="text" name="vod_hits_week" id="vod_hits_week" maxlength="15" value="<?php echo ($vod_hits_week); ?>" class="w50"></td>
  </tr>
  <tr>
    <td class="tl">日人气：</td>
    <td class="tr"><input type="text" name="vod_hits_day" id="vod_hits_day" maxlength="15" value="<?php echo ($vod_hits_day); ?>" class="w50"></td>
  </tr> 
  <tr>
    <td class="tl">评分值：</td>
    <td class="tr"><input type="text" name="vod_gold" id="vod_gold" value="<?php echo ($vod_gold); ?>" maxlength="4" class="w50"></td>
  </tr> 
  <tr>
    <td class="tl">评分人数：</td>
    <td class="tr"><input type="text" name="vod_golder" id="vod_golder" value="<?php echo ($vod_golder); ?>" maxlength="8" class="w50"></td>
  </tr> 
  <tr>
    <td class="tl">顶：</td>
    <td class="tr"><input type="text" name="vod_up" id="vod_up" value="<?php echo ($vod_up); ?>" maxlength="8" class="w50"></td>
  </tr>
  <tr>
    <td class="tl">踩：</td>
    <td class="tr"><input type="text" name="vod_down" id="vod_down" value="<?php echo ($vod_down); ?>" maxlength="8" class="w50"></td>
  </tr>
  <tr>
    <td class="tl">录入编辑：</td>
    <td class="tr"><input type="text" name="vod_inputer" id="vod_inputer" value="<?php echo ($vod_inputer); ?>" maxlength="15" class="w150"></td>
  </tr>   
  <tr>
    <td class="tl">时间：</td>
    <td class="tr"><input type="text" name="vod_addtime" id="vod_addtime" maxlength="25" value="<?php echo (date('Y-m-d H:i:s',$vod_addtime)); ?>" class="w150"> <input name="checktime" type="checkbox" style="border:none;width:auto" value="1" <?php echo ($checktime); ?> title="勾选则使用系统当前时间"></td>
  </tr> 
  <tr>
    <td class="tl">独立模板：</td>
    <td class="tr"><input type="text" name="vod_skin" id="vod_skin" value="<?php echo ($vod_skin); ?>" maxlength="25" class="w150"></td>
  </tr>  
  <tr>
    <td class="tl">来源：</td>
    <td class="tr"><input type="text" name="vod_reurl" id="vod_reurl" value="<?php echo ($vod_reurl); ?>" maxlength="150" class="w300"></td>
  </tr>              
  <tr>
    <td class="tl">跳转URL：</td>
    <td class="tr"><input type="text" name="vod_jumpurl" id="vod_jumpurl" value="<?php echo ($vod_jumpurl); ?>" maxlength="150" class="w300"></td>
  </tr>   
</table>
<ul class="footer">
	<input type="submit" name="submit" value="提交"> <input type="reset" name="reset" value="重置">
</ul>
</div>
</form>
<script type="text/javascript">
KE.show({
	id : 'content',
	resizeMode : 1,
	allowPreviewEmoticons : false,
	allowUpload : false,
	items : [
	'source', '|', 'fontsize', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline',
	'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
	'insertunorderedlist', '|', 'image', 'link', 'unlink', 'about']
});
//KE.show({ id : 'content'});
var $content = $('#content').val();
	document.getElementById("myform").onreset = function(){
	KE.html('content', $content);
}
</script>
<br /><center>Version：<font color="#FF0000"><?php echo L("ppvod_version");?></font></center>
</body>
</html>