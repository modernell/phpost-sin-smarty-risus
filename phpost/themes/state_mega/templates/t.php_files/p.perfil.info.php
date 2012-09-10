1:
<div id="perfil_info" status="activo">
    <div class="widget big-info clearfix">
        <div class="title-w clearfix">
            <h3>Informaci&oacute;n de <? echo $tsUsername; ?></h3>
        </div>
        <ul>
            <li><label>Pa&iacute;s</label><strong><? echo $tsPais; ?></strong></li>
            <?
            if ($tsPerfil['p_sitio'])
            {
            ?>
            <li>
                <label>Sitio Web</label>
                <strong>
                    <a rel="nofollow" href="<? echo $tsPerfil['p_sitio'];?>"><? echo $tsPerfil['p_sitio'];?></a>
                </strong>
            </li>
            <?
            }
            ?>
            <li><label>Es usuario desde</label>
                <strong><? echo $tsPerfil['user_registro']; ?>|fecha:"d_Ms_a"}</strong></li>
            <li>
                <label>&Uacute;ltima vez activo</label><strong>{$tsPerfil.user_lastactive|fecha}</strong>
            </li>
            <?
			if ($tsPerfil['p_estudios'])
                        {
                        ?>
                        <li>
                            <label>Estudios</label>
                            <strong><? echo $tsPData['estudios'][$tsPerfil['p_estudios']]; ?></strong>
                        </li>
                        <?
                        }
                        ?>
			<li class="sep"><h4>Idiomas</h4></li>
            <?            
            foreach ($tsPData['idiomas'] as $iid =>$idioma)
            {
                if ($tsPerfil['p_idiomas'][$iid] != 0)
                {
                ?>
                <li>
                    <label><? echo $idioma; ?></label>
                    <?
                    foreach ($tsPData['inivel'] as $val=>$text)
                    {
                    if ($tsPerfil['p_idiomas'][$iid] == $val)
                    {
                    ?>
                        <strong><? echo $text; ?></strong>
                    <?
                    }
                    }
                    ?>
                </li>
                <?
                }
            }
            ?>
            <li class="sep"><h4>Datos profesionales</h4></li>
            <?
            if ($tsPerfil['p_profesion'])
            {
            ?>
            <li><label>Profesi&oacute;n</label><strong><? echo $tsPerfil['p_profesion']; ?></strong></li>
            <?
            }            
            if ($tsPerfil['p_empresa'])
            {
            ?>
            <li><label>Empresa</label><strong><? echo $tsPerfil['p_empresa']; ?></strong></li>
            <?
            }            
            if ($tsPerfil['p_sector'])
            {
            ?>
            <li>
                <label>Sector</label>
                <strong>
                    <? echo $tsPData['sector'][$tsPerfil['p_sector']]; ?>
            </strong>
            </li>
            <?
            }
            
            if ($tsPerfil['p_ingresos'])
            {
            ?>
            <li><label>Ingresos</label><strong>
                    <? echo $tsPData['ingresos'][$tsPerfil['p_ingresos']]; ?>
                </strong></li>
            <?
            }            
            if ($tsPerfil['p_int_prof'])
            {
            ?>
            <li><label>Intereses profesionales</label><strong><? echo $tsPerfil['p_int_prof']; ?></strong></li>
            <?
            }
            
            if ($tsPerfil['p_hab_prof'])
            {
            ?>
            <li><label>Habilidades profesionales</label><strong><? echo $tsPerfil['p_hab_prof']; ?></strong></li>
            <?
            }
            ?>
		<li class="sep"><h4>Vida personal</h4></li>
            <?    
            if ($tsGustos == 'show')
            {
            ?>
            <li><label>Le gustar&iacute;a</label><strong>
            <?        
            foreach ($tsPData['gustos'] as $val=>$text)
            {        
             if ($tsPerfil['p_gustos'][$val] == 1) echo $text.',';
            }
            ?>
            </strong></li>
            <?
            }            
            if ($tsPerfil['p_estado'])
            {
            ?>
            <li><label>Estado civil</label><strong><? echo $tsPData['estado'][$tsPerfil['p_estado']];//$tsPerfil['p_estado']; ?></strong></li>
            <?
            }
            
            if ($tsPerfil['p_hijos'])
            {
            ?>
            <li><label>Hijos</label><strong><? echo $tsPData['hijos'][$tsPerfil['p_hijos']];?></strong></li>
            <?
            }
            ?>
            <? 
            if ($tsPerfil['p_vivo'])
            {
            ?>        
            <li><label>Vive con</label><strong><? echo $tsPData['vivo'][$tsPerfil['p_vivo']]; ?></strong></li>
            <?
            }
            ?>
            <li class="sep"><h4>&iquest;C&oacute;mo es?</h4></li>
            <?
            if ($tsPerfil['p_altura'])
            {
            ?>
            <li><label>Mide</label><strong><? echo $tsPerfil['p_altura']; ?> centimetros</strong></li>
            <?
            }
            
            if ($tsPerfil['p_peso'])
            {
            ?>
            <li><label>Pesa</label><strong><? echo $tsPerfil['p_peso']; ?> kilos</strong></li>
            <?
            }            
            if ($tsPerfil['p_pelo'])
            {
            ?>
            <li><label>Su pelo es</label><strong><? echo $tsPData['pelo'][$tsPerfil['p_pelo']]; ?></strong></li>
            <?
            }            
            if ($tsPerfil['p_ojos'])
            {
            ?>
            <li><label>Sus ojos son</label><strong><? echo $tsPData['ojos'][$tsPerfil['p_ojos']]; ?></strong></li>
            <?
            }
            if ($tsPerfil['p_fisico'])
            {
            ?>
            <li><label>Su f&iacute;sico es</label><strong><? echo $tsPData['fisico'][$tsPerfil['p_fisico']]; ?></strong></li>
            <?
            }            
            if ($tsPerfil['p_tengo'][0] != 0 || $tsPerfil['p_tengo'][1] != 0)
            {        
            foreach ($tsPData['tengo'] as $val=>$text)
            {
            ?>
            <li><label></label>
                <strong><? if ($tsPerfil['p_tengo'][$val] == 1) echo 'Tiene'; else echo 'No tiene'; ?><? echo $text; ?></strong>
            </li>
            <?
            }
            }
            ?>
            <li class="sep"><h4>Habitos personales</h4></li>
            <?
            if ($tsPerfil['p_dieta'])
            {
            ?>
                <li><label>Mantiene una dieta</label><strong><? echo $tsPData['dieta'][$tsPerfil['p_dieta']];?></strong></li>
            <?
            }            
            if ($tsPerfil['p_fumo'])
            {
            ?>
            <li><label>Fuma</label><strong><? echo $tsPData['fumo_tomo'][$tsPerfil['p_fumo']]; ?></strong></li>
            <?
            }            
            if ($tsPerfil['p_tomo'])
            {
            ?>
            <li><label>Toma alcohol</label><strong><? echo $tsPData['fumo_tomo'][$tsPerfil['p_tomo']];?></strong></li>
            <?
            }
            ?>
            <li class="sep"><h4>Sus propias palabras</h4></li>
            <?
            if ($tsPerfil['p_intereses'])
            {
            ?>    
            <li><label>Intereses</label><strong><? echo $tsPerfil['p_intereses']; ?></strong></li>
            <?
            }            
            if ($tsPerfil['p_hobbies'])
            {
            ?>
            <li><label>Hobbies</label><strong><? echo $tsPerfil['p_hobbies']; ?></strong></li>
            <?
            }            
            if( $tsPerfil['p_tv'])
            {
            ?>
            <li><label>Series de TV favoritas</label><strong><? echo $tsPerfil['p_tv']; ?></strong></li>
            <?
            }
            if( $tsPerfil['p_musica'])
            {
            ?>			
            <li><label>M&uacute;sica favorita</label><strong><? echo $tsPerfil['p_musica']; ?></strong></li>
            <?            
            }
            if( $tsPerfil['p_deportes'])
            {
            ?>
            <li><label>Deportes y Equipos</label><strong><?=$tsPerfil['p_deportes']; ?></strong></li>
            <?            
            }            
            if( $tsPerfil['p_libros'])
            {
            ?>	
            <li><label>Libros favoritos</label><strong><? echo $tsPerfil['p_libros']; ?></strong></li>
            <?            
            }
            if( $tsPerfil['p_peliculas'])
            {
            ?>
            <li><label>Pel&iacute;culas favoritas</label><strong><? echo $tsPerfil['p_peliculas']; ?></strong></li>
            <?
            }            
            if( $tsPerfil['p_comida'])
            {
            ?>			
            <li><label>Comida favor&iacute;ta</label><strong><? echo $tsPerfil['p_comida']; ?></strong></li>
            <?             
            }
            if( $tsPerfil['p_heroes'])
            {
            ?>
            <li><label>Sus heroes son</label><strong><? echo $tsPerfil['p_heroes']; ?></strong></li>
            <? } ?>
        </ul>
    </div>
</div>