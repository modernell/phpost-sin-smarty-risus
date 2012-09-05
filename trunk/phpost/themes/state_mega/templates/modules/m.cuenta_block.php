			<div class="content-tabs bloqueados" style="display:none">
                            	<fieldset>
                                    <div class="field">
                                        <?
                                        if ($tsBlocks)
                                        {
                                        ?>
                                        <ul class="bloqueadosList">
                                            <?
                                            foreach ($tsBlocks as $b)                                            
                                            {
                                            ?>
                                        	<li><a href="<? echo $tsConfig.url; ?>/perfil/<? echo $b['user_name']; ?>"><? echo $b['user_name']; ?></a>
                                                    <span>
                                                        <a title="Desbloquear Usuario" href="javascript:bloquear('<? echo $b[b_auser];?>', false, 'mis_bloqueados')" class="desbloqueadosU bloquear_usuario_<? echo $b['b_auser'];?>">Desbloquear</a>
                                                    </span>
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
                                        <div class="emptyData">No hay usuarios bloqueados</div>
                                        <?                                        
                                        }
                                        ?>
                                     </div>
                                </fieldset>
                                <div class="clearfix"></div>
                            </div>