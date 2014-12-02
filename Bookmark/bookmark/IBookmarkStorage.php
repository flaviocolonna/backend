<?php
require_once("Bookmark.php");
    interface IBookmarkStorage
    {
    	function create(Bookmark $bookmark);
		function update(Bookmark $bookmark);
		function delete($id);
		function readAll();
    }
?>