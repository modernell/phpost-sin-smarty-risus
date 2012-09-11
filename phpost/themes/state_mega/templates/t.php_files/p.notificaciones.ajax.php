<?    
if ($tsData)
{
	foreach($tsData as $noti)
        {
        ?>
   	<li<? if ($noti['unread'] > 0) echo ' class="unread"'; ?>>
            <span class="monac_icons ma_<? echo $noti['style']; ?>"></span>
            {if $noti.total == 1}
            <a href="{$tsConfig.url}/perfil/{$noti.user}" title="{$noti.user}"><? echo $noti['user'];?></a>
            {/if} 
            {$noti.text} 
            <a title="{$noti.ltit}" class="obj" href="{$noti.link}"><? echo $noti['ltext']; ?></a>
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