                                <div class="boxy-title">
								<h3>Administrar Posts</h3>
								</div>
								<div id="res" class="boxy-content" style="position:relative">
                                                                <?    
								if ($tsAct == '')
                                                                {    
								if (!$tsAdminPosts['data'])
                                                                {
                                                                ?>
								<div class="phpostAlfa">No hay posts.</div>
                                                                <?
                                                                }
								else
                                                                {    
                                                                ?>    
								<table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
									<thead>
										<th>ID</th>
										<th>T&iacute;tulo</th>
										<th>Autor</th>
										<th>Fecha</th>
										<th>
                                                                                    <a class="qtip" title="Ordenar por estado ascendente" href="<? echo $tsConfig['url']; ?>/admin/posts?o=e&m=a"><</a> Estado 
                                                                                    <a class="qtip" title="Ordenar por estado descendente" href="<? echo $tsConfig['url']; ?>/admin/posts?o=e&m=d">></a></th>
										<th id="moreinfo">
                                                                                    <a class="qtip" title="Ordenar por IP ascendente" href="<? echo $tsConfig['url']; ?>/admin/posts?o=ip&m=a"><</a> IP 
                                                                                    <a class="qtip" title="Ordenar por IP descendente" href="<? echo $tsConfig['url']; ?>/admin/posts?o=ip&m=d">></a></th>
										<th>Acciones 
                                                                                    <a id="actionsee" onclick="$('#actionsee').slideUp( 120, 'easeInOutElastic'); $('.right').fadeOut('slow').css('width', '920px').slideDown( 1700, 'easeInOutElastic'); $('.left').slideUp( 1500, 'easeInOutElastic'); $('#moreinfo').slideDown('fast'); ">
                                                                                        <img src="<? echo $tsConfig['default']; ?>/images/icons/details.png" width="14px" height="14px" title="M&aacute;s informaci&oacute;n" /></a>
                                                                                </th>
									</thead>
									<tbody>
										<?                                                                                
                                                                                foreach  ($tsAdminPosts['data'] as $p)
                                                                                {
                                                                                ?>
										<tr id="post_<? echo $p['post_id']; ?>">
											<td><? echo $p['post_id']; ?></td>
											<td>
                                                                                            <a href="<? echo $tsConfig['url']; ?>/posts/<? echo $p['c_seo'].'/'.$p['post_id'].'/'.string_seo($p['post_title']);?>.html" target="_blank"><? echo string_truncate($p['post_title'],30); ?></a></td>
											<td>
                                                                                            <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $p['user_name']; ?>" class="hovercard" uid="<? echo $p['user_id']; ?>"><? echo $p['user_name']; ?></a></td>
                                                                                        <td><? echo modifier_hace($p['post_date'],true); ?></td>
											<td id="status_post_<? echo $p['post_id']; ?>">
                                                                                            <?
                                                                                            if ($p['post_status'] == 3)
                                                                                            {
                                                                                            ?>
                                                                                            <font color="grey">Oculto</font>
                                                                                            <?
                                                                                            }
                                                                                            elseif($p['post_status'] == 2)
                                                                                            {
                                                                                            ?>
                                                                                            <font color="red">Eliminado</font>
                                                                                            <?
                                                                                            }
                                                                                            elseif ($p['post_status'] == 1)
                                                                                            {
                                                                                            ?>        
                                                                                            <font color="purple">En revisi&oacute;n</font>
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
   										    <td id="moreinfo1_2">
                                                                                        <a href="<? echo $tsConfig['url']; ?>/moderacion/buscador/1/1/<? echo $p['post_id']; ?>" class="geoip" target="_blank"><? echo $p['post_id']; ?></a>
                                                                                    </td>
											<td class="admin_actions">
												<a href="<? echo $tsConfig['url']; ?>/posts/editar/<? echo $p['post_id']; ?>">
                                                                                                    <img src="<? echo $tsConfig['default']; ?>/images/icons/editar.png" title="Editar Post" /></a>
                                                                                                <?
												if ($p['post_status'] == 2)
                                                                                                {
                                                                                                ?>
													<a href="#" onclick="admin.posts.borrar(<? echo $p['post_id']; ?>); return false">
                                                                                                            <img src="<? echo $tsConfig['default']; ?>/images/icons/close.png" title="Borrar Post permanentemente" />
                                                                                                        </a>
                                                                                                <?
                                                                                                }
												else
                                                                                                {    
                                                                                                ?>    
													<a href="#" onclick="mod.posts.borrar(<? echo $p['post_id']; ?>, 'posts', null); return false;">
                                                                                                            <img src="<? echo $tsConfig['default']; ?>/images/icons/close.png" title="Borrar Post" /></a>
                                                                                               <?
                                                                                                }
                                                                                               ?>
											</td>
										</tr>
                                                                                <?
										}                                                                                
                                                                                ?>
									</tbody>
									<tfoot>
										<td colspan="7">P&aacute;ginas: <? echo $tsAdminPosts['pages']; ?></td>
									</tfoot>
								</table>
                                                                <?
                                                                }
                                                                }
                                                                ?>
                                </div>