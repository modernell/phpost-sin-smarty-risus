1:
<div id="perfil_medallas" class="widget" status="activo">
	<div class="title-w clearfix">
        <h2>Medallas de <? echo $tsUsername; ?> (<? echo $tsMedallas['total']; ?>)</h2>
    </div>
    <?
    if ($tsMedallas['medallas'])
    {
    ?>
        <ul class="listado">
        <?    
        foreach ($tsMedallas['medallas'] as $m)
        {
        ?>
        <li class="clearfix">
        	<div class="listado-content clearfix">
        		<div class="listado-avatar">
        			<img src="<? echo $tsConfig['tema']['t_url']; ?>/images/icons/med/<? echo $m['m_image']; ?>_32.png" class="qtip" title="{$m.medal_date|hace:true}" width="32" height="32"/>
        		</div>
        		<div class="txt">
        			<strong><? echo $m['m_title']; ?></strong><br />
					<? echo $m['m_description']; ?>
        		</div>
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
        <div class="emptyData">No tiene medallas</div>
        <?
        }
        ?>
</div>