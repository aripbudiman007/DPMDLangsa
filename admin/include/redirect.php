<?php
function redirectJS ($url)
{
	echo "<script type='text/javascript'>
		window.location.href='$url';
	</script>";
}
?>