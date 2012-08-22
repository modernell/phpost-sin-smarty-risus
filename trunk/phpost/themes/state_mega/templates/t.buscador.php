<? include 'sections/main_header.php'; ?>
        
        <script type="text/javascript">
        var buscador = {
            // {/literal}
        	tipo: '<? if (!$tsEngine) echo "web".$tsEngine; ?>',
            // {literal}
        	select: function(tipo){
        		if(this.tipo==tipo)
        			return;
        
        		//Cambio de action form
        		//$('form[name="buscador"]').attr('action', '?e='+tipo+'');
                $('input[name="e"]').val(tipo);
        
        		//Solo hago los cambios visuales si no envia consulta
        		if(!this.buscadorLite){
        			//Cambio here en <a />
        			$('a#select_' + this.tipo).removeClass('here');
        			$('a#select_' + tipo).addClass('here');
        
        			//Cambio de logo
        			$('img#buscador-logo-'+this.tipo).css('display', 'none');
        			$('img#buscador-logo-'+tipo).css('display', 'inline');
        
        		}
        
        		//Muestro/oculto los input google
        		if(tipo=='google'){ 
                    //Ahora es google {/literal}
        			$('form[name="buscador"]').append('<input type="hidden" name="cx" value="{$tsConfig.ads_search}" /><input type="hidden" name="cof" value="FORID:10" /><input type="hidden" name="ie" value="ISO-8859-1" />');
                    // {literal}
        		}else if(this.tipo=='google'){ //El anterior fue google
        			$('input[name="cx"]').remove();
        			$('input[name="cof"]').remove();
        			$('input[name="ie"]').remove();
        		}
        
        		this.tipo = tipo;
        	}
        }
        </script>
        <?
        if ($tsQuery || $tsAutor)
        {
        ?>
        <div id="buscadorLite">
        	<ul class="searchTabs">
        		<li class="here"><a href="">Posts</a></li>
        		<div class="clearBoth"></div>
        	</ul>
        	<div class="clearBoth"></div>
        	<div class="searchCont">
        		<form action="" method="GET" name="buscador">
        			<div class="searchFil">
        				<div style="margin-bottom: 5px;">
        					<img<? if ($tsEngine != 'google'){ echo 'style="display: none;"'; } ?> alt="google-search-engine" src="http://www.google.com/images/poweredby_transparent/poweredby_FFFFFF.gif" id="buscador-logo-google"/>
        					<img<? if ($tsEngine != 'web'){ echo 'style="display: none;"'; }?> alt="web-search-engine" src="<? echo $tsConfig['default']; ?>/images/phpostmin.gif" id="buscador-logo-web"/>
        					<img<? if ($tsEngine != 'tags') { echo 'style="display: none;"';} ?> alt="tags-search-engine" src="<? echo $tsConfig['default']; ?>/images/phpostmin.gif" id="buscador-logo-tags"/>
        					<label style="float: right;" class="searchWith">
                                                <a href="javascript:buscador.select('google')" id="select_google"<? if( $tsEngine == 'google'){echo  'class="here"';} ?> >Google</a><span class="sep">|</span>
        					<a href="javascript:buscador.select('web')" id="select_web"<? if(!$tsEngine || $tsEngine == 'web'){echo  'class="here"';} ?>><? echo $tsConfig['titulo']; ?></a><span class="sep">|</span>
        					<a href="javascript:buscador.select('tags')" id="select_tags"<? if( $tsEngine == 'tags'){echo  'class="here"';} ?> >Tags</a></label>
                                                <div class="clearfix"></div>
                                        </div>
                        <div class="clearBoth"></div>
                        <div class="boxBox">
                            <div class="searchEngine">
                                <input type="text" value="<? echo $tsQuery; ?>" class="searchBar" size="25" name="q"/>
        			<input type="submit" title="Buscar" value="Buscar" class="mBtn btnOk"/>
                                <input type="hidden" name="e" value="<? echo $tsEngine; ?>" />
                                <? 
                                if ($tsEngine == 'google'){
                                ?>    
                                    <input type="hidden" name="cx" value="<? echo $tsConfig['ads_search']; ?>" />
                                    <input type="hidden" name="cof" value="FORID:10" />
                                    <input type="hidden" name="ie" value="ISO-8859-1" />
                                <?                                
                                } 
                                ?>
        					</div><!-- End Filter -->
                            <div class="filterSearch">
                                <div class="floatL">
                                    <label>Categoria</label><br/>
        				<select style="width: 150px;" name="cat">
        				<option value="-1">Todas</option>
                                        <? 
                                        foreach ($tsConfig['categorias'] as $c)
                                        {
                                        ?>
                                        <option value="<? echo $c['cid']; ?>"<? if ($tsCategory == $c['cid']){ echo 'selected="true"';} ?>><? echo $c['c_nombre']; ?></option>
                                        <?                                        
                                        }
                                        ?>
        				</select>
        				<span id="filtro_autor">
        				<label>Usuario</label>
        				<input type="text" name="autor" value="<? echo $tsAutor; ?>"/>
        				</span>
        			</div>
                                <div class="clearfix"></div>
                            </div><!-- End SearchFill -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- End SearchFill -->
              </form>
              </div>
        </div>
        <?
            if ($tsEngine == 'google')
            {    
            ?>    
                <div id="cse-search-results"></div>
                <script type="text/javascript">
                var googleSearchIframeName = "cse-search-results";
                var googleSearchFormName = "cse-search-box";
                var googleSearchFrameWidth = '940';
                var googleSearchDomain = "www.google.com.mx";
                var googleSearchPath = "/cse";
                </script>
                <script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
            <?
            }
        else
        {
        ?>
        <div id="resultados" style="width:770px" class="floatL">
            <div id="showResult">
                <table class="linksList">
                    <thead>
        				<tr>
        					<th width="30"></th>
        					<th style="text-align: left;">Mostrando <strong><? echo $tsResults['total']; ?></strong> de <strong><? echo $tsResults['pages']['total']; ?></strong> resultados totales</th>
        				</tr>
        			</thead>
                    <tbody>
                    <? foreach($tsResults['data'] as $r)
                    {
                    ?>   
                    <tr id="div_<? echo $r['post_id']; ?>">
                        <td title="<? echo $r['c_nombre']; ?>" style="background:url(<? echo $tsConfig['tema']['t_url']; ?>/images/icons/cat/<? echo $r['c_img']; ?>) no-repeat center center;">&nbsp;</td>
                        <td style="text-align: left;">
                            <a class="titlePost" href="<? echo $tsConfig['url'].'/posts/'.$r['c_seo'].'/'.$r['post_id'].'/'.string_seo($r['post_title']);?>.html"><? echo $r['post_title']; ?></a>
                            <div class="info" style="background-color:#FFF">
                                <img alt="Creado hace" src="<? echo $tsConfig['tema']['t_url']; ?>/images/icons/clock.png"/> <strong><? echo modifier_hace($r['post_date'],true); ?></strong> -
                                <img alt="Posts relacionados" src="<? echo $tsConfig['tema']['t_url']; ?>/images/icons/relacionados.png"/> 
                                <a href="<? echo $tsConfig['url']; ?>/buscador/?q=<? echo $r['post_title'].'&e='.$tsEngine.'&cat='.$tsCategory.'&autor='.$tsAutor; ?>">Post Relacionados</a> -
                                <img alt="Creado por" src="<? echo $tsConfig['tema']['t_url']; ?>/images/icons/autor.png"/>
                                <a href="<? echo $tsConfig['url']; ?>/perfil/<?  echo $r['user_name']; ?>"><?  echo $r['user_name']; ?></a> |
                                <img alt="0 puntos" src="<? echo $tsConfig['tema']['t_url']; ?>/images/icons/puntos.png"/> Puntos <strong><?  echo $r['post_puntos']; ?></strong> -
                                <img alt="0 puntos" src="<? echo $tsConfig['tema']['t_url']; ?>/images/icons/favoritos.gif"/> <strong><?  echo $r['post_favoritos']; ?></strong> Favoritos -
                                <img alt="0 puntos" src="<? echo $tsConfig['tema']['t_url']; ?>/images/icons/comentarios.gif"/> <strong><?  echo $r['post_comments']; ?></strong> Comentarios
                            </div>
                        </td>
                    </tr>
                    <?
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="paginadorCom">
                <?if ($tsResults['pages']['prev'] != 0)
                {
                ?>
                    <div style="display: block; margin: 5px 0pt; width: 110px;text-align:left" class="floatL before">
                    <a href="<? echo $tsConfig['url']; ?>/buscador/?page=<? echo $tsResults['pages']['prev']; ?><? if ($tsQuery){ echo '&q='.$tsQuery; } if ($tsEngine){echo '&e='.$tsEngine;}  if ($tsCategory){echo '&cat='.$tsCategory;} if( $tsAutor){ echo '&autor='.$tsAutor; }?>">&laquo; Anterior</a>
                    </div>
                <?                
                }
        	if ($tsResults['pages']['next'] != 0)
                {
                ?>
                        <div style="display: block; margin: 5px 0pt; width: 110px;text-align:right" class="floatR next">
                            <a href="<? echo $tsConfig['url']; ?>/buscador/?page=<? echo $tsResults['pages']['next'];  if($tsQuery){ echo '&q='.$tsQuery;}  if ($tsEngine){echo '&e='.$tsEngine;}  if($tsCategory){ echo '&cat='.$tsCategory;}  if ($tsAutor){ echo '&autor='.$tsAutor;} ?>">Siguiente &raquo;</a>
                        </div>
                <?                
                }
                ?>
            </div>
        </div>
        <div class="container170 floatR">
            <center><? echo $tsConfig['ads_160']; ?></center>
        </div>
        <div class="clearBoth"></div>
        <? 
        }
        }
        else
        {    
        ?>    
        <div id="buscadorBig">
        	<ul class="searchTabs">
        		<li class="here"><a href="">Posts</a></li>
        		<li class="clearfix"></li>
        	</ul>
        	<div class="clearBoth"></div>
        	<div class="searchCont">
        		<form action="" method="GET" name="buscador" style="padding: 0pt; margin: 0pt;">
        			<div class="searchFil">
        				<div style="margin-bottom: 5px;">
        					<div class="logoMotorSearch">
        						<img style="height: 16px; display: none;" alt="google-search-engine" src="http://www.google.com/images/poweredby_transparent/poweredby_FFFFFF.gif" id="buscador-logo-google"/>
        						<img alt="web-search-engine" src="<? echo $tsConfig['default']; ?>/images/phpostmin.gif" id="buscador-logo-web"/>
        						<img style="display: none;" alt="tags-search-engine" src="<? echo $tsConfig['default']; ?>/images/phpostmin.gif" id="buscador-logo-tags"/>
        					</div>
        
        					<label class="searchWith">
							<a href="javascript:buscador.select('google')" id="select_google">Google</a><span class="sep">|</span>
        						<a href="javascript:buscador.select('web')" id="select_web" class="here"><? echo $tsConfig['titulo']; ?></a><span class="sep">|</span>
        						<a href="javascript:buscador.select('tags')" id="select_tags">Tags</a>
        					</label>
        					<div class="clearfix"></div>
        				</div>
        				<div class="clearfix"></div>
        			
        				<div class="boxBox">
        					<div class="searchEngine">
        						<input type="text" value="" class="searchBar" size="25" name="q"/>
        						<input type="submit" title="Buscar" value="Buscar" class="mBtn btnOk"/>
                                                        <input type="hidden" name="e" value="web" />
          					<div class="clearfix"></div>
        					</div>
        					<!-- End Filter -->
        					<div class="filterSearch">
        					  <strong>Filtrar:</strong>
        						<div class="floatL">
        							<label>Categor&iacute;a</label>
        							<select style="width: 200px;" name="cat">
        								<option value="-1">Todas</option>
                                                                        <? foreach($tsConfig['categorias'] as $c)
                                                                        {
                                                                        ?>
                                                                            <option value="<? echo $c['cid']; ?>"><? echo $c['c_nombre']; ?></option>
                                                                        <?
                                                                        }
                                                                        ?>
        							</select>
        							<span id="filtro_autor">
        								<label>Usuario</label>
        								<input type="text" name="autor" value="<? echo $tsAutor; ?>"/>
        							</span>
        						</div>
        						<div class="clearfix"></div>
        					</div>
        					<!-- End SearchFill -->
        					<div class="clearfix"></div>
        					
        				</div>
        			  <div class="clearfix"></div>
        			</div>
        			<!-- End SearchFill -->
        		</form>
        	</div>
        </div>
        <?
        }
        ?>
        <div style="clear:both;"></div>                
<? include 'sections/main_footer.php'; ?>