<?php /* Smarty version 2.6.26, created on 2012-08-16 19:32:44
         compiled from sections/head_menu.tpl */ ?>
        <script type="text/javascript">
			var menu_section_actual = '<?php if ($this->_tpl_vars['tsDo'] == 'posts'): ?>posts<?php else: ?><?php echo $this->_tpl_vars['tsPage']; ?>
<?php endif; ?>';
		</script>
        <div id="menu_container">
        <div id="menu">
        	<!--LEFT MENU-->
			<ul class="menuTabs">
                <?php if ($this->_tpl_vars['tsConfig']['c_allow_portal'] && $this->_tpl_vars['tsUser']->is_member == true): ?>
                <li class="tabbed <?php if ($this->_tpl_vars['tsPage'] != 'home' && $this->_tpl_vars['tsPage'] != 'posts' && $this->_tpl_vars['tsPage'] != 'tops' && $this->_tpl_vars['tsPage'] != 'admin' && $this->_tpl_vars['tsPage'] != 'fotos'): ?>here<?php endif; ?>" id="tabbedhome">
                    <a title="Ir a Inicio" onclick="menu('home', this.href); return false;" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/mi/"><span>&nbsp;</span></a>
                </li>
                <?php endif; ?>
                <li class="tabbed <?php if ($this->_tpl_vars['tsPage'] == 'posts' || $this->_tpl_vars['tsPage'] == 'home'): ?>here<?php endif; ?>" id="<?php if ($this->_tpl_vars['tsConfig']['c_allow_portal'] && $this->_tpl_vars['tsUser']->is_member): ?>tabbedposts<?php else: ?>tabbedhome<?php endif; ?>">
                    <a title="Ir a Posts" onclick="menu('posts', this.href); return false;" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/">Posts <img alt="Drop Down" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/nav.png"></a>
                </li>				
				<?php if ($this->_tpl_vars['tsConfig']['c_fotos_private'] == '1' && ! $this->_tpl_vars['tsUser']->is_member): ?><?php else: ?>								
                <li class="tabbed <?php if ($this->_tpl_vars['tsPage'] == 'fotos'): ?>here<?php endif; ?>" id="tabbedfotos">
                    <a title="Ir a Fotos" onclick="menu('fotos', this.href); return false;" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/fotos/">Fotos <img alt="Drop Down" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/nav.png"></a>
                </li>								
				<?php endif; ?>
                <li class="tabbed <?php if ($this->_tpl_vars['tsPage'] == 'tops'): ?>here<?php endif; ?>" id="tabbedtops">
                    <a title="Ir a TOPs" onclick="menu('tops', this.href); return false;" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/top/">TOPs <img alt="Drop Down" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/nav.png"></a>
                </li>
                <?php if ($this->_tpl_vars['tsUser']->is_member): ?>
                    <?php if ($this->_tpl_vars['tsUser']->is_admod == 1): ?>
                <li class="tabbed <?php if ($this->_tpl_vars['tsPage'] == 'admin'): ?>here<?php endif; ?>" id="tabbedAdmin">
                    <a class=qtip title="Panel de Administrador" onclick="menu('Admin', this.href); return false;" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/">Administraci&oacute;n <img alt="Drop Down" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/nav.png"></a>
                </li>
   	                <?php endif; ?>
                <?php else: ?>
                <li class="tabbed registrate">
                    <a title="Registrate!" onclick="registro_load_form(); return false" href=""><b>Registrate!</b></a>
                </li>
                <?php endif; ?>
                <li class="clearBoth"></li>
            </ul>
            <!--RIGHT MENU-->
            <div class="opciones_usuario <?php if (! $this->_tpl_vars['tsUser']->is_member): ?>anonimo<?php endif; ?>">
            	<?php if ($this->_tpl_vars['tsUser']->is_member): ?>
                <div class="userInfoLogin">
                  <ul>
                    <li class="monitor" style="position: relative">
                        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/monitor/" onclick="notifica.last(); return false" title="Monitor de usuario" name="Monitor">
                            <span class="systemicons monitor"></span>
                        </a>
                      <div class="notificaciones-list" id="mon_list">
                        <div style="padding: 10px 10px 0 10px;font-size:13px">
                            <strong style="cursor:pointer" onclick="location.href='<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/monitor/'">Notificaciones</strong>
                        </div>
                        <ul>
                        </ul>
                        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/monitor/" class="ver-mas">Ver m&aacute;s notificaciones</a>
                      </div>
                    </li>
                    <li class="mensajes" style="position:relative">
                        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/mensajes/" onclick="mensaje.last(); return false" title="Mensajes Personales" name="Mensajes">
                            <span class="systemicons mps"></span>
                        </a>
                        <div class="notificaciones-list" id="mp_list" style="width:270px">
                            <div style="padding: 10px 10px 0 10px;font-size:13px">
                                <strong style="cursor:pointer" onclick="location.href='<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/mensajes/'">Mensajes</strong>
                            </div>
                            <ul id="boxMail">
                            </ul>
                            <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/mensajes/" class="ver-mas">Ver todos los mensajes</a>
                        </div>
                    </li>
                    <?php if ($this->_tpl_vars['tsAvisos']): ?>
                    <li style="position:relative;">
                        <a title="Avisos" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/mensajes/avisos/">
                            <img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/megaphone.png" />
                        </a>
                        <div id="alerta_avs" class="alertas" style="top: -6px;"><a title="<?php echo $this->_tpl_vars['tsAvisos']; ?>
 aviso<?php if ($this->_tpl_vars['tsAvisos'] != 1): ?>s<?php endif; ?>"><span><?php echo $this->_tpl_vars['tsAvisos']; ?>
