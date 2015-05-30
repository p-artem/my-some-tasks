    <div class="span-24">
	<div id="footer">&copy; <?php echo date("Y"); ?> - <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a> - <?php bloginfo('description'); ?></div>
    <?php // This theme is released free for use under creative commons licence. http://creativecommons.org/licenses/by/3.0/
        // All links in the footer should remain intact. 
        // These links are all family friendly and will not hurt your site in any way. 
        // Warning! Your site may stop working if these links are edited or deleted  ?>
    <div id="credits"><a href="http://ruarticle.ru/news/9394/">Льюис Хэмилтон выиграл Гран-при Китая "Формулы-1"</a></div>
</div>
</div>
</div>
<?php
	 wp_footer();
	echo get_theme_option("footer")  . "\n";
?>
</body>
</html>