<?
foreach ($tsMuro['data'] as $p)
{
?>                                <div class="Story" id="pub_<? echo $p['pub_id'];?>">
                                    <a href="<? echo $tsConfig['url'];?>/perfil/<? echo $p['user_name']; ?>" class="Story_Pic">
                                        <img alt="<? echo $p['user_name']; ?>" src="<? echo $tsConfig['url']; ?>/files/avatar/<? echo $p['p_user_pub']; ?>_50.jpg"/></a>
                                    <div class="Story_Content">
                                        <div class="Story_Head">
                                            <?
                                            if ($p['p_user'] == $tsUser->uid || $p['p_user_pub'] == $tsUser->uid || $tsUser->is_admod || $tsUser->permisos['moepm'])
                                            {
                                            ?>
                                            <div class="Story_Hide">
                                                <a href="#" onclick="muro.del_pub(<? echo $p[pub_id];?>,1); return false;" title="Eliminar la publicaci&oacute;n" class="qtip uiClose">                                                    
                                                </a>
                                            </div>
                                            <?
                                            }
                                            ?>
                                            <div class="Story_Message">
                                                <div class="autor">
                                                    <a href="<? echo $tsConfig['url'];?>/perfil/<? echo $p['user_name']; ?>" class="a_blue">
                                                        <? if( $p['user_name'] == $tsUser->nick) echo 'Yo'; else echo $p['user_name']; ?>
                                                    </a>
                                                </div>
                                                <span><? echo $p['p_body']; ?>-quot fix this</span>
                                                <?
                                                if ($p['p_type'] != 1)
                                                {
                                                ?>
                                                <div class="mvm clearfix">
                                                    <?
                                                    if ($p['p_type'] == 2)
                                                    {
                                                    ?>
                                                    <a href="#" onclick="muro.load_atta('foto', '<? echo $p[a_url]; ?>', this); return false" class="uiPhoto">
                                                        <img src="<? echo $p['a_img']; ?>"/>
                                                    </a>
                                                    <?
                                                    }
                                                    elseif( $p['p_type'] == 3)
                                                    {
                                                    ?>
                                                    <div class="uiLink">
                                                        <div><a href="<? echo $p['a_url']; ?>" target="_blank" class="a_blue"><strong><? echo $p['a_title']; ?></strong></a></div>
                                                        <a href="<? echo $p['a_url']; ?>" target="_blank" class="a_blue"><? echo $p['a_url']; ?></a>
                                                    </div>
                                                    <?
                                                    }
                                                    elseif ($p['p_type'] == 4)
                                                    {
                                                    ?>
                                                    <a href="#" onclick="muro.load_atta('video','<? echo $p[a_url]; ?>', this); return false;"class="uiVideoThumb">
                                                        <img src="http://img.youtube.com/vi/<? echo $p['a_url']; ?>/1.jpg" width="130" height="97"/>
                                                        <i></i>
                                                    </a>
                                                    <div class="videoDesc">
                                                        <strong><a href="http://www.youtube.com/watch?v=<? echo $p['a_url']; ?>" target="_blank" class="a_blue"><? echo $p['a_title']; ?></a></strong>
                                                        <div style="margin-top:5px">
                                                        <? echo $p['a_desc']; ?>
                                                        </div>
                                                    </div>
                                                    <?
                                                    }
                                                    ?>
                                                </div>
                                                <?
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="Story_Foot">
                                            <div class="Story_Info">
                                                <i class="stream w_<? if ($p['p_type'] == 1 && $p['p_user'] == $p['p_user_pub']) echo 0; else echo $p['p_type'];?>"></i>
                                                <span class="text"><? echo modifier_hace($p['p_date']);?></span>
                                                &middot;
                                                <a onclick="muro.like_this(<? echo $p[pub_id];?>, 'pub', this); return false;" class="a_blue"><? echo $p['likes']['link']; ?></a>
                                                &middot;
                                                <a onclick="muro.show_comment_box(<? echo $p[pub_id];?>); return false" class="a_blue">Comentar</a>
                                                <?        
                                                if ($tsUser->is_admod)
                                                {
                                                ?>
						&middot;                                                
                                                    <span class="text"><? echo $p['p_ip']; ?></span>
						<?
                                                }
                                                ?>
                                            </div>
                                            <ul id="cb_<? echo $p['pub_id'];?>" class="Story_Comments" <? if ($p['p_comments'] == 0 && $p['p_likes'] == 0) echo 'style="display:none"';?>>
                                                <li class="lifi"><i></i></li>
                                                <li class="ufiItem" <? if ($p['p_likes'] == 0) echo 'style="display:none"';?>>
                                                    <div class="likes clearfix">
                                                        <i></i>
                                                        <span class="floatL" id="lk_<? echo $p['pub_id']; ?>"><? echo $p['likes']['text']; ?></span>
                                                    </div>
                                                </li>
                                                <li>
                                                   <ul id="cl_<? echo $p['pub_id']; ?>" class="commentList">
                                                       <?
                                                        if ($p['p_comments'] > 2 && !$p['hide_more_cm'])
                                                        {
                                                        ?>
                                                        <li class="ufiItem">
                                                            <div class="more_comments clearfix">
                                                                <i></i>
                                                                <a href="#" class="a_blue floatL" onclick="muro.more_comments(<? echo $p['pub_id']; ?>, this); return false">
                                                                    Ver los <? echo $p['p_comments']; ?> comentarios
                                                                </a>
                                                                <img width="16" height="11" src="http://static.ak.fbcdn.net/rsrc.php/yb/r/GsNJNwuI-UM.gif"/>
                                                            </div>
                                                        </li>
                                                        <?
                                                        }                                                        
                                                        foreach ($p['comments'] as $c)
                                                        {
                                                        ?>
                                                        <li class="ufiItem" id="cmt_{$c.cid}">
                                                            <div class="clearfix">
                                                                <a href="<? echo $tsConfig['url'];?>/perfil/<? echo $p['user_name']; ?>" class="autorPic">
                                                                    <img alt="<? echo $p['user_name']; ?>" src="<? echo $tsConfig['url'];?>/files/avatar/<? echo $c['c_user'];?>_50.jpg" width="32" height="32"/></a>
                                                                <?
                                                                if ($p['p_user'] == $tsUser->uid || $c['c_user'] == $tsUser->uid  || $tsUser->is_admod || $tsUser->permisos['moecm'])
                                                                {
                                                                ?>
                                                                <span class="close"><a href="#" onclick="muro.del_pub(<? echo $c['cid']; ?>, 2); return false" class="uiClose" title="Eliminar"></a></span>
                                                                <?
                                                                }
                                                                ?>
                                                                <div class="mensaje">
                                                                    <a href="<? echo $tsConfig['url'];?>/perfil/<? echo $p['user_name']; ?>" class="autorName a_blue"><? echo $p['user_name']; ?></a>
                                                                    <span><? echo $c['c_body']; ?></span>
                                                                    <div class="cmInfo">
                                                                        <? echo modifier_hace($c['c_date']); ?> fecha &middot; 
                                                                        <a onclick="muro.like_this(<? echo $c['cid']; ?>, 'com', this); return false;" class="a_blue">
                                                                            <? echo $c['like']; ?>
                                                                        </a>
                                                                        <span class="cm_like"<? if ($c['c_likes'] == 0) echo 'style="display:none"';?>>&middot; 
                                                                              <i></i> 
                                                                            <a onclick="muro.show_likes(<? echo $c['cid']; ?>, 'com'); return false;" id="lk_cm_<? echo $c['cid']; ?>" class="a_blue">
                                                                                <? echo $c['c_likes']; ?> persona <? if ($c['c_likes'] > 1) echo 's'; ?>
                                                                            </a>
                                                                        </span>
                                                                        <?
                                                                        if ($tsUser->is_admod) 
                                                                        {
                                                                        ?>
                                                                        &middot;
                                                                                <span class="cmInfo"><? echo $c['c_ip']; ?></span>
                                                                        <?
                                                                        }
                                                                        ?>
                                                                    </div>
								</div>
                                                            </div>
                                                        </li>
                                                        <?
                                                        }
                                                        ?>
                                                   </ul> 
                                                </li>
                                                    <? 
                                                    if ($tsPrivacidad['mf']['v'] == true && $tsUser->is_member || $tsType == 'news')
                                                    {      
                                                    ?>        
                                                <li class="ufiItem">
                                                    <div class="newComment">
                                                        <input type="text" title="Escribe un comentario...." name="hack" value="Escribe un comentario..." pid="<? echo $p['pub_id']; ?>" />
                                                        <div class="formulario" style="display:none">
                                                            <img src="<? echo $tsConfig['url'];?>/files/avatar/<? echo $tsUser->uid; ?>_50.jpg" width="32" height="32"/>
                                                            <textarea class="comentar" title="Escribe un comentario..." id="cf_<? echo $p['pub_id']; ?>" pid="<? echo $p['pub_id']; ?>" name="add_wall_comment" onfocus="onfocus_input(this)" onblur="onblur_input(this)"></textarea>
                                                            <div class="clearBoth"></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="clearBoth"></div>
                                </div>
<?
}
?>
                