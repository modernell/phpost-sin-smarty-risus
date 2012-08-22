<?php /* Smarty version 2.6.26, created on 2012-08-16 19:32:44
         compiled from sections/main_header.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['tsTitle']; ?>
</title>
<link href="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/estilo.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/phpost.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/extras.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/megaerick.css" rel="stylesheet" type="text/css" />

<?php if ($this->_tpl_vars['tsUser']->is_admod && $this->_tpl_vars['tsConfig']['c_see_mod'] && $this->_tpl_vars['tsConfig']['novemods']['total']): ?>
<!-- AGREGAMOS ESTILO DE MODERACIÓN SI HAY CONTENIDO PARA REVISAR -->
<link href="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/css/moderacion.css" rel="stylesheet" type="text/css" />
<div id="stickymsg" onmouseover="$('#brandday').css('opacity',0.5);" onmouseout="$('#brandday').css('opacity',1);" onclick="location.href = '<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/moderacion/'" style="cursor:default;">Hay <?php echo $this->_tpl_vars['tsConfig']['novemods']['total']; ?>
 contenido<?php if ($this->_tpl_vars['tsConfig']['novemods']['total'] != 1): ?>s<?php endif; ?> esperando revisi&oacute;n</div>
<?php endif; ?>

<!-- AGREGAMOS UN ESTILO EXTRA SI EXISTE -->
<link href="<?php echo $this->_tpl_vars['tsConfig']['css']; ?>
/<?php echo $this->_tpl_vars['tsPage']; ?>
.css" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/favicon.ico" type="image/x-icon" />
<script src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/jquery.min.js" type="text/javascript"></script>
<!-- Cargamos libreria jQuery desde Google <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
<script src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/jquery.plugins.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/acciones.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/funciones.js" type="text/javascript"></script>
<?php if ($this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['moacp'] || $this->_tpl_vars['tsUser']->permisos['most'] || $this->_tpl_vars['tsUser']->permisos['moayca'] || $this->_tpl_vars['tsUser']->permisos['mosu'] || $this->_tpl_vars['tsUser']->permisos['modu'] || $this->_tpl_vars['tsUser']->permisos['moep'] || $this->_tpl_vars['tsUser']->permisos['moop'] || $this->_tpl_vars['tsUser']->permisos['moedcopo'] || $this->_tpl_vars['tsUser']->permisos['moaydcp'] || $this->_tpl_vars['tsUser']->permisos['moecp']): ?>
<script src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/moderacion.js" type="text/javascript"></script>
<?php endif; ?>
<?php if ($this->_tpl_vars['tsConfig']['c_allow_live']): ?>
<link href="<?php echo $this->_tpl_vars['tsConfig']['css']; ?>
/live.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/live.js" type="text/javascript"></script>
<?php endif; ?>
<script type="text/javascript">
// <?php echo '
var global_data={
// '; ?>

	user_key:'<?php echo $this->_tpl_vars['tsUser']->uid; ?>
',
	postid:'<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
',
	fotoid:'<?php echo $this->_tpl_vars['tsFoto']['foto_id']; ?>
',
	img:'<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/',
	url:'<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
',
	domain:'<?php echo $this->_tpl_vars['tsConfig']['domain']; ?>
',
    s_title: '<?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
',
    s_slogan: '<?php echo $this->_tpl_vars['tsConfig']['slogan']; ?>
'
// <?php echo '
};
// '; ?>
 <?php echo '
$(document).ready(function(){
// '; ?>

    <?php if ($this->_tpl_vars['tsNots'] > 0): ?> 
	notifica.popup(<?php echo $this->_tpl_vars['tsNots']; ?>
);
    <?php endif; ?>
    <?php if ($this->_tpl_vars['tsMPs'] > 0 && $this->_tpl_vars['tsAction'] != 'leer'): ?>
    mensaje.popup(<?php echo $this->_tpl_vars['tsMPs']; ?>
);
    <?php endif; ?>
// <?php echo '
});
//	'; ?>

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
	 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/head_menu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="brandday">
    <div id="header">
	<div class="wrapper">
	<div class="logo_container">
			<a id="logoi" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
" title="<?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
"></a>		
                <div id="search" class="floatR">
				<!--Buscador-->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.global_search.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </div>  		
                </div>  	
			</div>
		</div>
	<!--Menu-->
<div id="maincontainer">
	<!--Main container-->
		<div id="contenido_principal">
			<!--Sub menu-->
        	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/head_submenu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        	<div id="cuerpocontainer">
       		 <!--cuperpo container-->