	<div style="float: left; width: 150px;" class="left">
                	<div class="boxy">
                    	<div class="boxy-title">
                        	<h3>Filtrar</h3>
                            <span class="icon-noti"></span>
                        </div>
                        <div class="boxy-content">
                        	<h4>Categor&iacute;a</h4>
                            <select onchange="location.href='<? echo $tsConfig['url']; ?>/top/<? echo $tsAction; ?>/?fecha=<? echo $tsFecha; ?>&cat='+$(this).val()">
                            <option value="0">Todas</option>
                            <?
                            foreach ($tsConfig['categorias'] as $c)
                            {
                            ?>
                                <option value="&cat=<? echo $c['cid']; ?>" <? if ($tsCat == $c['cid']) echo 'selected="selected"'; ?>><? echo $c['c_nombre']; ?></option>
                            <?
                                }
                            ?>    
                            </select>
                            <hr/>
                            <h4>Per&iacute;odo</h4>
                            <ul>
                                <li><a href="<? echo $tsConfig['url']; ?>/top/<? echo $tsAction; ?>/?fecha=2&cat=<? echo $tsCat; ?>&sub=<? echo $tsSub; ?>" <? if ($tsFecha == 2) echo 'class="selected"'; ?>>Ayer</a></li>
                                <li><a href="<? echo $tsConfig['url']; ?>/top/<? echo $tsAction; ?>/?fecha=1&cat=<? echo $tsCat; ?>&sub=<? echo $tsSub; ?>" <? if ($tsFecha == 1) echo 'class="selected"'; ?>>Hoy</a></li>
                                <li><a href="<? echo $tsConfig['url']; ?>/top/<? echo $tsAction; ?>/?fecha=3&cat=<? echo $tsCat; ?>&sub=<? echo $tsSub; ?>" <? if ($tsFecha == 3) echo 'class="selected"'; ?>>&Uacute;ltimos 7 d&iacute;as</a></li>
                                <li><a href="<? echo $tsConfig['url']; ?>/top/<? echo $tsAction; ?>/?fecha=4&cat=<? echo $tsCat; ?>&sub=<? echo $tsSub; ?>" <? if ($tsFecha == 4) echo 'class="selected"'; ?>>Del mes</a></li>
                                <li><a href="<? echo $tsConfig['url']; ?>/top/<? echo $tsAction; ?>/?fecha=5&cat=<? echo $tsCat; ?>&sub=<? echo $tsSub; ?>" <? if ($tsFecha == 5) echo 'class="selected"'; ?>>Todos los tiempos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>