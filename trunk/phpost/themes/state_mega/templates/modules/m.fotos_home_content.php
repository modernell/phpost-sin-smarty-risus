                <div id="centroDerecha" style="width: 630px; float: left;">
                	
					<div class="">
                        
						<h2 style="font-size: 15px;">&Uacute;ltimas fotos</h2>
                    
					</div>
                    
					<ul class="fotos-detail listado-content">
                        
						{foreach from=$tsLastFotos.data item=f}
                    	
						<li>
                        	
							<div class="avatar-box" style="z-index: 99;">
                            	
								<a href="<? echo $tsConfig['url']; ?>/fotos/{$f.user_name}/{$f.foto_id}/{$f.f_title|seo}.html">                            		
                                                                    <img height="100" width="100" <? if ($f['f_status'] != 0 || $f['user_activo'] == 0 || $f['user_baneado'] == 1) { echo 'class="qtip"';?> title="<? if ($f['f_status'] == 2) echo 'Imagen eliminada'; elseif ($f.f_status == 1) echo 'Imagen oculta por acumulaci&oacute;n de denuncias'; elseif ($f.user_activo == 0) echo 'La cuenta del usuario est&aacute; desactivada'; elseif ($f['user_baneado'] == 1) echo 'La cuenta del usuario est&aacute; suspendida'; ?>" style="border: 1px solid <? if ($f['f_status'] == 2) echo 'rosyBrown'; elseif( $f['f_status'] == 1) echo 'coral'; elseif ($f['user_activo'] == 0) echo 'brown'; elseif ($f['user_baneado'] == 1) echo 'orange'; ?>;opacity: 0.5;filter: alpha(opacity=50);" <? } ?> src="<? echo $f['f_url'];?>" />                                
								</a>
                            
							</div>                            
							<div class="notification-info">                            	
								<span>                                    
									<a href="<? echo $tsConfig['url']; ?>/fotos/<? echo $f['user_name']; ?>/{$f.foto_id}/{$f.f_title|seo}.html"><? echo $f['f_title']; ?></a><br />                             		
									<span title="{$f.f_date|date_format:"%d.%m.%y a las %H:%M hs."}" class="time">
                                                                              <strong><? echo $f['f_date'];?>date_format:"%d.%m.%Y"}</strong> - Por 
                                                                            <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $f['user_name']; ?>"><? echo $f['user_name']; ?></a></span><hr />                                    
                                                                        <span class="time"><? echo string_truncate($f['f_description'],94); ?></span>
                                
								</span>
                            
							</div>
                        
						</li>
                        
						{/foreach}
						
                    </ul>
					
				{if $tsLastFotos.data > 10}P&aacute;ginas: {$tsLastFotos.pages}{/if}
					
                </div>
