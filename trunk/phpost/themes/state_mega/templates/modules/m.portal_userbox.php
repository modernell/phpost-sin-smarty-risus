			<div id="user_box" class="post-autor vcard">
                    	<div class="avatarBox" style="margin-bottom:0">
                            <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $tsUser->nick; ?>">
                                <img title="Ver tu perfil" class="avatar" src="<? echo $tsConfig['url']; ?>/files/avatar/<? echo $tsUser->uid; ?>_120.jpg"/>
                            </a>
			</div>
                        <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $tsUser->nick; ?>" style="text-decoration:none">
                            <span class="given-name" style="color:#<? echo $tsUser->info['rango']['r_color']; ?>"><? echo $tsUser->nick; ?></span>
			</a>
                        <hr class="divider"/>
                        <div class="tools">
                            <a href="<? echo $tsConfig['url']; ?>/monitor/" class="systemicons monitor">Notificaciones (<b><? echo $tsNots; ?></b>)</a>
                            <a href="<? echo $tsConfig['url']; ?>/mensajes/" class="systemicons mps">Mensajes nuevos (<b><? echo $tsMPs; ?></b>)</a>
                            <hr class="divider"/>
                            <a href="<? echo $tsConfig['url']; ?>/agregar/" style="background:url(<? echo $tsConfig['default']; ?>/images/icons/posts.png) no-repeat left center;">Agregar post</a>
                            <a href="<? echo $tsConfig['url']; ?>/fotos/agregar.php" style="background:url(<? echo $tsConfig['default']; ?>/images/icons/photo.png) no-repeat left center;">Agregar foto</a>
                            <hr class="divider"/>
                            <a href="<? echo $tsConfig['url']; ?>/cuenta/" class="systemicons micuenta">Editar mi cuenta</a>
                            <a href="<? echo $tsConfig['url']; ?>/login-salir.php" class="salir">Cerrar sesi&oacute;n</a>
                        </div>
                    </div>