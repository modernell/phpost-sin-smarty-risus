<?php /* Smarty version 2.6.26, created on 2012-08-16 19:32:48
         compiled from modules/m.home_last_posts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 'modules/m.home_last_posts.tpl', 11, false),array('modifier', 'truncate', 'modules/m.home_last_posts.tpl', 11, false),array('modifier', 'hace', 'modules/m.home_last_posts.tpl', 29, false),)), $this); ?>
                <div class="clearbeta lastPosts">
                    <?php if ($this->_tpl_vars['tsPostsStickys']): ?>
                	<div class="header">
                    	<div class="box_txt2 ultimos_posts">Posts importantes en <?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
</div>
                        <div class="clearBoth"></div>
                    </div>
                    <div class="body">
                        <ul>
                        	<?php $_from = $this->_tpl_vars['tsPostsStickys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
                            <li <?php if ($this->_tpl_vars['p']['post_status'] == 3): ?>style="background-color:#f1f1f1;"<?php elseif ($this->_tpl_vars['p']['post_status'] == 1): ?>style="background-color:coral;"<?php elseif ($this->_tpl_vars['p']['post_status'] == 2): ?>style="background-color:rosyBrown;"<?php elseif ($this->_tpl_vars['p']['user_activo'] == 0): ?>style="background-color:burlyWood;"<?php elseif ($this->_tpl_vars['p']['user_baneado'] == 1): ?>style="background-color:orange;"<?php endif; ?> class="categoriaPost sticky<?php if ($this->_tpl_vars['p']['post_sponsored'] == 1): ?> patrocinado<?php endif; ?>">
                            <a <?php if ($this->_tpl_vars['p']['post_status'] == 3): ?>class="qtip" title="El post est&aacute; en revisi&oacute;n"<?php elseif ($this->_tpl_vars['p']['post_status'] == 1): ?>class="qtip" title="El post se encuentra en revisi&oacute;n por acumulaci&oacute;n de denuncias"<?php elseif ($this->_tpl_vars['p']['post_status'] == 2): ?>class="qtip" title="El post est&aacute; eliminado"<?php elseif ($this->_tpl_vars['p']['user_activo'] == 0): ?>class="qtip" title="La cuenta del usuario est&aacute; desactivada"<?php endif; ?>  href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['p']['c_seo']; ?>
/<?php echo $this->_tpl_vars['p']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html" style="background:url(<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/icons/cat/<?php echo $this->_tpl_vars['p']['c_img']; ?>
) no-repeat 5px center" title="<?php echo $this->_tpl_vars['p']['post_title']; ?>
" target="_self" class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 55) : smarty_modifier_truncate($_tmp, 55)); ?>
</a>
                            </li>
                            <?php endforeach; endif; unset($_from); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                	<div class="header">
                    	<div class="box_txt3 ultimos_posts">&Uacute;ltimos posts en <?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
</div>
                        <div class="box_rss">
                        </div>
                        <div class="clearBoth"></div>
                    </div>
                    <div class="body">
                    	<ul>
                            <?php if ($this->_tpl_vars['tsPosts']): ?>
                            <?php $_from = $this->_tpl_vars['tsPosts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
                            <li class="categoriaPost" style="background-image:url(<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/icons/cat2/<?php echo $this->_tpl_vars['p']['c_img']; ?>
); <?php if ($this->_tpl_vars['p']['post_status'] == 3): ?> background-color:#f1f1f1; <?php elseif ($this->_tpl_vars['p']['post_status'] == 1): ?>background-color:coral;<?php elseif ($this->_tpl_vars['p']['post_status'] == 2): ?> background-color:rosyBrown;<?php elseif ($this->_tpl_vars['p']['user_activo'] == 0): ?> background-color:burlyWood;<?php elseif ($this->_tpl_vars['p']['user_baneado'] == 1): ?> background-color:orange;<?php endif; ?>" >
                                <a style="margin-left:10px;" <?php if ($this->_tpl_vars['p']['post_status'] == 3): ?>class="qtip" title="El post est&aacute; en revisi&oacute;n"<?php elseif ($this->_tpl_vars['p']['post_status'] == 1): ?>class="qtip" title="El post se encuentra en revisi&oacute;n por acumulaci&oacute;n de denuncias"<?php elseif ($this->_tpl_vars['p']['post_status'] == 2): ?>class="qtip" title="El post est&aacute; eliminado"<?php elseif ($this->_tpl_vars['p']['user_activo'] == 0): ?>class="qtip" title="La cuenta del usuario est&aacute; desactivada"<?php elseif ($this->_tpl_vars['p']['user_baneado'] == 1): ?>class="qtip" title="La cuenta del usuario est&aacute; suspendida"<?php endif; ?> class="title <?php if ($this->_tpl_vars['p']['post_private']): ?>categoria privado<?php endif; ?>" alt="<?php echo $this->_tpl_vars['p']['post_title']; ?>
" title="<?php echo $this->_tpl_vars['p']['post_title']; ?>
" target="_self" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['p']['c_seo']; ?>
/<?php echo $this->_tpl_vars['p']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 50) : smarty_modifier_truncate($_tmp, 50)); ?>
</a>
                                <span style="margin-left:10px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_date'])) ? $this->_run_mod_handler('hace', true, $_tmp) : smarty_modifier_hace($_tmp)); ?>
 &raquo; <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['p']['user_name']; ?>
" class="hovercard" uid="<?php echo $this->_tpl_vars['p']['post_user']; ?>
"><strong>@<?php echo $this->_tpl_vars['p']['user_name']; ?>
</strong></a> &middot; Puntos <strong><?php echo $this->_tpl_vars['p']['post_puntos']; ?>
</strong> &middot; Comentarios <strong><?php echo $this->_tpl_vars['p']['post_comments']; ?>
</strong></span>
                                <span class="floatR"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['p']['c_seo']; ?>
/"><?php echo $this->_tpl_vars['p']['c_nombre']; ?>
</a></span>
                            </li>
                            <?php endforeach; endif; unset($_from); ?>
                            <?php else: ?>
                            <li class="emptyData">No hay posts aqu&iacute;</li>
                            <?php endif; ?>
                        </ul>
                        <br clear="left"/>
                    </div>
                    <div class="footer size13">
                        <?php if ($this->_tpl_vars['tsPages']['prev'] > 0 && $this->_tpl_vars['tsPages']['max'] == false): ?><a href="pagina<?php echo $this->_tpl_vars['tsPages']['prev']; ?>
" class="floatL">&laquo; Anterior</a><?php endif; ?>
                        <?php if ($this->_tpl_vars['tsPages']['next'] <= $this->_tpl_vars['tsPages']['pages']): ?><a href="pagina<?php echo $this->_tpl_vars['tsPages']['next']; ?>
" class="floatR">Siguiente &raquo;</a>
                        <?php elseif ($this->_tpl_vars['tsPages']['max'] == true): ?><a href="pagina2">Siguiente &raquo;</a><?php endif; ?>
                    </div>
                 </div>