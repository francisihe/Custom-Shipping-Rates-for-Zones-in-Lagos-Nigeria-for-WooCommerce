<?php
/**
 * Plugin Name:       Custom Shipping Rates for Zones in Lagos Nigeria
 * Description:       Enables you set different shipping rates for areas within Lagos Nigeria.
 * Version:           1.0
 * Author:            Francis Ihejirika
 */


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
        These are manual additions I created for popular locations/areas within Lagos, Nigeria

        I am editing these into the existing continent (Africa), country (Nigeria) already installed with woocommerce, and replacing the existing state (Lagos) while
        adding the popular areas listed below.

        You can add new areas if you want, or even edit areas existing in custom states

        // Note from Woo Docs

        Note: You must replace both instances of XX with your country code. 
        This means each state id in the array must have your two letter country code before the number you assign to the state.

    */

    add_filter( 'woocommerce_states', 'custom_new_areas_in_lagos_state' );

    function custom_new_areas_in_lagos_state( $states ) {

        $states['NG'] = array(
            'AB' => 'Abia' ,
            'FC' => 'Abuja' ,
            'AD' => 'Adamawa' ,
            'AK' => 'Akwa Ibom' ,
            'AN' => 'Anambra' ,
            'BA' => 'Bauchi' ,
            'BY' => 'Bayelsa' ,
            'BE' => 'Benue' ,
            'BO' => 'Borno' ,
            'CR' => 'Cross River' ,
            'DE' => 'Delta' ,
            'EB' => 'Ebonyi' ,
            'ED' => 'Edo' ,
            'EK' => 'Ekiti' ,
            'EN' => 'Enugu' ,
            'GO' => 'Gombe' ,
            'IM' => 'Imo' ,
            'JI' => 'Jigawa' ,
            'KD' => 'Kaduna' ,
            'KN' => 'Kano' ,
            'KT' => 'Katsina' ,
            'KE' => 'Kebbi' ,
            'KO' => 'Kogi' ,
            'KW' => 'Kwara' ,
            'LA' => 'Lagos' ,
            'LA1' => 'Lagos -- Abule',
            'LA2' => 'Lagos -- Adeniyi Jones',
            'LA3' => 'Lagos -- Agege',
            'LA4' => 'Lagos -- Agidingbi',
            'LA5' => 'Lagos -- Aguda',
            'LA6' => 'Lagos -- Ajah',
            'LA7' => 'Lagos -- Ajegunle',
            'LA8' => 'Lagos -- Ajeromi-Ifelodun',
            'LA9' => 'Lagos -- Akerele',
            'LA10' => 'Lagos -- Akoka',
            'LA11' => 'Lagos -- Alaba',
            'LA12' => 'Lagos -- Alagomeji',
            'LA13' => 'Lagos -- Alausa',
            'LA14' => 'Lagos -- Alimosho',
            'LA15' => 'Lagos -- Amuwo Odofin',
            'LA16' => 'Lagos -- Anthony Village',
            'LA17' => 'Lagos -- Apapa',
            'LA18' => 'Lagos -- Badagry',
            'LA19' => 'Lagos -- Bariga',
            'LA20' => 'Lagos -- Coker',
            'LA21' => 'Lagos -- Dolphin Estate',
            'LA22' => 'Lagos -- Dopemu',
            'LA23' => 'Lagos -- Ebute Metta',
            'LA24' => 'Lagos -- Epe',
            'LA25' => 'Lagos -- Eti-Osa',
            'LA26' => 'Lagos -- Festac Town',
            'LA27' => 'Lagos -- Gbagada',
            'LA28' => 'Lagos -- Idumota',
            'LA29' => 'Lagos -- Ifako - Ijaiye',
            'LA30' => 'Lagos -- Ijesha',
            'LA31' => 'Lagos -- Ijora',
            'LA32' => 'Lagos -- Ikeja',
            'LA33' => 'Lagos -- Ikorodu',
            'LA34' => 'Lagos -- Ikoyi',
            'LA35' => 'Lagos -- Ilasamaja',
            'LA36' => 'Lagos -- Ilupeju',
            'LA37' => 'Lagos -- Iwaya',
            'LA38' => 'Lagos -- Iyana Ipaja',
            'LA39' => 'Lagos -- Jibowu',
            'LA40' => 'Lagos -- Ketu',
            'LA41' => 'Lagos -- Kosofe',
            'LA42' => 'Lagos -- Ladipo',
            'LA43' => 'Lagos -- Lagos Island',
            'LA44' => 'Lagos -- Lagos Mainland',
            'LA45' => 'Lagos -- Lawanson',
            'LA46' => 'Lagos -- Lekki',
            'LA47' => 'Lagos -- Marina',
            'LA48' => 'Lagos -- Maryland',
            'LA49' => 'Lagos -- Masha',
            'LA50' => 'Lagos -- Maza Maza',
            'LA51' => 'Lagos -- Mende',
            'LA52' => 'Lagos -- Mile 2',
            'LA53' => 'Lagos -- Mushin',
            'LA54' => 'Lagos -- Obalende',
            'LA55' => 'Lagos -- Obanikoro',
            'LA56' => 'Lagos -- Ogba',
            'LA57' => 'Lagos -- Ogudu',
            'LA58' => 'Lagos -- Ojo',
            'LA59' => 'Lagos -- Ojodu',
            'LA60' => 'Lagos -- Ojodu Berger',
            'LA61' => 'Lagos -- Ojota',
            'LA62' => 'Lagos -- Ojuelegba',
            'LA63' => 'Lagos -- Olodi',
            'LA64' => 'Lagos -- Onigbongbo',
            'LA65' => 'Lagos -- Onipanu',
            'LA66' => 'Lagos -- Oniru',
            'LA67' => 'Lagos -- Opebi',
            'LA68' => 'Lagos -- Oregun',
            'LA69' => 'Lagos -- Oshodi - Isolo',
            'LA70' => 'Lagos -- Palmgrove',
            'LA71' => 'Lagos -- Papa Ajao',
            'LA72' => 'Lagos -- Sabo',
            'LA73' => 'Lagos -- Satellite Town',
            'LA74' => 'Lagos -- Shomolu',
            'LA75' => 'Lagos -- Surulere',
            'LA76' => 'Lagos -- Takwa Bay',
            'LA77' => 'Lagos -- Tinubu Square',
            'LA78' => 'Lagos -- Victoria Garden City',
            'LA79' => 'Lagos -- Victoria Island',
            'LA80' => 'Lagos -- Yaba',
            'NA' => 'Nasarawa' ,
            'NI' => 'Niger' ,
            'OG' => 'Ogun' ,
            'ON' => 'Ondo' ,
            'OS' => 'Osun' ,
            'OY' => 'Oyo' ,
            'PL' => 'Plateau' ,
            'RI' => 'Rivers' ,
            'SO' => 'Sokoto' ,
            'TA' => 'Taraba' ,
            'YO' => 'Yobe' ,
            'ZA' => 'Zamfara'
        );

        return $states;
    }

}