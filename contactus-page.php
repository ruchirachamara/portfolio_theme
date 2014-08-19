<div id="contact_specific_section" class="row">
	<div class="section-heading">
		<h1>Contact</h1>
		<hr>
		<h2>Enough about us. Let's start the conversation about you.</h2>
		<hr>
	</div><!-- section-heading -->
</div><!-- contact_specific_section / row -->
<div id="portfolio_content_wrapper_for_other_pages" class="portfolio_content_wrapper col-md-12">
	<div id="other_pages_left_content_wrapper" class="col-md-4">
		<div class="contact-details">
            <p class="bold">Give us a call</p>
            <p><a href="skype:+94773615230?call">+94 77 3615230</a></p>
            <p><a href="skype:+94718668629?call">+94 71 8668629</a></p><br />
            <p class="bold">Drop us an email</p>
            <p><a href="mailto:support@highresmedia.net">support@highresmedia.net</a></p>
            <p><a href="mailto:info@highresmedia.net">info@highresmedia.net</a></p><br />
            <p class="bold">Shake hands</p>
            <p>No 194, Highlevel Road, Maharagama.</p>
        </div><!-- contact-details -->		
	</div><!-- other_pages_left_content_wrapper / col-md-6 -->
	<div id="other_pages_right_content_wrapper" class="col-md-8">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'page' ); ?>
		<?php endwhile; ?>			    
	</div><!-- other_pages_right_content_wrapper / col-md-6 -->
</div><!-- portfolio_content_wrapper / col-md-12 -->  
