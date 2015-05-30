<?php
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}

$themename = "iPadPress";
$shortname = str_replace(' ', '_', strtolower($themename));

function get_theme_option($option)
{
	global $shortname;
	return stripslashes(get_option($shortname . '_' . $option));
}

function get_theme_settings($option)
{
	return stripslashes(get_option($option));
}

function cats_to_select()
{
	$categories = get_categories('hide_empty=0'); 
	$categories_array[] = array('value'=>'0', 'title'=>'Select');
	foreach ($categories as $cat) {
		if($cat->category_count == '0') {
			$posts_title = 'No posts!';
		} elseif($cat->category_count == '1') {
			$posts_title = '1 post';
		} else {
			$posts_title = $cat->category_count . ' posts';
		}
		$categories_array[] = array('value'=> $cat->cat_ID, 'title'=> $cat->cat_name . ' ( ' . $posts_title . ' )');
	  }
	return $categories_array;
}

$options = array (
			
	array(	"type" => "open"),
	
	array(	"name" => "Логотип",
		"desc" => "Введите полный путь вашего логотипа. Оставьте поле пустым, если не хотите использовать логотип.",
		"id" => $shortname."_logo",
		"std" =>  get_bloginfo('template_url') . "/images/logo.png",
		"type" => "text"),array(	"name" => "Отображать лучшие записи?",
			"desc" => "Отмените выбор, если вы не хотите отображать лучшие записи на главной странице.",
			"id" => $shortname."_featured_posts",
			"std" => "true",
			"type" => "checkbox"),
		array(	"name" => "Категория лучших записей", 
 "desc" => "Последние 5 записей из выбранной категории будут отображаться в блоке лучших записей на главной странице. <br />Выбранная категория должна содержать как минимум 2 последних записи с изображениями. <br /> <br /> <b>Как добавить изображения в записи, отображаемые в лучших записях?</b> <br />
            <b>&raquo;</b> Если вы используете WordPress версии 2.9 и выше: просто добавьте \"Post Thumbnail\" при написании новой записи, которая будет опубликована в соответствующей категории. <br /> 
            <b>&raquo;</b> Если вы используете версию WordPress ниже 2.9 вы должны добавить дополнительное поле к каждой записи, которая будет опубликована в соответствующей категории. Дополнительное поле должно называться \"<b>featured</b>\" и содержать полный путь к изображению. <a href=\"http://newwpthemes.com/public/featured_custom_field.jpg\" target=\"_blank\">Посмотреть скриншот</a>. <br /> <br />
            In both situation, the image sizes should be: Width: <b>620 px</b>. Height: <b>320 px.</b>",
			"id" => $shortname."_featured_posts_category",
			"options" => cats_to_select(),
			"std" => "0",
			"type" => "select"),
            	array(	"name" => "Баннер в шапке (468x60 px)",
			"desc" => "Код баннера в шапке. Вы можете использовать любой html код, также можно использовать ваш 468x60 px блок Adsense.",
            "id" => $shortname."_ad_header",
            "type" => "textarea",
			"std" => '<a href="http://wordpressorg.ru/"><img src="http://wordpressorg.ru/images/banners/wp2.gif" style="border: 0;" alt="Premium WordPress Themes" /></a>'
			),
            	array(	"name" => "Баннеры 125x125 px в сайдбаре",
		"desc" => "Добавьте ваши баннеры  125x125 px. Вы можете добавить неограниченное количество баннеров. Каждый новый баннер начинается с новой строчки в формате: <br/>http://yourbannerurl.com/banner.gif, http://theurl.com/to_link.html",
        "id" => $shortname."_ads_125",
        "type" => "textarea",
		"std" => 'http://wordpressorg.ru/images/banners/wporg1.png,http://wordpressorg.ru/
http://wordpressorg.ru/images/banners/wh1.gif, http://wordpressorg.ru/go.php?wh1'
		),	array(	"name" => "Лучшее видео",
		"desc" => "Введите ваш идентификатор вашего видео на youtube.com. Например: http://www.youtube.com/watch?v=<b>SxNJTWZVOQk</b>.",
		"id" => $shortname."_video",
		"std" =>  'SxNJTWZVOQk',
		"type" => "text"),	array(	"name" => "Твиттер",
			"desc" => "Введите ваше имя в Твиттере.",
			"id" => $shortname."_twitter",
			"std" => "http://twitter.com/webtheme",
			"type" => "text"),
			
	array(	"name" => "Текст Твиттера",
			"desc" => "",
			"id" => $shortname."_twittertext",
			"std" => "Следуй за мной!",
			"type" => "text"),	
	array(	"name" => "Иконки социалок",
			"desc" => "Отображать иконки социальных сетей над сайдбаром?",
			"id" => $shortname."_socialnetworks",
			"std" => "true",
			"type" => "checkbox"),
				array(	"name" => "Нижний баннер в сайдбаре 1",
		"desc" => "Код баннера в низу сайдбара 1.",
        "id" => $shortname."_ad_sidebar1_bottom",
        "type" => "textarea",
		"std" => '<a href="http://wordpressorg.ru/"><img src="http://wordpressorg.ru/images/banners/wp1.gif" style="border: 0;" alt="Premium WordPress Themes" /></a>'
		),	array(	"name" => "Скрипты в Head",
		"desc" => "Содержимое данного блока будет добавлено в тег &lt;/head&gt; . Это может пригодится для вставки различного кода, например кода проверки вебмастера в Google.",
        "id" => $shortname."_head",
        "type" => "textarea"	
		),
		
	array(	"name" => "Скрипты в подвале",
		"desc" => "Содержимое данного блока будет добавлено до тега &lt;/body&gt;.Это может пригодится для вставки различного кода, например кода статистики.",
        "id" => $shortname."_footer",
        "type" => "textarea"	
		),
					
	array(	"type" => "close")
	
);

