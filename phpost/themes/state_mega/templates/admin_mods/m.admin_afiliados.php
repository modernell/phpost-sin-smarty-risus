                                <div class="boxy-title">
                                    <h3>Administrar Afiliados</h3>
                                </div>
                                <div id="res" class="boxy-content">
                                <?    
                                if ($tsSave)
                                {
                                ?>
                                <div style="display: block;" class="mensajes ok">Tus cambios han sido guardados.</div>
                                <?                                
                                }
                                
                                if (!$tsAct)
                                {    
                                if (!$tsAfiliados)
                                {    
                                ?>
				<div class="phpostAlfa">No hay afiliados.</div>
                                    <input type="button"  onclick="afiliado.nuevo(); return false" value="Agregar nuevo afiliado" class="mBtn btnOk"/>  
                                <?
                                }
                                else
                                {    
                                ?>    
                                <table cellpadding="0" cellspacing="0" border="0" width="100%" align="center" class="admin_table">
                                    	<thead>
                                            <th>ID</th>
                                            <th>Afiliado</th>
                                            <th>Cuando</th>
                                            <th>Entrada</th>
                                            <th>Salida</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </thead>
                                        <tbody>
                                            <?
                                            
                                            foreach ($tsAfiliados as $af)
                                            {
                                            ?>
                                        	<tr id="few_<? echo $af['aid']; ?>">
                                                <td><? echo $af['aid']; ?></td>
                                                <td>
                                                    <a href="<? echo $af['a_url']; ?>" id="a_url_<? echo $af['aid']; ?>" target="_blank">
                                                        <span id="a_name_<? echo $af['aid']; ?>"><? echo $af['a_titulo']; ?></span>
                                                    </a>
                                                </td>
                                                <td><? echo modifier_hace($af['a_hits_out']); ?>hace</td>
                                                <td><? echo $af['a_hits_in']; ?></td>
                                                <td><? echo $af['a_hits_out']; ?></td>
						<td id="status_afiliado_<? echo $af['aid']; ?>">
                                                    <?
                                                    if ($af['a_active'] == 0)
                                                    {
                                                    ?>
                                                    <font color="purple">Inactivo</font>
                                                    <?
                                                    }
                                                    else
                                                    {
                                                    ?>    
                                                    <font color="green">Activo</font>
                                                    <?
                                                    }
                                                    ?>
                                                </td>
                                                <td class="admin_actions">
                                                    <a href="afs/editar/<? echo $af['aid']; ?>">
                                                        <img src="<? echo $tsConfig['url']; ?>/themes/default/images/icons/editar.png" title="Editar"/>
                                                    </a>
                                                    <a href="#" onclick="ad_afiliado.detalles(<? echo $af['aid']; ?>); return false;">
                                                        <img src="<? echo $tsConfig['url']; ?>/themes/default/images/icons/details.png" title="Detalles"/>
                                                    </a>
								<a onclick="admin.afs.accion(<? echo $af['aid']; ?>); return false">
                                                                  <img src="<? echo $tsConfig['default']; ?>/images/reactivar.png" title="Activar/Desactivar Afiliado" />
                                                                </a>
                                                    <a href="#" onclick="admin.afs.borrar(<? echo $af['aid']; ?>); return false">
                                                        <img src="<? echo $tsConfig['url']; ?>/themes/default/images/icons/close.png" title="Eliminar"/>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?
                                            }                                            
                                            ?>
                                        </tbody>
                                    </table>
				<br />
                                <input type="button"  onclick="afiliado.nuevo(); return false" value="Agregar nuevo afiliado" class="mBtn btnOk" style="margin-left:280px;"/>
                                <?
                                }
                                }
				elseif ($tsAct == 'editar')
                                {
                                ?> 
					<form action="" method="post" autocomplete="off">
						<fieldset>
							<legend>Editar afiliado</legend>
								<dl>
									<dt>
                                                                        <label for="af_name">T&iacute;tulo de afiliado:</label></dt>
									<dd>
                                                                            <input type="text" id="af_name" name="af_title" value="<? echo $tsAf['a_titulo']; ?>" /></dd>
								</dl>
								<dl>
								<dt><label for="af_url">Direcci&oacute;n:</label></dt>
								<dd><input type="text" id="af_url" name="af_url" value="<? echo $tsAf['a_url']; ?>" /></dd>
								</dl>
								<dl>
								<dt><label for="af_banner">Banner:</label><br />
                                                                    <span>Imagen del afiliado:</span></dt>
								<dd><input type="text" id="af_banner" name="af_banner" value="<? echo $tsAf['a_banner']; ?>" /></dd>
								</dl>
								<dl>
								<dt><label for="af_desc">Descripci&oacute;n:</label><br />
                                                                    <span>Descripci&oacute;n de la comunidad afiliada</span></dt>
								<dd><textarea name="af_desc" id="af_desc" rows="3" cols="40"><? echo $tsAf['a_descripcion']; ?></textarea></dd>
								</dl>
								<hr />
								<p><input type="submit" name="edit" value="Guardar" class="btn_g"/>
						</fieldset>
					</form>
				<?
                                }
                                ?>
            </div>