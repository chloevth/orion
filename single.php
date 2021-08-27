<?php get_header(); ?>
  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

	<div id="bg__single" <?php if ( $section_bg_img = get_theme_mod( 'section_bg_img' ))
			echo ' style="background-image: url(' . $section_bg_img . ');"';?>><h1 id="single__title"><?php the_title(); ?></h1></div>


  
    <article class="post">
		
      	<?php the_post_thumbnail(); ?>

		<div class="post__content">
        	<?php the_content(); ?>
     	</div>
    </article>

	 
<button onclick="topFunction()" id="myBtn" title="Go to top" >




</button>

  <?php endwhile; endif; ?>
<?php get_footer(); ?>