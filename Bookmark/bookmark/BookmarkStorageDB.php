<?php
require_once ('IBookmarkStorage.php');
class BookmarkStorageDB implements IBookmarkStorage {

	public $db;
	function __construct() {
		$this -> connect();
	}

	function connect() {
		try {
			$this -> db = new PDO('mysql:host=localhost', 'root', 'suzukone');
			$queryText = 'CREATE DATABASE IF NOT EXISTS library';
			$queryExecute = $this -> db -> query($queryText);
			$this -> db = new PDO('mysql:host=localhost;dbname=library', 'root', 'suzukone');
			$this -> checkTable();
		} catch(PDOException $e) {
			print '<h1>Error connecting to the Database</h1>' . $e;
		}
	}

	function checkTable() {
		$queryText = "CREATE TABLE IF NOT EXISTS bookmark(
		id int(6) NOT NULL auto_increment,
		name varchar(15) NOT NULL,
        url varchar(150) NOT NULL,
        PRIMARY KEY (id))";
		$queryExecute = $this -> db -> query($queryText);
	}

	function create(Bookmark $bookmark) {
		$name = $bookmark -> getName();
		$url = $bookmark -> getUrl();
		$queryText = "INSERT INTO library.bookmark (name, url) VALUES ('$name','$url')";
		$result = $this -> db -> query($queryText);
		$queryTextId = "SELECT last_insert_id()";
		print "<h3>You have created a bookmark with name: " . $name . " and url " . $url . "</h3>";
		print "<a href='Main.php'><button>Home</button></a>";
	}

	function readAll() {
		$queryText = "SELECT * FROM library.bookmark";
		$results = $this -> db -> query($queryText);
		$bookmarks = array();
		$i = 0;
		foreach ($results as $row) {
			$b = new Bookmark($row['name'], $row['url'],$row['id']);
			$bookmarks[$i] = $b;
			$i++;
		}
		return $bookmarks;
	}

	function update(Bookmark $bookmark) {
		$name = $bookmark -> getName();
		$url = $bookmark -> getUrl();
		$id = $bookmark->getId();
		$queryText = "UPDATE library.bookmark SET name='$name',url='$url' WHERE id='$id' ";
		$bookmarks = $this -> db -> query($queryText);
	}

	function delete($id) {
		$queryText = "DELETE FROM library.bookmark WHERE id=" . $id . ";";
		return $this -> db -> query($queryText);
	}

}
?>