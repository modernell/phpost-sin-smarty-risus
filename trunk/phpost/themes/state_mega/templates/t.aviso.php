<? include 'sections/main_header.php'; ?>				
		<div style="margin: 10px auto 0 auto;" class="container400">
                <div class="box_title">
                    <div class="box_txt show_error"><? echo $tsAviso['titulo']; ?></div>
                    <div class="box_rrs"><div class="box_rss"></div></div>
                </div>
                    <div align="center" class="box_cuerpo">
			<br />			
                        <? echo $tsAviso['mensaje']; ?>
                <br />
                <br />
                <? if ($tsAviso['but'])
                 {
                  ?>  
                    <input type="button" onclick="<? echo "location.href='"; if ($tsAviso['link']){ echo $tsAviso['link']; }else{ echo $tsConfig['url'];} echo "'"; ?>" value="<? echo $tsAviso['but']; ?>" style="font-size:13px" class="mBtn btnOk">
		<? } ?>
                <? if ($tsAviso['return'])
                { 
                  ?>  
                    <input type="button" onclick="history.go(-<? echo $tsAviso['return']; ?>)" title="Volver" value="Volver" style="font-size:13px" class="mBtn btnOk">
                <? } ?>
                <br />
                <br />
		</div>
		</div>
                <br />
                <br />
                <br />
                <br />
            <div style="clear:both"></div>
<? include 'sections/main_footer.php'; ?>