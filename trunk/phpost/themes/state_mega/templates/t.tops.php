<? include 'sections/main_header.php'; 

		include 'modules/m.top_sidebar.php';
                if ($tsAction == 'posts')
                    include 'modules/m.top_posts.php';
                elseif ($tsAction == 'usuarios')
                    include 'modules/m.top_users.php';                
                ?>
                <div style="clear: both;"></div>
                
<? include 'sections/main_footer.php'; ?>