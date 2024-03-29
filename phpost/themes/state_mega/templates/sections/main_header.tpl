<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$tsTitle}</title>
<link href="{$tsConfig.tema.t_url}/estilo.css" rel="stylesheet" type="text/css" />
<link href="{$tsConfig.tema.t_url}/phpost.css" rel="stylesheet" type="text/css" />
<link href="{$tsConfig.tema.t_url}/extras.css" rel="stylesheet" type="text/css" />
<link href="{$tsConfig.tema.t_url}/megaerick.css" rel="stylesheet" type="text/css" />

{if $tsUser->is_admod && $tsConfig.c_see_mod && $tsConfig.novemods.total}
<!-- AGREGAMOS ESTILO DE MODERACIÓN SI HAY CONTENIDO PARA REVISAR -->
<link href="{$tsConfig.tema.t_url}/css/moderacion.css" rel="stylesheet" type="text/css" />
<div id="stickymsg" onmouseover="$('#brandday').css('opacity',0.5);" onmouseout="$('#brandday').css('opacity',1);" onclick="location.href = '{$tsConfig.url}/moderacion/'" style="cursor:default;">Hay {$tsConfig.novemods.total} contenido{if $tsConfig.novemods.total != 1}s{/if} esperando revisi&oacute;n</div>
{/if}

<!-- AGREGAMOS UN ESTILO EXTRA SI EXISTE -->
<link href="{$tsConfig.css}/{$tsPage}.css" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="{$tsConfig.images}/favicon.ico" type="image/x-icon" />
<script src="{$tsConfig.js}/jquery.min.js" type="text/javascript"></script>
<!-- Cargamos libreria jQuery desde Google <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
<script src="{$tsConfig.js}/jquery.plugins.js" type="text/javascript"></script>
<script src="{$tsConfig.js}/acciones.js" type="text/javascript"></script>
<script src="{$tsConfig.js}/funciones.js" type="text/javascript"></script>
{if $tsUser->is_admod || $tsUser->permisos.moacp || $tsUser->permisos.most || $tsUser->permisos.moayca || $tsUser->permisos.mosu || $tsUser->permisos.modu || $tsUser->permisos.moep || $tsUser->permisos.moop || $tsUser->permisos.moedcopo || $tsUser->permisos.moaydcp || $tsUser->permisos.moecp}
<script src="{$tsConfig.js}/moderacion.js" type="text/javascript"></script>
{/if}
{if $tsConfig.c_allow_live}
<link href="{$tsConfig.css}/live.css" rel="stylesheet" type="text/css" />
<script src="{$tsConfig.js}/live.js" type="text/javascript"></script>
{/if}
<script type="text/javascript">
// {literal}
var global_data={
// {/literal}
	user_key:'{$tsUser->uid}',
	postid:'{$tsPost.post_id}',
	fotoid:'{$tsFoto.foto_id}',
	img:'{$tsConfig.tema.t_url}/',
	url:'{$tsConfig.url}',
	domain:'{$tsConfig.domain}',
    s_title: '{$tsConfig.titulo}',
    s_slogan: '{$tsConfig.slogan}'
// {literal}
};
// {/literal} {literal}
$(document).ready(function(){
// {/literal}
    {if $tsNots > 0} 
	notifica.popup({$tsNots});
    {/if}
    {if $tsMPs > 0 &&  $tsAction != 'leer'}
    mensaje.popup({$tsMPs});
    {/if}
// {literal}
});
//	{/literal}
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
	 {include file='sections/head_menu.tpl'}
<div id="brandday">
    <div id="header">
	<div class="wrapper">
	<div class="logo_container">
			<a id="logoi" href="{$tsConfig.url}" title="{$tsConfig.titulo}"></a>		
                <div id="search" class="floatR">
				<!--Buscador-->
	{include file='modules/m.global_search.tpl'}
                </div>  		
                </div>  	
			</div>
		</div>
	<!--Menu-->
<div id="maincontainer">
	<!--Main container-->
		<div id="contenido_principal">
			<!--Sub menu-->
        	{include file='sections/head_submenu.tpl'}
        	<div id="cuerpocontainer">
       		 <!--cuperpo container-->