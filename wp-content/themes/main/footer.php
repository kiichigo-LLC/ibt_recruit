<?php

//変数受け渡し
include('_common/_var.php');

?>

</main>

<footer>

  <?php include(get_template_directory() . '/__renewal/footer.php'); ?>

</footer>

</div>

<?php if (has_category('recruit')) : ?>
  <script src="http://localhost/ibt/wp/wp-content/themes/main/js/script.js?v<?php echo $vcash ?>" defer></script>
<?php else : ?>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/script.min.js?v<?php echo $vcash ?>" defer></script>
<?php endif; ?>

<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/44737757.js"></script>
<!-- End of HubSpot Embed Code -->

</body>

</html>

<?php
$compress = ob_get_clean();
$compress = str_replace("\t", '', $compress);
$compress = str_replace("\r", '', $compress);
$compress = str_replace("\n", '', $compress);
$compress = preg_replace('/<!--[\s\S]*?-->/', '', $compress);
echo $compress;
?>