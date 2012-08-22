<?php /* Smarty version 2.6.26, created on 2012-08-16 19:32:44
         compiled from sections/head_categorias.tpl */ ?>
			<div class="floatR filterCat">
                <span>Filtrar por Categorías:</span>
                <select onchange="ir_a_categoria(this.value)">
                    <option selected="selected" value="root">Seleccionar categoría</option>
                    <option value="<?php if ($this->_tpl_vars['tsConfig']['c_allow_portal'] == 0): ?>-1<?php else: ?>-2<?php endif; ?>">Ver Todas</option>
                    <option value="linea">-----</option>
                    <?php $_from = $this->_tpl_vars['tsConfig']['categorias']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
	                    <option value="<?php echo $this->_tpl_vars['c']['c_seo']; ?>
" <?php if ($this->_tpl_vars['tsCategoria'] == '$c.c_seo'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['c']['c_nombre']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                 </select>
            </div>