<?php

/**
 * Ajax validate comment form
 */
add_action('wp_footer',  'comment_validation_init');
function comment_validation_init() {
  if (is_singular() && comments_open() ) {
    wp_enqueue_script('js-validate', 'http://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js', array('jquery'), '1.16.0', true); ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
  $.fn.validate && $('#commentform').validate({
    onfocusout: function(element) {
      this.element(element);
    },
    rules: {
      author: {
        required: true,
        minlength: 2,
        normalizer: function(value) { return $.trim(value); }
      },

      email: {
        required: true,
        email: true
      },

      comment: {
        required: true,
        minlength: 10,
        normalizer: function(value) { return $.trim(value); }
      }
    },

    messages: {
      author: "<?php echo __("Please enter a username", "betheme"); ?>",
      email: "<?php echo __("Please enter a valid email address.", "betheme"); ?>",
      comment: "<?php echo __("Please enter a message (mininum 10 chracters).", "betheme"); ?>"
    },

    errorElement: "small",
    errorClass: 'has-text-danger is-block',
    errorPlacement: function(error, element) {
      element.before(error);
    }
  });
});
</script>
  <?php
  }
}

/**
 * Convert standard date time string to "xxx ago"
 */
function time_elapsed_string($datetime, $full = false) {
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
      'y' => __('year', 'betheme'),
      'm' => __('month', 'betheme'),
      'w' => __('week', 'betheme'),
      'd' => __('day', 'betheme'),
      'h' => __('hour', 'betheme'),
      'i' => __('minute', 'betheme'),
      's' => __('second', 'betheme'),
  );
  foreach ($string as $k => &$v) {
      if ($diff->$k) {
          $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
          unset($string[$k]);
      }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . __(' ago', 'betheme') : __('just now', 'betheme');
}

/**
 * Render comment author
 */
add_filter('get_comment_author', function($author, $comment_id, $comment) {
  if ( $comment->user_id && $user = get_userdata( $comment->user_id ) ) {
    $author = $user->display_name;
  } else if ($comment->comment_author) {
    $author = $comment->comment_author;
  } else {
    $author = __( 'Anonymous', 'betheme' );
  }

  return $author;
}, 100, 3);

/**
 * Render comment item
 */
function tittle_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
  <div id="comment-<?php comment_ID(); ?>">
    <div class="comment-author vcard">
      <?php printf(__('<cite class="fn">%s</cite> <span class="says">%s</span>'), get_comment_author(), time_elapsed_string($comment->comment_date)) ?>
    </div>
    <?php if ($comment->comment_approved == '0') : ?>
      <small><em><?php echo __('Your comment is awaiting moderation.', 'betheme') ?></em></small>
      <br />
    <?php endif; ?>

    <div class="comment-meta commentmetadata">
      <!-- <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
          <?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>
      </a> -->
      <?php edit_comment_link(__('(Edit)'),'  ','') ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
      <?php ob_start(); ?>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      <?php $reply_btn = ob_get_clean() ?>
      <?php echo str_replace('comment-reply-link', 'button is-primary is-rounded-small comment-reply-link', $reply_btn); ?>
    </div>
  </div><?php
}

/**
 * Custom comment form
 */
add_filter( 'comment_form_fields', 'tittle_move_comment_field_to_bottom' );
function tittle_move_comment_field_to_bottom( $fields ) {
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;
  return $fields;
}

add_filter('woocommerce_product_review_comment_form_args', 'tittle_comment_form_args');
add_filter('comment_form_args', 'tittle_comment_form_args');
function tittle_comment_form_args() {
	$aria_req = ' aria-required="true"';
	$comment_form_args = array(
		'class_form' => 'column one comment-form',
		'comment_notes_before' => '<p><em><small>' .__('Your email address will not be published. All fields are required.', 'betheme'). '</small></em></p>',
		'comment_field' => '<p><textarea style="width: 100%" id="comment" name="comment" maxlength="1000" col="45" rows="6" placeholder="' . __( 'Comment', 'betheme' ) . '"></textarea></p>',
		'label_submit' => __('Leave a Comment', 'betheme'),
		'fields' => array(
			'author' =>
				'<p><input id="author" name="author" type="text" placeholder="' . __( 'Name', 'betheme' ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
				'" size="30"' . $aria_req . ' /></p>',

			'email' =>
				'<p><input id="email" name="email" type="text" placeholder="' . __( 'Email', 'betheme' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="30"' . $aria_req . ' /></p>',

			// 'url' =>
			//   '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label>' .
			//   '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
			//   '" size="30" /></p>',
		)
	);

	return $comment_form_args;
}