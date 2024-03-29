								<script type="text/javascript">
								// {literal}
									$(function(){
										$('#cat_img').change(function(){
											var cssi = $("#cat_img option:selected").css('background');
											$('#c_icon').css({"background" : cssi});
										});
									});
								// {/literal}
								</script>
                                <div class="boxy-title">
                                    <h3>Administrar Rangos de Usuarios</h3>
                                </div>
                                <div id="res" class="boxy-content" style="position:relative">
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
                                    <div class="mensajes error"><? echo $tsError; ?></div>
                                <?
                                }
                                
                                if ($tsAct == '')
                                {
                                ?>
                                <div style="width:350px; margin:0 auto 1em">
                                <h3 style="margin:0">Rangos Especiales</h3><hr style="margin:4px 0" />
                                <table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="400" align="center">
                                	<thead>
                                    	<th>Rango</th>
                                        <th>Usuarios</th>
                                        <th>Puntos para dar</th>
					<th>Puntos por post</th>
                                        <th>Imagen</th>
                                        <th>Acciones</th>
                                    </thead>
                                    <tbody>
                                    <?    
                                    foreach ($tsRangos['regular'] as $r)
                                    {
                                    ?>
                                    	<tr>
                                           <td><a href="?act=list&rid=<? echo $r['id']; ?>&t=r" style="color:#<? echo $r['color']; ?>"><? echo $r['name']; ?></a></td>
                                            <td><? echo $r['num_members']; ?></td>
                                            <td><? echo $r['user_puntos']; ?></td>
                                            <td><? echo $r['max_points']; ?></td>
                                            <td><img src="<? echo $tsConfig['url']; ?>/themes/default/images/icons/ran/<? echo $r['imagen']; ?>" /></td>
                                            <td class="admin_actions">
                                            <a href="?act=editar&rid=<? echo $r['id'];?>&t=s">
                                                <img src="<? echo $tsConfig['url']; ?>/themes/default/images/icons/editar.png"  title="Editar Rango"/></a>
                                            <?    
                                            if ($r['id'] > 3)
                                            {
                                            ?>        
                                                <a href="?act=borrar&rid=<?=$r['id']; ?>" >
                                                    <img src="<? echo $tsConfig['url']; ?>/themes/default/images/icons/close.png" title="Borrar Rango"/></a>
                                            <?                                            
                                            }
                                            if ($tsConfig['c_reg_rango'] == $r['id'])
                                            {
                                            ?>        
                                                <img src="<? echo $tsConfig['url']; ?>/themes/default/images/icons/yes.png" title="Rango Predeterminado al registro"/>
                                            <?
                                            }
                                            else
                                            {
                                            ?>    
                                                <img id="f_2" onclick="location.href = '<? echo $tsConfig[url]; ?>/admin/rangos/?act=setdefault&rid=<? echo $r[id]; ?>'; $('#f_2').style.cursor=wait"  style="cursor:pointer;" src="<? echo $tsConfig['url']; ?>/themes/default/images/icons/reboot.png" title="Establecer Predeterminado" />
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
                                    	<td colspan="5" style="text-align:right"><a href="?act=nuevo&t=s">Agregar nuevo rango &raquo;</a></td>
                                    </tfoot>
                                </table>
                                </div>
                                <div style="width:550px; margin:0 auto">
                                <h3 style="margin:0">Rangos basados en el conteo de puntos y posts</h3><hr style="margin:4px 0" />
                                <table cellpadding="0" cellspacing="1s" border="0" class="admin_table" width="550" align="center">
                                	<thead>
                                    	<th width="150">Rango</th>
                                        <th>Usuarios</th>
                                        <th>Tipo</th>
                                        <th>Cantidad requerida</th>
                                        <th>Puntos para dar</th>
					<th>Puntos por post</th>
                                        <th>Imagen</th>
                                        <th>Acciones</th>
                                    </thead>
                                    <tbody>
                                    <?    
                                    foreach ($tsRangos['post'] as $r)
                                    {
                                    ?>        
                                    	<tr>
                                        	<td><a href="?act=list&rid=<? echo $r['id']; ?>&t=p" style="color:#<? echo $r['color']; ?>"><? echo $r['name']; ?></a></td>
                                            <td><? echo $r['num_members']; ?></td>
                                            <td>
                                              <?  
                                                if ($r['type'] == 1)
                                                echo 'Puntos';
                                                elseif ($r['type'] == 2)
                                                echo 'Posts';
                                                elseif ($r['type'] == 3)                                                        
                                                echo 'Fotos';
                                                elseif ($r['type'] == 4)
                                                echo 'Comentarios';                                                
                                               ?> 
                                            </td>
                                            <td><? echo $r['cant']; ?></td>
                                            <td><? echo $r['user_puntos']; ?></td>
                                            <td><? echo $r['max_points']; ?></td>
                                            <td><img src="<? echo $tsConfig['url'];?>/themes/default/images/icons/ran/<? echo $r['imagen']; ?>" /></td>
                                            <td class="admin_actions">
                                            <a href="?act=editar&rid=<? echo $r['id']; ?>&t=p">
                                                <img src="<? echo $tsConfig['url'];?>/themes/default/images/icons/editar.png" title="Editar Rango"/></a>
                                            <?    
                                            if ($r['id'] > 3)
                                            {
                                            ?>        
                                            <a href="?act=borrar&rid=<? echo $r['id']; ?>">
                                                <img src="<? echo $tsConfig['url'];?>/themes/default/images/icons/close.png" title="Borrar Rango" /></a>
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
                                    	<td colspan="7" style="text-align:right"><a href="?act=nuevo">Agregar nuevo rango &raquo;</a></td>
                                    </tfoot>
                                </table>
                                </div>
                                <?
                                }
                                elseif ($tsAct == 'list')
                                {  
                                    
                                if (!$tsMembers['data'])
                                {
                                ?>
                                <div class="mensajes error">Aun no hay usuarios en este rango.</div>
                                <?
                                }
                                else
                                {
                                ?>    
                                <table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="550" align="center">
                                	<thead>
                                    	<th>Usuario</th>
                                        <th>Email</th>
                                        <th>&Uacute;ltima vez activo</th>
                                        <th>Fecha de registro</th>
                                        <th>Acciones</th>
                                    </thead>
                                    <tbody>
                                        <?
                                    	foreach ($tsMembers['data'] as $m)
                                        {
                                        ?>        
                                        <tr>
                                            <td align="left">
                                                <a href="<? echo $tsConfig['url'];?>/perfil/<? echo $m['user_name']; ?>" class="hovercard" uid="<? echo $m['user_id']; ?>" style="color:#<? echo $m['r_color']; ?>;"><? echo $m['user_name']; ?></a></td>
                                            <td><? echo $m['user_email']; ?></td>
                                            <td><? echo modifier_hace($m['user_lastlogin']); ?></td>
                                            <td><? echo modifier_hace($m['user_registro']); ?>|date_format:"%d/%m/%Y" fix this}</td>
                                            <td class="admin_actions">
                                                <a href="<? echo $tsConfig['url'];?>/admin/users?act=show&uid=<? echo $m['user_id'];?>&t=7">
                                                    <img src="<? echo $tsConfig['url'];?>/themes/default/images/icons/editar.png" title="Editar rango" />
                                                </a>
                                            </td>
                                        </tr>
                                        <?                                        
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                    	<td colspan="6">P&aacute;ginas: <? echo $tsMembers['pages']; ?></td>
                                    </tfoot>
                                </table>
                                <?
                                }
                                }
                                elseif ($tsAct == 'nuevo' || $tsAct == 'editar')
                                {
                                ?>
                                <script type="text/javascript" src="<? echo $tsConfig['js'];?>/jquery.color.js"></script>

                                <style>
				#colores {width:200px; position:absolute; right:50px; padding:15px 8px 10px 10px; border:1px solid #ccc; background-color:#fafafa;}
				#cerrar {position:absolute; right:5px; top:3px; z-index:2}
				#colores .title {position:absolute; left:10px; top:0px; z-index:2; font-weight:bold}
				#colores span {display:block; float:left; cursor:pointer; border:1px solid #FFF; border-width:1px 1px 0 0}
                                /* ADMIN NEW LABEL */
                                fieldset tr.newLabel td{text-align:left;}
                                fieldset tr.newLabel label{
                                    float:none;
                                    width:80px;
                                    padding:0;
                                    text-align:center;
                                    cursor:pointer;
                                }
                                tr.newLabel label.yes:hover {
                                    background-color:#86F786;
                                }
                                tr.newLabel label.no:hover {
                                    background-color:#EFB0B2;
                                }
				</style>

                                <form action="" method="post">
                                <fieldset>
                                    <div id="colores"><span class="title">Colores</span><a href="#" id="cerrar"><img src="<? echo $tsConfig['images']; ?>/borrar.png" /></a></div>
                                    <legend>Nuevo Rango</legend>
				
				<input type="button" id="b1" onclick="$('#tab1').fadeIn('slow'); $('#tab2').hide('slow'); $(this).css('border','1px solid #4D90FE'); $('#b2').css('border','0px');" value="B&aacute;sico" style="width:100px;cursor:default;border: 1px solid #4D90FE;" class="mBtn btnYellow"/> 
				
				<input type="button" id="b2" onclick="$('#tab2').show('slow'); $('#tab1').hide('slow'); $(this).css('border','1px solid #4D90FE'); $('#b1').css('border','0px');" value="Permisos" style="width:100px;cursor:default;" class="mBtn btnYellow"/> 
									
									<div id="tab1">
									
                                    <dl>
                                        <dt><label for="rName">T&iacute;tulo:</label></dt>
                                        <dd><input type="text" id="rName" name="rName" value="<? echo $tsRango['r_name']; ?>" style="width:30%"/></dd>
                                    </dl>
                                	<dl>
                                        <dt><label for="rColor">Color:</label><br /><span>Color (<a href="http://es.wikipedia.org/wiki/Colores_HTML" target="_blank">hexadecimal</a>) del rango.</span></dt>
                                        <dd><input type="text" id="rColor" name="rColor" value="<? echo $tsRango['r_color']; ?>" style="color:#{$tsRango.r_color}; font-weight:bold;width:30%"/></dd>
                                    </dl>
									<dl>
                                        <dt><label for="gopfd">Puntos por d&iacute;a:</label><br /><span>Puntos que puede otorgar este rango a otros usuarios al d&iacute;.</span></dt>
                                        <dd><input type="text" id="gopfd" name="global-pointsforday" value="<? echo $tsRango['permisos']['gopfd']; ?>" style="width:30%"/></dd>
                                    </dl>
									<dl>
                                        <dt><label for="gopfp">Puntos por post</label><br /><span>Puntos que puede dar en cada post.</span></dt>
                                        <dd><input type="text" id="gopfp" name="global-pointsforposts" value="<? echo $tsRango['permisos']['gopfp']; ?>" style="width:30%"/></dd>
                                    </dl>
									<dl>
                                        <dt><label for="goaf">Anti-flood</label><br /><span>Tiempo que deben esperar entre acci&oacute;n.</span></dt>
                                        <dd><input type="text" id="goaf" name="global-antiflood" value="<? echo $tsRango['permisos']['goaf']; ?>" style="width:30%"/></dd>
                                    </dl>
									<dl>
                                        
										<dt>
										
											<label for="gocpr">Condici&oacute;n especial:</label><br /><span>Cantidad requerida para obtener el rango. Elija especial si s&oacute;lo es asignado por un administrador. </span>
										   										
										</dt>
										
										<dd>
										
											<input type="text" id="gocpr" name="global-cantidadrequerida" style="width:12%<? if ($tsRango['r_type'] == 0) echo ';display:none;' ?>" maxlength="5" value="<? echo $tsRango['r_cant']; ?>" />
										
											<label onclick="$('#gocpr').slideDown();">
                                                                                            <input name="global-type" type="radio" id="ai_type" value="1" <? if ($tsRango['r_type'] == 1) echo 'checked'; ?> class="radio"/>
                                                                                                                                         <span class="qtip" title="Del usuario">Puntos</<span></label>
                                           
											<label onclick="$('#gocpr').slideDown();">
                                                                                            <input name="global-type" type="radio" id="ay_type" value="2" <? if ($tsRango['r_type'] == 2) echo 'checked'; ?> class="radio"/>Posts</label>
                                            
											<label onclick="$('#gocpr').slideDown();">
                                                                                            <input name="global-type" type="radio" id="ay_type" value="3" <? if ($tsRango['r_type'] == 3) echo 'checked'; ?> class="radio"/>Fotos</label>
										
											<label onclick="$('#gocpr').slideDown();">
                                                                                            <input name="global-type" type="radio" id="ay_type" value="4" <? if ($tsRango['r_type'] == 4) echo 'checked'; ?> class="radio"/>
                                                                                            <span class="qtip" title="De posts y fotos">Comentarios</<span></label>
											
											<label onclick="$('#gocpr').slideUp();">
                                                                                            <input name="global-type" type="radio" id="ay_type" value="0" <? if ($tsRango['r_type'] == 0) echo 'checked'; ?> class="radio"/>Especial
                                                                                        </label>
										
										</dd>
                                        
									</dl>
                                    <dl>
                                        <dt><label for="cat_img">Icono del rango:</label></dt>
                                        <dd>
                                            <img src="<? echo $tsConfig['images'];?>/space.gif" style="background:url(<? echo $tsConfig['url'];?>/themes/default/images/icons/ran/<? if ($tsRango['r_image']) echo $tsRango['r_image']; else echo $tsIcons[0]; ?>) no-repeat left center;" width="16" height="16" id="c_icon"/>
                                            <select name="r_img" id="cat_img" style="width:164px">
                                            <?    
                                            foreach ($tsIcons as $key=>$img)
                                            {
                                            ?>    
                                                <option value="<? echo $img; ?>" style="padding:2px 20px 0; background:#FFF url(<? echo $tsConfig['url'];?>/themes/default/images/icons/ran/<? echo $img; ?>) no-repeat left center;" <? if ($tsRango['r_image'] == $img) echo 'selected="selected"'; ?>><? echo $img; ?></option>
                                            <?
                                            }
                                            ?>   
                                            </select>   
                                        </dd>
                                    </dl>
                                    <hr />
									<input type="button" onclick="$('#tab2').show('slow'); $('#tab1').hide('slow'); $('#b2').css('border','1px solid #4D90FE'); $('#b1').css('border','0px');" value="Continuar" style="width:100px;cursor:default;" class="btn_g"/> 
									</div>									
									<div id="tab2" style="display:none;">
										
										<fieldset>
										<legend>Super Moderaci&oacute;n</legend>
                                        <input type="checkbox" id="suad" name="superadmin" <? if ($tsRango['permisos']['suad']) echo 'checked'; ?> />
                                               <label style="font-weight:bold;" for="suad">Super Admin. </label>
                                        <label for="suad"> &nbsp; Si marca esto, los permisos p&uacute;blicos, de administraci&oacute;n y de moderaci&oacute;n estar&aacute;n inclu&iacute;dos.</label>
										<br /><hr>
                                        <input type="checkbox" id="sumo" name="supermod" <? if ($tsRango['permisos']['sumo'])echo 'checked'; ?> />
                                               <label style="font-weight:bold;" for="sumo">Super Moderador</label>
                                        <label for="sumo"> &nbsp; Si marca esto, todos los permisos p&uacute;blicos y de moderaci&oacute;n estar&aacute;n inclu&iacute;dos.</label>
										</fieldset>
										<fieldset>
										<legend>Global</legend>
										<input type="checkbox" id="godp" name="global-darpuntos" <? if ($tsRango['permisos']['godp']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="godp">Puntuar Posts</label>
                                                                                <label for="godp"> &nbsp; Podr&aacute;n puntuar posts.</label>
										<br /><hr>
										<input type="checkbox" id="gopp" name="global-publicarposts" <? if ($tsRango['permisos']['gopp']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="gopp">Publicar Posts</label>
                                                                                <label for="gopp"> &nbsp; Podr&aacute;n publicar posts.</label>
										<br /><hr>
										<input type="checkbox" id="gopcp" name="global-publicarcomposts" <? if ($tsRango['permisos']['gopcp']) echo 'checked'; ?> />
                                                                                <label style="font-weight:bold;" for="gopcp">Publicar Comentarios en Posts</label>
                                                                                <label for="gopcp"> &nbsp; Podr&aacute;n publicar comentarios posts.</label>
										<br /><hr>
                                        <input type="checkbox" id="govpp" name="global-votarposipost" <? if ($tsRango['permisos']['govpp']) echo 'checked' ;?> />
                                               <label style="font-weight:bold;" for="govpp">Votar postivo</label>
                                        <label for="govpp"> &nbsp; Podr&aacute;n votar positivamente comentarios de posts.</label>
										<br /><hr>
                                        <input type="checkbox" id="govpn" name="global-votarnegapost" <? if ($tsRango['permisos']['govpn']) echo 'checked'; ?> />
                                               <label style="font-weight:bold;" for="govpn">Votar negativo</label>
                                        <label for="govpn"> &nbsp; Podr&aacute;n votar negativamente comentarios de posts.</label>
										<br /><hr>
										<input type="checkbox" id="goepc" name="global-editarpropioscomentarios" <? if ($tsRango['permisos']['goepc']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="goepc">Editar comentarios propios</label>
                                                                                       <label for="goepc"> &nbsp; Podr&aacute;n editar los comentarios que ellos hacen.</label>
										<br /><hr>
										<input type="checkbox" id="godpc" name="global-eliminarpropioscomentarios" <?if ($tsRango['permisos']['godpc']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="godpc">Eliminar comentarios propios</label>
                                                                                <label for="godpc"> &nbsp; Podr&aacute;n eliminar los comentarios que ellos hacen.</label>
										<br /><hr>
										<input type="checkbox" id="gopf" name="global-publicarfotos" <? if ($tsRango['permisos']['gopf']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="gopf">Publicar Fotos</label>
                                                                                <label for="gopf"> &nbsp; Podr&aacute;n publicar fotos.</label>
										<br /><hr>
										<input type="checkbox" id="gopcf" name="global-publicarcomfotos" <? if ($tsRango['permisos']['gopcf']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="gopcf">Publicar Comentarios en Fotos</label>
                                                                                <label for="gopf"> &nbsp; Podr&aacute;n publicar comentarios en fotos.</label>
										<br /><hr>
										<input type="checkbox" id="gorpap" name="global-revisarposts" <? if ($tsRango['permisos']['gorpap']) echo 'checked'; ?> />
                                                                                <label style="font-weight:bold;" for="gorpap">Revisar Posts</label>
                                                                                <label for="gorpap"> &nbsp; Si marca esto, cuando publiquen un post, antes de ser p&uacute;blico ser&aacute;n revisados.</label>
										<br /><hr>
                                                                                <input type="checkbox" id="govwm" name="global-vermantenimiento" <? if ($tsRango['permisos']['govwm']) echo 'checked'; ?> />
                                                                                <label style="font-weight:bold;" for="govwm">Acceso en mantenimiento </label>
                                                                                <label for="govwm"> &nbsp; Podr&aacute;n navegar normalmente mientras la web est&aacute; en mantenimiento.</label>
                                                                                </fieldset>
										<fieldset>
					
                                                                                <legend>Panel de Moderaci&oacute;n</legend>
										<input type="checkbox" id="moacp" name="mod-accesopanel" <? if ($tsRango['permisos']['moacp']) echo 'checked'; ?> />
                                                                                      <label style="font-weight:bold;" for="moacp">Acceso al Panel de Moderaci&oacute;n. </label>
                                                                                <label for="moacp"> &nbsp; Podr&aacute;n entrar al panel de moderaci&oacute;n y ver posts y fotos denunciadas.</label>
										<br /><br />
										<fieldset>
										<legend>Denuncias</legend>
										<input type="checkbox" id="mocdu" name="mod-cancelardenunciasusuarios" <? if ($tsRango['permisos']['mocdu']) echo 'checked'; ?>/>
                                                                                       <label style="font-weight:bold;" for="mocdu">Cancelar denuncias de usuarios. </label>
                                                                                <label for="modcu"> &nbsp; Podr&aacute;n ver y cancelar reportes de usuarios.</label>
										<br /><hr>
										<input type="checkbox" id="mocdf" name="mod-cancelardenunciasfotos" <? if ($tsRango['permisos']['mocdf']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="mocdf">Cancelar denuncias de fotos. </label>
                                                                                <label for="mocdf"> &nbsp; Podr&aacute;n rechazar reportes de fotos.</label>
										<br /><hr>
										<input type="checkbox" id="mocdp" name="mod-cancelardenunciasposts" <? if ($tsRango['permisos']['mocdp']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="mocdp">Cancelar denuncias de posts. </label><label for="moadp"> &nbsp; Podr&aacute;n rechazar reportes de posts.</label>
										<br /><hr>
										<input type="checkbox" id="moadm" name="mod-aceptardenunciasmensajes" <? if ($tsRango['permisos']['moadm']) echo 'checked';?> />
                                                                                       <label style="font-weight:bold;" for="moadm">Aceptar denuncias de mensajes. </label><label for="moadm"> &nbsp; Podr&aacute;n aceptar reportes de mensajes.</label>
										<br /><hr>
										<input type="checkbox" id="mocdm" name="mod-cancelardenunciasmensajes" <? if ($tsRango['permisos']['mocdm']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="mocdm">Cancelar denuncias de mensajes. </label>
                                                                                <label for="mocdm"> &nbsp; Podr&aacute;n rechazar reportes de mensajes.</label>
										</fieldset>
										<br /> <br />
										<input type="checkbox" id="movub" name="mod-verusuariosbaneados" <? if ($tsRango['permisos']['movub']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="movub">Usuarios baneados. </label>
                                                                                <label for="movub"> &nbsp; Podr&aacute;n ver usuarios baneados.</label>
										<br /><hr>
										<input type="checkbox" id="moub" name="mod-usarbuscador" <? if ($tsRango['permisos']['moub']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="moub">Usar el buscador. </label>
                                                                                <label for="moub"> &nbsp; Podr&aacute;n usar el buscador de contenidos.</label>
										<br /><hr>
										<input type="checkbox" id="morp" name="mod-reciclajeposts" <? if( $tsRango['permisos']['morp']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="morp">Papelera de posts. </label>
                                                                                <label for="morp"> &nbsp; Podr&aacute;n ver la papelera de reciclaje de posts y los posts eliminados.</label>
										<br /><hr>
										<input type="checkbox" id="morf" name="mod-reficlajefotos" <? if ($tsRango['permisos']['morf']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="morf">Papelera de fotos. </label>
                                                                                <label for="morf"> &nbsp; Podr&aacute;n ver la papelera de reciclaje de fotos y las fotos eliminadas.</label>
										<br /><hr>
										<input type="checkbox" id="mocp" name="mod-contenidoposts" <? if( $tsRango['permisos']['mocp']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="mocp">Posts desaprobados. </label><label for="mocp"> &nbsp; Podr&aacute;n ver la secci&oacute;n y los posts ocultos.</label>
										<br /><hr>
										<input type="checkbox" id="mocc" name="mod-contenidocomentarios" <? if( $tsRango['permisos']['mocc']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="mocc">Comentarios desaprobados. </label>
                                                                                <label for="mocc"> &nbsp; Podr&aacute;n ver los comentarios ocultos.</label>
										</fieldset>
										<fieldset>
										<legend>Moderaci&oacute;n Parcial</legend>
										<input type="checkbox" id="most" name="mod-sticky" <? if ($tsRango['permisos']['most']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="most">Fijar Posts</label>
                                                                                <label for="most"> &nbsp; Podr&aacute;n poner/quitar posts en sticky desde el formulario y el mismo post.</label>
										<br /><hr>
										<input type="checkbox" id="moayca" name="mod-abrirycerrarajax" <? if ($tsRango['permisos']['moayca']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="moayca">Abrir/Cerrar Posts Ajax</label>
                                                                                <label for="moayaca"> &nbsp; Podr&aacute;n abrir/cerrar posts r&aacute;pidamente desde el post.</label>
										<br /><hr>
										<input type="checkbox" id="movcud" name="mod-vercuentasdesactivadas" <? if ($tsRango.permisos.movcud) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="movcud">Ver cuentas desactivadas</label>
                                                                                <label for="movcud"> &nbsp; Podr&aacute;n ver cuentas de usuarios desactivadas.</label>
										<br /><hr>
										<input type="checkbox" id="movcus" name="mod-vercuentassuspendidas" <? if ($tsRango['permisos']['movcus']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="movcus">Ver cuentas baneadas</label>
                                                                                <label for="movcus"> &nbsp; Podr&aacute;n ver cuentas de usuarios baneados.</label>
										<br /><hr>
										<input type="checkbox" id="mosu" name="mod-suspenderusuarios" <? if ($tsRango['permisos']['mosu']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="mosu">Suspender Usuarios</label>
                                                                                <label for="mosu"> &nbsp; Podr&aacute;n suspender usuarios desde formulario modal.</label>
										<br /><hr>
										<input type="checkbox" id="modu" name="mod-desbanearusuarios" <? if ($tsRango['permisos']['modu']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="modu">Desbanear Usuarios</label>
                                                                                <label for="modu"> &nbsp; Podr&aacute;n desbanear usuarios.</label>
										<br /><hr>
										<input type="checkbox" id="moep" name="mod-eliminarposts" <? if ($tsRango['permisos']['moep']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="moep">Eliminar Posts</label>
                                                                                <label for="moep"> &nbsp; Podr&aacute;n eliminar posts de otros usuarios.</label>
										<br /><hr>
										<input type="checkbox" id="moedpo" name="mod-editarposts" <? if ($tsRango['permisos']['moedpo']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="moedpo">Editar Posts</label>
                                                                                <label for="moedpo"> &nbsp; Podr&aacute;n editar posts de otros usuarios (requiere permiso publicar post).</label>
										<br /><hr>
										<input type="checkbox" id="moop" name="mod-ocultarposts" <? if ($tsRango['permisos']['moop']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="moop">Ocultar Posts</label>
                                                                                <label for="moop"> &nbsp; Podr&aacute;n ocultar posts de otros usuarios.</label>
										<br /><hr>
										<input type="checkbox" id="mocepc" name="mod-comentarpostcerrado" <? if ($tsRango['permisos']['mocepc']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="mocepc">Comentarios en Post Cerrado</label>
                                                                                <label for="mocepc"> &nbsp; Podr&aacute;n comentar en posts cerrados.</label>
										<br /><hr>
										<input type="checkbox" id="moedcopo" name="mod-editarcomposts" <? if ($tsRango['permisos']['moedcopo']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="moedcopo">Editar Comentarios de Posts</label>
                                                                                <label for="moedcopo"> &nbsp; Podr&aacute;n editar comentarios de posts de otros usuarios.</label>
										<br /><hr>
										<input type="checkbox" id="moaydcp" name="mod-desyaprobarcomposts" <? if ($tsRango['permisos']['moaydcp']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="moaydcp">Acciones de revisi&oacute;n</label>
                                                                                <label for="moaydcp"> &nbsp; Aprobar/desaprobar comentarios en los posts y en la revisi&oacute;n de comentarios.</label>
										<br /><hr>
										<input type="checkbox" id="moecp" name="mod-eliminarcomposts" <? if ($tsRango['permisos']['moecp']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="moecp">Eliminar Comentarios de Posts</label>
                                                                                <label for="moecp"> &nbsp; Podr&aacute;n eliminar comentarios en posts de otros usuarios.</label>
										<br /><hr>
										<input type="checkbox" id="moef" name="mod-eliminarfotos" <? if ($tsRango['permisos']['moef']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="moef">Eliminar Fotos</label>
                                                                                <label for="moef"> &nbsp; Podr&aacute;n eliminar fotos de otros usuarios.</label>
										<br /><hr>
										<input type="checkbox" id="moedfo" name="mod-editarfotos" <? if ($tsRango['permisos']['moedfo']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="moedfo">Editar Fotos</label>
                                                                                <label for="moedfo"> &nbsp; Podr&aacute;n editar fotos de otros usuarios (requiere publicar foto).</label>
										<br /><hr>
										<input type="checkbox" id="moecf" name="mod-eliminarcomfotos" <? if ($tsRango['permisos']['moecf']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="moecf">Eliminar Comentarios de Fotos</label>
                                                                                <label for="moecf"> &nbsp; Podr&aacute;n eliminar comentarios en fotos de otros usuarios.</label>
										<br /><hr>
										<input type="checkbox" id="moepm" name="mod-eliminarpubmuro" <? if ($tsRango['permisos']['moepm']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="moepm">Eliminar Publicaciones de Muros</label>
                                                                                <label for="moepm"> &nbsp; Podr&aacute;n eliminar publicaciones en muros de otros usuarios.</label>
										<br /><hr>
										<input type="checkbox" id="moecm" name="mod-eliminarcommuro" <? if ($tsRango['permisos']['moecm']) echo 'checked'; ?> />
                                                                                       <label style="font-weight:bold;" for="moecm">Eliminar Comentarios de Muros</label>
                                                                                <label for="moecm"> &nbsp; Podr&aacute;n eliminar comentarios en muros de otros usuarios.</label>
										</fieldset>
										
                                    <input type="hidden" name="sp" value="<? if ($tsType == 's') echo 1; else echo 0; ?>" />
                                    <p><input type="submit" name="save" value="Guardar Cambios" class="btn_g"/></p>
				</div>
                                </fieldset>
                                </form>
                                <?
                                }
                                elseif ($tsAct == 'borrar')
                                {
                                ?>
                                <form action="" method="post" id="admin_form">
                                	<div class="mensajes error">Si borras este rango todos los usuarios que est&eacute;n en &eacute;l, ser&aacute;n asignados al rango 
									
									<select name="new_rango">
                                                                         <?   
                                                                            foreach ($tsRangos as $r)
                                                                            {
                                                                          ?>
                                                                            <option value="<? echo $r['rango_id']; ?>" style="color:#<? echo $r['r_color']; ?>; padding:2px 20px 0;" <? if ($r['rango_id'] == 3) echo 'selected'; ?>><? echo $r['r_name']; ?></option>
                                                                            <?
                                                                            }
                                                                            ?>
                                                                        </select> 
                                            <br /> &iquest;Realmente deseas borrar este rango?</div>
                                    
					<label>&nbsp;</label> <input type="submit" name="save" value="S&iacute;, Continuar &raquo;" class="mBtn btnCancel">
                                </form>
                                <?
                                }
                                ?>
                                </div>
                                