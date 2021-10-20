<?php
    get_header();
?>

	<!-- Container for 404 Page -->

    <div class="container-404">

        <h2 class="page-heading">404</h2>
        <img src="http://source.unsplash.com/640x480/?dogs">
        <h3>Page Not Found, I think you're lost. Plz try the following links</h3>

        <ul>
          <li><a href="<?php echo site_url('/blog')?>">Blog List</a></li>
          <li><a href="<?php echo site_url('/projects')?>">Projects List</a></li>
          <li><a href="<?php echo site_url('/about')?>">About Me</a></li>
          <li><a href="<?php echo site_url('')?>">Home Page</a></li>
        </ul>

    </div> 

<?php    
    get_footer();   
?>