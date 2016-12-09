<?php

require_once("inc/config.php");
require_once("inc/os_function.php");
require_once("block/auth/_auth.php");
/// main template ///
$temp=array();
if (isset($_GET['mid']) && $_GET['mid'])
{
	$temp=GetTemplatesByID($_GET['mid']);
}elseif (isset($_GET['nid']) && $_GET['nid'])
{
	$temp=GetTemplatesByID($_GET['nid'], 'news');
}elseif (isset($_GET['cid']) && ($_GET['cid'] !== ""))
{
	$temp['main_tpl']=getTemplateName('products_main_template', $_GET['cid']);
	$temp['sub_tpl']=getTemplateName('products_sub_template', $_GET['cid']);
}elseif (isset($_GET['pid']) && $_GET['pid'])
{
	$temp['main_tpl']=getVar('product_main_template', $connect);
	$temp['sub_tpl']=getVar('product_sub_template', $connect);
}elseif (isset($_GET['bid']) && $_GET['bid'])
{
	$temp['main_tpl']=getVar('basket_main_template', $connect);
	$temp['sub_tpl']=getVar('basket_sub_template', $connect);
}elseif (isset($_GET['lid']) && $_GET['lid'])
{
	$temp['main_tpl']=getVar('basket_main_template', $connect);
	$temp['sub_tpl']=getVar('lay_sub_template', $connect);
}
else
{
	$temp['main_tpl']=getVar('start_main_template', $connect);
	$temp['sub_tpl']=getVar('start_sub_template', $connect);
}

if (!$temp['main_tpl'])
	$temp['main_tpl']=getVar('main_template', $connect);
if (!$temp['sub_tpl'])
	$temp['sub_tpl']=getVar('sub_template', $connect);

if (isset($_GET['p']) && $_GET['p'] && is_file("tpl/design/".$_GET['p'].".html"))
{
	$temp['main_tpl']="tpl/design/".$_GET['p'].".html";
}

if (isset($_GET['sp']) && $_GET['sp'] && is_file("tpl/context/".$_GET['sp'].".html"))
{
	$temp['sub_tpl']="tpl/context/".$_GET['sp'].".html";
}

$p=file($temp['main_tpl']);
$output=join("", $p);
$p=file($temp['sub_tpl']);
$output=preg_replace("/{\s*CONTENT\s*}/", join("", $p), $output);



///////////////////only tpl///////////////////////////////

///{AUTH}///
if (preg_match("/{\s*AUTH\s+(\d+)\s*}/", $output, $pocks))
{
	require_once("block/auth/_auth.php");
	authInit($pocks[1]);
	$output=preg_replace("/{\s*AUTH\s+(\d+)\s*}/", "", $output);
}

///{TITLE}///
function getTitle($id3, $pock_num)
{
	$query = "SELECT title FROM pref_products WHERE id='".$id3."'";
	$result = mysql_query($query);
	$title  = mysql_result($result,0,'title');
	$meta_title = $title;
	return $meta_title;
}
function getKeywords($id3, $pock_num)
{
	$name_f = "field".$pock_num;
	$query = "SELECT ".$name_f." FROM pref_products WHERE id='".$id3."'";
	$result = mysql_query($query);
	$field5 = mysql_result($result,0,$name_f);
	return $field5;
}
if(isset($_GET['pid']))
{
	if (preg_match("/{\s*TITLE\s+?(\d+)*}/", $output, $pocks))
	{
		$out = getVar('site_name', $connect).'. '.getTitle($_GET['pid'],$pocks[1]);
		$output=preg_replace("/{\s*TITLE\s+?(\d+)*}/", $out, $output);
	}
	if (preg_match("/{\s*KEYWORDS\s+?(\d+)*}/", $output, $pocks))
	{
		$out = getKeywords($_GET['pid'], $pocks[1]);
		$output=preg_replace("/{\s*KEYWORDS\s+?(\d+)*}/", $out, $output);
	}
}
else
	$output=preg_replace("/{\s*TITLE\s+?(\d+)*}/", getVar('site_name', $connect), $output);


///{HEAD}///
$out='<link href="'.getVar('css_file', $connect).'" rel="stylesheet" type="text/css">';
require_once("block/menu/menu.php");
$out.=MenuInit();
require_once("block/news/news.php");
$out.=NewsInit();
require_once("block/catalog/catalog.php");
$out.=CatalogInit();
require_once("block/basket/basket.php");
$out.=BasketInit();
require_once("block/text/text.php");
$out.=TextInit();
require_once("block/catalog/catalog_menu.php");



