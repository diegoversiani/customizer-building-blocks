var custom_uploader;
 
function select_image_button_click(dialog_title, button_text, library_type, preview_id, control_id) {
        
  event.preventDefault();

  //Extend the wp.media object
  custom_uploader = wp.media.frames.file_frame = wp.media({
    title: dialog_title,
    button: {
      text: button_text
    },
    library : { type : library_type },
    multiple: false
  });
  
  //When a file is selected, grab the URL and set it as the text field's value
  custom_uploader.on('select', function() {
      
    attachment = custom_uploader.state().get('selection').first().toJSON();
    jQuery('#' + control_id).val(attachment.url);
    
    var html = '';
    
    if (library_type=='image') {
      html = '<img style="max-width: 100%;" src="' + attachment.url + '">';
    }
    
    if (library_type=='video') {
      html = '<video autoplay loop><source src="' + attachment.url + '" type="video/' + get_extension( attachment.url ) + '" /></video>';
    }
    
    jQuery('#' + preview_id).empty();
    jQuery('#' + preview_id).append(html);

  });

  //Open the uploader dialog
  custom_uploader.open();

}

function clear_image_button_click(preview_id, control_id) {
  
  event.preventDefault();

  jQuery('#' + control_id).val('');
  jQuery('#' + preview_id).empty();
  
}

function get_extension( url ){
  return url.substr((url.lastIndexOf('.') + 1));
}