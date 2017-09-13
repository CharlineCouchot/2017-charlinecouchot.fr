<?php
/*
 * @package WordPress
 * @subpackage CC2017
 */

 if ( post_password_required() ) {
 	return;
 }

?>
<?php if ( have_comments() ) : ?>
  <div id="comments">
    <div class="comments-title">
      <?php $comments_number = get_comments_number(); ?>
      <h2><?php printf( esc_html( _n( '%d réponse', '%d réponses', $comments_number, 'cc2017'  ) ), $comments_number ); ?></h2>
    </div>
    <ul class="comments-list">
      <?php function custom_comments( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment; ?>
        <li id="comment-<?php comment_ID(); ?>">
          <div class="comment row">
            <div class="col-sm-2">
              <?php echo get_avatar( $comment, 100 ); ?>
            </div>
            <div class="col-sm-10">
              <div class="comment-title"><?php comment_author(); ?> <span class="comment-date"><a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ); ?>"><?php comment_date(); ?></a></span></div>
              <?php if ($comment->comment_approved == '0') : ?>
                <em><php _e('Your comment is awaiting moderation.'); ?></em>
              <?php endif; ?>
              <?php comment_text(); ?>
              <?php comment_reply_link( array_merge( $args, array(
                  'reply_text' => __('Répondre', 'cc2017'),
                  'depth' => $depth,
                  'max_depth' => $args['max_depth']
                  ))); ?>
            </div>
          </div>
      <?php } ?>
      <?php wp_list_comments( array(
        'type' => 'comment',
        'callback' => 'custom_comments'
      )); ?>
    </ul>
  </div>
  <?php $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $required_text = __( 'Les champs marqués <span class="required">*</span> sont requis.', 'cc2017' );
        $fields =  array(
          'author' => '<div class="form-double">'
                    . '<div class="form-group">'
                    . '<label for="author">' . __( 'Name', 'cc2017' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> '
                    . '<input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) .'"' . $aria_req . ' />'
                    . '</div>',

          'email'  => '<div class="form-group last">'
                    . '<label for="email">' . __( 'Email', 'cc2017' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> '
                    . '<input id="email" name="email" type="text" class="form-control" value="' . esc_attr(  $commenter['comment_author_email'] ) .'"' . $aria_req . ' />'
                    . '</div>'
                    . '</div>',

          'url' => '',

          'comment_field' =>  '<div class="form-group">'
                            . '<label for="comment">' . _x( 'Comment', 'noun' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>'
                            . '<textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>'
                            . '</div>',
        );
        $args = array(
          'id_form'           => 'commentform',
          'class_form'      => 'comment-respond',
          'id_submit'         => 'submit',
          'class_submit'      => 'submit',
          'name_submit'       => 'submit',
          'title_reply'       => __( 'Laisser une réponse', 'cc2017' ),
          'title_reply_to'    => __( 'Répondre à %s', 'cc2017' ),
          'cancel_reply_link' => __( 'Annuler la réponse', 'cc2017' ),
          'label_submit'      => __( 'Poster la réponse', 'cc2017' ),
          'format'            => 'html5',
          'comment_field'     =>  is_user_logged_in() ? '<div class="form-group">'
                                . '<label for="comment">' . _x( 'Comment', 'noun' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label>'
                                . '<textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>'
                                . '</div>' : '',

          'must_log_in' => '<div class="form-group must-log-in">' .
            sprintf(
              __( 'Vous devez être <a href="%s">connecté.e</a> pour laisser une réponse.', 'cc2017'),
              wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
            ) . '</div>',

          'logged_in_as' => '<div class="form-group logged-in-as"><label>' .
            sprintf(
            __( 'Connecté.e en tant que <a href="%1$s">%2$s</a>. <a href="%3$s" title="Se déconnecter de ce compte">Se déconnecter</a> ?', 'cc2017'),
              admin_url( 'profile.php' ),
              $user_identity,
              wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
            ) . '</label></div>',

          'comment_notes_before' => '<p class="comment-notes">' . ( $req ? $required_text : '' ) . '</p>',
          'comment_notes_after' => '',

          'fields' => apply_filters( 'comment_form_default_fields', $fields ),
        );
        comment_form($args); ?>
<?php endif; ?>
