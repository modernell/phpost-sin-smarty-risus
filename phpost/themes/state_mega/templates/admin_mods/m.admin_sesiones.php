                                <div class="boxy-title">
						<h3>Administrar Sesiones</h3>
								</div>
								<div id="res" class="boxy-content" style="position:relative">
                                                               <?     
								if (!$tsAct)
                                                                {
								if (!$tsAdminSessions['data'])
                                                                {
                                                                ?>
								<div class="phpostAlfa">No hay usuarios o visitantes conectados</div>
                                                                <?
                                                                }
								else
                                                                {
                                                                ?>
								<table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
									<thead>
										<th>ID</th>
										<th>Usuario</th>
										<th>IP</th>
										<th>Fecha</th>
										<th>Auto login</th>
										<th>Acciones</th>
									</thead>
									<tbody>
										<? 
                                                                                foreach ($tsAdminSessions['data'] as $s)
                                                                                {
                                                                                ?>
										<tr id="sesion_<? echo $s['session_id']; ?>">
											<td><? echo $s['session_id']; ?></td>
											<td align="left">
                                                                                            <?
                                                                                            if ($s['user_name'])
                                                                                            {
                                                                                            ?>
                                                                                            <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $s['user_name']; ?>" class="hovercard" uid="<? echo $s['user_id']; ?>">
                                                                                                <? echo $s['user_name']; ?></a>
                                                                                            <?
                                                                                            }
                                                                                            else
                                                                                            {    
                                                                                            ?>    
                                                                                            Visitante
                                                                                            <?                                                                                            
                                                                                            }
                                                                                            ?>
                                                                                        </td>
											<td>
                                                                                            <a href="<? echo $tsConfig['url']; ?>/moderacion/buscador/1/1/<? echo $s['session_ip']; ?>" class="geoip" target="_blank"><? echo $s['session_ip']; ?> </a></td>
											<td><? echo modifier_hace($s['session_time']); ?></td>
											<td>
                                                                                            <?
                                                                                            if ($s['session_autologin'] == 0)
                                                                                            {
                                                                                            ?>
                                                                                            <font color="red">NO</font>
                                                                                            <?
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                            ?>    
                                                                                            <font color="green">S&Iacute;</font>
                                                                                            <?
                                                                                            }
                                                                                            ?>
                                                                                        </td>
											<td class="admin_actions">
                                                                                            <a href="#" onclick="admin.sesiones.borrar('<? echo $s[session_id]; ?>'); return false">
                                                                                            <img src="<? echo $tsConfig['url']; ?>/themes/default/images/icons/power_off.png" title="Cerrar sesi&oacute;n de <? if ($s['user_name']) echo $s['user_name']; else 'este visitante'; ?>"/></a>
											</td>
										</tr>
                                                                                <?
										}
                                                                                ?>
									</tbody>
									<tfoot>
										<td colspan="7">P&aacute;ginas: <? echo $tsAdminSessions['pages']; ?></td>
									</tfoot>
								</table>
                                                               <? 
								}
								}
                                                               ?> 
								</div>