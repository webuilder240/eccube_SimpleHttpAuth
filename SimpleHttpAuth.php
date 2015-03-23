<?php
	/*
	* SimpleHttpAuth
	* Copyright (C) 2015 Takuya Nishio All Rights Reserved.
	* http://webuilder240.github.io
	*
	* This library is free software; you can redistribute it and/or
	* modify it under the terms of the GNU Lesser General Public
	* License as published by the Free Software Foundation; either
	* version 2.1 of the License, or (at your option) any later version.
	*
	* This library is distributed in the hope that it will be useful,
	* but WITHOUT ANY WARRANTY; without even the implied warranty of
	* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
	* Lesser General Public License for more details.
	*
	* You should have received a copy of the GNU Lesser General Public
	* License along with this library; if not, write to the Free Software
	* Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
	*/

	class SimpleHttpAuth extends SC_Plugin_Base{

		public function __construct(array $arrSelfInfo) {
			parent::__construct($arrSelfInfo);
		}

		function install($arrPlugin) {}

		function uninstall($arrPlugin) {}

		function update($arrPlugin) {}

		function enable($arrPlugin) {}

		function disable($arrPlugin) {}

		function register(SC_Helper_Plugin $objHelperPlugin) {}

		function preProcess (LC_Page_EX $objPage) {
            //この関数をプラグイン内に定義するだけで実行されます。
			if (!isset($_SERVER['PHP_AUTH_USER'])) {
				$this->__authUser();
			} else {
				if (!$this->__checkUsers()){
					$this->__authUser();
				}
			}
		}

		/**
		 * DBから有効になっている管理ユーザーを読み込んで認証する
		 * @return bool
		 */
		private function  __checkUsers() {
			$objQuery =& SC_Query_Ex::getSingletonInstance();
			//データベースから有効になっているユーザー一覧を取得する
			$table = 'dtb_member';
			$col = 'password, salt';
			$where = 'login_id = ? AND del_flg = 0 AND work = 1';
			$arrData = $objQuery->getRow($col,$table,$where,array($_SERVER['PHP_AUTH_USER']));
			return SC_Utils_Ex::sfIsMatchHashPassword($_SERVER['PHP_AUTH_PW'], $arrData['password'], $arrData['salt']);
		}

		/**
		 * Basic処理を実行
		 */
		private function __authUser() {
			header('Content-type: text/html; charset='.mb_internal_encoding());
			header('WWW-Authenticate: Basic realm="認証してください"');
			header('HTTP/1.0 401 Unauthorized');
			die("ログイン失敗");
		}

	}