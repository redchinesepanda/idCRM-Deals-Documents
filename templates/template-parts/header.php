<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name='robots' content='noindex, nofollow' />

	<?php

	function remove_all_theme_styles()
	{
		global $wp_styles;
		foreach ( $wp_styles->queue as $style ) :
			if ( 'idcrm-contacts' !== $style
			&& 'monster-style' !== $style
			&& 'custom-style' !== $style
			&& 'bootstrap-material-datetimepicker' !== $style
			&& 'bootstrap-table' !== $style
			&& 'toastr' !== $style
			&& 'fullcalendar' !== $style
			&& 'select2' !== $style
			&& 'select2-bootstrap' !== $style
			&& 'apexcharts' !== $style ) {
				wp_deregister_style( $style );
				wp_dequeue_style( $style );
			}
			endforeach;
	}

	add_action( 'wp_print_styles', 'remove_all_theme_styles', 100 );

	add_filter( 'show_admin_bar', '__return_false' ); // Disable admin bar.

	remove_action( 'wp_head', '_admin_bar_bump_cb' ); // Disable admin bar styles.

	remove_action( 'wp_head', 'wp_resource_hints', 2 );

	remove_action( 'wp_head', 'feed_links', 2 );

	remove_action( 'wp_head', 'feed_links_extra', 3 );

	remove_action( 'wp_head', 'rsd_link' );
	
	remove_action( 'wp_head', 'wlwmanifest_link' );

	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

	remove_action( 'wp_head', 'wp_generator' );

	remove_action( 'wp_head', 'rel_canonical' );

	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

	wp_head();
	
	?>
	<script>var $ = jQuery.noConflict();</script>
