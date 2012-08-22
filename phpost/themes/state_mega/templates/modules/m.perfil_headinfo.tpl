                <div class="perfil-user clearfix">
                	<div class="perfil-box clearfix">
                        <div class="perfil-data">
                        	<div class="perfil-avatar">
                            	<a href="{$tsConfig.url}/perfil/{$tsInfo.nick}"><img alt="" src="{$tsConfig.url}/files/avatar/{if $tsInfo.p_avatar}{$tsInfo.uid}_120{else}avatar{/if}.jpg"/></a>
                            </div>
                            <div class="perfil-info">
                            	<h1 class="nick">{$tsInfo.nick}</h1>
								<span class="bio"><img src="{$tsConfig.tema.t_url}/images/{if $tsInfo.user_sexo == 1}hombre{else}mujer{/if}.png"> {if $tsInfo.p_nombre != ''}  {$tsInfo.p_nombre} es {else}Es {/if}{if $tsInfo.user_sexo == 1}un hombre{else}una mujer{/if}.<br><img src="{$tsConfig.tema.t_url}/images/hogar.png"> Vive en <span id="info_pais">{$tsInfo.user_pais}</span>.<br>{if $tsInfo.p_empresa}<img src="{$tsConfig.tema.t_url}/images/trabajo.png"> Trabaja en {$tsInfo.p_empresa}{/if}</span>
								<span style="padding-top:5px;position:absolute;"><span title="{$tsInfo.status.t}" style="float: left;" class="qtip status {$tsInfo.status.css}"></span></span>
								{if $tsUser->uid != $tsInfo.uid && $tsUser->is_member}
                                <br />
                                <a class="btn_g unfollow_user_post" onclick="notifica.unfollow('user', {$tsInfo.uid}, notifica.userInPostHandle, $(this).children('span'))" {if $tsInfo.follow == 0}style="display: none;"{/if}><span class="icons unfollow">Dejar de seguir</span></a>
                                <a class="btn_g follow_user_post" onclick="notifica.follow('user', {$tsInfo.uid}, notifica.userInPostHandle, $(this).children('span'))" {if $tsInfo.follow == 1}style="display: none;"{/if}><span class="icons follow">Seguir Usuario</span></a>
                                <br />
								                                <span class="ex_opts">
                                    <a href="javascript:bloquear({$tsInfo.uid}, {if $tsInfo.block.bid}false{else}true{/if}, 'perfil')" id="bloquear_cambiar">{if $tsInfo.block.bid}Desbloquear{else}Bloquear{/if}</a>
                                    <a href="#" onclick="denuncia.nueva('usuario',{$tsInfo.uid}, '', '{$tsInfo.nick}'); return false">Denunciar</a>
                                    {if ($tsUser->is_admod || $tsUser->permisos.mosu) && !$tsInfo.user_baneado}<a href="#" onclick="mod.users.action({$tsInfo.uid}, 'ban', true); return false;" style="background-color:#CE152E;">Suspender</a>{/if}
									{if !$tsInfo.user_activo || $tsInfo.user_baneado}<span style="background-color:#CE152E;">Cuenta {if !$tsInfo.user_activo}desactivada{else}baneada{/if}</span>{/if}
							   </span>
								{/if}
                            </div>
                        </div>
                        <div class="user-level">
                            <ul class="clearfix">
                				<li style="position:relative;color:#{$tsInfo.stats.r_color}; background-color:#FFF">
                					<strong style="color:#{$tsInfo.stats.r_color}">{$tsInfo.stats.r_name}</strong>
                					<span>Rango</span>
                				</li>
                				<li>
                					<strong>{$tsInfo.stats.user_puntos}</strong>
                					<span>Puntos</span>
                				</li>
                				<li>
                					<strong>{$tsInfo.stats.user_posts}</strong>
                					<span>Posts</span>
                				</li>
                				<li>
                					<strong>{$tsInfo.stats.user_comentarios}</strong>
                					<span>Comentarios</span>
                				</li>
                				<li>
                					<strong>{$tsInfo.stats.user_seguidores}</strong>
                					<span>Seguidores</span>
                				</li>
                				<li>
                					<strong>{$tsInfo.stats.user_fotos}</strong>
                					<span>Fotos</span>
                				</li>
                
                			</ul>
                        </div>
                    </div>
                    <div class="menu-tabs-perfil clearfix">
                    	<ul id="tabs_menu">
                            {if $tsType == 'news' || $tsType == 'story'}
                            <li class="selected"><a href="#" onclick="perfil.load_tab('news', this); return false">{if $tsType == 'story'}Publicaci&oacute;n{else}Noticias{/if}</a></li>
                            {/if}
                            <li {if $tsType == 'wall'}class="selected"{/if}><a href="#" onclick="perfil.load_tab('wall', this); return false">Muro</a></li>
                            <li><a href="#" onclick="perfil.load_tab('actividad', this); return false" id="actividad">Actividad</a></li>
                            <li><a href="#" onclick="perfil.load_tab('info', this); return false" id="informacion">Informaci&oacute;n</a></li>
                            <li><a href="#" onclick="perfil.load_tab('posts', this); return false">Posts</a></li>
                            <li><a href="#" onclick="perfil.load_tab('seguidores', this); return false" id="seguidores">Seguidores</a></li>
                            <li><a href="#" onclick="perfil.load_tab('siguiendo', this); return false" id="siguiendo">Siguiendo</a></li>
                            <li><a href="#" onclick="perfil.load_tab('medallas', this); return false">Medallas</a></li>
							{if $tsUser->uid != $tsInfo.uid}
                            <li class="enviar-mensaje">
                                {if $tsUser->is_member}
                                <a href="#" onclick="mensaje.nuevo('{$tsInfo.nick}','','',''); return false"><span style="float:none; height:14px;width:16px;" class="systemicons mensaje"></span></a>
                                {/if}
                            </li>
                            {/if}
                            {if $tsInfo.p_socials.f}
                            <li style="float:right!important;" class="floatR">
            					<a target="_blank" href="http://www.facebook.com/{$tsInfo.p_socials.f}" title="Facebook"><img height="14" width="14" src="{$tsConfig.default}/images/icons/facebook.png"/></a>
            				</li>
                            {/if}
                            {if $tsInfo.p_socials.t}
                            <li style="float:right!important;" class="floatR">
            					<a target="_blank" href="http://www.twitter.com/{$tsInfo.p_socials.t}" title="Twitter"><img height="14" width="14" src="{$tsConfig.default}/images/icons/twitter.png"/></a>
            				</li>
                            {/if}
							{if $tsUser->is_admod == 1}
                            <li style="float:right!important;" class="floatR">
								<a href="#" onclick="location.href = '{$tsConfig.url}/admin/users?act=show&amp;uid={$tsInfo.uid}'"><img title="Editar a {$tsInfo.nick}" src="{$tsConfig.url}/themes/default/images/icons/editar.png"  class="vctip"/></a>
                            </li>
                            {/if}
                        </ul>
                    </div>
                </div>