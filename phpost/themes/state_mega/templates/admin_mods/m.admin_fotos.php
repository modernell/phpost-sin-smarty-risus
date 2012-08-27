                                <div class="boxy-title">
								   <h3>Administrar Fotos</h3>
								</div>
								<div id="res" class="boxy-content" style="position:relative">
								{if $tsAct == ''}
								{if !$tsAdminFotos.data}
								<div class="phpostAlfa">No hay fotos.</div>
								{else}
								<table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
									<thead>
										<th>ID</th>
										<th>T&iacute;tulo</th>
										<th>Autor</th>
										<th>Fecha</th>
										<th>IP</th>
										<th>Comentarios</th>
										<th>Estado</th>
										<th>Acciones</th>
									</thead>
									<tbody>
                                                                            <?
										foreach ($tsAdminFotos['data'] as $f)
                                                                                {
                                                                             ?>   
										<tr id="foto_<? echo $f['foto_id']; ?>">
											<td><? echo $f['foto_id']; ?></td>
											<td>
                                                                                            <a href="<? echo $tsConfig['url']; ?>/fotos/<? echo $f['user_name']; ?>/<? echo $f['foto_id']; ?>/<? echo string_seo($f['f_title']);?>.html" target="_blank"><? echo modifier_hace($f['f_title'],30); ?></a>
                                                                                        </td>
											<td>
                                                                                            <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $f['user_name']; ?>" class="hovercard" uid="<? echo $f['user_id']; ?>"><? echo $f['user_name']; ?></a>
                                                                                        </td>
                                                                                        <td><? echo modifier_hace($f['f_date'],true); ?></td>                
   										    <td>
                                                                                        <a href="<? echo $tsConfig['url']; ?>/moderacion/buscador/1/1/<? echo $f['f_ip']; ?>" class="geoip" target="_blank"><? echo $f['f_ip']; ?></a>
                                                                                    </td>
										    <td id="comments_foto_<? echo $f['foto_id']; ?>">
                                                                                        <?
                                                                                        if ($f['f_closed'] == 1)
                                                                                        {
                                                                                        ?>
                                                                                            <font color="red">Cerrados</font>
                                                                                        <?
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                        ?>
                                                                                            <font color="green">Abiertos</font>
                                                                                        <?
                                                                                        }
                                                                                        ?>
                                                                                    </td>
											<td id="status_foto_<? echo $f['foto_id']; ?>">
                                                                                            {if $f.f_status == 1}
                                                                                            <font color="purple">Oculta</font>
                                                                                            {elseif $f.f_status == 0}<font color="green">Visible</font>{else}<font color="red">Eliminada</font>{/if}</td>
											<td class="admin_actions">
                                                                                            <a href="<? echo $tsConfig['url']; ?>/fotos/editar.php?id=<? echo $f['foto_id']; ?>" target="_blank">
                                                                                               <img src="<? echo $tsConfig['default']; ?>/images/icons/editar.png" title="Editar Foto" /></a>
                                                                                            <a <? if ($f['f_status'] != 2) echo 'onclick="admin.fotos.setOpenClosed('.$f['foto_id'].'); return false;"'; ?>>
                                                                                                    <img src="<? echo $tsConfig['default']; ?>/images/icons/comment.png" title="<? if ($f['f_status'] == 2) echo 'No disponible'; else echo 'Abrir/Cerrar Comentarios' ; ?>" /></a>
												<a <? if ($f['f_status'] != 2) echo 'onclick="admin.fotos.setShowHide('.$f['foto_id'].'); return false;"'; ?>>
                                                                                                    <img src="<? echo $tsConfig['default']; ?>/images/reactivar.png" title="<? if ($f['f_status'] == 2) echo 'No disponible'; else echo 'Mostrar/Ocultar Foto'; ?>" /></a>
											   	<a href="#" onclick="admin.fotos.borrar(<? echo $f['foto_id']; ?>); return false;">
                                                                                                    <img src="<? echo $tsConfig['default']; ?>/images/icons/close.png" title="Borrar Foto" /></a>
											</td>
										</tr>
                                                                                <?
										}
                                                                                ?>
									</tbody>
									<tfoot>
										<td colspan="9">P&aacute;ginas: <? echo $tsAdminFotos['pages']; ?></td>
									</tfoot>
								</table>
								{/if}
								{/if}
                                </div>