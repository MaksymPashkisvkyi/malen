(function($){
    "use strict";
    
    let $malen_page_breadcrumb_area      = $("#_malen_page_breadcrumb_area");
    let $malen_page_settings             = $("#_malen_page_breadcrumb_settings");
    let $malen_page_breadcrumb_image     = $("#_malen_breadcumb_image");
    let $malen_page_title                = $("#_malen_page_title");
    let $malen_page_title_settings       = $("#_malen_page_title_settings");

    if( $malen_page_breadcrumb_area.val() == '1' ) {
        $(".cmb2-id--malen-page-breadcrumb-settings").show();
        if( $malen_page_settings.val() == 'global' ) {
            $(".cmb2-id--malen-breadcumb-image").hide();
            $(".cmb2-id--malen-page-title").hide();
            $(".cmb2-id--malen-page-title-settings").hide();
            $(".cmb2-id--malen-custom-page-title").hide();
            $(".cmb2-id--malen-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--malen-breadcumb-image").show();
            $(".cmb2-id--malen-page-title").show();
            $(".cmb2-id--malen-page-breadcrumb-trigger").show();
    
            if( $malen_page_title.val() == '1' ) {
                $(".cmb2-id--malen-page-title-settings").show();
                if( $malen_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--malen-custom-page-title").hide();
                } else {
                    $(".cmb2-id--malen-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--malen-page-title-settings").hide();
                $(".cmb2-id--malen-custom-page-title").hide();
    
            }
        }
    } else {
        $malen_page_breadcrumb_area.parents('.cmb2-id--malen-page-breadcrumb-area').siblings().hide();
    }


    // breadcrumb area
    $malen_page_breadcrumb_area.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--malen-page-breadcrumb-settings").show();
            if( $malen_page_settings.val() == 'global' ) {
                $(".cmb2-id--malen-breadcumb-image").hide();
                $(".cmb2-id--malen-page-title").hide();
                $(".cmb2-id--malen-page-title-settings").hide();
                $(".cmb2-id--malen-custom-page-title").hide();
                $(".cmb2-id--malen-page-breadcrumb-trigger").hide();
            } else {
                $(".cmb2-id--malen-breadcumb-image").show();
                $(".cmb2-id--malen-page-title").show();
                $(".cmb2-id--malen-page-breadcrumb-trigger").show();
        
                if( $malen_page_title.val() == '1' ) {
                    $(".cmb2-id--malen-page-title-settings").show();
                    if( $malen_page_title_settings.val() == 'default' ) {
                        $(".cmb2-id--malen-custom-page-title").hide();
                    } else {
                        $(".cmb2-id--malen-custom-page-title").show();
                    }
                } else {
                    $(".cmb2-id--malen-page-title-settings").hide();
                    $(".cmb2-id--malen-custom-page-title").hide();
        
                }
            }
        } else {
            $(this).parents('.cmb2-id--malen-page-breadcrumb-area').siblings().hide();
        }
    });

    // page title
    $malen_page_title.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--malen-page-title-settings").show();
            if( $malen_page_title_settings.val() == 'default' ) {
                $(".cmb2-id--malen-custom-page-title").hide();
            } else {
                $(".cmb2-id--malen-custom-page-title").show();
            }
        } else {
            $(".cmb2-id--malen-page-title-settings").hide();
            $(".cmb2-id--malen-custom-page-title").hide();

        }
    });

    //page settings
    $malen_page_settings.on("change",function(){
        if( $(this).val() == 'global' ) {
            $(".cmb2-id--malen-breadcumb-image").hide();
            $(".cmb2-id--malen-page-title").hide();
            $(".cmb2-id--malen-page-title-settings").hide();
            $(".cmb2-id--malen-custom-page-title").hide();
            $(".cmb2-id--malen-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--malen-breadcumb-image").show();
            $(".cmb2-id--malen-page-title").show();
            $(".cmb2-id--malen-page-breadcrumb-trigger").show();
    
            if( $malen_page_title.val() == '1' ) {
                $(".cmb2-id--malen-page-title-settings").show();
                if( $malen_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--malen-custom-page-title").hide();
                } else {
                    $(".cmb2-id--malen-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--malen-page-title-settings").hide();
                $(".cmb2-id--malen-custom-page-title").hide();
    
            }
        }
    });

    // page title settings
    $malen_page_title_settings.on("change",function(){
        if( $(this).val() == 'default' ) {
            $(".cmb2-id--malen-custom-page-title").hide();
        } else {
            $(".cmb2-id--malen-custom-page-title").show();
        }
    });
    
})(jQuery);