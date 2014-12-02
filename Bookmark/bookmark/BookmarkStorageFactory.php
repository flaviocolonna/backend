<?php
class BookmarkStorageFactory {
	public static $bookmarkStorage;
	function __construct() {
		BookmarkStorageFactory::$bookmarkStorage = new BookmarkStorageDB();
	}

	static function getBookmarkStorage() {
		return BookmarkStorageFactory::$bookmarkStorage;
	}
}
?>