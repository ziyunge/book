<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($title); ?></title>
<meta name="keywords" content="<?php if(!empty($list_keywords)): ?><?php echo ($list_keywords); ?><?php else: ?>最新<?php echo ($list_name); ?>,<?php echo ($keywords); ?><?php endif; ?>">
<meta name="description" content="最新<?php echo ($list_name); ?>包含的影片有<?php if(is_array($vod_list)): $i = 0; $__LIST__ = $vod_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><?php echo (msubstr($ppvod["vod_name"],0,10)); ?>,<?php endforeach; endif; else: echo "" ;endif; ?>完全免费在线观看！">
<script type="text/javascript">var Root='<?php echo ($root); ?>';var Sid='<?php echo ($sid); ?>';var Cid='<?php echo ($list_id); ?>';<?php if($sid == 1): ?>var Id='<?php echo ($vod_id); ?>';<?php else: ?>var Id='<?php echo ($news_id); ?>';<?php endif; ?></script>
<script charset="utf-8" src="__PUBLIC__/jquery/jquery-1.7.2.min.js"></script>
<script charset="utf-8" src="__PUBLIC__/jquery/jquery.autocomplete-1.1.js"></script>
<script charset="utf-8" src="__PUBLIC__/jquery/jquery.lazyload-1.8.4.js"></script>
<script charset="utf-8" src="<?php echo ($tpl); ?>js/home.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo ($tpl); ?>js.css">
<link rel="stylesheet" type="text/css" href="<?php echo ($tpl); ?>style.css">
<!--系统JS与CSS -->
</head>
<body>
<div id="dingbu">
<div class="wrap">
  <div id="dingbu-a">
    <ul>
      <li><a href="/zhuomian.php">把本站放到桌面</a></li>
      <li><a href="<?php echo ($url_guestbook); ?>">留言反馈</a></li>
      <li><a href="<?php echo ff_mytpl_url('my_new.html');?>">今日更新</a></li>
      <li><a href="<?php echo ($root); ?>" onClick="this.style.behavior='url(#default#homepage)';this.setHomePage(this.href);return(false);" >设为主页</a></li>
      <li class="wuxian"><a href="javascript:void(0)" id="fav">收藏本站</a></li>
    </ul>
  </div>
  <div id="history"><a href="javascript:void(0);" class="list_hist"><strong>您的播放记录</strong></a></div>
</div>
</div>
<div class="header wrap">
    <div class="logo fl"><a href="<?php echo ($root); ?>"><img src="<?php echo ($tpl); ?>images/logo.gif" alt="<?php echo ($sitename); ?>"/></a></div>
    <div class="search fr">
    	<form id="ffsearch" name="ffsearch" method="post" action="<?php echo ($root); ?>index.php?s=vod-search"><input maxlength="100" type="text" name="wd" id="wd" class="sousuo-a" value="<?php echo ($wd); ?>" autocomplete="off" /><span class="sousuo-b"><input type="submit" value="搜索"  class="sousuo-c" /></span></form>
    	<div class="hots"><?php echo ($hotkey); ?></div>
    </div>
