                            <ul>
                                <?
                                foreach ($tsGeneral['fotos'] as $i=>$f)
                                {
                                if ($f['foto_id'])
                                {
                                ?>
                                <li>
                                    <div class="foto">
                                        <a href="<? echo $tsConfig['url'].'/fotos/'.$tsInfo['nick'].'/'.$f['foto_id'].'/'.string_seo($f['f_title']);?>.html" title="<? echo $f['f_title']; ?>">
                                            <img border="0" src="<? echo $f['f_url']; ?>"/>
                                        </a>
                                    </div>
                                </li>
                                <?
                                }
                                else
                                {
                                ?>    
                                    <li>
                                        <div class="foto">&nbsp;</div></li>
                                <?
                                }
                                }
                                ?>
                            </ul>