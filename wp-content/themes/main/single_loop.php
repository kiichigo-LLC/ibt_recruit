<?php
	$category = get_the_category();
	$cat_id   = $category[0]->cat_ID;
	$cat_name = $category[0]->cat_name;
	$cat_slug = $category[0]->category_nicename;
?>

<div class="post">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<h2><?php the_title(); ?></h2>
<p class="date" style="margin-bottom:10px;"><?php the_time("Y年m月j日") ?></p>
<h3><?php echo get_post_meta($post->ID,'h3',true); ?></h3>

<?php echo nl2br( get_the_content() ) ?>

<?php endwhile; ?>
<?php else : ?>

	<h3>記事がありません</h3>
	<p>表示する記事はありませんでした。</p>

<?php endif; ?>
</div>
