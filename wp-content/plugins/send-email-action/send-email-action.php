<?php
/**
 * Plugin Name:     Send Email Action
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     send-email-action
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Send_Email_Action
 */

// Your code starts here.

function my_project_updated_send_email( $post_id ) {
 
    // If this is just a revision, don't send the email.
    if ( wp_is_post_revision( $post_id ) ) {
        return;
        }
 
    $post_title = get_the_title( $post_id );
    $post_url = get_permalink( $post_id );
    $subject = 'A post has been updated';
 
    $message = "A post has been updated on your website:\n\n";
    $message .= $post_title . ": " . $post_url;
 
    // Send email to admin.
    wp_mail( 'darwin.delimos@pantheon.io', $subject, $message );
}
add_action( 'save_post', 'my_project_updated_send_email' );