if (preg_match("/{\s*SEARCH(\s+(\d+))?\s*}/", $output, $pocks))
{
	require_once("block/search/search.php");
	$out.=SearchInit();
}

////Predzakaz
$output=preg_replace("/{\s*SID\s*}/", session_name()."=".session_id(), $output);
$errors = '';
if(isset($_POST['gok']))
{
    $name  = addslashes(htmlspecialchars($_POST['name']));
    $mail = addslashes(htmlspecialchars($_POST['mail']));
    $phone = addslashes(htmlspecialchars($_POST['phone']));
    $ind = addslashes(htmlspecialchars($_POST['ind']));
    $adress = addslashes(htmlspecialchars($_POST['adress']));
    $ext = addslashes(htmlspecialchars($_POST['ext']));
    $code = $_POST['img'];
    if(empty($name))
    {
        $errors .="Г‚Г» Г­ГҐ ГўГўГҐГ«ГЁ ГЁГ¬Гї!<br/>";
    }
    if(!preg_match('/^([0-9a-z]*([-|_]?[0-9a-z]+)*)(([-|_]?)\.([-|_]?)[0-9a-z]*([-|_]?[0-9a-z]+)+)*([-|_]?)@([0-9a-z]+([-]?[0-9a-z]+)*)(([-]?)\.([-]?)[0-9a-z]*([-]?[0-9a-z]+)+)*\.[a-z]{2,4}$/',$mail))
    {
        $errors .="ГЌГҐГЄГ®Г°Г°ГҐГЄГІГ­Г»Г© ГґГ®Г°Г¬Г ГІ Email!<br/>";
    }
    if(empty($phone) || !preg_match("!^[0-9+ ()-]{7,}$!i",$phone))
    {
        $errors .="Г‚Г» Г­ГҐ ГўГўГҐГ«ГЁ Г­Г®Г¬ГҐГ° ГІГҐГ«ГҐГґГ®Г­Г !<br/>";
    }
    if(!isset($_SESSION['secret_code']))
    {
        die('Fuck you!');
    }
    if($_SESSION['secret_code']!=$code)
    {
        $errors .="Г‚Г» Г­ГҐ ГўГўГҐГ«ГЁ ГЄГ®Г¤ Г± ГЄГ Г°ГІГЁГ­ГЄГЁ!<br/>";
    }
    $_SESSION['secret_code'] = rand(111,999);
    if(!$errors)
    {
        if(mysql_query("insert into pref_predzakaz set name='$name',ext_info='$ext',mail='$mail',phone='$phone',ind='$ind',adress='$adress'"))
        {
            $reply_adress = "admin@mhockey.ru";
            $errors .="Г‘ГЇГ Г±ГЁГЎГ®, ГўГ Гё ГЇГ°ГҐГ¤Г§Г ГЄГ Г§ ГЇГ°ГЁГ­ГїГІ!<br/>";
            $from="From: ".$reply_adress."\r\nContent-Type: text/plain; charset=\"windows-1251\"\r\n";
			$subject="ГЏГ°ГҐГ¤Г§Г ГЄГ Г§ Г­Г  Г±Г Г©ГІГҐ Г‘ГЇГ®Г°ГІГЁГўГ­Г»Г© ГЄГ®Г­ГІГЁГ­ГҐГІ";
			$message="$name, Г‚Г Гё ГЇГ°ГҐГ¤Г§Г ГЄГ Г§ Г­Г  Г±Г Г©ГІГҐ mhockey.ru ГЇГ°ГЁГ­ГїГІ. ГЉГ ГЄ ГІГ®Г«ГјГЄГ® ГІГ®ГўГ Г° ГЇГ®Г±ГІГіГЇГЁГІ Гў ГЇГ°Г®Г¤Г Г¦Гі, ГўГ» ГЎГіГ¤ГҐГІГҐ Г®ГЇГ®ГўГҐГ№ГҐГ­Г». \n\n";
			mail($mail, $subject,$message, $from);
        }
        else
        {
            die(mysql_error());
        }
    }
}
$output=preg_replace("/{\s*ERRORS\s*}/", $errors, $output);

///////

$output=preg_replace("/{\s*HEAD\s*}/", $out, $output);

