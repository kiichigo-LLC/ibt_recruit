<script type="application/ld+json">
{
	"@context": "https://schema.org",
	"@graph": [
		<?php include(get_template_directory() . '/_meta/structured_data/Organization.php'); ?>,
		<?php include(get_template_directory() . '/_meta/structured_data/website.php'); ?>,
		<?php include(get_template_directory() . '/_meta/structured_data/WebPage.php'); ?>
		<?php 
			// 求人投稿の場合はJobPostingを追加
			if(is_single() && has_category('job')) : 
			include(get_template_directory() . '/_utils/_scf.php');
			// $recruit_jsonldが空でない場合のみJobPostingを追加
			if (!empty($recruit_jsonld)) :
		?>,
			<?php include(get_template_directory() . '/_meta/structured_data/JobPosting.php'); ?>
			<?php endif; ?>
			<?php 
				// 記事投稿の場合はArticleを追加
				elseif(is_single() && !has_category('job')) : 
			?>,
			<?php include(get_template_directory() . '/_meta/structured_data/article.php'); ?>
		<?php endif; ?>,
		<?php include(get_template_directory() . '/_meta/structured_data/BreadcrumbList.php'); ?>
	]
}
</script>