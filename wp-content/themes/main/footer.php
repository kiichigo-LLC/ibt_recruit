<?php
  // 変数を読み込む
  include(get_template_directory() . '/_utils/_var.php');
?>

</main>

<footer>

  <?php include(get_template_directory() . '/_common/footer.php'); ?>

</footer>

</div>

<!-- JavaScript Modules -->
<script type="module" src="<?php echo get_stylesheet_directory_uri(); ?>/public/js/main.js?v<?php echo $vcash ?>"></script>
<script type="module" src="http://localhost/ibt/recruit/wp-content/themes/main/public/js/main.js?v<?php echo $vcash ?>"></script>

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