///{HMENU}///
if (preg_match_all("/{\s*HMENU\s+(\d+)\s*}/",$output, $pocks, PREG_SET_ORDER)){
	foreach ($pocks as $key=>$value)
	{
		$out=drowHMenu($value[1], getAuthGroup());
		$output=preg_replace("/{\s*HMENU\s+(".preg_quote($value[1], "/").")\s*}/",$out, $output);
	}
}

///{SLIDEBANNERS}///
if (preg_match("/{\s*SLIDEBANNERS_\w+\s*}/",$output)){
	list($out_cnt, $out_nav)=drowSlidebanners();
	$output=preg_replace("/{\s*SLIDEBANNERS_CNT\s*}/",$out_cnt, $output);
	$output=preg_replace("/{\s*SLIDEBANNERS_NAV\s*}/",$out_nav, $output);
}

///{DROPMENU_LEFT}///
if (preg_match("/{\s*DROPMENU_LEFT\s*}/",$output)){
	$out=drowLeftMenu();
	$output=preg_replace("/{\s*DROPMENU_LEFT\s*}/",$out, $output);
}

///{DROPMENU_RIGHT}///
if (preg_match("/{\s*DROPMENU_RIGHT\s*}/",$output)){
	$out=drowRightMenu();
	$output=preg_replace("/{\s*DROPMENU_RIGHT\s*}/",$out, $output);
}

///{BRANDS_FOOTER}///
if (preg_match("/{\s*BRANDS_FOOTER\s*}/",$output)){
	$out=  drowBrands();
	$output=preg_replace("/{\s*BRANDS_FOOTER\s*}/",$out, $output);
}

///{TMENU}///
if (preg_match_all("/{\s*TMENU\s+(\d+)\s*}/",$output, $pocks, PREG_SET_ORDER)){
	foreach ($pocks as $key=>$value)
	{
		$out=drowTMenu($value[1], getAuthGroup());
		$output=preg_replace("/{\s*TMENU\s+(".preg_quote($value[1], "/").")\s*}/",$out, $output);
	}
}


///{NEWSHEADLINES}///
if (preg_match("/{\s*NEWSHEADLINES\s+(\d+)(\s+(\d+))?\s*}/", $output, $pocks))
{
	$out=drowNewsHeadlines(0, $pocks[1], $pocks[2], getAuthGroup());
	$output=preg_replace("/{\s*NEWSHEADLINES\s+(\d+)(\s+(\d+))?\s*}/", $out, $output);
}

///{NEWSNAVIGATE}///
if ($_GET['gid']=="")
	$_GET['gid']='0';
if (preg_match("/{\s*NEWSNAVIGATE\s+(\d+)(\s+(\d+))?\s*}/", $output, $pocks))
{
	$out=drowNavigateNews($_GET['gid'], $pocks[1], $pocks[2], getAuthGroup());
	$out.=drowNewsHeadlines($_GET['gid']*$pocks[1], ($_GET['gid']+1)*$pocks[1], $pocks[2], getAuthGroup());
	$out.=drowNavigateNews($_GET['gid'], $pocks[1], $pocks[2], getAuthGroup());
	$output=preg_replace("/{\s*NEWSNAVIGATE\s+(\d+)(\s+(\d+))?\s*}/", $out, $output);
}

///{OLD_VIEWS}///
if (preg_match("/{\s*OLD_VIEWS\s+?(\d+)*}/", $output, $pocks))
{
	$out=getOldViews($pocks[1]);
	$output=preg_replace("/{\s*OLD_VIEWS\s+?(\d+)*}/", $out, $output);
}

///{PRICE_LIST_ALL}///
if (preg_match_all("/{\s*PRICE_LIST_ALL\s*}/",$output, $pocks)){
	foreach ($pocks as $key=>$value)
	{
		$out=drowPriceListAll();
		$output=preg_replace("/{\s*PRICE_LIST_ALL\s*}/",$out, $output);
	}
}

///{CATALOG}///
if (preg_match("/{\s*CATALOG\s*}/", $output, $pocks))
{
	$out=getCatalog((int)$_GET['cid']);
	$output=preg_replace("/{\s*CATALOG\s*}/", $out, $output);
}

///{CATALOGBY_}///
if (preg_match_all("/\{CATALOGBY\_([^\}]*)\}/", $output, $pocks, PREG_SET_ORDER)){
	foreach ($pocks as $key=>$value)
	{
    $out=getCatalog((int)$_GET['cid'], $value[1]);
    $output=preg_replace("/\{CATALOGBY\_".$value[1]."\}/", $out, $output);
  }
}

