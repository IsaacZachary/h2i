    jQuery(document).ready(function() {
                        

        jQuery("ul.wpcatsort-sortable").sortable({
            'tolerance':'intersect',
            'cursor':'pointer',
            'items':'> li',
            'axi': 'y',
            'placeholder':'placeholder',
            'nested': 'ul'
         });



          jQuery(".wpcatsort-update-order").bind( "click", function() {
                                var mySortable = new Array();
                                jQuery(".wpcatsort-sortable").each(  function(){
                                    
                                    var serialized = jQuery(this).sortable("serialize");
                              
                                    var parent_tag = jQuery(this).parent().get(0).tagName;
                                    parent_tag = parent_tag.toLowerCase()
                                    if (parent_tag == 'li')
                                        {
                                            
                                            var tag_id = jQuery(this).parent().attr('id');
                                            mySortable[tag_id] = serialized;
                                        }
                                        else
                                        {
                                           
                                            mySortable[0] = serialized;
                                        }
                                });
                                //serialize the array
                                var serialize_data = {};
                                serialize_data = JSON.stringify( mySortable );
  
                                jQuery.post( 
                                    wpcatsort_object.ajax_url, 
                                    {   action:'wpcatsort_updateajax', 
                                        order: serialize_data, 
                                        _nonce: wpcatsort_object._nonce
                                    }, 
                                    function() {
                                    jQuery("#ajax-response").html('<div class="message updated fade"><p>' + wpcatsort_object.ajax_updated_text + '</p></div>');
                                    jQuery("#ajax-response div").delay(3000).hide("slow");
                                });
                            });



    });