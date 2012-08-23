                                <div class="boxy-title">
					<h3>Medallas</h3>
						</div>
						<div id="res" class="boxy-content">
                                                <?    
						if ($tsSave)
                                                {
                                                ?>
                                                <div class="mensajes ok">Tus cambios han sido guardados.</div>
                                                <?
                                                }
						if ($tsError)
                                                {
                                                ?>
                                                <div class="mensajes error">{$tsError}</div>
                                                <?                                                
                                                }
                                                ?>
                                    {if !$tsAct}
                                    {if !$tsMedals.medallas}
                                    <div class="phpostAlfa">No hay medallas.</div>
                                    <input type="button"  onclick="location.href = '<? echo $tsConfig['url']; ?>/admin/medals?act=nueva'" value="Agregar nueva medalla" class="mBtn btnOk"/>
                                    {else}
									<table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="550" align="center">
										<thead>
											<th>ID</th>
											<th>Imagen</th>
											<th>Tipo</th>
											<th>T&iacute;tulo</th>
											<th>Descripci&oacute;n</th>
											<th>Creada por</th>
											<th>Fecha</th>
											<th>Total</th>
											<th>Acciones</th>
										</thead>
										<tbody>
										{foreach from=$tsMedals.medallas item=m}
											<tr id="medal_id_<? echo $m['medal_id']; ?>">
												<td>{$m.medal_id}</td>
												<td><img src="<? echo $tsConfig['default'];?>/images/icons/med/{$m.m_image}_16.png" /></td>
												<td>{if $m.m_type == 1}Usuario{elseif $m.m_type == 2}Post{else}Foto{/if}</td>
												<td>{$m.m_title}</td>
												<td>{$m.m_description}</td>
												<td>{if $m.m_autor == 0}Sistema{else}
                                                                                                    <a href="<? echo $tsConfig['url']; ?>/perfil/{$m.user_name}" class="hovercard" uid="{$m.user_id}">{$m.user_name}</a>
                                                                                                    {/if}
                                                                                                </td>
												<td>{$m.m_date|date_format:"%d/%m/%Y"}</td>
												<td id="total_med_assig_{$m.medal_id}">{$m.m_total}</td>
												<td class="admin_actions">
												<a onclick="admin.medallas.asignar(<? echo $m['medal_id']; ?>); return false">
                                                                                                    <img src="<? echo $tsConfig['default'];?>/images/icons/plus.png" title="Asignar Medalla"/>
                                                                                                </a>
												<a href="<? echo $tsConfig['url']; ?>/admin/medals/editar/{$m.medal_id}">
                                                                                                    <img src="<? echo $tsConfig['default'];?>/images/icons/editar.png" title="Editar Medalla"/>
                                                                                                </a>
												<a onclick="admin.medallas.borrar(<? echo $m['medal_id']; ?>); return false">
                                                                                                    <img src="<? echo $tsConfig['default'];?>/images/icons/close.png" title="Borrar Medalla" />
                                                                                                </a>
												</td>
											</tr>
										{/foreach}
										</tbody>
										<tfoot>
										<td colspan="9">P&aacute;ginas: {$tsMedals.pages}</td>
										</tfoot>
									</table><hr />
									<input type="button"  onclick="location.href = '<? echo $tsConfig['url']; ?>/admin/medals?act=nueva'" value="Agregar nueva medalla" class="mBtn btnOk" style="margin-left:200px;"/>
									<input type="button"  onclick="location.href = '<? echo $tsConfig['url']; ?>/admin/medals?act=showassign'" value="Ver medallas asignadas" class="mBtn btnOk" />
                                    {/if}
									{elseif $tsAct == 'showassign'}
									<table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="550" align="center">
										<thead>
											<th>ID</th>
											<th>Medalla</th>
											<th>Tipo</th>
											<th>Asignada a</th>
											<th>Fecha</th>
											<th>IP</th>
											<th>Acciones</th>
										</thead>
										<tbody>
										{foreach from=$tsAsignaciones.asignaciones item=m}
											<tr id="assign_id_<? echo $m['id']; ?>">
												<td>{$m.id}</td>
												<td><img src="<? echo $tsConfig['default'];?>/images/icons/med/{$m.m_image}_16.png" class="qtip" title="{$m.m_title}"/></td>
												<td><? if ($m['m_type'] == 1) echo 'Usuario'; elseif ($m['m_type'] == 2) echo 'Post'; else echo 'Foto'; ?></td>
												<td>{if $m.m_type == 1}
                                                                                                    <a href="<? echo $tsConfig['url']; ?>/perfil/{$m.user_name}" class="hovercard" uid="{$m.user_id}">@{$m.user_name}</a>{elseif $m.m_type == 2}
                                                                                                    <a href="<? echo $tsConfig['url']; ?>/posts/{$m.c_seo}/{$m.post_id}/{$m.post_title|seo}.html" target="_blank">{$m.post_title}</a>
                                                                                                    {else}
                                                                                                    <a href="<? echo $tsConfig['url']; ?>/fotos/autor/{$m.foto_id}/{$m.f_title}.html" target="_blank">{$m.f_title}</a>{/if}
                                                                                                </td>
												<td>{$m.m_date|hace:true}</td>{*date_format:"%d/%m/%Y"*}
												<td>{$m.medal_ip}</td>
												<td class="admin_actions">
												<a onclick="admin.medallas.borrar_asignacion(<? echo $m['id']; ?>, <? echo $m['medal_id']; ?>); return false">
                                                                                                    <img src="<? echo $tsConfig['default'];?>/images/icons/close.png" title="Borrar Asignaci&oacute;n" />
                                                                                                </a>
												</td>
											</tr>
										{/foreach}
										</tbody>
										<tfoot>
										<td colspan="7">P&aacute;ginas: <? echo $tsAsignaciones['pages']; ?></td>
										</tfoot>
									</table>
									{elseif $tsAct == 'nueva' || $tsAct == 'editar'}
									<script type="text/javascript">
										// {literal}
										$(function(){
											$('#med_img').change(function(){
												var cssi = $("#med_img option:selected").css('background');
												$('#c_icon').css({"background" : cssi});
											});
											//
										});
										//{/literal}
									</script>
										<form action="" method="post" autocomplete="off">
										<fieldset>
											<legend>{if $tsAct == 'nueva'}Nueva{else}Editar{/if} medalla</legend>
											<dl>
												<dt><label for="med_name">T&iacute;tulo de la medalla:</label></dt>
												<dd><input type="text" id="med_name" name="med_title" value="{$tsMed.m_title}" /></dd>
											</dl>
											<dl>
												<dt><label for="ai_desc">Descripci&oacute;n:</label><br />
                                                                                                <span>Describe el motivo por el cual el contenido gana esta medalla.</span></dt>
												<dd><textarea name="med_desc" id="ai_desc" rows="3" cols="40">{$tsMed.m_description}</textarea></dd>
											</dl>
                                            <dl>
												<dt><label for="cat_img">Icono de la categor&iacute;a:</label></dt>
												<dd>
													<img src="<? echo $tsConfig['images'];?>/space.gif" style="background:url(<? echo $tsConfig['default'];?>/images/icons/med/{if $tsMed.m_image}{$tsMed.m_image}{else}{$tsIcons.0}{/if}_16.png) no-repeat left center;" width="16" height="16" id="c_icon"/>
													<select name="med_img" id="med_img" style="width:164px">
													{foreach from=$tsIcons key=i item=img}
														<option value="{$img}" style="padding:2px 20px 0; background:#FFF url(<? echo $tsConfig['url']; ?>/themes/default/images/icons/med/{$img}_16.png) no-repeat left center;" {if $tsMed.m_image == $img}selected="selected"{/if}>{$img}</option>
													{/foreach}
													</select>
												</dd>
											</dl>
											<dl>
										<dt><label for="rSpecial">Condici&oacute;n especial:</label><br />
                                                                                <span>Cuando </span>
											<label onclick="$('#ai_cond_post').slideUp(); $('#ai_cond_foto').slideUp(); $('#ai_cond_user').slideDown(); $('#ai_cond_user_rango_span').slideDown();">
                                                                                            <input name="med_type" type="radio" id="ai_type" value="1" <? if ($tsMed['m_type'] == 1) echo 'checked'; ?> class="radio"/>Usuario</label>
											<label onclick="$('#ai_cond_user').slideUp(); $('#ai_cond_user_rango').slideUp();  $('#ai_cond_foto').slideUp(); $('#ai_cond_post').slideDown();">
                                                                                            <input name="med_type" type="radio" id="ay_type" value="2" <? if ($tsMed['m_type'] == 2) echo 'checked'; ?> class="radio"/>Post</label>
											<label onclick="$('#ai_cond_user').slideUp(); $('#ai_cond_user_rango').slideUp();  $('#ai_cond_post').slideUp(); $('#ai_cond_foto').slideDown();">
                                                                                            <input name="med_type" type="radio" id="ay_type" value="3" <? if ($tsMed['m_type'] == 3) echo 'checked'; ?> class="radio"/>Foto</label>
										<span>consiga</span>
										</dt>
										<dd>						
												<input type="text" id="ai_cant" name="med_cant" style="width:7%" maxlength="5" value="<? echo $tsMed['m_cant'] ?>" <? if ($tsMed['m_cond_user'] == 9) echo 'style="display:none;"'; ?> />
												<select name="med_cond_user" id="ai_cond_user" style="width:125px;<? if ($tsMed['m_type'] != 1) echo 'display:none;'; ?>" onchange="if($('#ai_cond_user').val() == 9) $('#ai_cond_user_rango').slideDown();  else  $('#ai_cond_user_rango').slideUp();">
													<option value="1"<? if ($tsMed['m_cond_user'] == 1) echo 'selected'; ?>>Puntos</option>
													<option value="2"<? if ($tsMed['m_cond_user'] == 2) echo 'selected'; ?>>Seguidores</option>
													<option value="3"<? if ($tsMed['m_cond_user'] == 3) echo 'selected'; ?>>Siguiendo</option>
													<option value="4"<? if ($tsMed['m_cond_user'] == 4) echo 'selected'; ?>>Comentarios en posts</option>
													<option value="5"<? if ($tsMed['m_cond_user'] == 5) echo 'selected'; ?>>Comentarios en fotos</option>
													<option value="6"<? if ($tsMed['m_cond_user'] == 6) echo 'selected'; ?>>Posts</option>
													<option value="7"<? if ($tsMed['m_cond_user'] == 7) echo 'selected'; ?>>Fotos</option>
													<option value="8"<? if ($tsMed['m_cond_user'] == 8) echo 'selected'; ?>>Medallas</option>
													<option value="9"<? if ($tsMed['m_cond_user'] == 9) echo 'selected'; ?>>Rango</option>
											   </select>
											<select name="med_cond_user_rango" id="ai_cond_user_rango" <? if ($tsMed['m_type'] != 1 || $tsMed['m_cond_user'] != 9) echo 'style="display:none;"'; ?> onchange="if($('#ai_cond_user').val() != 9) $('#ai_cond_user_rango').slideUp();">
                                                                                        <?    
											foreach ($tsRangos as $r)
                                                                                        {
                                                                                        ?>    
											<option value="<? echo $r['rango_id']; ?>" style="color:#<? echo $r['r_color']; ?>" <? if ($r['rango_id'] == $tsMed['m_cond_user_rango']) echo 'selected'; ?>><? echo $r['r_name']; ?></option>
											<?                                                                                        
                                                                                        }
                                                                                        ?>
											</select>
												<select name="med_cond_post" id="ai_cond_post" style="width:125px;<? if ($tsMed['m_type'] != 2) echo 'display:none;'; ?>">
													<option value="1"<? if($tsMed['m_cond_post'] == 1) echo 'selected'; ?>>Puntos</option>
													<option value="2"<? if($tsMed['m_cond_post'] == 2) echo 'selected'; ?>>Seguidores</option>
													<option value="3"<? if($tsMed['m_cond_post'] == 3) echo 'selected'; ?>>Comentarios</option>
													<option value="4"<? if($tsMed['m_cond_post'] == 4) echo 'selected'; ?>>Favoritos</option>
													<option value="5"<? if($tsMed['m_cond_post'] == 5) echo 'selected'; ?>>Denuncias</option>
													<option value="6"<? if($tsMed['m_cond_post'] == 6) echo 'selected'; ?>>Visitas</option>
													<option value="7"<? if($tsMed['m_cond_post'] == 7) echo 'selected'; ?>>Medallas</option>
													<option value="8"<? if($tsMed['m_cond_post'] == 8) echo 'selected'; ?>>veces compartido</option>
												</select>
												<select name="med_cond_foto" id="ai_cond_foto" style="width:125px;<? if ($tsMed['m_type'] != 3) echo 'display:none;'; ?>">
													<option value="1"<? if ($tsMed['m_cond_foto'] == 1) echo 'selected'; ?>>Puntos positivos</option>
													<option value="2"<? if ($tsMed['m_cond_foto'] == 2) echo 'selected'; ?>>Puntos negativos</option>
													<option value="3"<? if ($tsMed['m_cond_foto'] == 3) echo 'selected'; ?>>Comentarios</option>
													<option value="4"<? if ($tsMed['m_cond_foto'] == 4) echo 'selected'; ?>>Visitas</option>
													<option value="5"<? if ($tsMed['m_cond_foto'] == 5) echo 'selected'; ?>>Medallas</option>
												</select>
										</dd>
									</dl>	
											<hr />
										 <?
                                                                                 if ($tsAct == 'nueva')
                                                                                 {
                                                                                 ?>
                                                                                 <p>
                                                                                     <input type="submit" name="save" value="Crear medalla" class="btn_g"/></p>
                                                                                 <?
                                                                                 }
                                                                                 else
                                                                                 {    
                                                                                 ?>    
                                                                                 <p>
                                                                                     <input type="submit" name="edit" value="Guardar" class="btn_g"/>
                                                                                 <?                                                                                 
                                                                                 }
                                                                                 ?>
										</fieldset>
										</form>
									{/if}
								</div>