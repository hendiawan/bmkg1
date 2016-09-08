<?php
	session_start();
	session_unset('login-dosen');
	session_destroy();
			
?>

<script>
window.close();
</script>