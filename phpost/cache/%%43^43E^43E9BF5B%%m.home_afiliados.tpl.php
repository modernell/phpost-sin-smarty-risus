<?php /* Smarty version 2.6.26, created on 2012-08-16 19:32:48
         compiled from modules/m.home_afiliados.tpl */ ?>
					<div id="webAffs">
                        <div class="wMod clearbeta">
                            <div class="wMod-h">Afiliados</div>
                            <div class="wMod-data">
                                <ul>
                                <?php $_from = $this->_tpl_vars['tsAfiliados']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['af']):
?>
                                <li><a href="#" onclick="afiliado.detalles(<?php echo $this->_tpl_vars['af']['aid']; ?>
); return false;" title="<?php echo $this->_tpl_vars['af']['a_titulo']; ?>
">
                                    <img src="<?php echo $this->_tpl_vars['af']['a_banner']; ?>
" width="190" height="40"/>
                                </a></li>
                                <?php endforeach; endif; unset($_from); ?>
                                </ul>
                            </div>
                            <div class="floatR"><a onclick="afiliado.nuevo(); return false">Afiliate a <?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
</a></div>
                         </div>
                    </div>