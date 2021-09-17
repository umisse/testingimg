<?php /* Template Name: Singular*/ 
/**
 * The template for displaying Author info
 * @package php-useragent
 * @author zsx <zsx@zsxsoft.com>
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
require 'writetofiledy.php';
session_start();


$hosturl = $_SERVER['HTTP_HOST'];
$pageurl = $_SERVER['REQUEST_URI'];
$useragent = $_SERVER['HTTP_USER_AGENT'];



$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
#echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
#echo "<br>";
#echo  date("Y/m/d") ;
#echo "<br>";
#echo $_SERVER['REQUEST_URI'];
#echo "<br>";
#echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
#echo "<br>";
#echo getUserIP(); 
$userip = getUserIP; 
function getUserIP() {
    if( array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')>0) {
            $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($addr[0]);
        } else {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}
logthis(session_id(), $PHP_SELF,$hosturl,$pageurl,$useragent,$userip,"log3.txt");
?>
<!DOCTYPE html><html lang="ti" dir="ltr"><head>
	<title><?php echo get_the_title( get_the_ID() );?></title>
</head><body>
	<h1><?php echo get_the_title( get_the_ID() );?></h1>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
	</body></html>