///{CATALOG_TEXT}///
if (preg_match("/{\s*CATALOG_TEXT\s*}/", $output, $pocks))
{
	$out=getCatalogText((int)$_GET['cid']);
	$output=preg_replace("/{\s*CATALOG_TEXT\s*}/", $out, $output);
}

///{CATALOG_IMG}///
if (preg_match("/{\s*CATALOG_IMG\s*}/", $output, $pocks))
{
	$out=getCatalogImg((int)$_GET['cid']);
	$output=preg_replace("/{\s*CATALOG_IMG\s*}/", $out, $output);
}

///{TEXTBLOCK}///
if (preg_match_all("/{\s*TEXTBLOCK\s+(\d+)\s*}/",$output, $pocks, PREG_SET_ORDER))
{
   foreach ($pocks as $key=>$value)
	{
		$out = ShowTextBlock($value[1]);
		$output=preg_replace("/{\s*TEXTBLOCK\s+(".preg_quote($value[1], "/").")\s*}/",$out, $output);
	}
}

///{PRODUCTS}///
if (preg_match("/{\s*PRODUCTS\s*}/", $output, $pocks))
{
	if ($_GET['cid']=="")
		$_GET['cid']='0';
	if ($_GET['cur_ref']=="")
		$_GET['cur_ref']='0';
	$out=getProducts($_GET['cid'], $_GET['cur_ref'], $_GET['selfield']);
	$output=preg_replace("/{\s*PRODUCTS\s*}/", $out, $output);
}

///{PRODUCT}///
if (preg_match("/{\s*PRODUCT\s*}/", $output, $pocks))
{
	if ($_GET['pid']=="")
		$_GET['pid']='0';
	$out=getProduct($_GET['pid'], $_GET['selfield']);
	$output=preg_replace("/{\s*PRODUCT\s*}/", $out, $output);
}

///{PAGEREFS}///
if (preg_match("/{\s*PAGEREFS\s*}/", $output, $pocks))
{	if ($_GET['cur_ref']=="")
		$_GET['cur_ref']='0';
	$out=getPageRefs((int)$_GET['cid'], (int)$_GET['cur_ref'], $_GET['selfield']);
	$output=preg_replace("/{\s*PAGEREFS\s*}/", $out, $output);
}

///{SPEC}///
if (preg_match("/{\s*SPEC\s*}/", $output, $pocks))
{
	$out=getSpec();
	$output=preg_replace("/{\s*SPEC\s*}/", $out, $output);
}

///{NEW}///
if (preg_match("/{\s*NEW\s*}/", $output, $pocks))
{
	$out=getNew();
	$output=preg_replace("/{\s*NEW\s*}/", $out, $output);
}

///{SPEC2}///
if (preg_match("/{\s*SPEC2\s*}/", $output, $pocks))
{
	$out=getSpec2();
	$output=preg_replace("/{\s*SPEC2\s*}/", $out, $output);
}

///{PRICE}///
if (preg_match("/{\s*PRICE\s*(\d+)?\s*}/", $output, $pocks))
{
	$out='<div style="text-align:left;">'.getPriceList($pocks[1])."</div>";
	$output=preg_replace("/{\s*PRICE\s*(\d+)?\s*}/", $out, $output);
}

///{FINDFORM}///
if (preg_match("/{\s*FINDFORM\s*}/", $output, $pocks))
{
	$out=getFindForm();
	$output=preg_replace("/{\s*FINDFORM\s*}/", $out, $output);
}

///{EXFIND}///
if (preg_match("/{\s*EXFIND\s*}/", $output, $pocks))
{
	$out=getExFind();
	$output=preg_replace("/{\s*EXFIND\s*}/", $out, $output);
}

///{EXFINDFORM}///
if (preg_match("/{\s*EXFINDFORM\s*}/", $output, $pocks))
{
	$out=getExFindForm();
	$output=preg_replace("/{\s*EXFINDFORM\s*}/", $out, $output);
}

///{FIND}///
if (preg_match("/{\s*FIND\s*}/", $output, $pocks))
{
	if ($_GET['sf']=="")
		$_GET['sf']='';
	$out=getFind($_GET['sf']);
	$output=preg_replace("/{\s*FIND\s*}/", $out, $output);
}

