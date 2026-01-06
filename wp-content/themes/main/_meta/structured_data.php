<script type="application/ld+json">
{
	"@context": "https://schema.org",
	"@graph": [
    <?php include('structured_data/Organization.php'); echo ','; ?>
		<?php include('structured_data/website.php'); echo ','; ?>
		<?php include('structured_data/WebPage.php'); echo ','; ?>
    <?php if(is_single()) : ?>
      <?php include('structured_data/article.php'); echo ','; ?>
    <?php endif; ?>
		<?php include('structured_data/BreadcrumbList.php'); //echo ','; ?>
	]
}
</script>

<?php //include('structured_data/origin.php'); ?>

<?php if(is_home() || is_front_page() || is_page() || is_single() || is_category()) : ?>
    
<?php endif; ?>