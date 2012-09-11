<? include 'sections/main_header.php'; ?>
		<a name="cielo"></a>
                <? 
                if ($tsPost['post_status'] > 0 || $tsAutor['user_activo'] != 1)
                {       
                ?>
                    <div class="emptyData">
                        Este post se encuentra 
                        <? 
                        if ($tsPost['post_status'] == 2)
                        {        
                            echo "eliminado";
                        }   
                        elseif ($tsPost['post_status'] == 1)
                        {
                            echo "inactivo por acomulaci&oacute;n de denuncias";
                        }
                        elseif ($tsPost['post_status'] == 3)
                        {
                            echo "en revisi&oacute;n";
                        }
                        elseif ($tsPost['post_status'] == 3)
                        {    
                            echo "en revisi&oacute;n";
                        }
                        elseif ($tsAutor['user_activo'] != 1)
                        {    
                            echo "oculto porque pertenece a una cuenta desactivada";
                        } 
                        echo "T&uacute; puedes verlo porque ";
                        if ($tsUser->is_admod == 1)
                        {    
                            echo "eres Administrador";
                        }
                        elseif ($tsUser->is_admod == 2)
                        {    
                            echo "eres Moderador";
                        }
                        else
                        {
                            echo "tienes permiso";
                        }
                        ?>.
                    </div><br />
                    <?                    
                    } 
                    ?>
                    <div class="post-wrapper">
                    <?
                    include 'modules/m.posts_autor.php'; 
                    include 'modules/m.posts_content.php';                    
                    ?>
                    <div class="floatR" style="width: 766px;">
                    <?     
                    	include 'modules/m.posts_related.php';
                        include 'modules/m.posts_banner.php';
                    ?>
                        <div class="clearfix"></div>
                    </div>
                    <a name="comentarios"></a>
                    <? include 'modules/m.posts_comments.php'; ?>
                    <a name="comentarios-abajo"></a>
                    <br />
                    <?
                    if (!$tsUser->is_member)
                    {
                    ?>
                    <div class="emptyData clearfix">
                    	Para poder comentar necesitas estar 
                        <a onclick="registro_load_form(); return false" href="">Registrado.</a> 
                        O.. ya tienes usuario? 
                        <a onclick="open_login_box('open')" href="#">Logueate!</a>
                    </div>
                    <?
                    }
                    elseif ($tsPost['block'] > 0)
                    {
                    ?>
                    <div class="emptyData clearfix">
                    	&iquest;Te has portado mal? <? echo $tsPost['user_name']; ?> te ha bloqueado y no podr&aacute;s comentar sus post.
                    </div>
                    <? } ?>
                    <div style="text-align:center"><a class="irCielo" href="#cielo"><strong>Ir al cielo</strong></a></div>
                </div>
                <div style="clear:both"></div>
                
<? include 'sections/main_footer.php'; ?>