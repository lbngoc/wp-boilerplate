<?php
/**
 * The template for displaying Comments.
 */
?>

<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.' ); ?></p>
		</div>
		<?php return;
	endif; ?>

  <?php comment_form( apply_filters( 'comment_form_args', $comment_form ) ); ?>

	<?php if ( have_comments() ) : ?>
		<h4 id="comments-title">
			<?php
				if( get_comments_number() == 1 ){
					echo get_comments_number() .' '. __('Reply');
				} else {
					echo get_comments_number() .' '. __('Replies');
				}
			?>
		</h4>

    <div class="column one">
      <ol class="commentlist">
        <?php wp_list_comments('avatar_size=0&callback=tittle_comment'); ?>
      </ol>
    </div>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav">
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;' ) ); ?></div>
		</nav>
		<?php endif; ?>

	<?php
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.' ); ?></p>
	<?php endif; ?>

</div><!-- #comments -->