///{ALFAFORM}///
if (preg_match("/{\s*ALFAFORM\s*}/", $output, $pocks))
{
	$out=getAlfa();
	$output=preg_replace("/{\s*ALFAFORM\s*}/", $out, $output);
}

///{SEARCH}///
if (preg_match("/{\s*SEARCH(\s+(\d+))?\s*}/", $output, $pocks))
{
	$out=getSearch($pocks[2]);
	$output=preg_replace("/{\s*SEARCH(\s+(\d+))?\s*}/", $out, $output);
}

//-------------

///{SPECLIST}///
if (preg_match("/{SPECLIST(.*?)}/", $output, $pocks))
{
	$out='<div style="text-align:left;">'.getSpecList2()."</div>";
	$output=preg_replace("/{SPECLIST(.*?)}/", $out, $output);
}

///{SPECLIST2}///
if (preg_match("/{SPECLIST2(.*?)}/", $output, $pocks))
{
	$out='<div style="text-align:left;">'.getSpecList2()."</div>";
	$output=preg_replace("/{SPECLIST2(.*?)}/", $out, $output);
}

///{BASKETINFO}///
if (preg_match("/{BASKETINFO(.*?)}/", $output, $pocks))
{
	$out=getBasketInfo();
	$output=preg_replace("/{BASKETINFO(.*?)}/", $out, $output);
}

///{BASKET}///
if (preg_match("/{BASKET(.*?)}/", $output, $pocks))
{
	$out=getBasket();
	$output=preg_replace("/{BASKET(.*?)}/", $out, $output);
}

///{LAYINFO}///
if (preg_match("/{LAYINFO(.*?)}/", $output, $pocks))
{
	$out=getBasketInfo2();
	$output=preg_replace("/{LAYINFO(.*?)}/", $out, $output);
}

///{LAY}///
if (preg_match("/{LAY(.*?)}/", $output, $pocks))
{
	$out=getBasket2();
	$output=preg_replace("/{LAY(.*?)}/", $out, $output);
}
///{SENDBASKET}///
if (preg_match("/{SENDBASKET(.*?)}/", $output, $pocks))
{
	$out=getSendBasket();
	$output=preg_replace("/{SENDBASKET(.*?)}/", $out, $output);
}

///{AUTHFORM}///
if (preg_match("/{AUTHFORM(.*?)}/", $output, $pocks))
{
	$out=showAuthState();
	$output=preg_replace("/{AUTHFORM(.*?)}/", $out, $output);
}

if (preg_match("/{AUTHBLOCK (.*?)}/", $output, $pocks))
{
	$out=authBlockSwitch($pocks[1]);
	$output=preg_replace("/{AUTHBLOCK (.*)}/", $out, $output);
}

///{CATALOG_MENU}///
if (preg_match_all("/{\s*CATALOG_MENU\s+(\w+)\s+(\w+)\s*(\w*)\s*}/", $output, $pocks, PREG_SET_ORDER))
{
   foreach ($pocks as $pock)
   {
      if (isset($pid) && !isset($cid))
      {
         $product_id = $pid;
      }
      else
      {
         $product_id = 0;
      }

      if ($pock[1] == 1)
      {
         $cat_depth = $pock[3];
         $current_element = $cid;
      }
      else
      {
         if (isset($_REQUEST[$pock[2]]))
         {
            $cat_depth = $_REQUEST[$pock[2]];
         }
         elseif(isset($cid))
         {
            $cat_depth = $cid;
         }
         else
         {
            $cat_depth = $pock[3];
         }
      }

      $out = get_catalog_menu($cat_depth, $pock[1], $product_id, $current_element);
   	$output = preg_replace("/{\s*CATALOG_MENU\s+".$pock[1]."\s+".$pock[2]."\s*(\w*)\s*}/", $out, $output);
	}
}

