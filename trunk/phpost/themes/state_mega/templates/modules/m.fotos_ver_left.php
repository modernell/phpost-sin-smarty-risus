                <div style="width: 160px; float: left;">
                    <div class="categoriaList">
                        <h6>Fotos de <? echo $tsFoto['user_name']; ?></h6>
                        <ul id="v_album">
                            <?
                            foreach ($tsUFotos as $f)
                            {
                            ?>
                            <li>
                                <a href="<? echo $tsConfig['url']; ?>/fotos/<? echo $f['user_name']; ?>/<? echo $f['foto_id']; ?>/<? echo string_seo($f['f_title']); ?>.html">
                                    <img src="<? echo $f['f_url']; ?>" title="<? echo $f['f_title']; ?>" width="120" height="90" />
                                    <span class="time">{$f.f_date|date_format:"%d/%m/%Y"}</span>
                                </a>
                            </li>
                            <?
                            }
                            ?>
                        </ul>
                        <a href="<? echo $tsConfig['url']; ?>/fotos/<? echo $tsFoto['user_name']; ?>" class="fb_foot">Ver todas</a>
                    </div>
                    <center><? echo $tsConfig['ads_160']; ?></center>
                </div>