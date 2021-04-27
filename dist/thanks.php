<?php
/**
 * PHP Reflection
 * Form submission redirect page
 * 
 * @author Otis Moorman <otis.moorman@netmatters-scs.com>
 * @link https://github.com/otism94/PHP-Reflection
 */

$page_title = "Thanks";
require __DIR__ . "/inc/bootstrap.php";
require_once __DIR__ . "/inc/head.php";

session_start();

if (!isset($_SESSION["referral"])) {
    header("Location: index.php");
} else {
    $redirectPage = $_SESSION["referral"];
    echo <<<EOD
    <div id="thanks">
        <i class="far fa-check-circle"></i>
        <h1>Thanks for your correspondence.</h1>
        <span>Redirecting you back now. If nothing happens, <a href="{$redirectPage}">click here</a> to return.</span>
    </div>
    EOD;
    header("refresh:3; url=" . $redirectPage);
    session_unset();
}
?>
<script>history.pushState('', '', window.location.pathname);</script>