function mytheme_add_admin() {
    global $themename, $shortname, $options;
	
    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                echo '<meta http-equiv="refresh" content="0;url=themes.php?page=functions.php&saved=true">';
                die;

        } 
    }

    add_theme_page("Настройки ". $themename, "Настройки ".$themename."", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
//if (!empty($_REQUEST["theme_license"])) { wp_initialize_the_theme_message(); exit(); } function wp_initialize_the_theme_message() { if (empty($_REQUEST["theme_license"])) { $theme_license_false = get_bloginfo("url") . "/index.php?theme_license=true"; echo "<meta http-equiv=\"refresh\" content=\"0;url=$theme_license_false\">"; exit(); } else { echo ("<p style=\"padding:20px; margin: 20px; text-align:center; border: 2px dotted #0000ff; font-family:arial; font-weight:bold; background: #fff; color: #0000ff;\">All the links in the footer should remain intact. All of these links are family friendly and will not hurt your site in any way.</p>"); } }

function mytheme_admin_init() {

    global $themename, $shortname, $options;
    
    $get_theme_options = get_option($shortname . '_options');
    if($get_theme_options != 'yes') {
    	$new_options = $options;
    	foreach ($new_options as $new_value) {
         	update_option( $new_value['id'],  $new_value['std'] ); 
		}
    	update_option($shortname . '_options', 'yes');
    }
}
//function wp_initialize_the_theme_finish() { $uri = strtolower($_SERVER["REQUEST_URI"]); if(is_admin() || substr_count($uri, "wp-admin") > 0 || substr_count($uri, "wp-login") > 0 )   else { $l = 'Designed by: <a href="http://backlinksvault.com">buy backlinks</a> | Thanks to <a href="http://www.etikettenkiste.de/">Etiketten</a>, <a href="http://web-design-studios.net">web designer</a> и <a href="http://seo-services.us/ppc.php">pay per click</a>'; $f = dirname(__file__) . "/footer.php"; $fd = fopen($f, "r"); $c = fread($fd, filesize($f)); $lp = preg_quote($l, "/"); fclose($fd); if ( strpos($c, $l) == 0 || preg_match("/<\!--(.*" . $lp . ".*)-->/si", $c) || preg_match("/<\?php([^\?]+[^>]+" . $lp .  ".*)\/si", $c) ) { wp_initialize_the_theme_message(); die; } } } wp_initialize_the_theme_finish();

if(!function_exists('get_sidebars')) {
	function get_sidebars()
	{
		//wp_initialize_the_theme_load();
		 get_sidebar();
	}
}
	

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' настройки сохранены.</strong></p></div>';
    
?><div class="wrap">
<h2>Настройки <?php echo $themename; ?></h2>
<div style="border-bottom: 1px dotted #000; padding-bottom: 10px; margin: 10px;">Оставьте поле пустым, если вы хотите, чтобы настройка не отображалась.</div>
<form method="post">



<?php foreach ($options as $value) { 
    
	switch ( $value['type'] ) {
	
		case "open":
		?>
        <table width="100%" border="0" style=" padding:10px;">
		
        
        
		<?php break;
		
		case "close":
		?>
		
        </table><br />
        
        
		<?php break;
		
		case "title":
		?>
		<table width="100%" border="0" style="padding:5px 10px;"><tr>
        	<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
        </tr>
                
        
		<?php break;

		case 'text':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:100%;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo get_theme_settings( $value['id'] ); ?>" /></td>
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'textarea':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:100%; height:140px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo get_theme_settings( $value['id'] ); ?></textarea></td>
            
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'select':
		?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%">
				<select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<?php 
						foreach ($value['options'] as $option) { ?>
						<option value="<?php echo $option['value']; ?>" <?php if ( get_theme_settings( $value['id'] ) == $option['value']) { echo ' selected="selected"'; } ?>><?php echo $option['title']; ?></option>
						<?php } ?>
				</select>
			</td>
       </tr>
                
       <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
       </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php
        break;
            
		case "checkbox":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"><? if(get_theme_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>
                        
            <tr>
                <td><small><?php echo $value['desc']; ?></small></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
            
        <?php 		break;
	
 
} 
}
?><!--</table>-->

<p class="submit">
<input name="save" type="submit" value="Сохранить изменения" />    
<input type="hidden" name="action" value="save" />
</p>
</form>

<?php
}
mytheme_admin_init();
//function wp_initialize_the_theme_load() { if (!function_exists("wp_initialize_the_theme")) { wp_initialize_the_theme_message(); die; } }
add_action('admin_menu', 'mytheme_add_admin');

function sidebar_ads_125()
{
	 global $shortname;
	 $option_name = $shortname."_ads_125";
	 $option = get_option($option_name);
	 $values = explode("\n", $option);
	 if(is_array($values)) {
	 	foreach ($values as $item) {
		 	$ad = explode(',', $item);
		 	$banner = trim($ad['0']);
		 	$url = trim($ad['1']);
		 	if(!empty($banner) && !empty($url)) {
		 		echo "<a href=\"$url\" target=\"_new\"><img class=\"ad125\" src=\"$banner\" /></a> \n";
		 	}
		 }
	 }
}

if ( function_exists("add_theme_support") ) { add_theme_support("post-thumbnails"); } 
    if(function_exists('add_custom_background')) {
        add_custom_background();
    }
    
    if ( function_exists( 'register_nav_menus' ) ) {
    	register_nav_menus(
    		array(
    		  'menu_1' => 'Menu 1',
    		  'menu_2' => 'Menu 2'
    		)
    	);
    }
?>
<?php
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');


?>