<?php /* Smarty version 2.6.26, created on 2012-08-16 19:32:48
         compiled from modules/m.home_stats.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'hace', 'modules/m.home_stats.tpl', 3, false),array('modifier', 'fecha', 'modules/m.home_stats.tpl', 7, false),)), $this); ?>
					<div id="webStats">
                        <div class="wMod clearbeta">
                            <div class="wMod-h"><span class="qtip" title="Actualizado: <?php echo ((is_array($_tmp=$this->_tpl_vars['tsStats']['stats_time'])) ? $this->_run_mod_handler('hace', true, $_tmp) : smarty_modifier_hace($_tmp)); ?>
">Estad&iacute;sticas</span></div>
                            <div class="box_cuerpo">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                	<td style="background-image:url(<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/power_on.png);"><a class="usuarios_online" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/usuarios/?online=true"><span class="qtip" title="R&eacute;cord conectados: <?php echo $this->_tpl_vars['tsStats']['stats_max_online']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['tsStats']['stats_max_time'])) ? $this->_run_mod_handler('fecha', true, $_tmp) : smarty_modifier_fecha($_tmp)); ?>
"><?php echo $this->_tpl_vars['tsStats']['stats_online']; ?>
 online</span></a></td>
        	                        <td style="background-image:url(<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/user.png);"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/usuarios/"><?php echo $this->_tpl_vars['tsStats']['stats_miembros']; ?>
 miembros</a></td>
                                </tr>
    	                        <tr>
        	                        <td style="background-image:url(<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/posts.png);"><?php echo $this->_tpl_vars['tsStats']['stats_posts']; ?>
 posts</td>
            	                    <td style="background-image:url(<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/comment.png);"><?php echo $this->_tpl_vars['tsStats']['stats_comments']; ?>
 comentarios</td>
                                </tr>
    	                        <tr>
        	                        <td style="background-image:url(<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/foto.png);"><?php echo $this->_tpl_vars['tsStats']['stats_fotos']; ?>
 fotos</td>
            	                    <td style="background-image:url(<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/comment.png);"><?php echo $this->_tpl_vars['tsStats']['stats_foto_comments']; ?>
 comentarios en fotos</td>
                                </tr>
                            </table>
                            </div>
                        </div>
                    </div>