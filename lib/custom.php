<?php
/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license GNU Affero General Public License
 * @link https://blueimp.net/ajax/
 */

// Include custom libraries and initialization code here

define('INDEX_CHECK', 1);

require_once '../globals.php';
require_once '../conf.inc.php';
require_once '../nuked.php';
require_once '../Includes/constants.php';

$nksession = session_check();
$nkuser = ($nksession == 1) ? secure() : array();

// Si l'user n'a pas de date de dernière visite on update sinon l'auth ne se fait pas
if ($nkuser[4] == '') {
    $upd = mysql_query("UPDATE ". SESSIONS_TABLE ." SET last_used = '". time() ."' WHERE user_id = '". $nkuser[0] ."' ");
    // On recharge la page sinon l'user n'est pas reconu ;o
    redirect($_SERVER["HTTP_REFERER"], 0);
}

?>