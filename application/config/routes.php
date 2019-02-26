
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'frontend/frontend_controller/home';
$route['default_controller/(:num)'] = 'frontend/frontend_controller/home/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* Users Routes Starts */
$route['user-login'] = 'user/user_controller/user_login';
$route['user-dashboard'] = 'frontend/frontend_controller/user_dashboard';
$route['add-user'] = 'user/user_controller/add_user';
$route['edit-user/(:num)'] = 'user/user_controller/add_user/$1';
$route['user-list'] = 'user/user_controller/user_list';
$route['user-logout'] = 'user/user_controller/logout';
$route['add-earning'] = 'user/user_controller/add_earning';
$route['delete-user'] = 'user/user_controller/delete_user';
$route['particular-transact/(:num)'] = 'user/user_controller/particular_transact/$1';
$route['allcurrent-transact'] = 'user/user_controller/allcurrent_transact';
// $route['user-login/(:num)'] = 'user/user_controller/user_login/$1';
// $route['logout'] = 'user/user_controller/logout';
// $route['register'] = 'user/user_controller/register_user';
// $route['user-profile'] = 'user/user_controller/user_profile';
// $route['user-profile/(:num)'] = 'user/user_controller/user_profile/$1';
// $route['user-update'] = 'user/user_controller/user_update';
// $route['user-reset'] = 'user/user_controller/reset_password';
// $route['reset-password/(:any)'] = 'user/user_controller/update_password/$1';
// $route['captcha-generate'] = 'user/user_controller/generate_captcha';
// $route['verify-email/(:any)'] = 'user/user_controller/EmailVerification/$1';
// $route['login-email/(:any)'] = 'user/user_controller/EmailVerifyLogin/$1';
/* Users Routes Ends */

/* Dashboard Routes Start */
// $route['user-dashboard'] = 'dashboard/dashboard_controller/user_dashboard';
/* Dashboard Routes End */

/* CMS Routes Start */
	
	/* Pages Routes Starts */
	// $route['create-page'] = 'cms/pages_controller/create_page';
	// $route['edit-page/(:num)'] = 'cms/pages_controller/create_page/$1';
	// $route['view-pages'] = 'cms/pages_controller/view_pages';
	// $route['view-pages/(:num)'] = 'cms/pages_controller/view_pages/$1';
	// $route['delete_page/(:num)'] = 'cms/pages_controller/delete_page/$1';
	/* Pages Routes Ends */
	
	/* Menus Routes Starts */
	// $route['create-menu'] = 'cms/menus_controller/create_menu';
	// $route['edit-menu/(:num)'] = 'cms/menus_controller/create_menu/$1';
	// $route['delete_menu/(:num)'] = 'cms/menus_controller/delete_menu/$1';
	// $route['view-menus'] = 'cms/menus_controller/view_menus';
	// $route['view-menus/(:num)'] = 'cms/menus_controller/view_menus/$1';
	// $route['edit-comp-details'] = 'cms/menus_controller/edit_company';
	// $route['fetch_menus_disp_data/(:num)'] = 'cms/menus_controller/fetch_menus_disp_data/$1';
	// $route['create-faq'] = 'cms/faq_controller/create_faq';
	// $route['edit-faq/(:num)'] = 'cms/faq_controller/create_faq/$1';
	// $route['delete-faq/(:num)'] = 'cms/faq_controller/delete_faq/$1';
	// $route['view-faq'] = 'cms/faq_controller/view_faq';
	// $route['add-user'] = 'cms/add_user_controller/add_user';
	/* Menus Routes Ends */
	
	/* Slider Routes Starts */
	// $route['add-slider'] = 'cms/slider_controller/add_slider';
	// $route['edit-slider/(:num)'] = 'cms/slider_controller/add_slider/$1';
	// $route['view-slider'] = 'cms/slider_controller/view_slider';
	// $route['view-slider/(:num)'] = 'cms/slider_controller/view_slider/$1';
	// $route['delete_slider/(:num)'] = 'cms/slider_controller/delete_slider/$1';
	/* Slider Routes Ends */

	/* Clients Routes Starts */
	// $route['add-client'] = 'crm/clients_controller/add_clients';
	// $route['edit-client/(:num)'] = 'crm/clients_controller/add_clients/$1';
	// $route['view-clients'] = 'crm/clients_controller/view_clients';
	// $route['delete_client/(:num)'] = 'crm/clients_controller/delete_client/$1';
	/* Clients Routes End */

	/* User Management Starts */
	
	// $route['manage-users'] = 'crm/user_controller/manage_users';
	// $route['fetch_users_ajax'] = 'crm/user_controller/fetch_users_ajax';
	// $route['user-verification'] = 'crm/user_controller/verify_user';
	// $route['user-verification/(:num)'] = 'crm/user_controller/verify_user/$1';
	// $route['verification-status'] = 'crm/user_controller/verify_status';
	// $route['panel-login'] = 'crm/user_controller/panel_login;';
	// $route['panel-login/(:num)'] = 'crm/user_controller/panel_login/$1';
	/* User Management Ends */
	

	/*widget routes start*/
	// $route['create-widget'] = 'cms/widgets_controller/create_widget';
	// $route['edit-widget/(:num)'] = 'cms/widgets_controller/create_widget/$1';
	// $route['delete_widget/(:num)'] = 'cms/widgets_controller/delete_widget/$1';
	// $route['view-widgets']  ='cms/widgets_controller/view_widgets';
	// $route['view-widgets/(:num)']  ='cms/widgets_controller/view_widgets/$1';
	/*widget routes ends*/

	/* Email Template Route Starts */
	// $route['create-email-template'] = 'cms/Email_template_controller/create_email_template';
	/* Email Template Route Starts */

