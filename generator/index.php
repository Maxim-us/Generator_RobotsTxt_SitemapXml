<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Genetatot robots.txt</title>
	<style>
		.link{
			width: 500px;
			margin: 0px auto;
			text-align: right;
		}
		.plus span{
			font-size: 20px;
			font-weight: bold;
			cursor: pointer;
		}
		.ready{
			text-align: center;
		}
	</style>
</head>
<body>
	<?
	if( file_exists( '../robots.txt' ) && file_exists( '../sitemap.xml' ) ):
	?>
		<h1 class="ready">Ваш сайт готов к индексации</h1>
	<?
	endif;
	?>
	
	<div class="link">
		<a href="generatorsitemap.php">Управение sitemap.xml</a>
	</div>
	<?
	if( !file_exists( '../robots.txt' ) ):
	?>	

		<h3>
			Создать файл "robots.txt"
		</h3>

		<form action="set_robots.php" method="post">

			<label>Укажите доменное имя (пример: example.com)</label>
			<div>
				<input type="text" name="domname" value="" />
			</div>

			<label>Укажите директории которые не нужно индексировать (пример: /admin)</label>
			<div class="disallowWrap">
				<input type='text' name='disallow0' class='disallow' value='' />		
			</div>
			<div class="plus" title="Добавить директорию"><span>+</span></div><br />	
			
			<input type="hidden" name="countinput" id="countinput" value='0' />

			<input type="submit" name="generate" value="Создать robots.txt" />	

		</form>

		<br /><br /><br />

	<?
	endif;

	if( file_exists( '../robots.txt' ) ):
		echo "<h2>Содержимое файла</h2>";
		
		$lines = file( '../robots.txt' );
		foreach( $lines as $line ){
			echo htmlspecialchars( $line ) . "<br>";
		}

		echo "<br><a href='deleterobot.php'>Удалить и перезаписать файл</a><br>";

	else:
		echo '<h3>Файл robots.txt еще не создан!</h3>';
	endif;
	?>

	<script src="js/jquery-1.11.3.js"></script>

	<script>

		$( document ).ready( function(){		

			$( '.plus span' ).click( function(){
				var CountInput = $( '.disallow' ).length;
				$( "<br><br><input type='text' name='disallow" + CountInput + "' class='disallow' value='' />" ).appendTo( '.disallowWrap' );
				$( '#countinput' ).val( CountInput );
			} );

		} );

	</script>
	
</body>
</html>