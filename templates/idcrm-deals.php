<?php

/**
 * Template Name: idCRM Deals
 * @author    id:Result
 * @link      https://isresult.ru
 * @copyright 2021 Vladimir Shlykov
 * @license   GPL-2.0-or-later
 * @version   1.0.0
 */

namespace idcrmdeals\templates;

// require_once('lib/idCRMProDashboard.php');
// require_once('lib/idCRMProProduct.php');
// require_once('lib/idCRMProMail.php');
// require_once('lib/idCRMProComments.php');

// use idcrmpro\templates\lib\idCRMProDashboard;
// use idcrmpro\templates\lib\idCRMProProduct;
// use idcrmpro\templates\lib\idCRMProMail;
// use idcrmpro\templates\lib\idCRMProComments;
// use idcrmpro\idCRMPro;

// $event_today = idCRMProDashboard::get_day_events('today');

// $event_tomorrow = idCRMProDashboard::get_day_events('tomorrow');

// $_template_file_events = idCRMPro::IDCRMPRO_PATH . '/templates/template-parts/crm-dashboard-event-loop.php';

// $statistics_data = idCRMProProduct::product();

// $_template_file_statistics = idCRMPro::IDCRMPRO_PATH . '/templates/template-parts/crm-dashboard-statistics.php';

// $mail_data = idCRMProMail::mail();

// $_template_file_mail = idCRMPro::IDCRMPRO_PATH . '/templates/template-parts/crm-dashboard-mail.php';

// $comments_data = idCRMProComments::comments();

// $_template_file_comments = idCRMPro::IDCRMPRO_PATH . '/templates/template-parts/crm-dashboard-comments.php';

require_once( 'template-parts/check-user.php' );

require_once( 'template-parts/header.php' );

require_once( 'template-parts/sidebar.php' );

?>

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title"><?php esc_html_e( 'Today Events', 'idcrmpro-contacts-companies' ); ?></h4>
						<div class="message-box scrollable">
							<div class="message-widget message-scroll">
								<?php
									// load_template( $_template_file_events, false, $event_today );
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<h4 class="card-title"><?php esc_html_e( 'Tomorrow Events', 'idcrmpro-contacts-companies' ); ?></h4>
						<div class="message-box scrollable">
							<div class="message-widget message-scroll">
								<?php
									// load_template( $_template_file_events, false, $event_tomorrow );
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="card">
					<div class="card-body">
						<div id="calendar" class="dashboard-calendar">
							<div class="no-content"><div>
								<?php echo esc_html__( 'There are no Events in Calendar', 'idcrmpro-contacts-companies' ); ?>
							</div></div>
						</div>
						<!-- BEGIN MODAL -->
						<div class="modal  none-border" id="my-event" role="dialog" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header d-flex align-items-center">
										<h4 class="modal-title">
											<strong><?php esc_html_e( 'Add Event', 'idcrmpro-contacts-companies' ); ?></strong>
										</h4>
										<button type="button" class="close-dialog btn btn-white ms-auto" data-bs-dismiss="modal" aria-hidden="true">
											&times;
										</button>
									</div>
									<div class="modal-body"></div>
									<div class="modal-footer">
										<button type="button" class="btn btn-white waves-effect" data-bs-dismiss="modal">
											<?php esc_html_e( 'Close', 'idcrmpro-contacts-companies' ); ?>
										</button>
										<button
											type="button"
											class="btn btn-success save-event waves-effect waves-light">
											<?php esc_html_e( 'Create event', 'idcrmpro-contacts-companies' ); ?>
										</button>
										<button type="button" class=" btn btn-danger delete-event waves-effect waves-light" data-bs-dismiss="modal">
											<?php esc_html_e( 'Delete', 'idcrmpro-contacts-companies' ); ?>
										</button>
									</div>
								</div>
							</div>
						</div>
						<!-- Modal Add Category -->
						<div class="modal  none-border" id="add-new-event" role="dialog" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header d-flex align-items-center">
										<h4 class="modal-title">
											<strong>Add</strong> a category
										</h4>
										<button type="button" class="close-dialog ms-auto" data-bs-dismiss="modal" aria-hidden="true">
											&times;
										</button>
									</div>
									<div class="modal-body">
										<form>
											<div class="row">
												<div class="col-md-6">
													<label class="control-label">Category Name</label>
													<input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
												</div>
												<div class="col-md-6">
													<label class="control-label">Choose Category Color</label>
													<select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
														<option value="success">Success</option>
														<option value="danger">Danger</option>
														<option value="info">Info</option>
														<option value="primary">Primary</option>
														<option value="warning">Warning</option>
														<option value="inverse">Inverse</option>
													</select>
												</div>
											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class=" btn btn-danger waves-effect waves-light save-category" data-bs-dismiss="modal">
											<?php esc_html_e( 'Save', 'idcrmpro-contacts-companies' ); ?>
										</button>
										<button type="button" class="btn btn-white waves-effect" data-bs-dismiss="modal">
											<?php esc_html_e( 'Close', 'idcrmpro-contacts-companies' ); ?>
										</button>
									</div>
								</div>
							</div>
						</div>
						<!-- END MODAL -->
					</div>
				</div>
			</div>

		</div>

		<div class="row">
			<!-- mail template part start-->
			<?php
				// load_template( $_template_file_mail, false, $mail_data );
			?>
			<!-- mail template part end-->
			<!-- comments template part start -->
			<?php
				// load_template( $_template_file_comments, false, $comments_data );
			?>
			<!-- comments template part end-->
		</div>

		<?php
			// load_template( $_template_file_statistics, false, $statistics_data );
		?>
	</div>
		<?php require_once( 'template-parts/footer.php' ); ?>
		<?php wp_footer(); ?>
	</body>
</html>