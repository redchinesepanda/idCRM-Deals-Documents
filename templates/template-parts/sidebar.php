<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar">
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
			<li class="nav-small-cap">
					<span class="hide-menu"></span>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link waves-effect waves-dark" href="/crm-dashboard/" aria-expanded="false" >
						<i data-feather="grid" class="feather-icon"></i>
						<span class="hide-menu"><?php esc_html_e( 'CRM Dashboard', 'idcrmpro-contacts-companies' ); ?></span></a>
				</li>
				<li class="nav-devider"></li>
				<!-- ============================================================== -->
				<!-- Database menu  -->
				<!-- ============================================================== -->
				<li class="nav-small-cap">
					<i class="icon-options"></i>
					<span class="hide-menu">
						<?php esc_html_e( 'Database', 'idcrmpro-contacts-companies' ); ?>
					</span>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
						<i data-feather="sidebar" class="feather-icon"></i>
						<span class="hide-menu">
							<?php esc_html_e( 'Contacts', 'idcrmpro-contacts-companies' ); ?>
						</span>
					</a>
					<ul aria-expanded="false" class="collapse first-level">
						<ul class="sidebar-item-ul">
							<?php

								$args = [
									'taxonomy'        => 'user_status',
									'show_option_all' => esc_html__( 'All', 'idcrmpro-contacts-companies' ),
									'style'           => 'list',
									'title_li'        => '',
									'depth'           => '2',
									// 'show_count'      => '1',
								];

								wp_list_categories( $args );

								?>
						</ul>
						</ul>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
						<i data-feather="home" class="feather-icon"></i>
						<span class="hide-menu"><?php esc_html_e( 'Companies', 'idcrmpro-contacts-companies' ); ?></span>
					</a>
					<ul aria-expanded="false" class="collapse first-level">
						<ul class="sidebar-item-ul">
							<?php
								$args = array(
									'taxonomy'        => 'comp_status',
									'show_option_all' => esc_html__( 'All', 'idcrmpro-contacts-companies' ),
									'style'           => 'list',
									'title_li'        => '',
									'depth'           => '2',
									// 'show_count'      => '1',
								);

								wp_list_categories( $args );
								?>
							</ul>
						</ul>
				</li>

				<li class="nav-devider"></li>

				<li class="sidebar-item">
					<a class="sidebar-link waves-effect waves-dark" href="/mailbox/">
						<i data-feather="mail" class="feather-icon"></i>
						<span class="hide-menu"><?php esc_html_e( 'Mailbox', 'idcrmpro-contacts-companies' ); ?></span>
					</a>
				</li>
			</ul>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
	<!-- Bottom points-->
	<div class="sidebar-footer"></div>
	<!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
