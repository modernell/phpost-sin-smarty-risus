                <div id="centroDerecha" style="width: 705px; float: left;">
                	<div class="">
                        <h2 style="font-size: 15px;">&Uacute;ltimas <? echo $tsData['total']; ?> notificaciones</h2>
                    </div>
                    <?
                    if ($tsData.data)
                    {
                    ?>
                    <ul class="notification-detail listado-content">
                        <?
                    	foreach ($tsData['data'] as $noti)
                        {
                        ?>
                    	<li<? if ($noti['unread'] > 0) echo ' class="unread"'; ?>>
                        	<div class="avatar-box" style="z-index: 99;">
                            	<a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $noti['user']; ?>">
                            		<img height="32" width="32" src="<? echo $tsConfig['url']; ?>/files/avatar/<? echo $noti['avatar']; ?>"/>
                                </a>
                            </div>
                            <div class="notification-info">
                            	<span><? if ($noti['total'] == 1){ ?>
                                    <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $noti['user']; ?>"><? echo $noti['user']; ?></a><? } ?>
                            	<span title="<? echo date_formatter($noti['date']); ?>" class="time"><? echo date_formatter($noti['date']); ?></span>
                                </span>
                                <span class="action">
                                	<span class="monac_icons ma_{$noti.style}"></span><? echo $noti['text']; ?>
                                    <a href="<? echo $noti['link']; ?>"><? echo $noti['ltext']; ?></a>
                                </span>
                            </div>
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
                    <div class="emptyData">No tienes notificaciones</div>
                    <?
                    }
                    ?>
                </div>
