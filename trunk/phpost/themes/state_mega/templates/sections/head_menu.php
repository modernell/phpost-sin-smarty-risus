        <script type="text/javascript">
            var menu_section_actual = '<? if ($tsDo == "posts")echo "posts"; else echo $tsPage; ?>';
	</script>
        <div id="menu_container">
        <div id="menu">
        	<!--LEFT MENU-->                
		<ul class="menuTabs">
                <? 
                if ($tsConfig['c_allow_portal'] && $tsUser->is_member == true)
                {
                ?>
                <li class="tabbed <? if(($tsPage != 'home') && $tsPage != 'posts' && $tsPage != 'tops' && $tsPage != 'admin' && $tsPage != 'fotos') echo 'here'; ?> " id="tabbedhome">
                    <a title="Ir a Inicio" onclick="menu('home', this.href); return false;" href="<? echo $tsConfig['url'].'/mi/'; ?>"><span>&nbsp;</span></a>
                </li>
                <?
                }
                ?>
                <li class="tabbed <? if($tsPage == 'posts' || $tsPage == 'home') echo 'here'; ?>" id="<? if ($tsConfig['c_allow_portal'] && $tsUser->is_member) echo 'tabbedposts'; else echo 'tabbedhome'; ?>">
                    <a title="Ir a Posts" onclick="menu('posts', this.href); return false;" href="<? echo $tsConfig['url'].'/posts/'; ?>">Posts <img alt="Drop Down" src="<? echo $tsConfig['tema']['t_url']; ?>/images/nav.png"></a>
                </li>				
		<? if ($tsConfig['c_fotos_private'] == '1' && !$tsUser->is_member){} else { ?>
                <li class="tabbed <? if($tsPage == 'fotos') echo 'here'; ?>" id="tabbedfotos">
                    <a title="Ir a Fotos" onclick="menu('fotos', this.href); return false;" href="<? echo $tsConfig['url']; ?>/fotos/">Fotos <img alt="Drop Down" src="<? echo $tsConfig['tema']['t_url']; ?>/images/nav.png"></a>
                </li>								
		<? 
                }
                ?>
                <li class="tabbed <? if($tsPage == 'tops') echo 'here'; ?>" id="tabbedtops">
                    <a title="Ir a TOPs" onclick="menu('tops', this.href); return false;" href="<? echo $tsConfig['url'];?>/top/">TOPs <img alt="Drop Down" src="<? echo $tsConfig['tema']['t_url'];?>/images/nav.png"></a>
                </li>
                <? 
                if ($tsUser->is_member)
                { 
                    if ($tsUser->is_admod == 1)
                    {                    
                        ?>
                        <li class="tabbed <? if($tsPage == 'admin') echo 'here'; ?>" id="tabbedAdmin">
                            <a class=qtip title="Panel de Administrador" onclick="menu('Admin', this.href); return false;" href="<? echo $tsConfig['url']; ?>/admin/">
                                Administraci&oacute;n 
                                <img alt="Drop Down" src="<? echo $tsConfig['tema']['t_url']; ?>/images/nav.png">
                            </a>
                        </li>
                        <?
                    }
                }
                else
                {    
                ?>
                <li class="tabbed registrate">
                    <a title="Registrate!" onclick="registro_load_form(); return false" href=""><b>Registrate!</b></a>
                </li>
                <? } ?> 
                <li class="clearBoth"></li>
            </ul>
            <!--RIGHT MENU-->
            <div class="opciones_usuario <? if(!$tsUser->is_member) echo 'anonimo'; ?>">
            	<? if ($tsUser->is_member) { ?>
                <div class="userInfoLogin">
                  <ul>
                    <li class="monitor" style="position: relative">
                        <a href="<? echo $tsConfig['url']; ?>/monitor/" onclick="notifica.last(); return false" title="Monitor de usuario" name="Monitor">
                            <span class="systemicons monitor"></span>
                        </a>
                      <div class="notificaciones-list" id="mon_list">
                        <div style="padding: 10px 10px 0 10px;font-size:13px">
                            <strong style="cursor:pointer" onclick="location.href='<? echo $tsConfig[url]; ?>/monitor/'">Notificaciones</strong>
                        </div>
                        <ul>
                        </ul>
                        <a href="<? echo $tsConfig['url']; ?>/monitor/" class="ver-mas">Ver m&aacute;s notificaciones</a>
                      </div>
                    </li>
                    <li class="mensajes" style="position:relative">
                        <a href="<? echo $tsConfig['url']; ?>/mensajes/" onclick="mensaje.last(); return false" title="Mensajes Personales" name="Mensajes">
                            <span class="systemicons mps"></span>
                        </a>
                        <div class="notificaciones-list" id="mp_list" style="width:270px">
                            <div style="padding: 10px 10px 0 10px;font-size:13px">
                                <strong style="cursor:pointer" onclick="location.href='<? echo $tsConfig[url]; ?>/mensajes/'">Mensajes</strong>
                            </div>
                            <ul id="boxMail">
                            </ul>
                            <a href="<? echo $tsConfig[url]; ?>/mensajes/" class="ver-mas">Ver todos los mensajes</a>
                        </div>
                    </li>
                    <? if ($tsAvisos){ ?>
                    <li style="position:relative;">
                        <a title="Avisos" href="<? echo $tsConfig['url'];  ?> /mensajes/avisos/">
                            <img src="<? echo $tsConfig['default'];  ?>/images/icons/megaphone.png" />
                        </a>
                        <div id="alerta_avs" class="alertas" style="top: -6px;"><a title="{$tsAvisos} aviso{if $tsAvisos != 1}s{/if}"><span><? echo $tsAvisos; ?></span></a></div>
                    </li>
                    <? } ?>
                    <li>
                        <a title="Mis Favoritos" href="<? echo $tsConfig['url'];?>/favoritos.php">
                            <span class="systemicons favoritos"></span>
                        </a>
                    </li>
                  <li class="usernameMenu" style="background: url();" onmouseover="user_menu_show(1);" onmouseout="user_menu_show(0);">
<a href="<? echo $tsConfig['url'].'/perfil/'.$tsUser->info['user_name']; ?>" class="username" style="color:#D5D5D5;">
<img style="height: 16px; width: 16px;float: left; margin-right: 5px; display: block;" src="<? echo $tsConfig['url'].'/files/avatar/'.$tsUser->uid; ?>_120.jpg"><? $tsUser->nick; ?></a>
<div class="my-account-links real-shadow navpanel" onmouseout="user_menu_show(0);" style="display: none; ">
<a title="Configurar Cuenta" href="<? echo $tsConfig['url'];?>/cuenta/">Cuenta</a>
<a title="Mis Borradores" href="<? echo $tsConfig['url'];?>/borradores.php">Borradores</a>
</li>
                    <li class="logout">
                        <a href="<? echo $tsConfig['url'];?>/login-salir.php" style="vertical-align: middle" title="Salir">
                            <span class="systemicons logout"></span>
                        </a>
                    </li>
                    </ul>
                    <div style="clear:both"></div>
                </div>
                <? } else { ?>      
                
				<div class="identificarme">
					<a title="Identificarme" href="javascript:open_login_box()" class="iniciar_sesion">Identificarme</a>
				</div>
                <div id="login_box" style="display: none;">
                	<div class="login_header">
                    </div>
                       <div class="login_cuerpo">
	                  <span class="gif_cargando floatR" id="login_cargando" style="display: none;"></span>
    	              <div id="login_error" style="display: none; padding:3px 0;"></div>
       	                    	           <div style="font-size:14px;float:right;text-align:left;">
                                               <img style="margin-top:75px;" src="<? echo $tsConfig['url']; ?>/images/llave_registro.png"></div>
						<form action="javascript:login_ajax()" method="post">
						<div id="cboxTitle">Entrar                    	
                                                 <img title="Cerrar mensaje" onclick="close_login_box();" class="login_cerrar" src="<? echo $tsConfig['tema']['t_url']; ?>/images/lightbox.gif" style="top:10px;left:460px"></div><br><br>
            	            <label>Nombre de Usuarios</label><br>
                	        <input type="text" class="ilogin" id="nickname" name="nick" maxlength="64">
                    	   <br> <label>Contraseña</label><br>
                        	<input type="password" class="ilogin" id="password" name="pass" maxlength="64">
                            <br><input type="checkbox" id="rem" name="rem" value="true" checked="checked" /> <label for="rem">Recordar usuario</label><br>
	                        <input type="submit" title="Entrar" value="Iniciar Sesión" style="width:198px; margin-top:5px;" class="mBtn btnOk2">
            	        </form>
                	    <div class="login_footer">
	                      <a href="#" onclick="remind_password();">&#191;Olvidaste tu contrase&#241;a?</a>
        	                <br/>
							<a href="#" onclick="resend_validation();">&#191;No lleg&oacute; el correo de validaci&oacute;n?</a>
        	                <br/>
            	          <a style="color:green;" onclick="open_login_box(); registro_load_form(); return false" href="">
	                        <strong>Registrate Ahora!</strong>
    	                  </a>
                        </div>
                  </div>
                </div>
                 <? } ?>
                
			</div>
            <div class="clearBoth"></div>
        </div>
        </div>