/* CMS Routes End */

/* Clients Routes Starts */
	// $route['add-clients'] = 'crm/clients_controller/add_clients';
	// $route['edit-client/(:num)'] = 'crm/clients_controller/add_clients/$1';
	// $route['view-clients'] = 'crm/clients_controller/view_clients';
	// $route['delete_client/(:num)'] = 'crm/clients_controller/delete_client/$1';
/* Clients Routes End */

/* Users Routes Starts */
	// $route['registration'] = 'login/login_controller/UserRegistration';
/* Users Routes Ends */

/* Territory Routes Starts */
	// $route['states'] = 'cms/territories_controller/fetch_states';
	// $route['cities'] = 'cms/territories_controller/fetch_cities';
	// $route['area'] = 'cms/territories_controller/fetch_area';
/* Territory Routes Ends */

/* Real Estate Routes Starts */
	
	/* legal Services Starts */
	// $route['legal-services'] = 'legal_services/pakages_controller/pakages';
	// $route['pakages-details'] = 'legal_services/pakages_controller/pakages_details';
	// $route['pakages-details/(:num)'] = 'legal_services/pakages_controller/pakages_details/$1';
	// $route['pakages-cart'] = 'legal_services/pakages_controller/pakages_cart';
	// $route['cart-items'] = 'legal_services/pakages_controller/cart_items';
	// $route['view-cart'] = 'legal_services/pakages_controller/view_cart_item';
	// $route['view-cart/(:num)'] = 'legal_services/pakages_controller/view_cart_item/$1';
	// $route['remove-cart'] = 'legal_services/pakages_controller/remove_cart_item';
	// $route['update-qty'] = 'legal_services/pakages_controller/update_cart_qty';
	// $route['checkout-pakage'] = 'legal_services/pakages_controller/checkout_pakages';
	// $route['checkout-pakage/(:any)'] = 'legal_services/pakages_controller/checkout_pakages/$1';
	// $route['orderid-generate'] = 'legal_services/pakages_controller/generate_orderid';
	// $route['payment-success'] = 'legal_services/pakages_controller/payment_success';
	// $route['payment-fail'] = 'legal_services/pakages_controller/payment_failed';
	// $route['order-placed'] = 'legal_services/pakages_controller/order_placed';
	// $route['manage-order'] = 'legal_services/pakages_controller/manage_order';
	// $route['my-order'] = 'legal_services/pakages_controller/my_orders';
	// $route['pakages-enquiry'] = 'legal_services/Pakages_controller/validate_form';
	// $route['contacted-user'] = 'legal_services/pakages_controller/contacted_user_details';
	// $route['contacted-user/(:num)'] = 'legal_services/pakages_controller/contacted_user_details/$1';
	/* legal Services Ends*/

	/* Property Routes Starts */
 //    $route['view-posted-properties'] = 'real_estate/property_controller/view_posted_properties';
 //    $route['fetch_properties_ajax'] = 'real_estate/property_controller/fetch_properties_ajax';
	// $route['post-property'] = 'real_estate/property_controller/add_property';
	// $route['edit-posted-property/(:num)'] = 'real_estate/property_controller/add_property/$1';
	// $route['delete-posted-property/(:num)'] = 'real_estate/property_controller/delete_property/$1';
	// $route['delete-saved-property/(:num)'] = 'real_estate/property_controller/delete_saved_property/$1';
	// $route['property-details'] = 'real_estate/property_controller/property_details';
	// $route['property-details/(:any)/(:any)'] = 'real_estate/property_controller/property_details/$1/$2';
	// $route['view-properties'] = 'real_estate/property_controller/view_properties';
	// $route['view-properties/(:num)'] = 'real_estate/property_controller/view_properties/$1';
	// $route['ajax_contact_details'] = 'real_estate/property_controller/ajax_contact_details';
	// $route['save-property'] = 'real_estate/property_controller/SaveProperty';
	// $route['saved-properties'] = 'real_estate/property_controller/Saved_Userproperties';
	// $route['saved-properties/(:num)'] = 'real_estate/property_controller/Saved_Userproperties/$1';
	// $route['contacted-properties'] = 'real_estate/property_controller/contacted_properties';
	// $route['contacted-properties/(:num)'] = 'real_estate/property_controller/contacted_properties/$1';
	// $route['delete-user-contacted/(:num)'] = 'real_estate/property_controller/delete_contacted_property/$1';
	// $route['terms-condition'] = 'real_estate/property_controller/terms_condition/';
	// $route['real-faq'] = 'real_estate/property_controller/real_faq';
	// $route['recommended-searches'] = 'real_estate/property_controller/recommended_searches';
	// $route['visa-properties'] = 'real_estate/property_controller/visa_properties';
	// $route['all-properties'] = 'real_estate/property_controller/all_properties';
	// $route['all-properties/(:num)'] = 'real_estate/property_controller/all_properties/$1';
	// $route['service-contact'] = 'real_estate/property_controller/service_provide_contact';
	// $route['service-enquiry'] = 'real_estate/property_controller/service_enquiry';
	// $route['service-enquiry/(:num)'] = 'real_estate/property_controller/service_enquiry/$1';
	// $route['service-provider'] = 'real_estate/property_controller/fetch_service_provider';
	/* Property Routes Ends */
    /* Userpakage Routes starts*/
    // $route['inner-pakage'] = 'real_estate/userpakage_controller/inner_basic_pakages';
    /* Userpakage Routes ends */
	/* SEO Routes starts */
	// $route['image-alt'] = 'real_estate/property_controller/image_alt';
	/* SEO Routes Ends */

/* Real Estate Routes Ends */

// $route['facebook-login'] = 'user/user_controller/facebook_login';

/* Frontend Route Starts */
// $route['Contact-Us'] = 'frontend/frontend_controller/contact_us';
// $route['coming-soon'] = 'frontend/frontend_controller/coming_soon';
// $route['(:any)'] = 'frontend/frontend_controller/pages/$1';
/* Frontend Route Ends */
