<?  if ($tsDo == 'search' && $tsPosts)
{
 ?>   
    <div class="emptyData" style="padding:5px; margin:5px 0">
        Parece que existen posts similares al que quieres agregar, te recomendamos leerlos antes para evitar un repost.
    </div>
    |
    <? foreach ($tsPosts as $p)
    {
    ?>    
    &bull; <a href="<? echo $tsConfig['url']; ?>/posts/<? echo $p['c_seo']; ?>/<? echo $p['post_id']; ?>/<? echo string_seo($p['post_title']); ?>.html" target="_blank"><b><? echo $p['post_title']; ?></b></a> &bull; | 
    <? }
  }  
  else
  {    
    echo $tsTags;
  }
  ?>