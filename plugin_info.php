<?php
	class plugin_info{
		/** プラグインコード(必須)：プラグインを識別する為キーで、他のプラグインと重複しない一意な値である必要があります */
		static $PLUGIN_CODE       = "SimpleHttpAuth";
		/** プラグイン名(必須)：EC-CUBE上で表示されるプラグイン名. */
		static $PLUGIN_NAME       = "簡単にBasic認証を導入できるプラグイン";
		/** プラグインバージョン(必須)：プラグインのバージョン. */
		static $PLUGIN_VERSION    = "0.0.1";
		/** 対応バージョン(必須)：対応するEC-CUBEバージョン. */
		static $COMPLIANT_VERSION = "2.13.x";
		/** 作者(必須)：プラグイン作者. */
		static $AUTHOR            = "Takuya Nishio";
		/** 説明(必須)：プラグインの説明. */
		static $DESCRIPTION       = "簡単にBASIC認証を実装できるプラグインです。入力するユーザー名とパスワードは管理ユーザーのデータと同じになっています。BASIC認証を無効にしたい場合はこのプラグインを無効にしてください。";
		/** プラグイン作者URL：プラグイン毎に設定出来るURL（説明ページなど） */
		static $AUTHOR_SITE_URL   = "http://webuilder240.github.io/";
		/** クラス名(必須)：プラグインのクラス（拡張子は含まない） */
		static $CLASS_NAME       = "SimpleHttpAuth";
		/** ライセンス */
		static $LICENSE = "LGPL";
	}