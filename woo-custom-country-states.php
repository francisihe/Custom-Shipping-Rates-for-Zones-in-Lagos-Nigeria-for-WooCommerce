<?php
/**
 * Plugin Name:       Custom Country and States for WooCommerce
 * Description:       Adds a custom country and custom states to WooCommerce, to enable you set different shipping zones and rates for areas that do not exist or for countries/states without proper ZIP/Postal Code addressing systems.
 * Version:           1.0
 * Author:            Francis Ihejirika
 */


/* 
    This blocks of code enables you to add custom Shipping Classes for Countries and States/Areas that do not exist.
    Countries like Nigeria that do not have proper addressing systems can benefit from this.
    You can also decide to set custom locations within an existing city using this plugin.

    Ensure to edit the plugin as you so desire. The comments will guide you with each block of code.

    For countries that I have edited and created custom areas for, for example Lagos, Nigeria, you just need to find the link to the ZIP folder in my repo, download and simply upload to your site.
*/

 
 // Code Snippet to reject malicious requests, just for basic security
 // You can decide to remove this block of code and its wrapper but restructure the remainder from where it says "Custom code here"
 // Ref: Themeisle

 global $user_ID; if($user_ID) {
    if(!current_user_can('administrator')) {
        if (strlen($_SERVER['REQUEST_URI']) > 255 ||
            stripos($_SERVER['REQUEST_URI'], "eval(") ||
            stripos($_SERVER['REQUEST_URI'], "CONCAT") ||
            stripos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
            stripos($_SERVER['REQUEST_URI'], "base64")) {
                @header("HTTP/1.1 414 Request-URI Too Long");
                @header("Status: 414 Request-URI Too Long");
                @header("Connection: Close");
                @exit;
        }
    }
}

// This custom plugin requires WooCommerce to be installed and active
// This code below checks to see if WooCommerce is active and then runs the plugin custom code
// Ref: WooCommerce Docs

// Test to see if WooCommerce is active (including network activated).
$plugin_path = trailingslashit( WP_PLUGIN_DIR ) . 'woocommerce/woocommerce.php';

if (
    in_array( $plugin_path, wp_get_active_and_valid_plugins() )
    || in_array( $plugin_path, wp_get_active_network_plugins() )
) {
    
    // Custom code here.

    /* 
        This function below first creates a custom country

        'CCC' - defines the custom country code. Please ensure it doesn't clash with an existing country code else it replaces all that coountry and all the custom
        states that come with the country in the default WooCommerce installation. 

        If you're replacing the default country, see this https://en.wikipedia.org/wiki/List_of_ISO_3166_country_codes for the list of default country codes.

        'Custom Country' - is the name as it would appear on your dashboard

    */
    
    add_filter( 'woocommerce_countries',  'add_custom_country' );
    function add_custom_country( $countries ) {
        $new_countries = array(
                                'CCC'  => __( 'Custom Country', 'woocommerce' ),
                                );

            return array_merge( $countries, $new_countries );
    }

    /* 
        This function below adds your newly created country to a continent.

        You can decide to create a new continent by putting a custom short code that doesn't already exist.
        These are the already existing ones - AF (Africa), AN (Antarctica), AS (Asia), EU (Europe), NA (North America), OC (Oceania), SA (South America)
        Adding an already existing one erases all the default countries and states that come bundled in the default installation.

        'DD' below is a custom continent I just created.
        If you are adding this to a live website, ensure to select the continent that your country belongs to from the ones below.
        AF (Africa), AN (Antarctica), AS (Asia), EU (Europe), NA (North America), OC (Oceania), SA (South America)

        'CCC' is the custom country code specified in the snippet above
    */

    add_filter( 'woocommerce_continents', 'add_custom_country_to_continents' );
    function add_custom_country_to_continents( $continents ) {
        $continents['DD']['countries'][] = 'CCC';
        return $continents;
    }


    /* 
        This section is for those who may decide to add custom states (with or without specific areas) to either an existing country or a new country created above.
        To add states to an existing country, replace 'CCC' with the proper country code e.g. 'NG' for Nigeria

        You can then specify new states for your custom country or list out the existing states of an existing country with your area modifications added
    */

    add_filter( 'woocommerce_states', 'custom_new_states' );

    function custom_new_states( $states ) {

        $states['CCC'] = array(
            'ST1' => 'State 1 -- Area a', // e.g Lagos -- Ikeja
            'ST1k' => 'State 1 -- Area k', // e.g Lagos -- Surulere
            'ST2' => 'State 2 -- Area b',
            'ST3' => 'State 3 -- Area c'
        );

        return $states;
    }

}