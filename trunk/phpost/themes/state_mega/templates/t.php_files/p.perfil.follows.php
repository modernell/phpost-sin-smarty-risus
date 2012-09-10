1:
<?
if ($tsHide != 'true')
{
?>
<div id="perfil_{$tsType}" class="widget" status="activo">
<?
}
?>
	<div class="title-w clearfix">
        <h2><? if ($tsType == 'seguidores') echo 'Usuarios que siguen a '.$tsUsername; else echo 'Usuarios que '.$tsUsername.' sigue'; ?></h2>
    </div>
    <?
    if ($tsData['data'])
    {
    ?>
    <ul class="listado">
        <?
        foreach ($tsData['data'] as $u)
        {
        ?>
        <li class="clearfix">
        	<div class="listado-content clearfix">
        		<div class="listado-avatar">
        			<a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $u['user_name']; ?>">
                                    <img src="<? echo $tsConfig['url']; ?>/files/avatar/<? echo $u['user_id']; ?>_50.jpg" width="32" height="32"/></a>
        		</div>
        		<div class="txt">
        			<a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $u['user_name']; ?>"><? echo $u['user_name']; ?></a><br>
        			<img src="<? echo $tsConfig['images']; ?>/flags/<? echo $u['user_pais']; ?>.png"/>
                                <span class="grey"><? echo $u['p_mensaje']; ?></span>
        		</div>
        	</div>
        </li>
        <?
        }
        ?>
        <li class="listado-paginador clearfix">
            <?
    		if ($tsData['pages']['prev'] != 0)
                {
                ?>
                <a href="#" onclick="perfil.follows('<? echo $tsType; ?>', <? echo $tsData['pages']['prev']; ?>); return false;" class="anterior-listado floatL">Anterior</a>
                <?
                }
    		if ($tsData['pages']['next'] != 0)
                {
                ?>
                <a href="#" onclick="perfil.follows('<? echo $tsType; ?>', <? echo $tsData['pages']['next']; ?>); return false;" class="siguiente-listado floatR">Siguiente</a>
                <?
                }
                ?>
        </li>
    </ul>
    <?
    }
    else
    {
    ?>    
    <div class="emptyData"><? if ($tsType == 'seguidores') echo 'No tiene seguidores'; else echo 'No sigue usuarios'; ?></div>
 <?   
   }   
if ($tsHide != 'true')
{
?>    
</div>
<?
}
?>