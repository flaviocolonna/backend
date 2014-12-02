<!DOCTYPE html>
<html>
	<head>
		<title>Edit</title>
		<link rel="stylesheet" type="text/css" href="mystyle.css">
	</head>
	<body>
		<header>
			<?php
			require_once ("Bookmark.php");
			require_once ("BookmarkStorageDB.php");
			require_once ("BookmarkStorageFactory.php");
			?>
		</header>
		<?php
		//case 1: The user clicked on Create in the Homepage
		if ((isset($_POST['submitFirst']) && $_POST['submitFirst'] == 'Create')) {
			print "<title>Create</title>";
			print "	
			<form method='post' action='Bookmarkedit.php'>
			Name
			<input type='text' name='name'/>
			Url
			<input type='text' name='url'/>
			<input type='submit' name='submit' value='Create' />
      		</form>
			";
		}
		//User clicked on Create in the Bookmarkedit page
		else if ((isset($_POST['submit']) && $_POST['submit'] == 'Create')) {
			if (isset($_POST['name']) && isset($_POST['url'])) {
				$newBookmark = new Bookmark($_POST['name'], $_POST['url'],0);
				$bookmarkStorage = new BookmarkStorageFactory();
				$bookmarkStorage -> getBookmarkStorage() -> create($newBookmark);
			} else if ((isset($_POST['name']) == FALSE || isset($_POST['url']) == FALSE)) {
				print "<h1>Error! Insert correct name and url values</h1>";
			}
		} else if (isset($_GET['name']) && isset($_GET['url']) && isset($_GET['id'])) {

			//case 2: The user clicked on EDIT from the Homepage
			$name = $_GET['name'];
			$url = $_GET['url'];
			$id = $_GET['id'];
			setcookie('id',$id);
			print "<title>Edit</title>";
			print "
			<div class='scheleton'>
			<p>ID: " . $id . "</p>
			<p>Name: " . $name . "</p>
			<p>Url: " . $url . "</p>
			<form method='post' action='Bookmarkedit.php'>
			New Name
			<input type='text' name='name'/>
			New Url
			<input type='text' name='url'/>
			<input type='submit' name='submit' value='Edit' />
			<input type='submit' name='submit' value='Delete' />
      		</form>
      		</div>
      		";
		} 
		//User clicked on Edit in the Bookmarkedit page
		else if (isset($_POST['submit']) && $_POST['submit'] == 'Edit'  && isset($_COOKIE['id']) && isset($_POST['name']) && isset($_POST['url'])) {
			$id = $_COOKIE['id'];
			$url = $_POST['url'];
			$name = $_POST['name'];
			$newBookmark = new Bookmark($name, $url, $id);
			$bookmarkStorage = new BookmarkStorageFactory();
			$bookmarkStorage -> getBookmarkStorage() -> update($newBookmark);
			print "The bookmark with ID " . $id . " is been updated!";
			print "<a href='Main.php'><button>Home</button></a>";
		}
		//User clicked on Delete in the Bookmarkedit page 
		else if (isset($_POST['submit']) && $_POST['submit'] == 'Delete' && isset($_COOKIE['id'])) {
			$bookmarkStorage = new BookmarkStorageFactory();
			$bookmarkStorage -> getBookmarkStorage() -> delete($_COOKIE['id']);
			print "The bookmark with ID " . $_COOKIE['id'] . " is been deleted!";
			print "<a href='Main.php'><button>Home</button></a>";
		}
		?>
	</body>
</html>