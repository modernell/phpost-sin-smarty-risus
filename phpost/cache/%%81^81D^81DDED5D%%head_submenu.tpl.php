<?php /* Smarty version 2.6.26, created on 2012-08-16 19:32:44
         compiled from sections/head_submenu.tpl */ ?>
		<div class="subMenuContent">
        	<div id="subMenuPosts" class="subMenu <?php if ($this->_tpl_vars['tsPage'] != 'tops'): ?>here<?php endif; ?>">
                <ul class="floatL tabsMenu">
                    <li<?php if ($this->_tpl_vars['tsPage'] == 'home' || $this->_tpl_vars['tsPage'] == 'portal'): ?> class="here"<?php endif; ?>>
                        <a class=vctip  title="Inicio" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/<?php if ($this->_tpl_vars['tsPage'] == 'home' || $this->_tpl_vars['tsPage'] == 'posts'): ?>posts/<?php endif; ?>">Inicio</a></li>
                    <li<?php if ($this->_tpl_vars['tsPage'] == 'buscador'): ?> class="here"<?php endif; ?>>
                        <a class=vctip title="Buscador" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/buscador/">Buscador</a></li>
                    <?php if ($this->_tpl_vars['tsUser']->is_member): ?>
                        <?php if ($this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['gopp']): ?>
                            <li<?php if ($this->_tpl_vars['tsSubmenu'] == 'agregar'): ?> class="here"<?php endif; ?>>
                            <a class=vctip title="Agregar Post" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/agregar/">Agregar Post</a>
                            </li>
                        <?php endif; ?>
                        <li class="<?php if ($this->_tpl_vars['tsPage'] == 'mod-history'): ?>here<?php endif; ?>">
                        <a class=vctip title="Historial de Moderaci&oacute;n" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/mod-history/">Historial</a></li>
        	        <?php if ($this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['moacp']): ?>
                                <li class="<?php if ($this->_tpl_vars['tsPage'] == 'moderacion'): ?>here<?php endif; ?>">
                                <a class=vctip title="Panel de Moderador" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/moderacion/">Moderaci&oacute;n 
                            <?php if ($this->_tpl_vars['tsConfig']['c_see_mod'] && $this->_tpl_vars['tsConfig']['novemods']['total']): ?>
                                <span class="cadGe cadGe_<?php if ($this->_tpl_vars['tsConfig']['novemods']['total'] < 10): ?>green<?php elseif ($this->_tpl_vars['tsConfig']['novemods']['total'] < 30): ?>purple<?php else: ?>red<?php endif; ?>" style="position:relative;"><?php echo $this->_tpl_vars['tsConfig']['novemods']['total']; ?>
</span>
                            <?php endif; ?>
                                </a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <div class="clearBoth"></div>
                </ul>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/head_categorias.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <div class="clearBoth"></div>
            </div>
            <div id="subMenuFotos" class="subMenu <?php if ($this->_tpl_vars['tsPage'] == 'fotos'): ?>here<?php endif; ?>">
                <ul class="floatL tabsMenu">
                    <li<?php if ($this->_tpl_vars['tsAction'] == '' && $this->_tpl_vars['tsAction'] != 'agregar' && $this->_tpl_vars['tsAction'] != 'album' && $this->_tpl_vars['tsAction'] != 'favoritas' || $this->_tpl_vars['tsAction'] == 'ver'): ?> class="here"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/fotos/">Inicio</a></li>
                    <?php if ($this->_tpl_vars['tsAction'] == 'album' && $this->_tpl_vars['tsFUser']['0'] != $this->_tpl_vars['tsUser']->uid): ?><li class="here"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/fotos/<?php echo $this->_tpl_vars['tsFUser']['1']; ?>
">&Aacute;lbum de <?php echo $this->_tpl_vars['tsFUser']['1']; ?>
</a></li><?php endif; ?>
                    <?php if ($this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['gopf']): ?><li<?php if ($this->_tpl_vars['tsAction'] == 'agregar'): ?> class="here"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/fotos/agregar.php">Agregar Foto</a></li><?php endif; ?>
                    <li<?php if ($this->_tpl_vars['tsAction'] == 'album' && $this->_tpl_vars['tsFUser']['0'] == $this->_tpl_vars['tsUser']->uid): ?> class="here"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/fotos/<?php echo $this->_tpl_vars['tsUser']->nick; ?>
">Mis Fotos</a></li>
                </ul>
                <div class="clearBoth"></div>
            </div>
            <div id="subMenuTops" class="subMenu <?php if ($this->_tpl_vars['tsPage'] == 'tops'): ?>here<?php endif; ?>">
                <ul class="floatL tabsMenu">
                    <li<?php if ($this->_tpl_vars['tsAction'] == 'posts'): ?> class="here"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/top/posts/">Posts</a></li>
                    <li<?php if ($this->_tpl_vars['tsAction'] == 'usuarios'): ?> class="here"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/top/usuarios/">Usuarios</a></li>
                </ul>
                <div class="clearBoth"></div>
            </div>
        </div>