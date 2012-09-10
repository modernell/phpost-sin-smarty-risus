                                <div class="boxy-title">
                                    <h3>Moderaci&oacute;n de posts</h3>
                                </div>
                                <div id="res" class="boxy-content">
                                <?    
                                if( $tsSave)
                                {
                                ?>
                                <div style="display: block;" class="mensajes ok">Tus cambios han sido guardados.</div>
                                <?
                                }
                                
                                if ($tsAct == '')
                                {
                                ?>
                                    Recuerda leer el protocolo para poder moderar los post que han sido denunciados por otros usuarios, 
                                    si te es posible y se puede editar un post no lo borres, <b>Editalo!</b> 
                                    <hr class="separator" />
                                    <table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
                                    	<thead>
                                            <th>Denuncias</th>
                                            <th>Post</th>
                                            <th>Fecha</th>
                                            <th>Raz&oacute;n</th>
                                            <th>Acciones</th>
                                        </thead>
                                        <tbody>
                                        <?    
                                        if ($tsReports)
                                        { 
                                            foreach ($tsReports as $r)
                                            {   
                                            ?>    
                                            <tr id="report_<? echo $r['post_id']; ?>">
                                            	<td><? echo $r['total']; ?></td>
                                                <td><a href="<? echo $tsConfig['url']; ?>/posts/<? echo $r['c_seo']; ?>/<? echo $r['post_id']; ?>/<? echo string_seo($r['post_title']); ?>.html" target="_blank"><? echo string_truncate($r['post_title'],30); ?></a></td>
                                                <td><? echo modifier_hace($r['d_date']); ?></td>
                                                <td><? echo $tsDenuncias[$r['d_razon']]; ?></td>
                                                <td class="admin_actions">
                                                    <a href="<? echo $tsConfig['url']; ?>/moderacion/posts?act=info&obj=<? echo $r['post_id']; ?>">
                                                        <img src="<? echo $tsConfig['default']; ?>/images/icons/details.png" title="Ver Detalles" /></a>
                                                    <a href="#" onclick="mod.posts.view(<? echo $r['post_id']; ?>); return false;">
                                                        <img src="<? echo $tsConfig['default']; ?>/images/icons/find.png" title="Ver Post" /></a>
                                                    <?
                                                    if ($tsUser->is_admod || $tsUser->permisos['mocdp'])
                                                    {
                                                    ?>
                                                    <a href="#" onclick="mod.reboot(<? echo $r['post_id']; ?>, 'posts', 'reboot', false); return false;">
                                                        <img src="<? echo $tsConfig['default']; ?>/images/icons/reboot.png" title="<? if ($r['post_status'] == 1) echo 'Reactivar Post'; else echo 'Desechar denuncias'; ?>" />
                                                    </a>
                                                    <?
                                                    }
                                                    if ($tsUser->is_admod || $tsUser->permisos['moedpo'])
                                                    {
                                                    ?>
                                                    <a href="<? echo $tsConfig['url']; ?>/posts/editar/<? echo $r['post_id']; ?>" target="_blank">
                                                        <img src="<? echo $tsConfig['default']; ?>/images/icons/edit.png" title="Editar Post" /></a>
                                                    <?
                                                    }
                                                    if ($tsUser->is_admod || $tsUser->permisos['moep'])
                                                    {
                                                    ?>
                                                    <a href="#" onclick="mod.posts.borrar(<? echo $r['post_id']; ?>, false); return false">
                                                        <img src="<? echo $tsConfig['default']; ?>/images/icons/close.png" title="Borrar Post" /></a>
                                                    <?
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?                                            
                                            }
                                            }
                                            else
                                            {
                                            ?>
                                            <tr>
                                                <td colspan="5"><div class="emptyData">No hay post denunciados hasta el momento.</div></td>
                                            </tr>
                                            <?
                                            }     
                                            ?>       
                                        </tbody>
                                        <tfoot>
                                            <th colspan="5">&nbsp;</th>
                                        </tfoot>
                                    </table>
                                    <?
                                    }
                                    elseif ($tsAct == 'info')
                                    {
                                    ?>
                                    <h2 style="border-bottom:1px dashed #CCC; padding-bottom:5px;">
                                        <a href="<? echo $tsConfig['url']; ?>/posts/<? echo $tsDenuncia['data']['c_seo']; ?>/<? echo $tsDenuncia['data']['post_id']; ?>/{$tsDenuncia.data.post_title|seo}.html" target="_blank">
                                            <? echo $tsDenuncia['data']['post_title']; ?></a> de 
                                        <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $tsDenuncia['data']['user_name']; ?>">
                                            <? echo $tsDenuncia['data']['user_name']; ?>
                                        </a> 
                                        <span class="floatR admin_actions">
                                            <a href="#" onclick="mod.posts.view(<? echo $tsDenuncia['data']['post_id']; ?>); return false">
                                                <img src="<? echo $tsConfig['default'];?>/images/icons/find.png" title="Ver Post" /></a>
                                            <?
                                            if ($tsUser->is_admod || $tsUser->permisos['mocdp'])
                                            {
                                            ?>
                                            <a href="#" onclick="mod.reboot(<? echo $tsDenuncia['data']['post_id']; ?>, 'posts', 'reboot', true); return false">
                                                <img src="<? echo $tsConfig['default']; ?>/images/icons/reboot.png" title="<? if ($tsDenuncia['data']['post_status'] == 1) echo 'Reactivar Post'; else echo 'Desechar denuncias';?>" />
                                            </a>
                                            <?
                                            }
                                            if ($tsUser->is_admod || $tsUser->permisos['moedpo'])
                                            {
                                            ?>
                                            <a href="<? echo $tsConfig['url']; ?>/posts/editar/<? echo $tsDenuncia['data']['post_id']; ?>" target="_blank">
                                                <img src="<? echo $tsConfig['default']; ?>/images/icons/edit.png" title="Editar Post" /></a>
                                            <?                                            
                                            }
                                            if ($tsUser->is_admod || $tsUser->permisos['moep'])
                                            {
                                            ?>
                                            <a href="#" onclick="mod.posts.borrar(<? echo $tsDenuncia['data']['post_id']; ?>, 'posts', true); return false">
                                                <img src="<? echo $tsConfig['default']; ?>/images/icons/close.png" title="Borrar Post" />
                                            </a>
                                            <?
                                            }
                                            ?>
                                        </span>
                                    </h2>
                                    <table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
                                    	<thead>
                                            <th>Denunciante</th>
                                            <th>Raz&oacute;n</th>
                                            <th>Informaci&oacute;n extra</th>
                                            <th>Fecha</th>
                                        </thead>
                                        <tbody>
                                            <?
                                        	foreach ($tsDenuncia['denun'] as $d)
                                                {
                                                ?>
                                            <tr>
                                            	<td><a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $d['user_name']; ?>"><? echo $d['user_name']; ?></a></td>
                                                <td><? echo $tsDenuncias[$d['d_razon']]; ?></td>
                                                <td><? echo $d['d_extra']; ?></td>
                                                <td><? echo modifier_hace($d['d_date']); ?></td>
                                            </tr>
                                            <?
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <th colspan="5">&nbsp;</th>
                                        </tfoot>
                                    </table>
                                    <?
                                    }
                                    ?>
                                </div>