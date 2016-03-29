/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery( document ).ready(function($) { 
    
    $( "#the-list" ).sortable({
        items:'tr',
        cursor:'move',
        axis:'y',
        handle: '.drag-handle',
        scrollSensitivity:40,
        helper:function(e,ui){
            ui.children().each(function(){
                jQuery(this).width(jQuery(this).width());
            });
            ui.css('left', '0');
            return ui;
        },
        start:function(event,ui){
            ui.item.css('background-color','#f6f6f6');
        },
        stop:function(event,ui){
            ui.item.removeAttr('style');
        },
        update: function(event, ui) {
            $( '.hentry' ).removeClass( 'alternate' );
            $( '.hentry' ).each(function( index ) {
                if( index % 2 == 0 ) {
                    $( this ).addClass( 'alternate' );
                }
            });
        }
    });
    
    $( document ).on( 'click', '#esb_pto_posts_save_order', function() {
        
        var ans;
        ans = confirm('Do you want to save sort order?');
        if( !ans ) {
            return true;
        }
        
        var allPostOrders = [];
        $( '.hentry' ).removeClass( 'alternate' );
        $( '.hentry' ).each(function( index ) {
            if( index % 2 == 0 ) {
                $( this ).addClass( 'alternate' );
            }
            var post_id = $( this ).attr( 'id' );
            post_id = post_id.replace('post-','');
            allPostOrders[index] = post_id;
        });
        if( allPostOrders != '' && allPostOrders != undefined ) {
            $( '.spinner' ).show();
            var data = {
                            'action'    : 'update_sort_order',
                            'postorders':   allPostOrders
                        };
            jQuery.post( ajaxurl, data, function(response) {
                if( response ) {
                    $( '.spinner' ).hide();
                    location.reload(); 
                }
            });
        }
    });
    
});