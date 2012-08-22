					<div id="webStats">
                        <div class="wMod clearbeta">
                            <div class="wMod-h"><span class="qtip" title="Actualizado: <? echo $tsStats['stats_time'];?>|hace">Estad&iacute;sticas</span></div>
                            <div class="box_cuerpo">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                	<td style="background-image:url(<? echo $tsConfig['default']; ?>/images/icons/power_on.png);">
                                            <a class="usuarios_online" href="<? echo $tsConfig['url']; ?>/usuarios/?online=true">
                                                <span class="qtip" title="R&eacute;cord conectados: <? echo $tsStats['stats_max_online'].' '.$tsStats['stats_max_time']; ?>|fecha "><? echo $tsStats['stats_online']; ?> online</span>
                                            </a>
                                        </td>
        	                        <td style="background-image:url(<? echo $tsConfig['default']; ?>/images/icons/user.png);"><a href="<? echo $tsConfig['url']; ?>/usuarios/"><? echo $tsStats['stats_miembros']; ?> miembros</a></td>
                                </tr>
    	                        <tr>
        	                        <td style="background-image:url(<? echo $tsConfig['default']; ?>/images/icons/posts.png);"><? echo $tsStats['stats_posts']; ?> posts</td>
            	                    <td style="background-image:url(<? echo $tsConfig['url']; ?>/images/icons/comment.png);"><? echo $tsStats['stats_comments']; ?> comentarios</td>
                                </tr>
    	                        <tr>
        	                        <td style="background-image:url(<? echo $tsConfig['default']; ?>/images/icons/foto.png);"><? echo $tsStats['stats_fotos']; ?> fotos</td>
            	                    <td style="background-image:url(<? echo $tsConfig['default']; ?>/images/icons/comment.png);"><? echo $tsStats['stats_foto_comments'];?> comentarios en fotos</td>
                                </tr>
                            </table>
                            </div>
                        </div>
                    </div>