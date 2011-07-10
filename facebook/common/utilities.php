<?php
include_once '../secret.php';
include_once '../src/facebook.php';
$fb = new Facebook($conf['secret']);

Class Utilities {
	
	public function url($link, $text='', $target="") {
		$targetAttr = $target ? ' target="'.$target.'"' : '';
		return '<a href="'.$link.'" '.$targetAttr.'>'.$text.'</a>';
	}

	public function createUserListIncludingMe($friends, $me) {
		$userlist = array($me['id']);
		$friendsByKey = array(
			$me['id'] => $me['name']
		);
		for($i=0; $i<count($friends['data']); $i++) {
			$userlist[] = $friends['data'][$i]['id'];
			$friendsByKey[$friends['data'][$i]['id']] = $friends['data'][$i]['name'];
		}
		$users = implode(',', $userlist);
		return array(
				'users' => $users,
				'listById' => $friendsByKey
			);
	}
	
	public function fql($fql, $callback='') {
		global $fb;
		$param  =   array(
			'method'    => 'fql.query',
			'query'     => $fql,
			'callback'  => $callback
			);
		try {
			$response   =   $fb->api($param);
		} catch (FacebookApiException $e) {
			print $fql;
			print_r($e);
			exit;
		}
		return $response;
	}
}