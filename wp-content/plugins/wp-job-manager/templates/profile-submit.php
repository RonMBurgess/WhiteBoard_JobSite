<?php
/**
 * Job Submission Form
 */
if ( ! defined( 'ABSPATH' ) ) exit;

global $job_manager;
?>
<form action="<?php echo $action; ?>" method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">

	<?php if ( apply_filters( 'submit_job_form_show_signin', true ) ) : ?>

		<?php get_job_manager_template( 'account-signin.php' ); ?>

	<?php endif; ?>

	<?php if ( job_manager_user_can_post_job() ) : ?>

		<!-- Profile Information Fields -->
		<?php do_action( 'submit_job_form_job_fields_start' ); ?>

		<form action="profile-submit.php" method="post">
			
		</form>

		<?php do_action( 'submit_job_form_job_fields_end' ); ?>

		<p>
			<?php wp_nonce_field( 'submit_form_posted' ); ?>
			<input type="hidden" name="job_manager_form" value="<?php echo $form; ?>" />
			<input type="hidden" name="job_id" value="<?php echo esc_attr( $job_id ); ?>" />
			<input type="hidden" name="step" value="0" />
			<input type="submit" name="submit_job" class="button" value="<?php esc_attr_e( $submit_button_text ); ?>" />
		</p>

	<?php else : ?>

		<?php do_action( 'submit_job_form_disabled' ); ?>

	<?php endif; ?>
</form>