</head>
<body <?php body_class('idcrmpro-contacts-companies'); ?>>
		<!-- ============================================================== -->
		<!-- Preloader - style you can find in spinners.css -->
		<!-- ============================================================== -->
		<div class="preloader">
			<svg
				class="tea lds-ripple"
				width="37"
				height="48"
				viewbox="0 0 37 48"
				fill="none"
				xmlns="http://www.w3.org/2000/svg"
			>
				<path
					d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z"
					stroke="#009efb"
					stroke-width="2"
				></path>
				<path
					d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34"
					stroke="#009efb"
					stroke-width="2"
				></path>
				<path
					id="teabag"
					fill="#009efb"
					fill-rule="evenodd"
					clip-rule="evenodd"
					d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z"
				></path>
				<path
					id="steamL"
					d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12"
					stroke-width="2"
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke="#009efb"
				></path>
				<path
					id="steamR"
					d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13"
					stroke="#009efb"
					stroke-width="2"
					stroke-linecap="round"
					stroke-linejoin="round"
				></path>
			</svg>
		</div>
		<!-- ============================================================== -->
		<!-- Main wrapper - style you can find in pages.scss -->
		<!-- ============================================================== -->
		<div id="main-wrapper">
			<!-- ============================================================== -->
			<!-- Topbar header - style you can find in pages.scss -->
			<!-- ============================================================== -->
			<header class="topbar">
				<nav class="navbar top-navbar navbar-expand-md navbar-dark">
					<div class="navbar-header">
						<!-- This is for the sidebar toggle which is visible on mobile only -->
						<a
							class="nav-toggler waves-effect waves-light d-block d-md-none"
							href="javascript:void(0)"
							><i class="icon-menu"></i
						></a>
						<!-- ============================================================== -->
						<!-- Logo -->
						<!-- ============================================================== -->
						<a class="navbar-brand" href="#">
							<!-- Logo icon -->
							<b class="logo-icon">
								<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
								<!-- Dark Logo icon -->
								<?php
								echo '<img
									src="' . plugins_url( '../images/logo-icon.png', __FILE__ ) . '"
									alt="homepage"
									class="dark-logo"
								/>';
								?>
								<!-- Light Logo icon -->
								<?php
								echo '<img
									src="' . plugins_url( '../images/logo-light-icon.png', __FILE__ ) . '"
									alt="homepage"
									class="light-logo"
								/>';
								?>
							</b>
							<!--End Logo icon -->
							<!-- Logo text -->
							<span class="logo-text">
								<!-- dark Logo text -->
								<?php
								echo '<img
									src="' . plugins_url( '../images/logo-text.png', __FILE__ ) . '"
									alt="homepage"
									class="dark-logo"
								/>';
								?>
								<!-- Light Logo text -->
								<?php
								echo '<img
									src="' . plugins_url( '../images/logo-light-text.png', __FILE__ ) . '"
									class="light-logo"
									alt="homepage"
								/>';
								?>
							</span>
						</a>
						<!-- ============================================================== -->
						<!-- End Logo -->
						<!-- ============================================================== -->
						<!-- ============================================================== -->
						<!-- Toggle which is visible on mobile only -->
						<!-- ============================================================== -->
						<a
							class="topbartoggler d-block d-md-none waves-effect waves-light"
							href="javascript:void(0)"
							data-bs-toggle="collapse"
							data-bs-target="#navbarSupportedContent"
							aria-controls="navbarSupportedContent"
							aria-expanded="false"
							aria-label="Toggle navigation"
							><i class="icon-options"></i
						></a>
					</div>
					<!-- ============================================================== -->
					<!-- End Logo -->
					<!-- ============================================================== -->
					<div class="navbar-collapse collapse" id="navbarSupportedContent">
						<!-- ============================================================== -->
						<!-- toggle and nav items -->
						<!-- ============================================================== -->
						<ul class="navbar-nav me-auto">
							<li class="nav-item d-none d-md-block">
								<a
									class="nav-link sidebartoggler waves-effect waves-light"
									href="javascript:void(0)"
									data-sidebartype="mini-sidebar"
									><i class="icon-arrow-left-circle"></i
								></a>
							</li>


						</ul>
						<!-- ============================================================== -->
						<!-- Right side toggle and nav items -->
						<!-- ============================================================== -->
						<ul class="navbar-nav">
							<!-- ============================================================== -->
							<!-- Search -->
							<!-- ============================================================== -->
							<li class="nav-item search-box d-none d-md-block">
								<form class="app-search mt-3-1 me-2" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>" >
									<!--label class="screen-reader-text" for="s">Поиск: </label-->
									<input class="form-control rounded-pill border-0" type="text" placeholder="<?php echo esc_attr_e( 'Search …', 'idcrmpro-contacts-companies' ); ?>" value="<?php echo get_search_query(); ?>" name="s" id="s" />
									<input type="hidden" value="user_contact" name="post_type" />
									<!--input type="submit" class="srh-btn" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" /-->
									<!--a class="srh-btn"><i data-feather="search" class="feather-sm fill-white mt-n1"></i></a-->
									<!--input type="submit" class="srh-btn" style="border: 0px;" id="searchsubmit" value="" /-->
									<button type="submit" class="srh-btn" style="border: 0px; background-color: transparent;">
										<i data-feather="search" class="feather-sm mt-n1-ird"></i>
									</button>
								</form>
							</li>
							<!-- ============================================================== -->
							<!-- User profile and search -->
							<!-- ============================================================== -->
							<?php
								$current_user = wp_get_current_user();

								$user_profile_img      = get_user_meta( $current_user->ID, 'userimg', true );
								$default_profile_image = plugins_url( 'images/no-user.jpg', __DIR__ );
							?>
							<li class="nav-item dropdown">
								<a
									class="nav-link dropdown-toggle waves-effect waves-dark"
									href="#"
									data-bs-toggle="dropdown"
									aria-haspopup="true"
									aria-expanded="false"
								>
									<?php
									if ( ! empty( $user_profile_img ) ) {
										echo '<img src="' . esc_html( $user_profile_img ) . '" width="30" height="30" class="profile-pic rounded-circle">';
									} else {
										echo '<img src="' . esc_html( $default_profile_image ) . '" width="30" height="30" class="profile-pic rounded-circle">';
									}
									?>
								</a>
								<div
									class="
										dropdown-menu dropdown-menu-end
										user-dd
										animated
										flipInY
									"
								>
									<div
										class="
											d-flex
											no-block
											align-items-center
											p-3
											bg-info
											text-white
											mb-2
										"
									>
										<div class="">
											<?php
											if ( ! empty( $user_profile_img ) ) {
												echo '<img src="' . esc_html( $user_profile_img ) . '" width="60" height="60" class="profile-pic rounded-circle">';
											} else {
												echo '<img src="' . esc_html( $default_profile_image ) . '" width="60" height="60" class="profile-pic rounded-circle">';
											}
											?>
										</div>
										<div class="ms-2">
											<h4 class="mb-0 text-white">
											<?php
												echo esc_html( "$current_user->user_firstname" );
												echo '<br>' . esc_html( "$current_user->user_lastname" );
											?>
											</h4>
										</div>

									</div>
									<?php $edit_user_link = get_edit_user_link( $current_user->ID ); ?>
									<a class="dropdown-item" href="<?php echo esc_html( $edit_user_link ); ?>"
										><i
											data-feather="user"
											class="feather-sm text-info me-1 ms-1"
										></i>
										<?php esc_html_e( 'My Profile', 'idcrmpro-contacts-companies' ); ?></a
									>

									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?php echo wp_logout_url( home_url() . '/crm/' ); ?>"
										><i
											data-feather="log-out"
											class="feather-sm text-danger me-1 ms-1"
										></i>
										<?php esc_html_e( 'Logout', 'idcrmpro-contacts-companies' ); ?></a
									>


								</div>
							</li>
							<!-- ============================================================== -->
							<!-- User profile and search -->
							<!-- ============================================================== -->

						</ul>
					</div>
				</nav>
			</header>
			<!-- ============================================================== -->
			<!-- End Topbar header -->
			<!-- ============================================================== -->
