<?php
if(basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
	exit();
}
?>
<?php echo SERVER == 'dev' ? '<script src="/js/vendor/modernizr.js"></script>' : '<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>'; echo"\n"; ?>
<script>window.Modernizr || document.write('<script src="/js/vendor/modernizr.js"><\/script>')</script>
<?php echo SERVER == 'dev' ? '<script src="/js/vendor/jquery.js"></script>' : '<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>'; echo"\n"; ?>
<script>window.jQuery || document.write('<script src="/js/vendor/jquery.js"><\/script>')</script>
<!--
<script src="/js/foundation.min.js"></script>
<script>
  $(document).foundation();
</script>
-->
<script src="/js/app.js"></script>

