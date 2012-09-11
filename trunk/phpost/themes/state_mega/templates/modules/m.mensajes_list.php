                <?            
                if ($tsMensajes['data'])
                {
                ?>          
                            <ul id="mpList">
                                <?
                                foreach ($tsMensajes['data'] as $mp)
                                {
                                ?>
                                <li id="mp_<? echo $mp['mp_id']; ?>" <? if ($mp['mp_read_to'] == 0) echo 'class="unread"'; ?>>
                                    <table class="uiGrid" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td class="main_col">
                                                <a href="<? echo $tsConfig['url']; ?>/mensajes/leer/<? echo $mp['mp_id']; ?>">
                                                    <div class="mpContent clearBoth">
                                                        <img src="<? echo $tsConfig['url']; ?>/files/avatar/<? echo $mp['mp_from']; ?>_50.jpg" />
                                                        <div class="mp_time"><? echo date_formatter($mp['mp_date'],'d_Ms_a'); ?></div>
                                                        <div class="mp_desc">
                                                            <div class="autor"><strong><? echo $mp['user_name']; ?></strong></div>
                                                            <div class="subject"><? echo $mp['mp_subject']; ?></div>
                                                            <div class="preview">
                                                                <?
                                                                if ($mp['mp_type'] == 1)
                                                                {
                                                                ?>
                                                                <i class="return"></i>                                                                
                                                               <?                                                               
                                                               }
                                                               echo $mp['mp_preview']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="plm">
                                              	<a href="#" class="qtip read" title="Marcar como le&iacute;do" onclick="mensaje.marcar('<? echo $mp[mp_id]; ?>:<? echo $mp[mp_type]; ?>}', 0, 1, this); return false;" <? if ($mp['mp_read_to'] == 1) echo 'style="display:none"'; ?>><i class="read"></i></a>
                                                <a href="#" class="qtip unread" title="Marcar como no le&iacute;do" onclick="mensaje.marcar('<? echo $mp[mp_id]; ?>:<? echo $mp[mp_type]; ?>', 1, 1, this); return false;" <? if ($mp['mp_read_to'] == 0) echo 'style="display:none"'; ?>><i class="unread"></i></a>
                                            </td>
                                            <td class="pls">
                                                <a href="#" class="qtip" title="Eliminar" onclick="mensaje.eliminar('<? echo $mp[mp_id]; ?>:<? echo $mp[mp_type]; ?>',1); return false;"><i class="delete"></i></a>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                                <?
                                }
                                ?>
                            </ul>
                         <?
                         }
                         else
                         {
                         ?>    
                            <div class="emptyMensajes">No hay mensajes</div>
                         <?
                         }
                         ?>
                            <div class="mpFooter">
                                <div class="actions">
                                    <?
                                    if ($tsAction == '')
                                    {
                                    ?>
                                    <strong>Ver: </strong>
                                        <?
                                        if ($tsQT == '')
                                        {
                                        ?>
                                        <a href="<? echo $tsConfig['url']; ?>/mensajes/?qt=unread">No le&iacute;dos</a>
                                        <?
                                        }
                                        else
                                        {
                                        ?>
                                        <a href="<? echo $tsConfig['url']; ?>/mensajes/">Todos los mensajes</a>
                                        <?
                                        }
                                        }
                                       ?>
                                </div>
                                <div class="paginador">
                                    <?
                                    if ($tsMensajes['pages']['prev'] != 0)
                                    {
                                    ?>
                                    <div style="text-align:left" class="floatL">
                                        <a href="<? echo $tsConfig['url']; ?>/mensajes/<? if ($tsAction) echo $tsAction.'/'; ?>?page=<? echo $tsMensajes['pages']['prev']; if ($tsQT != '') echo '&qt=unread'; ?>">&laquo; Anterior</a></div>
                                    <?
                                    }
                                    if ($tsMensajes['pages']['next'] != 0)
                                    {
                                    ?>
                                    <div style="text-align:right" class="floatR">
                                        <a href="<? echo $tsConfig['url']; ?>/mensajes/<? if ($tsAction) echo $tsAction.'/'; ?>?page=<? echo $tsMensajes['pages']['next']; if ($tsQT != '') echo '&qt=unread'; ?>">Siguiente &raquo;</a></div>
                                    <?
                                    }
                                    ?>
                                </div>
                                <div class="clearBoth"></div>
                            </div>