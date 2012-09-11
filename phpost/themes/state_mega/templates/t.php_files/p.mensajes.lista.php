<?
if ($tsMensajes['data'])
{
    foreach ($tsMensajes['data'] as $mp)
    {
    ?>
	<li<? if ($mp['mp_read_to'] == 0 || $mp['mp_read_mon_to'] == 0) echo ' class="unread"';   ?>>
        <a href="<? echo $tsConfig['url']; ?>/mensajes/leer/<? echo $mp['mp_id']; ?>" title="<? echo $mp['mp_subject']; ?>">
            <img src="<? echo $tsConfig['url']; ?>/files/avatar/<? echo $mp['mp_from']; ?>_50.jpg" alt="<? echo $mp['user_name']; ?>"/>
            <div class="content clearfix">
                <div class="subject"><? echo $mp['mp_subject']; ?></div>
                <div class="preview">
                    <? echo $mp['mp_preview']; ?>
                </div>
                <div class="time">
                    <span class="autor"><? echo $mp['user_name']; ?></span> | <? echo date_formatter($mp['mp_date']); ?>
                </div>
            </div>
        </a>
    </li>
    <?
    }
}
else
{
?>    
    <div class="emptyData">No tienes mensajes</div>
    <?
}
    ?>