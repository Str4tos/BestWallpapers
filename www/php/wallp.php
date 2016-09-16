<html><body>
<div id="ajax-wrap">
	<div id="wallps">
		<div class="row">
		<?php
			$Cat = $_GET['cat'];
			$SelectSize = $_GET['size'];
			$link = mysql_connect('localhost', 'root', '');
			mysql_select_db("mysite") or die(mysql_error());
			$strSQL ="SELECT * FROM(SELECT * FROM `imgs`";
			if($Cat != "All" && $SelectSize == "All"){
				$strSQL = $strSQL . " WHERE `cat` = '" . $Cat . "'";
			}elseif($Cat == "All" && $SelectSize != "All"){
				$strSQL = $strSQL . " WHERE `size` = '" . $SelectSize . "'";
			}elseif($Cat != "All" && $SelectSize != "All"){
				$strSQL = $strSQL . " WHERE `cat` = '" . $Cat . "' AND `size` = '" . $SelectSize . "'";
			}
			$strSQL = $strSQL . ") t ORDER BY `id` DESC";
			if($_GET['page'] == 1){ $strSQL = $strSQL . " LIMIT 18";}
			else{
				$numpage = ($_GET['page'] * 18) - 18;
				$strSQL = $strSQL . " LIMIT " .  $numpage . ", 18";
			}
			$rs = mysql_query($strSQL);
			//$len = mysql_num_rows($rs);
			while($row = mysql_fetch_array($rs)) {
				echo '
				<div class="col-xs-12 col-sm-6 col-lg-4 col-bg-3 text-center"><div class="img-cont"><div class="img-wallp">
				<a class="example-image-link" href="../' . $row['img'] . '" data-lightbox="example-set">
				<img class="img-thumbnail example-image" src="../' . $row['img'] . '"></a>
				</div>
				<a class="btn btn-info" href="../' . $row['img'] . '" role="button"><b>Скачать &raquo;</b></a></div></div>';
			}
			//if($len == 18){ echo '';}
			mysql_close($link);
		?>
		</div><!--/row-->
	</div><!--/.col-xs-12.col-sm-9-->
</div>
</body></html>
