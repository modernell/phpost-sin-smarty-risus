                <div style="width: 300px; float: right;" id="post-izquierda">
                    <div class="categoriaList">
                        <h6>&Uacute;ltimos comentarios</h6>
                        <ul>
                            <?
                            foreach ($tsLastComments as $c)
                            {                            
                            ?>
                            <li>
                                <strong>
                                    <? 
                                    if ($tsUser->is_admod && $tsConfig['c_see_mod'] == 1 && $tsFoto['f_status'] != 0 || $tsFoto['user_activo'] == 0)
                                    {    
                                    ?>
                                        <span style="color: <? if ($c['user_activo'] == 0) echo 'brown'; elseif ($c['f_status'] == 1) echo 'purple'; elseif ($c['f_status'] == 2) echo 'red'; ?>;" class="qtip" title="<? if ($c['user_activo'] == 0) echo 'El autor del comentario tiene la cuenta desactivada'; elseif( $c['f_status'] == 1) echo 'La foto se encuentra oculta'; elseif ($c['f_status'] == 2) echo 'La foto se encuentra eliminada'; ?>">
                                         <? 
                                    }
                                    echo $tsUser->getUsername($c['c_user']); ?> 
                                     <?
                                     if ($c['user_activo'] == 0 || $c['f_status'] != 0 && $tsUser->is_admod)
                                     {
                                     ?>
                                        </span>
                                    <?                                    
                                    }
                                    ?>
                                </strong> &raquo; 
                                <a href="<? echo $tsConfig['url'];?>/fotos/<? echo $c['user_name'];?>/<? echo $c['foto_id'];?>/<? echo string_seo($c['f_title']);?>.html#div_cmnt_<? echo $c['cid']; ?>"><? echo $c['f_title']; ?></a>
                            </li>
                            <?
                            }
                            ?>
                        </ul>
                    </div>
                    <center><? echo $tsConfig['ads_300']; ?></center>
                    <br />
                    <div class="categoriaList estadisticasList">
                        <h6>Estad&iacute;sticas</h6>
                        <ul>
                            <li class="clearfix"><a href="#">
                                    <span class="floatL">Miembros</span><span class="floatR number"><? echo $tsStats['stats_miembros']; ?></span></a></li>
                            <li class="clearfix"><a href="#">
                                    <span class="floatL">Fotos</span><span class="floatR number"><? echo $tsStats['stats_fotos']; ?></span></a></li>
                            <li class="clearfix"><a href="#">
                                    <span class="floatL">Comentarios</span><span class="floatR number"><? echo $tsStats['stats_foto_comments']; ?></span></a></li>
                        </ul>
                    </div>
                </div>