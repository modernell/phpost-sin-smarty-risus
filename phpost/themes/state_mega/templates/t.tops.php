<? include 'sections/main_header.php'; ?>

		{include file='modules/m.top_sidebar.tpl'}
                {if $tsAction == 'posts'}
                    {include file='modules/m.top_posts.tpl'}
                {elseif $tsAction == 'usuarios'}
                    {include file='modules/m.top_users.tpl'}
                {/if}
                <div style="clear: both;"></div>
                
<? include 'sections/main_footer.php'; ?>