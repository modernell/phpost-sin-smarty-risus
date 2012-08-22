<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo $tsTitle; ?></title>
<link href="<?echo $tsConfig['tema']['t_url']; ?>/estilo.css" rel="stylesheet" type="text/css" />
<link href="<?echo $tsConfig['tema']['t_url']; ?>/phpost.css" rel="stylesheet" type="text/css" />
<link href="<?echo $tsConfig['tema']['t_url']; ?>/extras.css" rel="stylesheet" type="text/css" />
<link href="<?echo $tsConfig['tema']['t_url']; ?>/megaerick.css" rel="stylesheet" type="text/css" />
<? 
if ($tsUser->is_admod && $tsConfig['c_see_mod'] && $tsConfig['novemods']['total'])
{
 ?>
<!-- AGREGAMOS ESTILO DE MODERACIÓN SI HAY CONTENIDO PARA REVISAR -->
<link href="<? echo $tsConfig['tema']['t_url']; ?>/css/moderacion.css" rel="stylesheet" type="text/css" />
<div id="stickymsg" onmouseover="$('#brandday').css('opacity',0.5);" onmouseout="$('#brandday').css('opacity',1);" onclick="location.href = '{$tsConfig.url}/moderacion/'" style="cursor:default;">Hay {$tsConfig.novemods.total} contenido{if $tsConfig.novemods.total != 1}s{/if} esperando revisi&oacute;n</div>
<?
}
?>

<!-- AGREGAMOS UN ESTILO EXTRA SI EXISTE -->
<link href="<? echo $tsConfig['css']; ?>/<? echo $tsPage['css']; ?>" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="<? echo $tsConfig['images']; ?>/favicon.ico" type="image/x-icon" />
<script src="<? echo $tsConfig['js']; ?>/jquery.min.js" type="text/javascript"></script>
<!-- Cargamos libreria jQuery desde Google <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
<script src="<? echo $tsConfig['js']; ?>/jquery.plugins.js" type="text/javascript"></script>
<script src="<? echo $tsConfig['js']; ?>/acciones.js" type="text/javascript"></script>
<script src="<? echo $tsConfig['js']; ?>/funciones.js" type="text/javascript"></script>
<?

if ($tsUser->is_admod || $tsUser->permisos['moacp'] || $tsUser->permisos['most'] || $tsUser->permisos['moayca'] || $tsUser->permisos['mosu'] || $tsUser->permisos['modu'] || $tsUser->permisos['moep'] || $tsUser->permisos['moop'] || $tsUser->permisos['moedcopo'] || $tsUser->permisos['moaydcp'] || $tsUser->permisos['moecp'])
{
?>
<script src="<? echo $tsConfig['js']; ?>/moderacion.js" type="text/javascript"></script>
<?
}
?>
<?
if ($tsConfig['c_allow_live'])
{
?>
<link href="<? echo $tsConfig['css']; ?>/live.css" rel="stylesheet" type="text/css" />
<script src="<? echo $tsConfig['js']; ?>/live.js" type="text/javascript"></script>
<?
}
?>
<script type="text/javascript">
// 
var global_data={
// 
	user_key:'<? echo $tsUser->uid; ?>',
	postid:'<? echo $tsPost["post_id"]; ?>',
	fotoid:'<? echo $tsFoto["foto_id"]; ?>',
	img:'<? echo $tsConfig["tema"]["t_url"]."/"; ?>',
	url:'<? echo $tsConfig["url"]; ?>',
	domain:'<? echo $tsConfig["domain"]; ?>',
    s_title: '<? echo $tsConfig["titulo"]; ?>',
    s_slogan: '<? echo $tsConfig["slogan"]; ?>'
// 
};
//  
$(document).ready(function(){
//     
    <?
    if ($tsNots > 0)
    {echo "notifica.popup(".$tsNots.")"; }
    if ($tsMPs > 0 &&  $tsAction != 'leer')           
        {echo "mensaje.popup(".$tsMPs.")";}
    ?>
        // 
});
//	
</script>
</head>

<body>
<!--JAVASCRIPT-->
<a id="scroll-up" style="z-index: 100; display: inline;" onclick="scrollTo(0,0)"></a>
<div id="swf"></div>
<div id="js" style="display:none"></div>
<div id="mask"></div>
<div id="mydialog"></div>
<div class="UIBeeper" id="BeeperBox"></div>
<? include 'head_menu.php'; ?>
<div id="brandday">
    <div id="header">
	<div class="wrapper">
	<div class="logo_container">
		<a id="logoi" href="<? echo $tsConfig['url']; ?>" title="<? echo $tsConfig['titulo']; ?>"></a>		
                <div id="search" class="floatR">
                <? include (TS_THEME.'modules/m.global_search.php'); ?>
                </div>  		
                </div>  	
	</div>
	</div>
	<!--Menu-->
<div id="maincontainer">
	<!--Main container-->
		<div id="contenido_principal">
			<!--Sub menu-->
        	<? include 'head_submenu.php'; ?>
                
        	<div id="cuerpocontainer">
       		 <!--cuperpo container-->