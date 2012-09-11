                    <?        
                    if ($tsMensajes)
                    {                    
                    ?>
                            <ul id="mpList">
                                <?
                                foreach ($tsMensajes as $av)
                                {
                                ?>
                                <li id="av_<? echo $av['av_id']; ?>" <? if ($av['av_read'] == 0) echo 'class="unread"'; ?>>
                                    <table class="uiGrid" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td class="main_col">
                                                <a href="<? echo $tsConfig['url']; ?>/mensajes/avisos/?aid=<? echo $av['av_id']; ?>">
                                                    <div class="mpContent clearBoth">
                                                        <img src="<? echo $tsConfig['default']; ?>/images/icons/avtype_<? echo $av['av_type']; ?>.png" style="width:48px;height:48px;margin-top:2px;" />
                                                        <div class="mp_time"><? echo date_formatter($av['av_date']); ?></div>
                                                        <div class="mp_desc">
                                                            <div class="autor"><strong><? echo $tsConfig['titulo']; ?></strong></div>
                                                            <div class="subject"><? echo $av['av_subject']; ?></div>
                                                            <div class="preview"><? echo string_truncate($av['av_body'],7); ?></div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="plm">&nbsp;</td>
                                            <td class="pls">
                                                <a href="<? echo $tsConfig['url']; ?>/mensajes/avisos/?did=<? echo $av['av_id']; ?>" class="qtip" title="Eliminar"><i class="delete"></i></a>
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
                            elseif ($tsMensaje['av_id'] > 0)
                            {
                            ?>    
                            <div class="mpRContent">
                                <div class="mpHeader">
                                    <h2><? echo $tsMensaje['av_subject']; ?></h2>
                                </div>
                                <div class="mpUser">
                                    <span class="info">
                                        <a href="<? echo $tsConfig['url']; ?>"><? echo $tsConfig['titulo']; ?></a>
                                        <span class="floatR"><? echo date_formatter($tsMensaje['av_date']); ?></span>
                                    </span>
                                </div>
                                <ul class="mpHistory" id="historial">
                                    <li>
                                        <div class="main clearBoth">
                                            <div class="autor-image">
                                                <img src="<? echo $tsConfig['default']; ?>/images/icons/avtype_<? echo $tsMensaje['av_type'];?>.png" /></div>
                                            <div class="mensaje">
                                                <div><a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $mp['user_name'];?>" class="autor-name"><? echo $mp['user_name'];?></a> </div>
                                                <div><? echo nl2br($tsMensaje['av_body']);?></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="mpForm">
                                    <div class="form">
                                        <span>&nbsp;</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mpOptions">
                                <div class="info"><h2>Acciones</h2></div>
                                <ul class="actions-list">
                                    <li><a href="<? echo $tsConfig['url']; ?>/mensajes/avisos/?did=<? echo $tsMensaje['av_id']; ?>">Eliminar</a></li>
                                    <li class="div"></li>
                                    <li><a href="<? echo $tsConfig['url']; ?>/mensajes/avisos/">&laquo; Volver a avisos</a></li>
                                </ul>
                            </div>
                            <div class="clearBoth"></div>
                            <?
                            }
                            else
                            {
                            ?>
                            <div class="emptyMensajes"><? if ($tsMensaje) echo $tsMensaje; else echo 'No hay avisos o alertas'; ?></div>
                            <?
                            }
                            ?>