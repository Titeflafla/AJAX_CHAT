<?php
/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license GNU Affero General Public License
 * @link https://blueimp.net/ajax/
 */

class CustomAJAXChat extends AJAXChat {

    function revalidateUserID() {
		global $nkuser;

		if($this->getUserID() === $nkuser[4]) {
			return true;
		}
		return false;
	}

    function initCustomRequestVars() {
		global $nkuser;

		if(!$this->getRequestVar('logout') && $nkuser) {
			$this->setRequestVar('login', true);
		}
	}

    function getValidLoginUserData() {
		global $nkuser;

		if($nkuser) {
			$userData = array();
			$userData['userID'] = $nkuser[4];
			$userData['userName'] = $this->trimUserName($nkuser[2]);

			if($nkuser[1] == '9')
				$userData['userRole'] = AJAX_CHAT_ADMIN;
			elseif($nkuser[1] == '2')
				$userData['userRole'] = AJAX_CHAT_MODERATOR;
			else
				$userData['userRole'] = AJAX_CHAT_USER;

			return $userData;

		} else {
			// Guest users:
			return $this->getGuestUser();
		}
	}

}
?>