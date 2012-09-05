                        <div style="margin-bottom: 10px">
                        	<? echo $tsConfig['ads_300']; ?>
                        </div>                       
                                <div class="widget w-medallas clearfix">
                    		<div class="title-w clearfix">
                                    <h3>Mensaje Personal</h3>
                    		</div>
                                <div class="emptyData" style="font-style: italic; font-family: Georgia; color: #8A8A8A;">
                                        <span><? if ($tsInfo['p_mensaje']){ ?>"<? echo $tsInfo['p_mensaje']; ?>"<? } else{ echo 'Sin Mensaje Personal'; }?></span>
                                </div>
             			</div>
						
				<div class="widget w-medallas clearfix">
                    		<div class="title-w clearfix">
                    			<h3>Medallas</h3>
                    			<span><? echo $tsGeneral['m_total'];?></span>
                    		</div>
                            <?        
                            if ($tsGeneral['m_total'])
                            {
                            ?>
            			<ul class="clearfix">
                                <?    
                                foreach ($tsGeneral['medallas'] as $m)
                                {
                                ?>
                                    <img src="<? echo $tsConfig['tema']['t_url'];?>/images/icons/med/<? echo $m['m_image']; ?>_16.png" class="qtip" title="<? echo $m['m_title']; ?> - <? echo $m['m_description'];?>"/>
                                <?
                                 }
                                ?>
            			</ul>
                                <?    
                                if ($tsGeneral['m_total'] >= 21)
                                {
                                ?>
                                <a href="#medallas" onclick="perfil.load_tab('medallas', $('#medallas'));" class="see-more">Ver m&aacute;s &raquo;</a>
                                <?
                                }
                                
                            }    
                            else
                            {    
                            ?>
                            <div class="emptyData">No tiene medallas</div>
                            <?
                            }
                            ?>
             			</div>
                        <div class="widget w-seguidores clearfix">
                    		<div class="title-w clearfix">
                    			<h3>Seguidores</h3>
                    			<span><? echo $tsInfo['stats']['user_seguidores']; ?></span>
                    		</div>
                            <?
                            if ($tsGeneral['segs']['data'])
                            {
                            ?>
            			<ul class="clearfix">
                                <?            
                                foreach ($tsGeneral['segs']['data'] as $s)
                                {
                                ?>
                                    <li>
                                      <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $s['user_name']; ?>" class="hovercard" uid="<? echo $s['user_id']; ?>" style="display:inline-block;">
                                          <img src="<? echo $tsConfig['url']; ?>/files/avatar/<? echo $s['user_id']; ?>_50.jpg" width="32" height="32"/>
                                      </a>
                                    </li>
                                <?    
                                }
                                ?>
            			</ul>
                                <?
                                if ($tsGeneral['segs']['total'] >= 21)
                                {
                                ?>
                                    <a href="#seguidores" onclick="perfil.load_tab('seguidores', $('#seguidores'));" class="see-more">Ver m&aacute;s &raquo;</a>
                                <?
                                }
                            }    
                            else
                            {
                            ?>    
                            <div class="emptyData">No tiene seguidores</div>
                            <?
                            }
                            ?>
             			</div>
                        <div class="widget w-siguiendo clearfix">
                            <div class="title-w clearfix">
                              <h3>Siguiendo</h3>
                              <span><? echo $tsGeneral['sigd']['total']; ?></span>
                            </div>
                            <?
                            if ($tsGeneral['sigd']['data'])
                            {
                            ?>
            			<ul class="clearfix">
                                <?            
                                foreach ($tsGeneral['sigd']['data'] as $s)
                                {
                                ?>
                                    <li>
                                       <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $s['user_name']; ?>" class="hovercard" uid="<? echo $s['user_id']; ?>" style="display:inline-block;">
                                           <img src="<? echo $tsConfig['url']; ?>/files/avatar/<? echo $s['user_id']; ?>_50.jpg" width="32" height="32"/>
                                       </a>
                                    </li>
                                <?    
                                }
                                ?>
            			</ul>
                            <?
                            if ($tsGeneral['sigd']['total'] >= 21)
                            {
                            ?>    
                                <a href="#siguiendo" onclick="perfil.load_tab('siguiendo', $('#siguiendo'));" class="see-more">Ver m&aacute;s &raquo;</a>
                            <?
                            }
                            }
                            else
                            {
                            ?>    
                            <div class="emptyData">No sigue usuarios</div>
                            <?
                            }
                            ?>
                            </div>
                            <?
                            if ($tsInfo['can_hits'])
                            {
                            ?>
                            <div class="widget w-visitas clearfix">
                            <div class="title-w clearfix">
                              <h3>&Uacute;ltimas visitas</h3>
                              <span>{$tsInfo.visitas_total}</span>
                            </div>
                            <?    
                            if ($tsInfo['visitas'])
                            {
                            ?>
            				<ul class="clearfix">
                               <?
                                foreach ($tsInfo['visitas'] as $v)
                                {
                                ?>
            					<li>
                                                    <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $v['user_name']; ?>" class="hovercard" uid="<? echo $v['user_id'];?>" style="display:inline-block;">
                                                        <img src="<? echo $tsConfig['url']; ?>/files/avatar/<? echo $v['user_id'];?>_50.jpg" class="vctip" title="<? echo modifier_hace($v['date']);?>" width="32" height="32"/>
                                                    </a>
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
                            <div class="emptyData">No tiene visitas</div>
                            <?
                            }
                            ?>
            			</div>
                            <?
                            }
                            ?>