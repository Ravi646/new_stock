function base_url(page = ''){
  var base_url = $('body').data('base_url');
  return base_url+page;
}
$.fn.dataTable.pipeline = function ( opts ) {
    // Configuration options
    var conf = $.extend( {
        pages: 5,     // number of pages to cache
        url: '',      // script url
        data: null,   // function or object with parameters to send to the server
                      // matching how `ajax.data` works in DataTables
        method: 'GET' // Ajax HTTP method
    }, opts );
 
    // Private variables for storing the cache
    var cacheLower = -1;
    var cacheUpper = null;
    var cacheLastRequest = null;
    var cacheLastJson = null;
 
    return function ( request, drawCallback, settings ) {
        var ajax          = false;
        var requestStart  = request.start;
        var drawStart     = request.start;
        var requestLength = request.length;
        var requestEnd    = requestStart + requestLength;
         
        if ( settings.clearCache ) {
            // API requested that the cache be cleared
            ajax = true;
            settings.clearCache = false;
        }
        else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
            // outside cached data - need to make a request
            ajax = true;
        }
        else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
                  JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
                  JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
        ) {
            // properties changed (ordering, columns, searching)
            ajax = true;
        }
         
        // Store the request for checking next time around
        cacheLastRequest = $.extend( true, {}, request );
 
        if ( ajax ) {
            // Need data from the server
            if ( requestStart < cacheLower ) {
                requestStart = requestStart - (requestLength*(conf.pages-1));
 
                if ( requestStart < 0 ) {
                    requestStart = 0;
                }
            }
             
            cacheLower = requestStart;
            cacheUpper = requestStart + (requestLength * conf.pages);
 
            request.start = requestStart;
            request.length = requestLength*conf.pages;
 
            // Provide the same `data` options as DataTables.
            if ( typeof conf.data === 'function' ) {
                // As a function it is executed with the data object as an arg
                // for manipulation. If an object is returned, it is used as the
                // data object to submit
                var d = conf.data( request );
                if ( d ) {
                    $.extend( request, d );
                }
            }
            else if ( $.isPlainObject( conf.data ) ) {
                // As an object, the data given extends the default
                $.extend( request, conf.data );
            }
 
            settings.jqXHR = $.ajax( {
                "type":     conf.method,
                "url":      conf.url,
                "data":     request,
                "dataType": "json",
                "cache":    false,
                "success":  function ( json ) {
                    cacheLastJson = $.extend(true, {}, json);
 
                    if ( cacheLower != drawStart ) {
                        json.data.splice( 0, drawStart-cacheLower );
                    }
                    if ( requestLength >= -1 ) {
                        json.data.splice( requestLength, json.data.length );
                    }
                     
                    drawCallback( json );
                }
            } );
        }
        else {
            json = $.extend( true, {}, cacheLastJson );
            json.draw = request.draw; // Update the echo for each response
            json.data.splice( 0, requestStart-cacheLower );
            json.data.splice( requestLength, json.data.length );
 
            drawCallback(json);
        }
    }
};
 
// Register an API method that will empty the pipelined data, forcing an Ajax
// fetch on the next draw (i.e. `table.clearPipeline().draw()`)
$.fn.dataTable.Api.register( 'clearPipeline()', function () {
    return this.iterator( 'table', function ( settings ) {
        settings.clearCache = true;
    } );
} );
  /* Pipeline Configuration Starts */
/* Datatable Ends */
$('#example2').DataTable({
  "bProcessing": true,
  "bServerSide": true,
  "sServerMethod": "POST",
  "sAjaxSource": base_url('fetch_users_ajax'),
  "iDisplayLength": 10,
  "aoColumns": [
    { mData: 'fullname' } ,
    { mData: 'email' },
    { mData: 'mobile_no' }, 
    { mData: 'firm_name' },
    { mData: 'agency_name' },
    { mData: 'alter_mobile_no'},
    { mData: 'account_type'},
    { mData: 'verified'},
    { mData: 'user_id'}
],
// "sPaginationType":"full_numbers",
  // "iDisplayLength": 5
});
$(document).ready(function() {
    $('#user_list').DataTable({
    language:{
        searchPlaceholder: "name,unique code,email,mobile no"
    }
   });
});
$(document).ready(function() {
    $('#allcurrent_transact').DataTable({
    language:{
        searchPlaceholder: "name,unique code,email,mobile no"
    }
   });
});
$(document).on('click','.add_biller', function(){
var cust = $(this).data('customer_id');
$('#trgt_cust').val(cust);
});
$('.insert_biller').click(function(){
  var amount = $('#amount_paid').val();
  var cust_id  = $('#trgt_cust').val();
  $.ajax({
    type:'POST',
    url:base_url('add-earning'),
    data:({amount:amount,cust_id:cust_id}),
    datatype:'JSON',
    success:function(data){
        $('#submit_biller').modal('hide');
      var html = '<div class="form-group has-feedback"><h5>Top Up added Successfully !!</h5></div>'
        $('#topup_done .modal-body').html(html);
        $('#topup_done').modal('show');
    }
});
});
$(document).on('click','.delete_user', function(){
   if(confirm("Are You Sure You Want to Delete")){
  var cust_id = $(this).data('user_id');
  
  $.ajax({
  type:'POST',
  url:base_url('delete-user'),
  datatype:'JSON',
  data:({cust_id:cust_id}),
  success:function(data){
    var html = '<div class="form-group has-feedback"><h5>User Deleted Successfully !!</h5></div>'
        $('#topup_done .modal-body').html(html);
        $('#topup_done').modal('show');
  }
})
}
});