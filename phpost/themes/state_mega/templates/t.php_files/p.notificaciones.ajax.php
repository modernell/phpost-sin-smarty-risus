<?    
if ($tsData)
{
	foreach($tsData as $noti)
        {
        ?>
   	<li<? if ($noti['unread'] > 0) echo ' class="unread"'; ?>>
            <span class="monac_icons ma_<? echo $noti['style']; ?>"></span>
            <?
            if ($noti['total']== 1)
            {
            ?>
            <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $noti['user']; ?>" title="<? echo $noti['user']; ?>"><? echo $noti['user'];?></a>
            <?
            }
            echo $noti['text']; 
            ?>
            <a title="<? echo $noti['ltit']; ?>" class="obj" href="<? echo $noti['link']; ?>"><? echo $noti['ltext']; ?></a>
        </li>
    <?    
    }
    }
    else
    {
    ?>    
    <li style="padding:10px;"><b>No hay notificaciones</b></li>
    <?
    }
    ?>