					<div id="topsPostBox">
                        <div class="box_title">
                            <div class="box_txt estadisticas">TOPs posts <a class="size9" href="<? echo $tsConfig['url']; ?>/top/">(Ver m&aacute;s)</a></div>
                            <div class="box_rss">
                            	<a href="/rss/top-post-semana"><span class="systemicons sRss"></span></a>
                            </div>
                        </div>
                        <div class="box_cuerpo" style="padding: 0pt; height: 330px;">
                        	<div class="filterBy">
                            	<a href="javascript:TopsTabs('topsPostBox','Ayer')" id="Ayer">Ayer</a> -
                            	<a href="javascript:TopsTabs('topsPostBox','Semana')" id="Semana"<? if ($tsTopPosts['semana']) echo 'class="here"'; ?>>Semana</a> -
                                <a href="javascript:TopsTabs('topsPostBox','Mes')" id="Mes">Mes</a> -
                                <a href="javascript:TopsTabs('topsPostBox','Historico')" id="Historico"<? if ($tsTopPosts['semana']) echo 'class="here"'; ?>>Hist&oacute;rico</a>
                            </div>
                            <ol id="filterByAyer" class="filterBy cleanlist" style="display:none;">
                            <? 
                            foreach ($tsTopPosts['ayer'] as $key=>$p)
                            {
                            ?>
				<li>
                                	<? if ($i+1 < 10){ echo 0; } echo $i+1; ?> 
                                	<a href="<? echo $tsConfig['url'].'/posts/'.$p['c_seo'].'/'.$p['post_id'].'/'.string_seo($p['post_title']).'.html';?>"><? echo string_truncate($p['post_title'],55); ?></a>
                                    <span><? echo $p['post_puntos']; ?></span>
                                </li>
                            <? } ?>
                            </ol>
                            <ol id="filterBySemana" class="filterBy cleanlist" style="display:<? if (!$tsTopPosts['semana']) echo 'block'; else echo 'none';?>;">
                            <? 
                            foreach ($tsTopPosts['semana'] as $key=>$p)
                            {
                            ?>
				<li>
                                	<? if ($i+1 < 10){ echo 0; } echo $i+1; ?>
                                	<a href="<? echo $tsConfig['url'].'/posts/'.$p['c_seo'].'/'.$p['post_id'].'/'.string_seo($p['post_title']).'.html';?>"><? echo string_truncate($p['post_title'],45); ?></a>
                                    <span><? echo $p['post_puntos']; ?></span>
                                </li>
                            <? } ?>
                            </ol>
                            <ol id="filterByMes" class="filterBy cleanlist" style="display:none;">
                            <? 
                            foreach ($tsTopPosts['mes'] as $key=>$p)
                            {
                            ?>
				<li>
                                	<? if ($i+1 < 10){ echo 0; } echo $i+1; ?>
                                	<a href="<? echo $tsConfig['url'].'/posts/'.$p['c_seo'].'/'.$p['post_id'].'/'.string_seo($p['post_title']).'.html';?>"><? echo string_truncate($p['post_title'],45); ?></a>
                                    <span><? echo $p['post_puntos']; ?></span>
                                </li>
                            <? } ?>
                            </ol>
                            <ol id="filterByHistorico" class="filterBy cleanlist" style="display:<? if (!$tsTopPosts.semana) echo 'block'; else echo 'none';?>;">
                            <? 
                            foreach ($tsTopPosts['historico'] as $key=>$p)
                            {
                            ?>
				<li>
	                                <? if ($i+1 < 10){ echo 0; } echo $i+1; ?>
                                	<a href="<? echo $tsConfig['url'].'/posts/'.$p['c_seo'].'/'.$p['post_id'].'/'.string_seo($p['post_title']).'.html';?>"><? echo string_truncate($p['post_title'],45); ?></a>
                                    <span><? echo $p['post_puntos']; ?></span>
                                </li>
                            <? } ?>
                            </ol>
                        </div>
                        <br class="space"/>
                    </div>