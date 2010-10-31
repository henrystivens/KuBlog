<?php
/**
 * @author Henry Stivens Adarme
 *
 */
class KuHelper {
    public static function gravatar($email, $alt='gravatar', $size=40) {
        $default = 'http://www.somewhere.com/homestar.jpg';
        $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower(trim($email))) . '?d=' . urlencode($default) . '&s=' . $size;        
        echo '<img src="'. $grav_url . '" alt="'. $alt .'" class="avatar" width="40" height="40" />';
    }
}
?>