///{NEWS}///
if (isset($_GET['nid']))
{
	$colname_page=(get_magic_quotes_gpc())?$_GET['nid']:addslashes($_GET['nid']);
	$query_page="SELECT * FROM pref_news WHERE id = '$colname_page'";
	$page=mysql_query($query_page, $connect) or die(mysql_error());
	$row_page=mysql_fetch_assoc($page);
	$out=$row_page['title'];
	$output=preg_replace("/{HEADLINE(.*?)}/", $out, $output);
	$out=$row_page['news'];
	$output=preg_replace("/{NEWS(.*?)}/", $out, $output);
	$output=preg_replace("/{KEYWORDS(.*?)}/",$out,$output);
	$out=$row_page['description'];
	$output=preg_replace("/{DESCRIPTION(.*?)}/",$out,$output);
}elseif (isset($_GET['cid']))
{
	$metatags=GetMetatagsByCatId($_GET['cid']);

	if (isset($_GET['field127'])){
		$out=$metatags['KEYWORDS'].' '.$_GET['field127'];
	}else{
		$out=$metatags['KEYWORDS'];
	}
	$output=preg_replace("/{HEADLINE(.*?)}/",$out,$output);
	$out=$metatags['KEYWORDS'];
	$output=preg_replace("/{KEYWORDS(.*?)}/",$out,$output);
	if (isset($_GET['field127'])){
		$out='� ����� ��������-�������� ��  ������ ������ '.$metatags['TITLE'].' '.$_GET['field127'];
	}else{
		$out='� ����� ��������-�������� ��  ������ ������ '.$metatags['TITLE'];
	}
	$output=preg_replace("/{DESCRIPTION(.*?)}/",$out,$output);
	$out=$metatags['CAT_DESCRIPTION'];
	$output=preg_replace("/{CAT_DESCRIPTION(.*?)}/",$out,$output);
}elseif (isset($_GET['pid']) || isset($_GET['bid']))
{
	$query_page="SELECT * FROM yandex_info WHERE id = ".$_GET['pid']."";
	$page=mysql_query($query_page, $connect) or die(mysql_error());
	$row_page=mysql_fetch_assoc($page);
	$out=$row_page['typePrefix'].' '.$row_page['model'];
	$output=preg_replace("/{HEADLINE(.*?)}/",$out,$output);
	$out='';
	$output=preg_replace("/{KEYWORDS(.*?)}/",$out,$output);
	$out='� ����� ��������-�������� ��  ������ ������ '.$row_page['typePrefix'].' '.$row_page['model'].' �� ���� '.$row_page['price'].' ������';
	$output=preg_replace("/{DESCRIPTION(.*?)}/",$out,$output);
}else
{
	///{CONTEXT}///
	if (!isset($_GET['id']))
	{
		$colname_page=getVar('def_page', $connect);
	}else
	{
		$colname_page=$_GET['id'];
	}

	$outk=getVar('keywords', $connect);
	$outd=getVar('description', $connect);
	if ($colname_page==0)
	{
		if ($_GET['mid']!="")
		{
			$query_page2="SELECT title FROM pref_menu WHERE id=".$_GET['mid']."";
			$page2=mysql_query($query_page2, $connect) or die(mysql_error());
			if (mysql_num_rows($page2)>=1)
			{
				$row_page2=mysql_fetch_assoc($page2);
				$out=$row_page2['title'];
			}else
			{
				$out='ГЌГҐГўГҐГ°Г­Г»Г© ГЇГіГ­ГЄГІ Г¬ГҐГ­Гѕ.<script language="javascript">function r(){window.location="/index.php";} setTimeout("r()",5000);</script>';
			}
		}else
		{
			$out='&nbsp';
		}
		$outc='';
	}else
	{
		$query_page="SELECT * FROM pref_page WHERE id='$colname_page'";
		$page=mysql_query($query_page, $connect) or die(mysql_error());
		if (mysql_num_rows($page)>=1)
		{
			$row_page=mysql_fetch_assoc($page);
			$out=$row_page['title'];
			$outc=$row_page['html'];
			$outk=$row_page['keywords'];
			$outd=$row_page['description'];

			if ($colname_page==49)
			{
				// ГЌГ ГёГ  Г§Г Г¤Г Г·Г  Г±Г®Г±ГІГ®ГЁГІ Гў ГІГ®Г¬, Г·ГІГ®ГЎГ» Г±Г®Г§Г¤Г ГІГј Г°ГҐГ¤Г ГЄГІГЁГ°ГіГҐГ¬ГіГѕ Г±ГІГ ГІГјГѕ Г¤Г«Гї Г®ГЎГ°Г ГІГ­Г®Г© Г±ГўГїГ§ГЁ
				// ГЏГ®ГЅГІГ®Г¬Гі JavaScript ГЁ ГґГ®Г°Г¬Гі Г­ГҐ Г±Г«ГҐГ¤ГіГҐГІ ГЇГЁГ±Г ГІГј Гў ГЎГ Г§Гі.
    			$outc.='<script language="JavaScript">
             	<!--
             		function isEmpty(str)
             		{
             			for (var intLoop = 0; intLoop < str.length; intLoop++)
             				if (" " != str.charAt(intLoop))
             					return false;
             			return true;
             		}

             		function checkRequired(f)
             		{
             			var strError = "";
             			for  (var intLoop = 0; intLoop<f.elements.length; intLoop++)
             				if (null!=f.elements[intLoop].getAttribute("required"))
             					if (isEmpty(f.elements[intLoop].value))
             						strError +="  " + f.elements[intLoop].name + "\n";

						if ("" != strError)
						{
							alert ("ГЋГёГЁГЎГЄГ , Г§Г ГЇГ®Г«Г­ГЁГІГҐ ГЇГ®Г¦Г Г«ГіГ©Г±ГІГ  ГўГ±ГҐ ГЇГ®Г«Гї!\n");
							return false;
						}
					}
             	//-->
           		</script>';
      			$hidden_code=rand(1000,9999);
      			$outc.='

					<P >Г‘Г®Г®ГЎГ№ГҐГ­ГЁГҐ Г­ГҐ ГЎГіГ¤ГҐГІ Г®ГІГЇГ°Г ГўГ«ГҐГ­Г® ГЎГҐГ§ ГЄГ®Г¤Г .</P>

				<DIV id=m_div style="COLOR: red"></DIV>
				<TABLE width="100%" border=0>
				<FORM name=m_form onsubmit="return checkRequired(this);" action=index.php?&amp;sp=contact&amp;mid=11124&amp;id=49 method=post>
					<TBODY>
						<TR>
							<TD id=m_div style="FONT-SIZE: 9pt; color: #CB7550;">

										<p >
											Г‚ГўГҐГ¤ГЁГІГҐ ГЉГ®Г­ГІГ°Г®Г«ГјГ­Г»Г© ГЄГ®Г¤:<b> '.$hidden_code.'</b><BR>


									<INPUT name=contrcode required=""></p>


										<p >
											Г‚Г ГёГҐ Г€Г¬Гї: <BR>


									<INPUT style="WIDTH: 50%" name=name required=""><BR></p>


										<p >
											Г‚Г Гё ГІГҐГ«ГҐГґГ®Г­: <BR>


									<INPUT style="WIDTH: 50%" name=phone required=""><BR></p>


										<p >
											Г‚Г Гё email: <BR>


									<INPUT style="WIDTH: 50%" maxLength=50 name=email required=""><BR></p>


										<p >
											Г‚Г ГёГҐ Г±Г®Г®ГЎГ№ГҐГ­ГЁГҐ: <BR>


									<TEXTAREA style="WIDTH: 50%; HEIGHT: 150px" name=text rows=12 required=""></TEXTAREA><BR></p>
									<INPUT type=hidden value="'.$hidden_code.'" name=hidden_code required="">

									<BR>

									<INPUT type=submit value="ГЋГІГЇГ°Г ГўГЁГІГј Г§Г ГЇГ°Г®Г±">
									<FONT > </FONT>
								</TD>
							</TR>
						</TBODY>
					</FORM>
				</TABLE>';
			}
		}else
		{
			if ($_GET['mid']!="")
			{
				$query_page2="SELECT title FROM pref_menu WHERE id=".$_GET['mid']."";
				$page2=mysql_query($query_page2, $connect) or die(mysql_error());
				if (mysql_num_rows($page2)>=1)
				{
					$row_page2=mysql_fetch_assoc($page2);
					$out=$row_page2['title'];
				}else
				{
					$out='ГЌГҐГўГҐГ°Г­Г»Г© ГЇГіГ­ГЄГІ Г¬ГҐГ­Гѕ.<script language="javascript">function r(){window.location="/index.php";} setTimeout("r()",5000);</script>';
				}
			}else
			{
				$out='&nbsp';
			}
			//$outc='Г‡Г ГЇГ°Г®ГёГҐГ­Г­Г®Г© Г±ГІГ°Г Г­ГЁГ¶Г» Г­ГҐ Г±ГіГ№ГҐГ±ГІГўГіГҐГІ.<script language="javascript">function r(){window.location="/index.php";}setTimeout("r()",5000);</script>';
		}
	}

	if ($out=="")
		$out="&nbsp;";
	$output=preg_replace("/{HEADLINE(.*?)}/",$out,$output);
	$output=preg_replace("/{CONTEXT(.*?)}/",$outc,$output);

	$output=preg_replace("/{KEYWORDS(.*?)}/",$outk,$output);
	$output=preg_replace("/{DESCRIPTION(.*?)}/",$outd,$output);
}











