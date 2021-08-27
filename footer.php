    <footer class="site__footer">
        

    <?php $loop = new WP_Query((array('post_type' => 'footer','order'=>'ASC'))); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            
                 
                  <?php the_content(); ?>

            <?php endwhile; wp_reset_query(); ?>


        <?php wp_nav_menu( 
        array( 
            'theme_location' => 'footer',
            'container' => 'ul'
        ) 
        );?>

     
      <div id="newsletter">
            <?php newsletter_form();?>
      </div>
	</footer>
  
    <?php wp_footer(); ?>
</body>
</html>