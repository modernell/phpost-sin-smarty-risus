<?
include 'sections/main_header.php';
?>
                <script type="text/javascript" src="<? echo $tsConfig['default']; ?>/js/perfil.js"></script>
                <?    
                include 'modules/m.perfil_headinfo.php';
                ?>              
                <div class="perfil-main clearfix <? echo $tsGeneral['stats']['user_rango'][1];?>">
                	<div class="perfil-content general">
                        <div id="info" pid="<? echo $tsInfo['uid']; ?>"></div>
                        <div id="perfil_content">
                        <?    
                        if ($tsPrivacidad['m']['v'] == false)
                        {
                        ?>
                        <div id="perfil_wall" status="activo" class="widget">
                            <div class="emptyData"><? echo $tsPrivacidad['m']['m'];?></div>
                            <script type="text/javascript">
                                perfil.load_tab('info', $('#informacion'));
                            </script>
                        </div>
                        <?
                        }
                        elseif ($tsType == 'story')
                        {                            
                            include 'modules/m.perfil_story.php';
                        }    
                        elseif ($tsType == 'news')
                        {   
                            include 'modules/m.perfil_noticias.php';
                        }    
                        else
                        {    
                            include 'modules/m.perfil_muro.php';
                        }    
                        ?>
                        </div>
                        <div style="width:100%;text-align:center;display:none" id="perfil_load">
                            <img src="<? echo $tsConfig['images']; ?>/fb-loading.gif" />
                        </div>
                    </div>
                    <div class="perfil-sidebar">
                        <?
                        include 'modules/m.perfil_sidebar.php';
                        ?>
                    </div>
                </div>                
<?
include 'sections/main_footer.php';
?>