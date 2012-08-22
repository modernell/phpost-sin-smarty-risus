<? include 'sections/main_header.php'; ?>
				
<input type="button" onclick="location.href = '<? echo $tsConfig['url'];?>/mod-history/'" value="Posts" style="width:100px;cursor:default;"<? if (!$tsAction || $tsAction == 'posts') echo 'class="mBtn btnGreen"'; else echo 'class="mBtn btnYellow"'; ?> /> 				
<input type="button" onclick="location.href = '<? echo $tsConfig['url'];?>/mod-history/fotos/'" value="Fotos" style="width:100px;cursor:default;" <? if (!$tsAction || $tsAction == 'fotos') echo 'class="mBtn btnGreen"'; else echo 'class="mBtn btnYellow"'; ?>/> 
				
                <br /><br />
					
                    <div id="resultados" style="width:100%">
                        <?
                        if (!$tsAction || $tsAction == 'posts')
                        {
                        ?>
			<table class="linksList">
                        <thead>
                			<tr>
                				<th>Post</th>
                				<th>Acci&oacute;n</th>
                				<th>Moderador</th>
                				<th>Causa</th>
                			</tr>
                		</thead>
                        <tbody>
                            <?
                            foreach ($tsHistory as $h)
                            {
                            ?>
                            <tr>
                                <td style="text-align: left;">
                        			<?  echo $h['post_title']; ?><br/>
                        			Por <a href="<? echo $tsConfig['url'];?>/perfil/<? echo $h['user_name']; ?>"><? echo $h['user_name']; ?></a>
                        		</td>
                                <td>
                                    <?
                                    if ($h['action'] == 1)
                                    {
                                    ?>
                                        <span class="color_green">Editado</span>
                                    <?
                                    }
                                    elseif( $h['action'] == 2)
                                    {
                                     ?>   
                                        <span class="color_red">Eliminado</span>
                                    <?
                                    }
                                    else
                                    {
                                    ?>    
                                        <span style="color:purple;">Revisi&oacute;n</span>
                                    <?                                    
                                    }
                                    ?>
                        	</td>
                                <td>
                                    <a href="<? echo $tsConfig['url'] ?>/perfil/<?  echo $h['mod_name']; ?>"><?  echo $h['mod_name']; ?></a>
            			</td>
                                <td><?  if ($h['reason'] == 'undefined') echo 'Indefinida'; else echo $h['reason']; ?></td>
                            </tr>
                            <?                            
                            }
                            ?>
                        </tbody>
                        </table>
                        <?
                        }
			elseif ($tsAction == 'fotos')
                        {
                        ?>
			<table class="linksList">
                        <thead>
                			<tr>
                				<th>Foto</th>
                				<th>Acci&oacute;n</th>
                				<th>Moderador</th>
                				<th>Causa</th>
                			</tr>
                		</thead>
                        <tbody>
                            <?
                            foreach ($tsHistory as $h)
                            {
                            ?>
                            <tr>
                                <td style="text-align: left;">
                        		<? echo $h['f_title']; ?><br/>
                                            Por <a href="<? echo $tsConfig['url'];?>/perfil/<? echo $h['user_name']; ?>"><? echo $h['user_name']; ?></a>
                        		</td>
                                <td>
                                    <? if ($h['action'] == 1)
                                    {
                                    ?>        
                                    <span class="color_green">Editada</span>
                                    <?
                                    }
                                    else
                                    {   
                                    ?>
                                    <span class="color_red">Eliminada</span>
                                    <?
                                    }
                                    ?>
                        	</td>
                                <td>
                                    <a href="<? echo $tsConfig['url'];?>/perfil/<? echo $h['mod_name']; ?>"><? echo $h['mod_name']; ?></a>
            			</td>
                                <td><? if ($h['reason'] == 'undefined') echo 'Indefinida'; else echo $h['reason']; ?></td>
                            </tr>
                            <?                            
                            }
                            ?>
                        </tbody>
                    </table>
                    <?
                        }
                    ?>    
                </div>
                <div style="clear:both"></div>
<? include 'sections/main_footer.php'; ?>