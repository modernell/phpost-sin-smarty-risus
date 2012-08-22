<?php /* Smarty version 2.6.26, created on 2012-08-16 19:32:48
         compiled from modules/m.home_fotos.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 'modules/m.home_fotos.tpl', 11, false),)), $this); ?>
                    <script type="text/javascript">
                        imagenes.total = <?php echo $this->_tpl_vars['tsImTotal']-1; ?>
;
                        imagenes.move = '-150px';
                    </script>
					<div id="lastFotos" class="wMod clearbeta">
                    	<div class="wMod-h">&Uacute;ltimas Fotos</div>
                        <div class="wMod-data" style="padding:0;text-align:center;position:relative;height:150px;overflow: hidden;">
                            <ul id="imContent" style="position:absolute;top:-150px;">
                            <?php $_from = $this->_tpl_vars['tsImages']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['im']):
?>
                            <li id="img_<?php echo $this->_tpl_vars['i']; ?>
">
                                <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/fotos/<?php echo $this->_tpl_vars['im']['user_name']; ?>
/<?php echo $this->_tpl_vars['im']['foto_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['im']['f_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html" title="<?php echo $this->_tpl_vars['im']['f_caption']; ?>
">
                                    <img src="<?php echo $this->_tpl_vars['im']['f_url']; ?>
" style="min-height:150px; max-height:150px; max-width:200px" align="absmiddle"/>
                                </a>
                            </li>
                            <?php endforeach; endif; unset($_from); ?>
                            </ul>
                        </div>
                    </div>