                		<div class="post-relacionados">
    	                	<h4>Otros posts que te van a interesar:</h4>
                            <ul>
                                <? 
                            	if ($tsRelated)
                                {
                                foreach($tsRelated as $p)
                                {    
                                ?>
                                    <li class="categoriaPost" style="background-image:url(<?  echo $tsConfig['tema']['t_url']; ?>/images/icons/cat/<? echo $p['c_img'];?>)">
                                            <a class="{if $p.post_private}categoria privado{/if}"title="<?  echo $p['post_title'] ?>" href="<? echo $tsConfig['url'].'/posts/'.$p['c_seo'].'/'.$p['post_id'].'/'.string_seo($p['post_title']); ?>.html" rel="dc:relation"><? echo $p['post_title']; ?></a>
                                    </li>
                                <?                                
                                }                                
                                }
                                else
                                {
                                ?>
                                <li>No se encontraron posts relacionados.</li>
                                <?                                
                                }
                                ?>
                            </ul>
	                    </div>