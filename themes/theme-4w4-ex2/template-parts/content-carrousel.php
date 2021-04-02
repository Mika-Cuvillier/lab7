<?php
/**
 * Template part pour afficher les blocs de front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-4w4-ex2
 */

 global $tPropriété;
?>

<article class="slide__conteneur">
	<p><?php echo $tPropriété['sigle'] . " - " . $tPropriété['nbHeure'] . " - " . $tPropriété['typeCours']; ?></p>
	<a href="<?php echo get_permalink(); ?>"><?php echo $tPropriété['titre']; ?></a>
	<p>Session :<?php echo $tPropriété['session']; ?></p>
</article>
