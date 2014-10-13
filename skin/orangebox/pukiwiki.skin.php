<?php
/////////////////////////////////////////////////
// OrangeBox for PukiWiki
// Designed by ari- <http://youjing.ws/>
// $Revision: 1.8 $
// $Date: 2004/11/12 14:44:12 $
//
if (!defined('DATA_DIR')) { exit; }
header('Cache-control: no-cache');
header('Pragma: no-cache');
//header('Content-Type: text/html; charset=EUC-JP');
header('Content-Type: text/html; charset=' . CONTENT_CHARSET);
echo '<?xml version="1.0" encoding="EUC-JP"?>';
?>
<?php if ($html_transitional) { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<?php } else { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<?php } ?>
<head>
	<meta http-equiv="content-style-type" content="text/css" />
	<link rel="stylesheet" href="skin/orangebox/default.ja.css" type="text/css" media="screen,print" charset="Shift_JIS" />
	<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo$link_rss ?>" />
	<title><?php echo "$title - $page_title" ?></title>
	<script type="text/javascript" src="skin/orangebox/external_link.js"></script>
<?php if (!$is_read) { ?>
 <meta name="robots" content="NOINDEX,NOFOLLOW" />
<?php } ?>
<?php
	global $trackback, $referer;
	if ($trackback) {
?>
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<script type="text/javascript" src="skin/trackback.js"></script>
<?php } ?>
</head>
<body>
<div id="base"><!-- ■BEGIN id:base -->
<!-- ◆ Header ◆ ========================================================== -->
<div id="header"><!-- ■BEGIN id:header -->
<div id="logo"><a href="<?php echo $link_top ?>"><?php echo $page_title ?></a></div>
</div><!-- □END id:header -->
<div id="navigator"><!-- ■BEGIN id:navigator -->
	<?php echo convert_html(get_source('SiteNavigator')) ?>
</div><!-- □END id:navigator -->
<div id="page_navigator"><!-- ■BEGIN id:page_navigator -->
	<?php echo convert_html(get_source('PageNavigator')) ?>
</div><!-- □END id:PageNavigator -->
<!-- ◆ CenterBar ◆ ======================================================= -->
<div id="main"><!-- ■BEGIN id:main -->
<div id="center_bar"><!-- ■BEGIN id:center_bar -->
<div id="content"><!-- ■BEGIN id:content -->
<h1 class="title"><?php echo $page ?></h1>
<?php if ($lastmodified) { ?><!-- ■BEGIN id:lastmodified -->
<div id="lastmodified">
	<?php echo $lastmodified ?>
</div>
<?php } ?><!-- □END id:lastmodified -->
<div id="body"><!-- ■BEGIN id:body -->
<?php echo $body ?>
</div><!-- □END id:body -->
<div id="summary"><!-- ■BEGIN id:summary -->
<?php if ($notes) { ?><!-- ■BEGIN id:note -->
<div id="note">
<?php echo $notes ?>
</div>
<?php } ?><!-- □END id:note -->
<div id="trackback"><!-- ■BEGIN id:trackback -->
<?php
  if ($trackback) {
    $tb_id = tb_get_id($_page);
?>
<a href="<?php echo "$script?plugin=tb&amp;__mode=view&amp;tb_id=$tb_id" ?>">TrackBack(<?php echo tb_count($_page) ?>)</a> | 
<?php } ?>

