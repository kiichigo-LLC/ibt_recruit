<?php

	get_header();

	$category = get_the_category();
	
	// member_interviewカテゴリーのチェック（優先）
	$is_member_interview = false;
	$is_job = false;
	
	if( !empty($category) ) {
		foreach( $category as $cat ) {
			if( $cat->slug === 'member_interview' || $cat->name === 'member_interview' ) {
				$is_member_interview = true;
				break;
			}
		}
		
		// jobカテゴリーのチェック
		foreach( $category as $cat ) {
			if( $cat->slug === 'job' ) {
				$is_job = true;
				break;
			}
		}
	}
	
	// member_interviewカテゴリーの場合は専用テンプレートを使用
	if( $is_member_interview ) {
		include( get_template_directory() . '/single-member_interview.php' );
		return;
	}
	
	// jobカテゴリーの場合は専用テンプレートを使用
	if( $is_job ) {
		include( get_template_directory() . '/single-job.php' );
		return;
	}

	get_footer();