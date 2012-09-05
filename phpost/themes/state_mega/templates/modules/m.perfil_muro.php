                    <div id="perfil_wall" status="activo">
                        <script type="text/javascript">
                            muro.stream.total = <? echo $tsMuro['total'];?>;
                        </script>
                        <?
                        if ($tsGeneral['fotos_total'] > 0)
                        {
                        ?>
                        <div id="perfil-foto-bar">
                            <? include 'm.perfil_muro_fotos.php'; ?>
                        </div>
                        <?
                        }
                        ?>
                        <div id="perfil-form" class="widget">
                        <?    
                        if ($tsPrivacidad['mf']['v'] == true)
                        {                        
                            include 'm.perfil_muro_form.php';
                        }    
                        else
                        {
                        ?>    
                            <div class="emptyData" style="border-top:none"><? echo $tsPrivacidad['mf']['m']; ?></div>
                        <?
                        }
                        ?>
                        </div>
                            <div class="widget clearfix" id="perfil-wall">                            
                            <div id="wall-content">
                            <?    
                                include 'm.perfil_muro_story.php';
                            ?>
                            </div>
                            <!-- more -->
                            <?
                            if ($tsMuro['total'] >= 10)
                            {
                            ?>
                            <div class="more-pubs">
                                <div class="content">
                                <a href="#" onclick="muro.stream.loadMore('wall'); return false;" class="a_blue">Publicaciones m&aacute;s antiguas</a>
                                <span>
                                    <img width="16" height="11" alt="" src="http://static.ak.fbcdn.net/rsrc.php/yb/r/GsNJNwuI-UM.gif"/></span>
                                </div>
                            </div>
                            <?
                            }
                            elseif ($tsMuro['total'] == 0 && $tsUser->is_member)
                            {
                            ?>
                            <div class="emptyData">Este usuario no tiene comentarios, se el primero.</div>
                            <?
                            }
                            ?>
    		            </div>
                  </div>