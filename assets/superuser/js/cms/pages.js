$(document).on('click', '.add_meta_keyword', function(){
	var new_meta_keyword_html = '<div class="input-group"><input type="text" name="meta_keywords[]" class="form-control" id="meta_keyword"><span class="input-group-btn"><button type="button" class="btn btn-success add_meta_keyword">+</button></span></div>';

	$('#meta_keyword_cont').append(new_meta_keyword_html);
	$(this).text('-').removeClass('btn-success add_meta_keyword').addClass('btn-danger remove_meta_keyword');
});

$(document).on('click', '.remove_meta_keyword', function(){
	$(this).closest('.input-group').remove();
});

$('#widget_disable').on('ifChecked', function(event){
  $('.widgets_check').iCheck('uncheck'); 
});

$('.widgets_check').on('ifChecked', function(event){
  $('#widget_disable').iCheck('uncheck'); 
});