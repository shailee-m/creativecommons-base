<?php
get_header();
$author_image_url = get_avatar_url(get_queried_object()->ID, 'squared');
?>
<header class="page-header  bg-grey">
	<?php
	if (function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
	}
	?>
	<div class="container">
		<div class="columns m-0 is-centered">
			<?php if (!empty($author_image_url)) : ?>
				<div class="column is-4">
					<img alt="" src="<?php echo $author_image_url ?>" class="avatar avatar-96 full-height full-width photo p-3 bg-white" loading="lazy">
				</div>
			<?php endif; ?>
			<div class="column">
				<h2><?php echo get_queried_object()->user_nicename ?></h2>
				<h4><?php echo join(", ", get_user_meta(get_queried_object()->ID)["cc_position"]) ?></h4>
				<p class="mt-2"><?php echo nl2br(join(", ", get_user_meta(get_queried_object()->ID)["description"])) ?></p>
			</div>
		</div>
	</div>
</header>
<section class="main-content">
	<div class="container">
		<div class="columns padding-vertical-larger">
			<div class="column is-8">
				<?php
				if (have_posts()) :
					echo "<h2 class='mb-2'>" . join(" ", get_user_meta(get_queried_object()->ID)["first_name"]) . "'s Posts</h2>";
					while (have_posts()) :
						the_post();
						echo Components::simple_entry(get_the_ID(), true, true);
					endwhile;

					$links = paginate_links(array(
						'show_all'  => true,
						'type'      => 'array'
					));

					if ($links) :

						echo '<div class=" mt-4 is-size-5">';
						$current_page = get_query_var('paged');
						foreach ($links as $key => $link) {
							$total_size = sizeof($links);
							$is_current = $current_page === $key;
							$current_class = $is_current ? ' is-light ' : '';
							echo join('class="button ml-2 same-line p-4 ' . $current_class . ' ', explode('class="', $link));
						}
						echo '</div>';
					endif;
				endif;
				?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>