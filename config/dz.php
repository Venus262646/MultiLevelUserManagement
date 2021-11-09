<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Application Name
	|--------------------------------------------------------------------------
	|
	| This value is the name of your application. This value is used when the
	| framework needs to place the application's name in a notification or
	| any other location as required by the application or its packages.
	|
	*/

	'name'   => env( 'APP_NAME', 'MLUAP' ),


	'public' => array(
		'favicon'   => 'media/img/logo/favicon.ico',
		'fonts'     => array(
			'google' => array(
				'families' => array(
					'Poppins:300,400,500,600,700',
				),
			),
		),
        'weight'   => array(
			'SuperAdmin'  => 1,
			'Admin'       => 2,
			'Coordinador' => 3,
			'Seccional'   => 4,
			'Movilizador' => 5,
			'Familiar'    => 6,
		),
		'global'    => array(
			'css' => array(
				'css/style.css',
				'https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap',
			),
			'js'  => array(
				'vendor/global/global.min.js',
			),
		),
		'pagelevel' => array(
			'css' => array(
				'create_new_admin'       => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
                'edit_admin'       => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'create_new_call_center'       => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'create_new_coordinador' => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/jquery-smartwizard/dist/css/smart_wizard.min.css',
				),
                'edit_coordinador' => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/jquery-smartwizard/dist/css/smart_wizard.min.css',
				),
                'create_new_seccional' => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/jquery-smartwizard/dist/css/smart_wizard.min.css',
				),
                'edit_seccional' => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/jquery-smartwizard/dist/css/smart_wizard.min.css',
				),
                'create_new_movilizador' => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/jquery-smartwizard/dist/css/smart_wizard.min.css',
				),
                'edit_movilizador' => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/jquery-smartwizard/dist/css/smart_wizard.min.css',
				),
                'create_new_familiar' => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/jquery-smartwizard/dist/css/smart_wizard.min.css',
				),
                'edit_familiar' => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/jquery-smartwizard/dist/css/smart_wizard.min.css',
				),
				'dashboard_1'            => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/chartist/css/chartist.min.css',
					'vendor/owl-carousel/owl.carousel.css',
				),
				'workout_statistic'      => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/jqvmap/css/jqvmap.min.css',
					'vendor/chartist/css/chartist.min.css',
					'vendor/owl-carousel/owl.carousel.css',
				),
				'workoutplan'            => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/chartist/css/chartist.min.css',
					'vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',
				),
				'distance_map'           => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/chartist/css/chartist.min.css',
				),
				'food_menu'              => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'personal_record'        => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'app_calender'           => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/fullcalendar/css/fullcalendar.min.css',
				),
				'app_profile'            => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/lightgallery/css/lightgallery.min.css',
					'vendor/toastr/css/toastr.min.css',
				),
				'post_details'           => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/lightgallery/css/lightgallery.min.css',
				),
				'chart_chartist'         => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/chartist/css/chartist.min.css',
				),
				'chart_chartjs'          => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'chart_flot'             => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',

				),
				'chart_morris'           => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'chart_peity'            => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'chart_sparkline'        => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ecom_checkout'          => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ecom_customers'         => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ecom_invoice'           => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ecom_product_detail'    => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/star-rating/star-rating-svg.css',
				),
				'ecom_product_grid'      => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ecom_product_list'      => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/star-rating/star-rating-svg.css',
				),
				'ecom_product_order'     => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'email_compose'          => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/dropzone/dist/dropzone.css',
				),
				'email_inbox'            => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'email_read'             => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'form_editor_summernote' => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/summernote/summernote.css',
				),
				'form_element'           => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'form_pickers'           => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/bootstrap-daterangepicker/daterangepicker.css',
					'vendor/clockpicker/css/bootstrap-clockpicker.min.css',
					'vendor/jquery-asColorPicker/css/asColorPicker.min.css',
					'vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css',
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',
					'https://fonts.googleapis.com/icon?family=Material+Icons',
				),
				'form_validation_jquery' => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'form_wizard'            => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/jquery-smartwizard/dist/css/smart_wizard.min.css',
				),
				'map_jqvmap'             => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/jqvmap/css/jqvmap.min.css',
				),
				'table_bootstrap_basic'  => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'table_datatable_basic'  => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/datatables/css/jquery.dataTables.min.css',
				),
				'uc_lightgallery'        => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/lightgallery/css/lightgallery.min.css',
				),
				'uc_nestable'            => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
                    'vendor/qtt/css/reset.css',
                    'vendor/qtt/css/jquery.qtt.min.css',

                    'vendor/kendo/css/examples-offline.css',
                    'vendor/kendo/css/kendo.common.min.css',
                    'vendor/kendo/css/kendo.default.min.css',
                    'vendor/kendo/css/kendo.default.mobile.min.css',
                    'vendor/kendo/css/kendo.rtl.min.css',

					// 'vendor/nestable2/css/jquery.nestable.min.css',
					// 'vendor/chartist/css/chartist.min.css',
				),
				'uc_noui_slider'         => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/nouislider/nouislider.min.css',
				),
				'uc_select2'             => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/select2/css/select2.min.css',
				),
				'uc_sweetalert'          => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/sweetalert2/dist/sweetalert2.min.css',
				),
				'uc_toastr'              => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/toastr/css/toastr.min.css',
				),
				'ui_accordion'           => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ui_alert'               => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ui_badge'               => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ui_button'              => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ui_button_group'        => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ui_card'                => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ui_carousel'            => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ui_dropdown'            => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ui_grid'                => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ui_list_group'          => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ui_media_object'        => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ui_modal'               => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ui_pagination'          => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ui_popover'             => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ui_progressbar'         => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ui_tab'                 => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'ui_typography'          => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				),
				'widget_basic'           => array(
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/chartist/css/chartist.min.css',
				),
			),
			'js'  => array(
				'login'                  => array(
					'js/login.js',
				),
				'create_new_admin'       => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/jquery-validation/jquery.validate.min.js',
					'js/custom/create_new_admin.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
                'edit_admin'       => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/jquery-validation/jquery.validate.min.js',
					'js/custom/edit_admin.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'create_new_call_center'       => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/jquery-validation/jquery.validate.min.js',
					'js/custom/create_new_call_center.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'create_new_coordinador' => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/jquery-steps/build/jquery.steps.min.js',
					'vendor/jquery-validation/jquery.validate.min.js',
					'js/custom/create_new_coordinador.js',
					'vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
                'edit_coordinador' => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/jquery-steps/build/jquery.steps.min.js',
					'vendor/jquery-validation/jquery.validate.min.js',
					'js/custom/edit_coordinador.js',
					'vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
                'create_new_seccional' => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/jquery-steps/build/jquery.steps.min.js',
					'vendor/jquery-validation/jquery.validate.min.js',
					'js/custom/create_new_seccional.js',
					'vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
                'edit_seccional' => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/jquery-steps/build/jquery.steps.min.js',
					'vendor/jquery-validation/jquery.validate.min.js',
					'js/custom/edit_seccional.js',
					'vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
                'create_new_movilizador' => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/jquery-steps/build/jquery.steps.min.js',
					'vendor/jquery-validation/jquery.validate.min.js',
					'js/custom/create_new_movilizador.js',
					'vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
                'edit_movilizador' => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/jquery-steps/build/jquery.steps.min.js',
					'vendor/jquery-validation/jquery.validate.min.js',
					'js/custom/edit_movilizador.js',
					'vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
                'create_new_familiar' => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/jquery-steps/build/jquery.steps.min.js',
					'vendor/jquery-validation/jquery.validate.min.js',
					'js/custom/create_new_familiar.js',
					'vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
                'edit_familiar' => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/jquery-steps/build/jquery.steps.min.js',
					'vendor/jquery-validation/jquery.validate.min.js',
					'js/custom/edit_familiar.js',
					'vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'dashboard_1'            => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/owl-carousel/owl.carousel.js',
					'vendor/peity/jquery.peity.min.js',
					'vendor/apexchart/apexchart.js',
					'js/dashboard/dashboard-1.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'workout_statistic'      => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/peity/jquery.peity.min.js',
					'vendor/apexchart/apexchart.js',
					'js/dashboard/workout-statistic.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'workoutplan'            => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/bootstrap-datetimepicker/js/moment.js',
					'vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'distance_map'           => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/apexchart/apexchart.js',
					'js/dashboard/distance-map.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'food_menu'              => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'personal_record'        => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'app_calender'           => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/jqueryui/js/jquery-ui.min.js',
					'vendor/moment/moment.min.js',
					'vendor/fullcalendar/js/fullcalendar.min.js',
					'js/plugins-init/fullcalendar-init.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'app_profile'            => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/lightgallery/js/lightgallery-all.min.js',
					'vendor/toastr/js/toastr.min.js',
					'js/plugins-init/toastr-init.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'post_details'           => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/lightgallery/js/lightgallery-all.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'chart_chartist'         => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/chartist/js/chartist.min.js',
					'vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js',
					'js/plugins-init/chartist-init.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'chart_chartjs'          => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/chart.js/Chart.bundle.min.js',
					'js/plugins-init/chartjs-init.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'chart_flot'             => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/flot/jquery.flot.js',
					'vendor/flot/jquery.flot.pie.js',
					'vendor/flot/jquery.flot.resize.js',
					'vendor/flot-spline/jquery.flot.spline.min.js',
					'js/plugins-init/flot-init.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'chart_morris'           => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
					'vendor/raphael/raphael.min.js',
					'vendor/morris/morris.min.js',
					'js/plugins-init/morris-init.js',
				),
				'chart_peity'            => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/peity/jquery.peity.min.js',
					'js/plugins-init/piety-init.js',
					'js/custom.js',
					'js/deznav-init.js',

				),
				'chart_sparkline'        => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/jquery-sparkline/jquery.sparkline.min.js',
					'js/plugins-init/sparkline-init.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ecom_checkout'          => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/highlightjs/highlight.pack.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ecom_customers'         => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/highlightjs/highlight.pack.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ecom_invoice'           => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/highlightjs/highlight.pack.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ecom_product_detail'    => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/highlightjs/highlight.pack.min.js',
					'vendor/star-rating/jquery.star-rating-svg.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ecom_product_grid'      => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/highlightjs/highlight.pack.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ecom_product_list'      => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/highlightjs/highlight.pack.min.js',
					'vendor/star-rating/jquery.star-rating-svg.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ecom_product_order'     => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/highlightjs/highlight.pack.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'email_compose'          => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/dropzone/dist/dropzone.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'email_inbox'            => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'email_read'             => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'form_editor_summernote' => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/summernote/js/summernote.min.js',
					'js/plugins-init/summernote-init.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'form_element'           => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'form_pickers'           => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/moment/moment.min.js',
					'vendor/bootstrap-daterangepicker/daterangepicker.js',
					'vendor/clockpicker/js/bootstrap-clockpicker.min.js',
					'vendor/jquery-asColor/jquery-asColor.min.js',
					'vendor/jquery-asGradient/jquery-asGradient.min.js',
					'vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js',
					'vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js',
					'vendor/pickadate/picker.js',
					'vendor/pickadate/picker.time.js',
					'vendor/pickadate/picker.date.js',
					'js/plugins-init/bs-daterange-picker-init.js',
					'js/plugins-init/clock-picker-init.js',
					'js/plugins-init/jquery-asColorPicker.init.js',
					'js/plugins-init/material-date-picker-init.js',
					'js/plugins-init/pickadate-init.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'form_validation_jquery' => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/jquery-validation/jquery.validate.min.js',
					'js/plugins-init/jquery.validate-init.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'form_wizard'            => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/jquery-steps/build/jquery.steps.min.js',
					'vendor/jquery-validation/jquery.validate.min.js',
					'js/plugins-init/jquery.validate-init.js',
					'vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'map_jqvmap'             => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/jqvmap/js/jquery.vmap.min.js',
					'vendor/jqvmap/js/jquery.vmap.world.js',
					'vendor/jqvmap/js/jquery.vmap.usa.js',
					'js/plugins-init/jqvmap-init.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'page_error_400'         => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'page_error_403'         => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'page_error_404'         => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'page_error_500'         => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'page_error_503'         => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'page_forgot_password'   => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'page_lock_screen'       => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/deznav/deznav.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'page_login'             => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'page_register'          => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'table_bootstrap_basic'  => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'table_datatable_basic'  => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'uc_lightgallery'        => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/lightgallery/js/lightgallery-all.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'uc_nestable'            => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/nestable2/js/jquery.nestable.min.js',

					// 'js/plugins-init/nestable-init.js',
					'js/plugins-init/widgets-script-init.js',
					'js/custom/userList.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'uc_noui_slider'         => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/nouislider/nouislider.min.js',
					'vendor/wnumb/wNumb.js',
					'js/plugins-init/nouislider-init.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'uc_select2'             => array(
					'vendor/select2/js/select2.full.min.js',
					'js/plugins-init/select2-init.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'uc_sweetalert'          => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/sweetalert2/dist/sweetalert2.min.js',
					'js/plugins-init/sweetalert.init.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'uc_toastr'              => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/toastr/js/toastr.min.js',
					'js/plugins-init/toastr-init.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ui_accordion'           => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ui_alert'               => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ui_badge'               => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ui_button'              => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ui_button_group'        => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ui_card'                => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ui_carousel'            => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ui_dropdown'            => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ui_grid'                => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ui_list_group'          => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ui_media_object'        => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ui_modal'               => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ui_pagination'          => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ui_popover'             => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ui_progressbar'         => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ui_tab'                 => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'ui_typography'          => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'js/custom.js',
					'js/deznav-init.js',
				),
				'widget_basic'           => array(
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/chartist/js/chartist.min.js',
					'vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js',
					'vendor/flot/jquery.flot.js',
					'vendor/flot/jquery.flot.pie.js',
					'vendor/flot/jquery.flot.resize.js',
					'vendor/flot-spline/jquery.flot.spline.min.js',
					'vendor/jquery-sparkline/jquery.sparkline.min.js',
					'js/plugins-init/sparkline-init.js',
					'vendor/peity/jquery.peity.min.js',
					'js/plugins-init/piety-init.js',
					'vendor/chart.js/Chart.bundle.min.js',
					'js/plugins-init/widgets-script-init.js',
					'js/custom.js',
					'js/deznav-init.js',
				),

			),
		),
	),
);