<?php
  if ($referer) {
?>
<a href="<?php echo "$script?plugin=referer&amp;page=$r_page" ?>">外部リンク元</a>
<?php } ?>
</div><!-- □ END id:trackback -->
<?php if ($related) { ?><!-- ■ BEGIN id:related -->
<div id="related">
 Link: <?php echo $related ?>
</div>
<?php } ?><!-- □ END id:related -->
<?php if ($attaches) { ?><!-- ■ BEGIN id:attach -->
<div id="attach">
<?php echo $hr ?>
<?php echo $attaches ?>
</div>
<?php } ?><!-- □ END id:attach -->
</div><!-- □ END id:summary -->
</div><!-- □END id:content -->
</div><!-- □ END id:center_bar -->
<!-- ◆RightBar◆ ========================================================== -->
<div id="right_bar"><!-- ■BEGIN id:right_bar -->
<div id="rightbar1" class="side_bar"><!-- ■BEGIN id:rightbar1 -->
<h2>検索</h2>
<form action="<?php echo $script ?>" method="post">
<div><input name="encode_hint" value="ぷ" type="hidden" /></div>
<div>
<input name="plugin" value="lookup" type="hidden" />
<input name="refer" value="<?php echo $title ?>" type="hidden" />
<input name="page" size="20" value="" type="text" accesskey="F" title="serch box"/>
<input value="Go!" type="submit" accesskey="g"/><br/>
<input name="inter" value="検索" type="radio" checked="checked" id="serch_site" /><label for="serch_site">サイト内</label>
<input name="inter" value="Google.jp" type="radio" accesskey="w" id="serch_web"/><label for="serch_web">Web</label>
</div>
</form></div><!-- END id:rightbar1 -->
<div id="rightbar2" class="side_bar"><!-- ■BEGIN id:rightbar2 -->
<h2>編集操作</h2>
<ul>
<?php if ($is_page) { ?>
	<li><a href="<?php echo $link_new  ?>"><img src="<?php echo IMAGE_DIR ?>new.png" width="20" height="20" alt="新規" title="新規" />新規</a></li>
	<li><a href="<?php echo $link_edit ?>"><img src="<?php echo IMAGE_DIR ?>edit.png" width="20" height="20" alt="編集" title="編集" />編集</a></li>
<?php   if ((bool)ini_get('file_uploads')) { ?>
	<li><a href="<?php echo $link_upload ?>"><img src="<?php echo IMAGE_DIR ?>file.png" width="20" height="20" alt="添付" title="添付" />添付</a></li>
<?php   } ?>
	<li><a href="<?php echo $link_diff ?>"><img src="<?php echo IMAGE_DIR ?>diff.png" width="20" height="20" alt="差分" title="差分" />差分</a></li>
<?php } ?>
<?php if ($do_backup) { ?>
	<li><a href="<?php echo $link_backup ?>"><img src="<?php echo IMAGE_DIR ?>backup.png" width="20" height="20" alt="バックアップ" title="バックアップ" />バックアップ</a></li>
<?php } ?>
</ul>
</div><!-- □END id:rightbar2 -->
<?php if (get_source('RightBar')) { ?><!-- ■BEGIN id:rightbar3 -->
<div id="rightbar3" class="side_bar">
	<?php echo convert_html(get_source('RightBar')) ?>
</div>
<?php } ?><!-- □END id:rightbar3 -->
</div><!-- □END id:right_bar -->
</div><!-- □END id:main -->
<!-- ◆ LeftBar ◆ ========================================================= -->
<div id="left_bar"><!-- ■BEGIN id:left_bar -->
<div id="menubar" class="side_bar"><!-- ■BEGIN id:menubar -->
	<?php echo convert_html(get_source('MenuBar')) ?>
</div><!-- □END id:menubar -->
</div><!-- □END id:left_bar -->
<!-- ◆ Footer ◆ ========================================================== -->
<div id="footer"><!-- ■BEGIN id:footer -->
<div id="copyright"><!-- ■BEGIN id:copyright -->
	Modified by <a href="<?php echo $modifierlink ?>"><?php echo $modifier ?></a><br />
	<?php echo S_COPYRIGHT ?><br />
	Powered by PHP <?php echo PHP_VERSION ?><br />
	HTML convert time to <?php echo $taketime ?> sec.
</div><!-- □END id:copyright -->
</div><!-- □END id:footer -->
<!-- ◆ END ◆ ============================================================= -->
</div><!-- □END id:base -->
</body>
</html>
