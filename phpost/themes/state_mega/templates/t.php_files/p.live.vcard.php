<div class="hovercard-inner">
    <div class="bd">
        <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $tsData['user_name']; ?>" class="profile-pic">
            <img src="<? echo $tsConfig['url']; ?>/files/avatar/<? echo $tsData['user_id'];?>_50.jpg" class="avatar" />
        </a>
        <div class="bio">
            <p class="fn-above" style="color:#{$tsData.stats.r_color}">
                <? if ($tsData['p_nombre']){ echo $tsData['p_nombre'];}else{ echo $tsData['user_name']; }?>
            </p>
            <p class="sn">
                <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $tsData['user_name']; ?>">@<? echo $tsData['user_name']; ?></a>
            </p>
            <p class="location">
                <img title="<? echo $tsData['status']['t']; ?>" class="status <? echo $tsData['status']['css']; ?> vctip" src="<? echo $tsConfig['default']; ?>/images/space.gif"/>
                <img title="{if $tsData.user_sexo == 1}Hombre{else}Mujer{/if}" src="<? echo $tsConfig['default']; ?>/images/icons/{if $tsData.user_sexo == 0}fe{/if}male.png" class="vctip"/>
                <img title="" style="padding:2px" src="<? echo $tsConfig['default']; ?>/images/flags/{$tsData.user_pais|lower}.png" class="vctip"/>
                <img title="<? echo $tsData['status']['r_name']; ?>" src="<? echo $tsConfig['default']; ?>/images/icons/ran/<? echo $tsData['status']['r_image']; ?>" class="vctip"/>
                <? 
                if ($tsData['p_sitio'])
                {        
                ?>
                    <a href="http://<? echo $tsData['p_sitio']; ?>">
                    <img src="<? echo $tsConfig['default']; ?>/images/icons/www.png" title="Sitio web" class="vctip"/></a>
                <?    
                }
                if ($tsUser->uid != $tsData['user_id'] && $tsUser->is_member)
                {        
                ?>
                    <a onclick="mensaje.nuevo('<? echo $tsData[user_name]; ?>','','','');return false" href="#">
                    <img src="<? echo $tsConfig['default']; ?>/images/icon-mensajes-recibidos.gif" title="Enviar mensaje privado" class="vctip"/></a>
                <?    
                }
		if ($tsUser->is_admod == 1)
                {
                ?>
                    <img title="Administrar" src="<? echo $tsConfig['default']; ?>/images/icons/editar.png" style="width:14px;height:14px;cursor:pointer;" class="vctip" onclick="location.href = '<? echo $tsConfig[url]; ?>/admin/users?act=show&amp;uid=<? echo $tsData[user_id];?>'"/>
                <?                
                } 
                ?>
		</p>
        </div>
        <div class="description">
            <div class="description-inner" style="border-top:1px dashed #DDD">
                <?
                if ($tsData['p_mensaje'])
                {
                ?>
                <p><strong>Mensaje:</strong> {$tsData.p_mensaje}</p>
                <div style="border-top:1px dashed #DDD;line-height:1px">&nbsp;</div>
                <?
                }
                ?>
                <strong>Estad&iacute;sticas:</strong>
                <ul class="user_stats">
                    <li class="first">
                        <span class="stat"><? echo $tsData['stats']['user_puntos']; ?></span>
                        <span class="type">Puntos</span>
                    </li>
                    <li>
                        <span class="stat"><? echo $tsData['stats']['user_posts']; ?></span>
                        <span class="type">Posts</span>
                    </li>
                    <li>
                        <span class="stat"><? echo $tsData['stats']['user_comentarios']; ?></span>
                        <span class="type">Comentarios</span>
                    </li>
                    <li class="last">
                        <span class="stat mft_<? echo $tsData['user_id']; ?>"><? echo $tsData['stats']['user_seguidores']; ?></span>
                        <span class="type">Seguidores</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="follow-controls">
        <? 
        if ($tsUser->uid != $tsData['user_id'] && $tsUser->is_member)
        {
        ?>
            <a class="btn_g mf_<? echo $tsData['user_id']; ?>" onclick="notifica.unfollow('user', <? echo $tsData['user_id']; ?>, notifica.userInMencionHandle, $(this).children('span'))" {if $tsData.follow == 0}style="display: none;"{/if}><span class="icons unfollow">Dejar de seguir</span></a>
            <a class="btn_g mf_<? echo $tsData['user_id']; ?>" onclick="notifica.follow('user', <? echo $tsData['user_id']; ?>, notifica.userInMencionHandle, $(this).children('span'))" {if $tsData.follow == 1}style="display: none;"{/if}><span class="icons follow">Seguir Usuario</span></a>
        <?        
        }
        ?>
        </div>
    </div>
</div>