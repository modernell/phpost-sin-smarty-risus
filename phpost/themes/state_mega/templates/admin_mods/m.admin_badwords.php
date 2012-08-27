                                <div class="boxy-title">
                                    <h3>Censurar palabras</h3>
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
                                        <div class="mensajes error"><? echo $tsError;  ?></div>
                                    <?    
                                    }
                                
                                if (!$tsAct)
                                {    
                                if (!$tsBadWords['data'])
                                {
                                ?>    
                                <div class="phpostAlfa">No hay filtros de palabras</div>
                                <?
                                }
                                else
                                {
                                ?>    
                                <table cellpadding="0" cellspacing="0" border="0" width="100%" align="center" class="admin_table">
                                    	<thead>
                                            <th>ID</th>
                                            <th>M&eacute;todo</th>
                                            <th>Tipo</th>
                                            <th>Antes</th>
                                            <th>Despu&eacute;s</th>
                                            <th>Raz&oacute;n</th>
                                            <th>Autor</th>
                                            <th>Fecha</th>
                                            <th>Acciones</th>
                                        </thead>
                                        <tbody>
                                            <?
                                            foreach ($tsBadWords['data'] as $b)
                                            {
//                                          ?>  
                                        	<tr id="wid_<? echo $b['wid']; ?>">
                                                <td><? echo $b['wid']; ?></td>
                                                 <td><? if ($b['method'] == 1) echo 'Exacto'; else echo 'Parcial'; ?></td>
                                                <td><? if ($b['type'] == 1) echo 'Smiley'; else echo 'Texto'; ?></td>
                                                <td><? echo $b['word']; ?></td>
                                                <td>
                                                    <?
                                                    if ($b['type'] == 1)
                                                    {
                                                    ?>
                                                        <img src="<? echo $b['swop']; ?>" style="max-width:32px; max-height:32px;"/>
                                                    <?
                                                    }
                                                    else
                                                     echo $b['swop'];
                                                    ?>
                                                </td>
                                                <td><? echo $b['reason']; ?></td>
                                                <td>
                                                    <a href="<? echo $tsConfig['url'];?>/perfil/<? echo $b['user_name']; ?>" class="hovercard" uid="<? echo $b['user_id']; ?>"><? echo $b['user_name']; ?></a>
                                                </td>
                                                <td><? echo modifier_hace($b['date']);?> hace</td>
						<td class="admin_actions">
                                                    <a href="<? echo $tsConfig['url'];?>/admin/badwords?act=editar&id=<? echo $b['wid']; ?>">
                                                        <img src="<? echo $tsConfig['default'];?>/images/icons/editar.png" title="Editar" />
                                                    </a>
                                                    <a href="#" onclick="admin.badwords.borrar(<? echo $b['wid']; ?>); return false">
                                                        <img src="<? echo $tsConfig['url'];?>/themes/default/images/icons/close.png" title="Eliminar"/>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
					<td colspan="9">P&aacute;ginas: <? echo $tsBadWords['pages']; ?></td>
					</tfoot>
                                    </table>
                                    <?                                    
                                    }
                                    ?>
				<br />
                                <input type="button"  onclick="location.href = '<? echo $tsConfig['url'];?>/admin/badwords?act=nuevo'" value="Agregar nuevo filtro" class="mBtn btnCancel" style="margin-left:280px;"/>
                                <?
                                }
				elseif ($tsAct == 'editar' || $tsAct == 'nuevo')
                                {    
                                ?>    
				<form action="" method="post" autocomplete="off">
                                    <fieldset>
					<legend><? if ($tsAct == 'editar') echo 'Editar'; else echo 'Agregar'; ?> filtro de palabra</legend>
                                            <span>
                                                El m&eacute;todo exacto filtra s&oacute;lo palabras completas, mientras que el parcial filtra todas las coincidencias, 
                                                aunque forme parte de una palabra. Si opta por usar un smiley, introduzca el enlace directo hacia la imagen.
                                            </span>
						<dl>
						<dt><label for="bw_before">Antes:</label></dt>
						<dd><input type="text" id="bw_before" name="before" value="<? echo $tsBW['word']; ?>" /></dd>
						</dl>
                                            <dl>
						<dt><label for="bw_after">Despu&eacute;s:</label></dt>
						<dd><input type="text" id="bw_after" name="after" value="<? echo $tsBW['swop']; ?>" /></dd>
						</dl>
                                            <dl>
						<dl>
                                                    <dt><label for="bw_method">M&eacute;todo:</label></dt>
                                                        <dd>
                                                            <label>
                                                                <input name="method" type="radio" id="bw_method" value="0" <? if ($tsBW['method'] == 0) echo 'checked="checked"'; ?> class="radio"/> Parcial
                                                            </label>
                                                            <label>
                                                                <input name="method" type="radio" id="bw_method" value="1" <? if ($tsBW['method'] == 1) echo 'checked="checked"'; ?> class="radio"/> Exacto
                                                            </label>
                                                        </dd>
                                                </dl>
						</dl>
                                                <dl>
						<dl>
                                                    <dt><label for="bw_type">Tipo:</label></dt>
                                                        <dd>
                                                            <label>
                                                                <input name="type" type="radio" id="bw_type" value="0" <? if ($tsBW['type'] == 0) echo 'checked'; ?> class="radio"/> Texto</label>
                                                            <label>
                                                                <input name="type" type="radio" id="bw_type" value="1" <? if ($tsBW['type'] == 1) echo 'checked'; ?> class="radio"/> Smiley</label>
                                                        </dd>
                                                </dl>
						</dl>
                                            <?                                        
                                            if ($tsAct == 'nuevo')
                                            {   
                                                ?>
						<dl>
						<dt><label for="bw_reason">Raz&oacute;n:</label><br /><span>Indica el motivo por el cual quiere agregar este filtro.</span></dt>
						<dd><textarea name="reason" id="bw_reason" rows="3" cols="40"><? echo $tsBW['reason']; ?></textarea></dd>
						</dl>
                                            <?
                                            }
                                            ?>
						<hr />
						<p><input type="submit" name="<? if ($tsAct == 'editar') echo 'edit'; else echo 'new'; ?>" value="<? if ($tsAct == 'editar') echo 'Guardar'; else echo 'Agregar'; ?>" class="btn_g"/>
			</fieldset>
                </form>
        <?                        
        }                        
	?>
</div>