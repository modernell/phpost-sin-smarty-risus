1:
<div id="perfil_posts" status="activo">
    <div class="widget w-posts clearfix">
    	<div class="title-w clearfix">
            <h3>&Uacute;ltimos Posts creados por <? echo $tsUsername;?></h3>
            <span><a title="" href="/rss/posts-usuario/" class="systemicons sRss"></a></span>
        </div>
        <?
        if ($tsGeneral['posts'])
        {
        ?>
        <ul class="ultimos">
            <?
            foreach ($tsGeneral['posts'] as $p)
            {
            ?>
        	<li class="categoriaPost" style="background-image:url(<? echo $tsConfig['tema']['t_url']; ?>/images/icons/cat/<? echo $p['c_img']; ?>)">
                <a title="<? echo $p['post_title']; ?>" target="_self" href="<? echo $tsConfig['url']; ?>/posts/<? echo $p['c_seo']; ?>/<? echo $p['post_id']; ?>/<? echo string_seo($p['post_title']); ?>.html"><? echo string_truncate($p['post_title'],45); ?></a>
                <span><? echo $p['post_puntos'];?> Puntos</span>
            </li>
            <?
            }            
            if ($tsGeneral['total'] >= 18)
            {
            ?>
            <li class="see-more"><a href="<? echo $tsConfig['url']; ?>/buscador/?autor=<? echo $tsGeneral['username']; ?>">Ver m&aacute;s &raquo;</a></li>
            <?
            }
            ?>
        </ul>
        <?
        }
        else
        {
        ?>    
        <div class="emptyData">No hay posts</div>
        <?
        }
        ?>
    </div>
</div>