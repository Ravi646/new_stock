$('#page_id').change(function(){
	if($(this).val() == 'cust_url'){
		$('#cust_url_cont').show();
	}
	else{
		$('#cust_url_cont').hide();
	}
});

$(document).ready(function(){
	var parent_menu = $('#parent_menu_id option:selected').val();
	if (parent_menu != '') {
		$('#parent_menu_id').trigger('change');
	}
});

$('#parent_menu_id').change(function(){
	var parent_menu_id = $(this).val();
    var menu_position = $('#menu_position option:selected').val();
	// var menu_id = $(this).val();
	var disp_order = $('#disp_order').attr('data-disp_order');
	$.ajax({
		url: base_url("fetch_menus_disp_data/"+parent_menu_id),
		data:{
			'json':true,
			'menu_id':$(this).data('menu_id'),
            'menu_position': menu_position
		},
		type:'post',
		dataType: 'json',
		success: function(result){
			var html = '<option value="begin">Begin</option>';
        	if (result.fetch_menus.length > 0) {
        		$.each(result.fetch_menus, function(index,item){
        			html += '<option value="'+item.disp_order+'"> After '+item.menu_name+'</option>';
        		});
        	}
        	else{
        		disp_order = '';
        	}

        	$('#disp_order').html(html);
        		
    		if(disp_order != ''){
    			if(disp_order != 0){
    				$('#disp_order option').each(function(){
    					if ($(this).text() != 'Begin' && $(this).val() < disp_order) {
    						$(this).attr('selected','selected');
    					}
    				});
    				$('#disp_order').attr('data-disp_order','');
    			}
    			else{
    				$('#disp_order option:first').attr("selected","selected");
    			}
    		}
    		else{
    			$('#disp_order option:last').attr("selected","selected");
    		}

    		// console.log(result.fetch_menu_data.mega_menu);

    		if (result.fetch_menu_data != null) {
    			if (result.fetch_menu_data.mega_menu == 1) {
    				$('#mega_menu').bootstrapToggle('on').bootstrapToggle('disable').removeAttr('name');
    			}
    			else{
    				$('#mega_menu').bootstrapToggle('off').bootstrapToggle('enable').attr('name','mega_menu');
    			}

                var menu_position_val = (result.fetch_menu_data.menu_position != null)?result.fetch_menu_data.menu_position:'None';

                $('#menu_position').val(menu_position_val);
    		}
    		else{
    			$('#mega_menu').bootstrapToggle('off').bootstrapToggle('enable').attr('name','mega_menu');
    		}

            if (parent_menu_id != 0) {
                $('#mega_menu').bootstrapToggle('off').bootstrapToggle('disable').removeAttr('name');
                $('#menu_position').attr('disabled',true);
            }
            else{
                $('#mega_menu').bootstrapToggle('enable').attr('name','mega_menu');
                $('#menu_position').attr('disabled',false);
            }
    	}
	});
});

$('#menu_position').change(function(){
    $('#parent_menu_id').trigger('change');
})