                    <form action="<? echo $tsConfig['url']; ?>/buscador/" class="buscador-h" name="top_search_box" gid="<? echo $tsConfig['ads_search']; ?>">
                        <div style="clear:both">
                            <input type="text" id="ibuscadorq" name="q" onkeypress="ibuscador_intro(event)" onfocus="onfocus_input(this)" onblur="onblur_input(this)" value="Buscar" title="Buscar" class="mini_ibuscador onblur_effect">
                    	    <input vspace="2" hspace="8" type="submit" align="top" value="" alt="Buscar" title="Buscar" class="mini_bbuscador"/>
                        </div>
                        <input type="hidden" name="e" value="web" />
                    </form>
                    