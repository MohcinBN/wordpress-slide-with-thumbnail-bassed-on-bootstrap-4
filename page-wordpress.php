<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slide</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

<div id="slide">
<?php

$args = array( 
    'cat' => 6, // get catogory 6 from 'your website'
    'posts_per_page' => 5,  // post to show
    
);

$slides = new WP_Query( $args ); // create the query 
$index = 0; // initialise index to fix loop error
$url = wp_get_attachment_url( get_post_thumbnail_id() ); // image url
$id = get_the_ID();  // get the post id
//$post_link=the_permalink();



if( $slides->have_posts() ): ?>


  <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel" data-interval="false">

    

    	<ol class="carousel-indicators">

			<!-- the Loop -->
			<?php if ( have_posts() ) : while ( $slides->have_posts() ) : $slides->the_post(); ?>
				<li data-target="#carousel-thumb" data-slide-to="<?php echo $slides->current_post; ?>" class="<?php if ( $slides->current_post == 0 ) : ?>active<?php endif; ?>">
					<div class="m">
						<?php $url = wp_get_attachment_url( get_post_thumbnail_id($slides->ID), 'thumb'); ?>
                		    <img src="<?php echo $url; ?>" alt="<?php the_title(); ?>">		
                				<div class="test" style="opacity: 0">
                					<p>
                						<a href="<?php echo get_permalink($id ); ?>"><?php the_title(); ?></a>
                					</p>
                				</div>
                	</div>
				</li>
			<?php endwhile; endif; ?>

		</ol>
<!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">
    <?php while( $slides->have_posts() ) : $slides->the_post(); $index++ ?>

      <?php if ( $index == 1 ): ?>
        <div class="carousel-item active">
      <?php else: ?>
        <div class="carousel-item">
      <?php endif; ?>
      		<div class="above-slide">
				<div class="text">
					<h2><?php the_title(); ?></h2>
				</div>
				
				<div class="date">
					<span><?php the_date() ?></span>
				</div>
			</div>
      <?php $url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
        <a href="<?php echo get_permalink(); ?>">
            <img src="<?php echo $url; ?>" alt="<?php the_title(); ?>">
        </>
        </div>
  <?php endwhile; ?>
<?php endif; ?>
      <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
  </div>
</div><!-- carrousel ends here -->
</div>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
</body>
</html>