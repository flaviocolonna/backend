<!DOCTYPE html>
<html>
	<head>

		<link rel="stylesheet" type="text/css" href="mystyle.css">
		<title>MINI WIKI</title>
	</head>
	<body>
		<header>

			<?php
			require_once ('BookmarkStorageFactory.php');
			require_once ('BookmarkStorageDB.php');
			?>
		</header>
		<h1> Welcome to MINI WIKI! </h1>
		<div class="header">
		<h2> Bookmarks </h2>
		<form action="Bookmarkedit.php" method="post">
		<input type="submit" name="submitFirst" value="Create">
		</form>
		</div>
		<?php
		$bookmarkStorage = new BookmarkStorageFactory();
		$bookmarkStorageDB = $bookmarkStorage -> getBookmarkStorage();
		$bookmarks = $bookmarkStorageDB -> readAll();
		for ($i = 0; $i < count($bookmarks); $i++) {
			$bookmark = $bookmarks[$i];
			$bookmarkName = $bookmark -> getName();
			$bookmarkUrl = $bookmark -> getUrl();
			$bookmarkId=$bookmark->getId();
			print "
			<div class=container>
			<p>
			".($i+1).": ". $bookmarkName . "
			</p>
			<a href = '" . $bookmarkUrl . "'>
			<button>Read</button>
			</a>
			
			<a href='Bookmarkedit.php?id=" . $bookmarkId . "&name=" . $bookmarkName . "&url=" . $bookmarkUrl . "'>
			<button>Edit</button>
			</a>
			
			</div>
			";

		}
		?>
	</body>
</html>