</span></a></div>
                    </li>
                    <?php endif; ?>
                    <li>
                        <a title="Mis Favoritos" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/favoritos.php">
                            <span class="systemicons favoritos"></span>
                        </a>
                    </li>
                  <li class="usernameMenu" style="background: url();" onmouseover="user_menu_show(1);" onmouseout="user_menu_show(0);">
<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['tsUser']->info['user_name']; ?>
" class="username" style="color:#D5D5D5;">
<img style="height: 16px; width: 16px;float: left; margin-right: 5px; display: block;" src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['tsUser']->uid; ?>
_120.jpg"> <?php echo $this->_tpl_vars['tsUser']->nick; ?>
</a>
<div class="my-account-links real-shadow navpanel" onmouseout="user_menu_show(0);" style="display: none; ">
<a title="Configurar Cuenta" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/cuenta/">Cuenta</a>
<a title="Mis Borradores" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/borradores.php">Borradores</a>
</li>
                    <li class="logout">
                        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/login-salir.php" style="vertical-align: middle" title="Salir">
                            <span class="systemicons logout"></span>
                        </a>
                    </li>
                    </ul>
                    <div style="clear:both"></div>
                </div>
                <?php else: ?>
				<div class="identificarme">
					<a title="Identificarme" href="javascript:open_login_box()" class="iniciar_sesion">Identificarme</a>
				</div>
                <div id="login_box" style="display: none;">
                	<div class="login_header">
                    </div>
                	<div class="login_cuerpo">
	                  <span class="gif_cargando floatR" id="login_cargando" style="display: none;"></span>
    	              <div id="login_error" style="display: none; padding:3px 0;"></div>
        	                    	           <div style="font-size:14px;float:right;text-align:left;"><img style="margin-top:75px;" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/llave_registro.png"></div>
						<form action="javascript:login_ajax()" method="post">
						<div id="cboxTitle">Entrar                    	<img title="Cerrar mensaje" onclick="close_login_box();" class="login_cerrar" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/lightbox.gif" style="top:10px;left:460px"></div><br><br>
            	            <label>Nombre de Usuario</label><br>
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
                <?php endif; ?>
			</div>
            <div class="clearBoth"></div>
        </div>
        </div>