                                <div class="boxy-title">
						<h3>Administrar Cambios de Nicks</h3>
								</div>
								<div id="res" class="boxy-content" style="position:relative">
                                                               <?     
								if (!$tsAct)
                                                                {
								if (!$tsAdminNicks['data'])
                                                                {
                                                                ?>
                                                                    <div class="phpostAlfa">No hay cambios esperando aprobaci&oacute;n</div>
                                                                <?
                                                                }   
								else
                                                                {
                                                                ?>    
								<table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
									<thead>
										<th>Nick actual</th>
										<th>Nuevo nick</th>
										<th>Fecha</th>
										<th>IP</th>
										<th>Acciones</th>
									</thead>
									<tbody>
                                                                            <?
										foreach ($tsAdminNicks['data'] as $n)
                                                                                {
                                                                                ?>
										<tr id="nick_<? echo $n['id']; ?>">
											<td align="left"><a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $n['user_name']; ?>" class="hovercard" uid="{$n.user_id}"><? echo $n['user_name']; ?></a></td>
											<td><? echo $n['name_2']; ?></td>
											<td>{$n.time|hace:true}</td>
											<td><a href="http://www.geoiptool.com/?IP=<? echo $n['ip']; ?>" class="geoip" target="_blank"><? echo $n['ip']; ?></a></td>
											<td class="admin_actions">
												<a href="#" onclick="admin.nicks.accion('<? echo $n[id]; ?>', 'aprobar'); return false">
                                                                                                    <img src="<? echo $tsConfig['url']; ?>/themes/default/images/icons/power_on.png" title="Aprobar"/>
                                                                                                </a>
                                                                                                <a href="#" onclick="admin.nicks.accion('<? echo $n[id]; ?>', 'denegar'); return false">
                                                                                                    <img src="<? echo $tsConfig['url']; ?>/themes/default/images/icons/power_off.png" title="Denegar"/>
                                                                                                </a>
											</td>
										</tr>
                                                                                <?
										}
                                                                                ?>
									</tbody>
									<tfoot>
										<td colspan="7">P&aacute;ginas: <? echo $tsAdminNicks['pages']; ?></td>
									</tfoot>
								</table>
                                                                <?    
								}
                                                                ?>
								<input type="button"  onclick="location.href = '<? echo $tsConfig[url]; ?>/admin/nicks?act=realizados'" value="Ver decisiones tomadas" class="mBtn btnYellow" />
								<?
                                                                }
                                                                elseif ($tsAct == 'realizados')
                                                                {
                                                                if (!$tsAdminNicks['data'])
                                                                {
                                                                ?>
                                                                    <div class="phpostAlfa">No hay cambios hasta ahora</div>
                                                                <?
                                                                }
                                                                else
                                                                {    
								?>
                                                                    <table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
									<thead>
										<th>Nick antes</th>
										<th>Nick despu&eacute;s</th>
										<th>Fecha</th>
										<th>Estado</th>
										<th>IP</th>
									</thead>
									<tbody>
                                                                               <? 
										foreach ($tsAdminNicks['data'] as $n)
                                                                                {
                                                                                ?>
										<tr id="nick_<? echo $n['id']; ?>">
											<td><? echo $n['name_1']; ?></td>
											<td><?  echo $n['name_2']; ?></td>
											<td><? echo modifier_hace($n['time']); ?></td>
											<td>
                                                                                            <?
                                                                                            if ($n['estado'] == 1)
                                                                                            {
                                                                                            ?>       
                                                                                                <font color="green">Aprobado</font>
                                                                                            <?    
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                            ?>  
                                                                                                <font color="red">Cancelado</font>
                                                                                            <?    
                                                                                            }
                                                                                            ?>
                                                                                        </td>
											<td>
                                                                                            <a href="http://www.geoiptool.com/?IP=<? echo $n['ip']; ?>" class="geoip" target="_blank"><? echo $n['ip'];?></a></td>
										</tr>
                                                                                <?
										}
                                                                                ?>
									</tbody>
									<tfoot>
										<td colspan="7">P&aacute;ginas: <? echo $tsAdminNicks['pages'];?></td>
									</tfoot>
								</table>
                                                                <?
                                                                }
								}                                                                
                                                                ?>
								</div>