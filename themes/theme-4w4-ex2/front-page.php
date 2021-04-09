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
			<?php
			if ( is_front_page()) : ?>
			<?php endif ?>
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
						<?php if(in_array($precedent, ['Web', 'Jeu', 'Spécifique', 'Conception'])): ?>
							<div class="radio">
								<?php echo $radio; 
								$radio = '';
								?>
							</div>
						<?php endif;?>
						<h2><?php echo $tPropriété['typeCours'] ?></h2>
						<section <?php echo (in_array($tPropriété['typeCours'], ['Web', 'Jeu', 'Spécifique', 'Conception']) ? 'class="carrousel-2"' : 'class="bloc"'); ?>>
						
					<?php endif;?>
					<?php
					if(in_array($tPropriété['typeCours'], ['Web', 'Jeu', 'Spécifique', 'Conception'])):
						get_template_part( 'template-parts/content', 'carrousel' );
						$radio .= '<input type="radio" name="boutton-'. $tPropriété['typeCours'].'">';
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