///////////////////block & tpl///////////////////////////////

///{COPYRIGHT}///
$out='<a href="'.getVar('copyright_link', $connect).'">'.getVar('copyright', $connect).'</a><!-- <br><a href="http://www.apu.ru"><img src="img/apu_label.jpg" width="121" height="30" border="0" alt="Г‘ГІГіГ¤ГЁГї "ГќГ©ГЏГЁГћ""></a> -->';
$output=preg_replace("/{COPYRIGHT(.*?)}/", $out, $output);

///{COUNTER}///
//$out=getVar('code_of_counter', $connect);
//$output=preg_replace("/{COUNTER(.*?)}/", $out, $output);

///{BANER}///
$out=getVar('code_of_baner', $connect);
$output=preg_replace("/{BANER(.*?)}/", $out, $output);


///{TEXTBANER}///
$out=getVar('code_of_text', $connect);
$output=preg_replace("/{TEXTBANER(.*?)}/", $out, $output);

///{CONTACTS}///
//$out=getVar('contacts', $connect);
//$output=preg_replace("/{CONTACTS(.*?)}/", $out, $output);

if (preg_match("/{CONTACTS}/", $output, $pocks))
{
	$to=getVar('email', $connect);
	$domen=$HTTP_HOST;
	if (isset($_POST["contrcode"]))
		$contrcode=$_POST["contrcode"];
	if (isset($_POST["hidden_code"]))
		$hidden_code=$_POST["hidden_code"];
	$out='';
	if ($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if ($contrcode==$hidden_code)
		{
			$mail_exp="^[\.a-zA-Z0-9_-]+@[\.a-zA-Z0-9_-]+\.[a-zA-Z]{2,4}$";
			if (ereg($mail_exp, $_POST["email"]) && (strlen($_POST["email"])<50))
				$reply_adress=$_POST["email"];
			else
				$reply_adress="no-reply@".$domen;

			$from="From: ".$reply_adress."\r\nContent-Type: text/plain; charset=\"windows-1251\"\r\n";
			$subject="Email from ".$domen;
			$message="$name,\n\n$phone,\n\n$email,\n\n$text";
			if (!mail($to, $subject,$message, $from))
				$out="ГЌГҐ Г®ГІГЇГ°Г ГўГ«ГїГҐГІГ±Гї ГЇГЁГ±ГјГ¬Г®!";
			else
			{
				$out="<p style='color:red; '>Г‘ГЇГ Г±ГЁГЎГ® Г§Г  Г‚Г ГёГҐ ГЇГЁГ±ГјГ¬Г®, <b>$name</b>!</p><p>ГЏГ® ГҐГЈГ® Г°Г Г±Г±Г¬Г®ГІГ°ГҐГ­ГЁГЁ Г¬Г» ГЇГ®Г±ГІГ Г°Г ГҐГ¬Г±Гї Г±ГўГїГ§Г ГІГјГ±Гї Г± Г‚Г Г¬ГЁ Гў ГЄГ°Г ГІГ·Г Г©ГёГЁГ© Г±Г°Г®ГЄ</p>";
			}
		}else
		{
			$out = "<div>Г‚ГўГҐГ¤ГҐГ­ Г®ГёГЁГЎГ®Г·Г­Г»Г© ГЄГ®Г­ГІГ°Г®Г«ГјГ­Г»Г© ГЄГ®Г¤<br></div>";
		}
	}
	$output=preg_replace("/{CONTACTS}/", $out, $output);
}

///{username}///
$out=getAuthName();
$output=preg_replace("/{username(.*?)}/", $out, $output);

///{userlogin}///
$out=getAuthLogin();
$output=preg_replace("/{userlogin(.*?)}/", $out, $output);

///{p_forgotpassword}///
$out=getVar('p_forgotpassword', $connect);
$output=preg_replace("/{p_forgotpassword(.*?)}/", $out, $output);

///{p_signup}///
$out=getVar('p_signup', $connect);
$output=preg_replace("/{p_signup(.*?)}/", $out, $output);
echo $output;

?>
