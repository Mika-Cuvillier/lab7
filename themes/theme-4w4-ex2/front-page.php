<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-4w4-ex2
 */

get_header();
?>


	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<!-- <?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?> -->
			</header><!-- .page-header -->
			<!-- Début du carrousel -->
			<!--
			<?php
			if ( is_front_page()) : ?>
			<section class="carrousel">
					<article class="slide__conteneur">
						<div class="slide">
							<img src="" alt="">
							<div class="slide__info">
								<p>582-1W1 - 75h - Web</p>
								<a href="http://localhost/4w4_wordpress/2020/10/07/582-1w1-mise-en-page-web-75h/">Mise en page Web</a>
								<p>Session :1</p>
							</div>
						</div>
					</article>
					<article class="slide__conteneur">
						<div class="slide">
							<img src="" alt="">
							<div class="slide__info">
								<p>582-1W1 - 75h - Web</p>
								<a href="http://localhost/4w4_wordpress/2020/10/07/582-1w1-mise-en-page-web-75h/">Mise en page Web</a>
								<p>Session :1</p>
							</div>
						</div>
					</article>
					<article class="slide__conteneur">
						<div class="slide">
							<img src="" alt="">
							<div class="slide__info">
								<p>582-1W1 - 75h - Web</p>
								<a href="http://localhost/4w4_wordpress/2020/10/07/582-1w1-mise-en-page-web-75h/">Mise en page Web</a>
								<p>Session :1</p>
							</div>
						</div>
					</article>
			</section>
			<div class="radio">
			<li><input type="radio" name="boutton"></li>
			<li><input type="radio" name="boutton"></li>
			<li><input type="radio" name="boutton"></li> -->
			</div>
			<?php endif ?>
			<!-- Fin du carrousel -->
			<section class="list-cours">
			<?php
			/* Start the Loop */
            $precedent = "XXXXXXX";
			$radio = "";
			while ( have_posts() ) :
					the_post();
					convertir_tableau($tPropriété);
					if($precedent != $tPropriété['typeCours']): ?>
					 	<?php if($precedent != "XXXXXXX"): ?>
							</section>
						<?php endif;?>
						<?php if($precedent == "Web"): ?>
							<div class="radio">
								<?php echo '<li>'. $radio; '</li>'?>
							</div>
						<?php endif;?>
						<h2><?php echo $tPropriété['typeCours'] ?></h2>
						<section <?php echo ($tPropriété['typeCours'] == 'Web' ? 'class="carrousel-2"' : 'class="bloc"'); ?>>
						
					<?php endif;?>
					<?php
					if($tPropriété['typeCours'] == "Web"):
						get_template_part( 'template-parts/content', 'carrousel' );
						$radio .= '<input type="radio" name="boutton">';
					else: 
						get_template_part( 'template-parts/content', 'bloc' );
					endif;
					$precedent = $tPropriété['typeCours'];
			endwhile; ?>
			</section>
		<?php endif; ?>
		

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

function convertir_tableau(&$tPropriété){
	$titre_grand = get_the_title();
	$tPropriété['session'] = substr($titre_grand, 4,1);
	$tPropriété['nbHeure'] = substr($titre_grand, -4,3);
	$tPropriété['titre'] = substr($titre_grand, 8,-6);
	$tPropriété['sigle'] = substr($titre_grand, 0,7);
	$tPropriété['typeCours'] = get_field('type_de_cours');
}
