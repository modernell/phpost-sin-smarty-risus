			<div class="floatR filterCat">
                <span>Filtrar por Categorías:</span>
                <select onchange="ir_a_categoria(this.value)">
                    <option selected="selected" value="root">Seleccionar categoría</option>
                    <option value="<? if ($tsConfig.c_allow_portal == 0)echo -1; else -2 ?>">Ver Todas</option>
                    <option value="linea">--Ninguno---</option>                    
                    <?
                    foreach ($tsConfig['categorias'] as $c)
                     {   
                    ?>
	                    <option value="<? echo $c['c_seo']; ?>" <? if ($tsCategoria == $c['c_seo']) echo 'selected="selected"'; ?>> <? echo $c['c_nombre']; ?></option>
                    <?
                     }
                     ?>
                 </select>
            </div>