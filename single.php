<?php
    get_header();
?>

<?php
  	while(have_posts()){
    	the_post();
?>

<!-- Single - for displaying a single Blog Post -->

<h2 class="page-heading"><?php the_title(); ?></h2>

<!-- Post Container -->

<div id="post-container">
  	<section id="blogpost">
    	<div class="card">
      		<div class="card-meta-blogpost">
      			Posted by <?php the_author(); ?> on <?php the_time('F j, Y'); ?>
            	<?php if (get_post_type() == 'post') { ?>
             	in <a href="#"><?php echo get_the_category_list( ', ' ) ?></a>
            	<?php } ?>
      		</div>
	      	<div class="card-image">
	      		<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Card Image">
	      	</div>
	      	<div class="card-description">
	      		<?php the_content() ?>
	      	</div>
    	</div>

    	<!-- The Comments Section -->

        <div id="comments-section">
	        <?php 
	          $fields =  array(
	            'author' =>
	            '<input id="author" placeholder="Name" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	            '" size="30"' . $aria_req . ' />',
	        
	          'email' =>            
	            '<input id="email" name="email" placeholder="Email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	            '" size="30"' . $aria_req . ' />',
	          );

	          $args = array(
	            'title_reply' => 'Share Your Thoughts',
	            'fields' => $fields,
	            'comment_field' => '<textarea id="comment" placeholder="Your Comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
	            'comment_notes_before' => '<p class="comment-note">Your email address will not be published. All fields are required.</p>'
	          ); 

	        comment_form($args); 

          	$comments_number = get_comments_number();            
          	if($comments_number != 0){ ?>
          		<div class="comments">
            		<h3>What others say:</h3>
            		<ol class="all-comments">
	              		<?php
		                $comments = get_comments(array(
		                  'post_id' => $post->ID,
		                  'status' => 'approve'
		                ));
		                wp_list_comments(array(
		                  'per_page' => 15
		                ), $comments);
		              ?>
            		</ol>
          		</div>
          	<?php } ?>
         
        </div>

    </section>

    <?php } ?>

    <!-- Sidebar -->

  	<aside id="sidebar">
    	<?php dynamic_sidebar('main_sidebar') ?>
  	</aside>
</div>

<?php get_footer(); ?>