                                <div class="boxy-title">
                                    <h3>Administrar Lista Negra</h3>
                                </div>
                                <div id="res" class="boxy-content">
                                <?    
                                if ($tsSave)
                                {
                                ?>
                                    <div style="display: block;" class="mensajes ok">Tus cambios han sido guardados.</div>
                                <?
                                }
                                
                                        if ($tsError)
                                        { 
                                 ?>       
                                            <div class="mensajes error"><? echo $tsError; ?></div>
                                        <?                                        
                                        }
                                        
                            if (!$tsAct)
                            {
				if (!$tsBlackList['data'])
                                {
                                ?>
                                <div class="phpostAlfa">No hay nada en tu lista negra.</div>
                                <input type="button"  onclick="location.href = '<? echo $tsConfig['url']; ?>/admin/blacklist?act=nuevo'" value="Agregar nuevo bloqueo" class="mBtn btnCancel"/>
                                <?
                                }
                                else
                                {
                                ?>
                                <table cellpadding="0" cellspacing="0" border="0" width="100%" align="center" class="admin_table">
                                    	<thead>
                                            <th>ID</th>
                                            <th>Tipo</th>
                                            <th>Texto</th>
                                            <th>Raz&oacute;n</th>
                                            <th>Autor</th>
                                            <th>Fecha</th>
                                            <th>Acciones</th>
                                        </thead>
                                        <tbody>
                                            <?
                                            foreach ($tsBlackList['data'] as $b)
                                            {
                                            ?>
                                        	<tr id="block_<? echo $b['id']; ?>">
                                                <td><? echo $b['id']; ?></td>
                                                <td><? if ($b['type'] == 1) echo 'IP'; elseif ($b['type'] == 2) echo 'Email'; elseif ($b['type'] == 3) echo 'Proveedor'; elseif ($b['type'] == 4) echo 'Nombre'; else echo 'Indefinido'; ?></td>
                                                <td><? echo $b['value']; ?></td>
                                                <td><? echo $b['reason']; ?></td>
                                                <td><a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $b['user_name']; ?>" class="hovercard" uid="{$b.user_id}"><? echo $b['user_name']; ?></a></td>
                                                <td><? echo modifier_hace($b['date']);?></td>
                                                    <td class="admin_actions">
                                                    <a href="<? echo $tsConfig['url']; ?>/admin/blacklist?act=editar&id=<? echo $b['id']; ?>">
                                                        <img src="<? echo $tsConfig['default']; ?>/images/icons/editar.png" title="Editar" /></a>
                                                    <a href="#" onclick="admin.blacklist.borrar(<? echo $b['id']; ?>); return false">
                                                        <img src="<? echo $tsConfig['url']; ?>/themes/default/images/icons/close.png" title="Eliminar"/></a>
                                                </td>
                                            </tr>
                                            <?
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
					<td colspan="7">P&aacute;ginas: <? echo $tsBlackList['pages']; ?></td>
					</tfoot>
                                    </table>
				<br />
                                <input type="button"  onclick="location.href = '<? echo $tsConfig['url']; ?>/admin/blacklist?act=nuevo'" value="Agregar nuevo bloqueo" class="mBtn btnCancel" style="margin-left:280px;"/>
                                <?
                                }
                                }
				elseif ($tsAct == 'editar' || $tsAct == 'nuevo')
                                {
                                ?>    
				<form action="" method="post" autocomplete="off">
                                    <fieldset>
					<legend><? if ($tsAct == 'editar') echo 'Editar'; else echo 'Agregar';?> bloqueo</legend>
                                            <span>Para bloquear correos masivos como ejemplo@yopmail.com, seleccione "proveedor de correo" e introduzca yopmail.com en valor.</span>
                                                    <dl>
							<dt><label for="b_type">Tipo:</label></dt>
                                                            <dd>
                                                            <select name="type" id="b_type" style="width:164px">
                                                            <option value="1" <? if ($tsBL['type'] == 1) echo 'selected'; ?>>IP</option>
                                                            <option value="2" <? if ($tsBL['type'] == 2) echo 'selected'; ?>>Email concreto</option>
                                                            <option value="3" <? if ($tsBL['type'] == 3) echo 'selected'; ?>>Proveedor de correo</option>
                                                            <option value="4" <? if ($tsBL['type'] == 4) echo 'selected'; ?>>Nombre</option>
                                                            </select>
                                                            </dd>
								</dl>
                                                                    <dl>
									<dt><label for="b_value">Valor:</label></dt>
									<dd><input type="text" id="b_value" name="value" value="<? echo $tsBL['value']; ?>" /></dd>
									</dl>
                                            <?
                                            if ($tsAct == 'nuevo')
                                            {
                                            ?>
									<dl>
									<dt><label for="b_reason">Raz&oacute;n:</label><br />
                                                                        <span>Indica el motivo por el cual quiere agregarlo a la lista negra.</span></dt>
									<dd>
                                                                        <textarea name="reason" id="b_reason" rows="3" cols="40"><? echo $tsBL['reason']; ?></textarea>
                                                                        </dd>
                                                                        </dl>
                                            <?                                            
                                            }
                                            ?>
							<hr />
                                                    <p>
                                                 <input type="submit" name="<? if ($tsAct == 'editar') echo 'edit'; else echo 'new';?>" value="<? if ($tsAct == 'editar') echo 'Guardar'; else echo 'Agregar'; ?>" class="btn_g"/>
					</fieldset>
				</form>
			<?                        
                        }                        
                        ?>
</div>