</div>
<div class="nav">
	<div class="wrap">
    <a href="<?php echo ($root); ?>"><strong>首页</strong></a>
    <?php if(is_array($list_menu)): $i = 0; $__LIST__ = $list_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><?php if(in_array(($ppvod["list_id"]), explode(',',"2"))): ?><?php if(is_array($ppvod["son"])): $i = 0; $__LIST__ = $ppvod["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvodson): ++$i;$mod = ($i % 2 )?><a <?php if(($ppvodson["list_id"])  ==  $list_id): ?>class="on"<?php endif; ?> href="<?php echo ($ppvodson["list_url"]); ?>" title="<?php echo ($ppvodson["list_name"]); ?>"><?php echo ($ppvodson["list_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>  
    </div>
</div>
<div class="query">
<div class="wrap">
    	<div class="subnav"><?php if(is_array($list_menu)): $i = 0; $__LIST__ = $list_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><?php if(in_array(($ppvod["list_id"]), explode(',',"1"))): ?><?php if(is_array($ppvod["son"])): $i = 0; $__LIST__ = $ppvod["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvodson): ++$i;$mod = ($i % 2 )?><a href="<?php echo ($ppvodson["list_url"]); ?>" target="_self"><?php echo ($ppvodson["list_name"]); ?>电影</a>&nbsp;|&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?><a href="<?php echo getlistname(23,'list_url');?>" title="记录片">记录片</a></div>
        <div class="share">
<span>分享到：</span><div class="bdsharebuttonbox"><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_bdhome" data-cmd="bdhome" title="分享到百度新首页"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a href="#" class="bds_baidu" data-cmd="baidu" title="分享到百度搜藏"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_more" data-cmd="more"></a></div>
</div>
</div>
</div>
<div class="wrap">
    <div class="top960"><?php echo getadsurl('top960');?></div>
    <div class="vodlist_r box">
        <div class="top">
            <h3><span>评分</span><a href="#">点播排行榜</a></h3>
        </div>
        <ul><?php $gold_desc = ff_mysql_vod('limit:30;order:vod_gold desc,vod_hits desc'); ?><?php if(is_array($gold_desc)): $i = 0; $__LIST__ = $gold_desc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li><span><?php echo ($ppvod["vod_gold"]); ?></span><em><?php echo ($i); ?></em><a href="<?php echo ($ppvod["vod_readurl"]); ?>"><?php echo (msubstr($ppvod["vod_name"],0,12)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul>        
    </div>   
    <div class="vodlist_l box">
      <div class="top">
          <h3><a href="<?php echo ($root); ?>">首页</a></label> > <?php echo ($search_wd); ?></h3>
      </div>
      <?php $vod_list = ff_mysql_vod('wd:'.$search_wd.';actor:'.$search_actor.';year:'.$search_year.';language:'.$search_language.';area:'.$search_area.';letter:'.$search_letter.';limit:8;page:true;order:vod_addtime desc');$page = $vod_list[0]['page']; ?>
      <?php if(($vod_list["0"]["count"])  >  "0"): ?><?php if(is_array($vod_list)): $i = 0; $__LIST__ = $vod_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><ul><a href="<?php echo ($ppvod["vod_readurl"]); ?>"><img src="<?php echo ($ppvod["vod_picurl"]); ?>" alt="点击播放《<?php echo ($ppvod["vod_name"]); ?>》" /></a>
        <h2><a href="<?php echo ($ppvod["vod_readurl"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a><em><?php echo ($ppvod["vod_gold"]); ?></em><?php if(!empty($ppvod["vod_title"])): ?><span><?php echo ($ppvod["vod_title"]); ?></span><?php endif; ?></h2>
        <p>主演∶<?php echo (ff_search_url($ppvod["vod_actor"])); ?></p>
        <p>地区∶<?php echo (($ppvod["vod_area"])?($ppvod["vod_area"]):'未录入'); ?> 上映时间∶<?php echo (date('Y-m-d',$ppvod["vod_addtime"])); ?></p>
        <p class="content"><?php echo (msubstr($ppvod["vod_content"],0,100,'utf-8',true)); ?></p>
        <p><a href="<?php echo ($ppvod["vod_readurl"]); ?>">影片详情</a> | <a href="<?php echo ($ppvod["vod_playurl"]); ?>">在线观看</a> | 影评(<?php echo ($ppvod["vod_golder"]); ?>)</p>
        </ul><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="pages"><?php echo ($page); ?></div>
      <?php else: ?>
       	 <ul>对不起,没有搜索到<<?php echo ($search_wd); ?><?php echo ($search_actor); ?><?php echo ($search_director); ?><?php echo (($search_year)?($search_year):''); ?><?php echo ($search_language); ?><?php echo ($search_letter); ?>>相关内容!</ul><?php endif; ?>    
    </div>   
    <div class="blank"></div>  
</div>
<div class="ft">
<div class="wrap">
    <div class="ft_l">
      <p>友情提示：请勿长时间观看影视，注意保护视力并预防近视，合理安排时间，享受健康生活。</p>
      <p>免责声明：本站所有内容均来源于互联网相关站点自动搜索采集的资源链接地址，相关链接已经注明来源。</p>
      <p>相关事项：如果本站采集的链接地址无意侵犯了您的权益，请来邮件告知，我们会及时进行处理。联系方式 <?php echo ($email); ?> 。</p>
    </div>
    <div class="ft_r">
      <ul>
      	<li><a href="<?php echo ($url_map_rss); ?>" target="_blank">Rss</a></li>
        <li><a href="<?php echo ($url_map_baidu); ?>" target="_blank">SiteMap</a></li>
        <li><a href="mailto:<?php echo ($email); ?>" >联系我们</a></li>
      </ul>
    </div>
</div>
</div>
<!-- Baidu Button BEGIN -->
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{},"image":{"viewList":["qzone","bdhome","tsina","sqq","tqq","douban","renren","tieba","baidu","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","bdhome","tsina","sqq","tqq","douban","renren","tieba","baidu","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<!-- Baidu Button END -->
<span style="display:none"><?php echo ($tongji); ?></span>
</body>
</html>