<?php $comment_count = get_comment_count( $post->ID ); ?>

<?php if ( $comment_count['approved'] > 0 ) : ?>

    <h3><?php echo sprintf( __( 'Comments (%d)', 'lsvrtheme' ), $comment_count['approved'] ); ?></h3>

    <!-- COMMENT LIST : begin -->
    <ul class="comment-list">

        <?php $args = array(
            'walker' => new lsvr_walker_comment,
            'reply_text' => __( 'Reply', 'lsvrtheme' ),
            'avatar_size' => 60,
            'format' => 'html5'
        );
        wp_list_comments( $args );

        $args = array(
            'echo' => false,
            'prev_next' => false,
            'type' => 'list'
        );
        $pagination = paginate_comments_links( $args );
        if ( ! is_null( $pagination ) ) {
            echo '<div class="c-pagination">' . $pagination . '</div>';
        } ?>

    </ul>
    <!-- COMMENT LIST : end -->

<?php else: ?>

	<p class="c-alert-message m-info"><i class="ico fa fa-info-circle"></i>
	<?php _e( 'There are no comments yet.', 'lsvrtheme' ); ?>
	</p>

<?php endif; ?>

<!-- COMMENT FORM : begin -->
<div class="respond-form<?php if ( is_user_logged_in() ) { echo ' user-logged-in'; } ?>">

    <?php comment_form( array(
        'logged_in_as' => '<p class="c-alert-message m-info"><i class="ico fa fa-info-circle"></i>' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'lsvrtheme' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>' . '<p style="display: none;" class="c-alert-message m-warning m-validation-error"><i class="ico fa fa-exclamation-circle"></i>' . __( 'Comment field and fields with (*) are required!', 'lsvrtheme' ) . '</p>',
        'comment_notes_before' => '<p class="comment-notes c-alert-message m-info"><i class="ico fa fa-info-circle"></i>' . __( 'Your email address will not be published. Required fields are marked (*).', 'lsvrtheme' ) . '</p>' . '<p style="display: none;" class="c-alert-message m-warning m-validation-error"><i class="ico fa fa-exclamation-circle"></i>' . __( 'Comment field and fields with (*) are required!', 'lsvrtheme' ) . '</p>',
    )); ?>

</div>
<!-- COMMENT FORM : end -->