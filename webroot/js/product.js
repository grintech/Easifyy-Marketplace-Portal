document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems);
});
$(document).ready(function ($) {

    $('.datepicker').datepicker({ 'format': 'yyyy-mm-dd' });

    var products_array =[];
    var form_fields = [
        ['input', 'hidden', 'Product', 'ProductMeta', 'product_id'],
        ['input', 'text', 'Item Code', 'ProductMeta', '_item_code'],
        ['input', 'text', 'Bar Code', 'ProductMeta', '_bar_code'],
        ['select', 'select', 'Unit', 'ProductMeta', '_unit', {
            'options': units
        }],
        ['input', 'text', 'Weight', 'ProductMeta', '_weight'],
        ['input', 'text', 'MRP', 'ProductMeta', '_price'],
        ['input', 'text', 'Sale Price', 'ProductMeta', '_sale_price'],
        ['input', 'number', 'Stock', 'ProductMeta', '_stock']
    ];

    function randIntr(Hl, Ll) {
      return Math.floor(Math.random() * (Hl - Ll + 1) ) + Ll;
    }

    function add_fields_row(container, main_class, add_remove_button, form_fields) {
        console.log(container, main_class);
        var counter = parseInt($('#counter').val());
        var _div, _lable, _input, div_main;
        div_main = jQuery('<div />').addClass(container).addClass('clear');
        for (var i = 0; i < form_fields.length; i++) {
            _div = "";
            _lable = "";
            _input = "";
            _rand = randIntr(1,1000);
            if (form_fields[i][0] == 'input') {
                if (form_fields[i][1] != 'hidden') {
                    _div = jQuery('<div />').attr('data-order', (i + 1)).addClass('col input-field');
                    _input = jQuery('<input />').addClass(' ' + form_fields[i][4]);
                    if (typeof form_fields[i][5] !== 'undefined') {
                        options_fields_row(_input, form_fields[i][5], form_fields[i][2]);
                    }
                    // _input.attr('type', form_fields[i][1]).attr('name',form_fields[i][4] + '[' + counter + ']').attr('placeholder', form_fields[i][2]).appendTo(_div);
                    _input.attr('type', form_fields[i][1]).attr('name',form_fields[i][4] + '[' + counter + ']').attr('id',form_fields[i][4]+'-'+_rand ).appendTo(_div);
                    _lable = jQuery('<label />').attr('for', form_fields[i][4]+'-'+_rand ).html(form_fields[i][2]).appendTo(_div);
                } else { /*If type is hidden*/
                    _div = jQuery('<input />').addClass(form_fields[i][4]).attr('type', form_fields[i][1]).attr('name', '[' + form_fields[i][4] + '][' + counter + ']')
                }
            } else if (form_fields[i][0] == 'select') {
                _div = jQuery('<div />').attr('data-order', (i + 1)).addClass('col input-field');
                
                _input = jQuery('<select />').addClass('' + form_fields[i][4]).attr('name',form_fields[i][4] + '[' + counter + ']').attr('id', form_fields[i][4]+'-'+_rand);
                if (typeof form_fields[i][5] !== 'undefined') {
                    options_fields_row(_input, form_fields[i][5], form_fields[i][2]);
                }
                _input.appendTo(_div);
                // _input.not(".disabled").select();
                console.log('call');
                //_lable = jQuery('<label />').attr('for', form_fields[i][4]+'-'+_rand ).html(form_fields[i][2]).appendTo(_div);
            }
            // jQuery('select').formSelect();
             var elems = document.querySelectorAll('select');
            _div.appendTo(div_main);
            //$("#"+form_fields[i][4]+'-'+_rand).formSelect();
        }

        if (add_remove_button) {
            _div = jQuery('<a />').html('<i class="material-icons">clear</i>').addClass('remove-variation pt-4 pb-4').appendTo(div_main);
        }
        div_main.addClass('row');
        div_main.appendTo('.' + main_class);
        $('#counter').val(counter + 1);
    }

    function options_fields_row(_input, data, name) {
        $.each(data, function (key, value) {
            if (key == 'options') {
                var _html = '<option value="">'+name+'</option>';
                $.each(data[key], function (okey, ovalue) {
                    _html += '<option value="' + okey + '">' + ovalue + '</option>';
                });
                _input.html(_html);
            } else if (key == 'id') {
                _input.attr('id', value);
            } else if (key == 'class') {
                _input.addClass(value);
            } else if (key == 'call_back') {
                _input.on(data[key][0], data[key][1]);
            }
        });
    }

    var rowCounter = 0;
    $('.dd-product-type').change(function(){
        

        //$("#ddlID > [value=" + YouValue + "]").attr("selected", "true");

        if( confirm('Are you sure? You may lost the current data in the product information.') ) {
            $('.product-info-row').html('');    
        } else {
            return;
        }
        
        $('#counter').val(1);

        var current = $(this);
        if( current.val() == '1' ) {
            // Simple

            if( rowCounter > 0 ) return;
            rowCounter++;
            add_fields_row('simple-row', 'product-info-row', false, form_fields);
            $('.add-more-button-container').hide();
            $('.bundled-info-row').hide();

        } else if( current.val() == '2' ) {
            // Variable
            rowCounter = 0;
            add_fields_row('variable-row', 'product-info-row', true, form_fields);
            $('.add-more-button-container').show();
            $('.bundled-info-row').hide();
        } else if( current.val() == '4' ) {
            add_fields_row('simple-row', 'product-info-row', false, form_fields);
            $('.add-more-button-container').hide();
            $('.bundled-info-row').show();
            rowCounter = 0;
        }

        $('select').formSelect(); 

    });

    $('#add-more-button-container').click(function(){
        
        if( $('.dd-product-type').val() == '1' || $('.dd-product-type').val() == '3' || $('.dd-product-type').val() == '' ) return; 

        if( confirm('Are you sure you wanted to add more rows?') ) {
            add_fields_row('variable-row', 'product-info-row', true, form_fields);    
            $('._unit').formSelect();
        } else {
            return;
        }

    });

    jQuery(document).on('click', '.remove-variation', function () {

        if( $('.dd-product-type').val() == '1' || $('.dd-product-type').val() == '3' || $('.dd-product-type').val() == '' ) return; 

        var current = jQuery(this);
        if (confirm('Are you sure?')) {
            current.parent().remove();
        }
    });

    jQuery(document).on('click', '.delete-product-image', function (e) {
        e.preventDefault();
        if (!confirm('Are you sure?')) return;
        var current = jQuery(this);
        console.log(current);
        jQuery('#store-image').removeAttr('value');
        jQuery.ajax({
            url: current.attr('ajax-url'),
            type: 'post',
            dataType:'json',
            headers: {
                'X-CSRF-Token': csrfCustomerToken
            },
            data: {
                gallery_id: current.attr('data-id')
            },
            success: function (response) {
                var result = JSON.parse(response);
                console.log('con' + result);
                if (result == 1) {
                    current.parents().closest('.image-holder').remove();
                } else {
                    alert('Try again later!!');
                }
            },
            error: function (a, b, c) {
                console.log('error: ' + c)
            },
            beforeSend: function () {
                console.log('sending request....')
            }
        });
    });

  
    //console.log('product_listing',product_listing);
     jQuery('#product_search_modal').modal({
      dismissible: false, // Modal can be dismissed by clicking outside of the modal
      onOpenEnd: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
        //alert("Ready");
        console.log(modal, trigger);
      },
      onCloseEnd: function() { // Callback for Modal close
        //alert('Closed'); 
         jQuery('.active-row').removeClass('active-row'); 
      } 
    });
    function create_row( $data, $key ){

        var div = jQuery('<tr />')
        .addClass( 'product-item-list' )
        .html( '<td>'+$data.title+'</td><td>'+$data.price+'</td><td>'+$data.sale_price+'</td>' )
        .attr( 'data-product-id', $data.id )
        .attr( 'data-product-json-key', $key )
        .appendTo('#product-list');
    }

    function find_duplicate( $find_what, parent_row ){

        var _tr = jQuery('#new-order-book tbody tr');
        
        _tr.each(function(){

            var current = jQuery(this);

            if( current.find('.item-id input').val() != "" ) {
                products_array.push( current.attr('data-product-json-key') );
            }

        });

        products_array.pop();

        if( products_array.indexOf( $find_what ) > -1 ) {
            var parent_row = jQuery('#new-order-book tbody tr[data-product-json-key="'+$find_what+'"]').first();
            jQuery('#new-order-book tbody tr[data-product-json-key="'+$find_what+'"]').last().find('input').val('');
            
            var current_value = parent_row.find('.quantity input').val();

            //parent_row.find('.quantity input').val( ++current_value );
            //parent_row.find('.quantity input').trigger('keyup');
            calculate_tax( parent_row.find('.quantity input') );

        } else {
            console.log('not available');
        }

        /* Set focus to next row or add more rows */
        if( parent_row.next().length > 0 ) {
            parent_row.next().find('.bar-code input').focus();    
        } else {
            if( check_empty_row(parent_row) ) {
                add_rows();
            }
        }

    }
    function check_empty_row( parent_row ){
        
        var _tr = jQuery('#new-order-book tbody tr');

        _tr.each(function(){

            var current = jQuery(this);
            /*if a row is found empty*/
            if( current.find('.item-id input').val() == "" ) {

                /*shift current data to that row*/
                var item_id = parent_row.find('.item-id input').val();
                var product_name = parent_row.find('.product-name input').val();
                var rate = parent_row.find('.rate input').val();
                var rate = parent_row.find('.mrp input').val();
                var quantity = parent_row.find('.quantity input').val();
                var igst = parent_row.find('.igst input').val();
                var cgst = parent_row.find('.cgst input').val();
                var sgst = parent_row.find('.sgst input').val();
                var amount = parent_row.find('.amount input').val();
                var bar_code = parent_row.find('.bar-code input').val();

                current.find('.item-id input').val( item_id );
                current.find('.product-name input').val( product_name );
                current.find('.rate input').val( rate );
                current.find('.mrp input').val( mrp );
                current.find('.quantity input').val( quantity );
                current.find('.igst input').val( igst );
                current.find('.cgst input').val( cgst );
                current.find('.sgst input').val( sgst );
                current.find('.amount input').val( amount );
                current.find('.bar-code input').val( bar_code );

                current.attr('data-product-json-key', parent_row.attr('data-product-json-key') );
                get_total();

                parent_row.find('td input').val('');

                return false;
            }
        });

        return true;
    }


    function add_rows(){
        var table_rows = [
            ['item-id', 'item_id[]', true], 
            ['bar-code', 'bar_code[]', false], 
            ['product-name', 'product_name[]', true], 
            ['rate', 'rate[]', true], 
            ['quantity', 'quantity[]', true], 
            ['igst', 'igst[]', true], 
            ['cgst', 'cgst[]', true], 
            ['sgst', 'sgst[]', true], 
            ['amount', 'amount[]', true]
        ];

        /*Add rows to the billing table*/
        for (var rows = 0; rows <= 4; rows++ ) {
            var table_row = jQuery('<tr />')
            .addClass('item-row')
            .appendTo('#new-order-book tbody');
            var row_html = ''
            for (var i = 0; i < table_rows.length ; i++) {
                var table_col = jQuery('<td />')
                .addClass( table_rows[i][0] )
                .appendTo(table_row);
                var col_input = jQuery('<input />')
                // .addClass('form-control')
                .attr('type', 'text')
                .prop('readonly',table_rows[i][2] )
                .attr('name', table_rows[i][1])
                .appendTo(table_col);    
            }
        }
    }

    function get_total(){
        var _tr = jQuery('#new-order-book tbody tr');
        var cgst = 0;
        var sgst = 0;
        var igst = 0;
        var total = 0;
        var mrp = 0;
        _tr.each(function(){

            var current = jQuery(this);

            if( current.find('.item-id input').val() != "" ) {
                
                products_array.push( current.attr('data-product-json-key') );
                
                console.log( current.find('.cgst input').val(), current.find('.sgst input').val(), current.find('.igst input').val(), current.find('.amount input').val() );

                cgst = parseFloat( cgst ) + parseFloat( current.find('.cgst input').val() );
                sgst = parseFloat( sgst ) + parseFloat( current.find('.sgst input').val() );
                igst = parseFloat( igst ) + parseFloat( current.find('.igst input').val() );
                total = parseFloat( total ) + parseFloat( current.find('.amount input').val() );
                mrp = parseFloat( mrp ) + ( parseFloat( current.find('.mrp input').val() ) * parseFloat( current.find('.quantity input').val() ) );

            }

        });
        // jQuery('._cgst').val(cgst);
        // jQuery('._sgst').val(sgst);
        // jQuery('._igst').val(igst);
        jQuery('._sale_price').val(total).siblings('label').addClass('active');
        jQuery('._price').val(mrp).siblings('label').addClass('active');

        jQuery('#cgst').html('CGST: INR.'+cgst.toFixed(2));
        jQuery('#sgst').html('SGST: INR.'+sgst.toFixed(2));
        jQuery('#igst').html('IGST: INR.'+igst.toFixed(2));
        jQuery('#price').html('Total: INR.'+total.toFixed(2));
    }

    function calculate_tax( current ){
        var parent_row = current.closest('.item-row');
        var rate = parent_row.find('.rate input');
        var igst = parent_row.find('.igst input');
        var cgst = parent_row.find('.cgst input');
        var sgst = parent_row.find('.sgst input');

        var total_igst = 0;
        var total_cgst = 0;
        var total_sgst = 0;
        
        if( rate.val() != "" ) {

            var total = current.val()*rate.val();
            console.log( total, current.val(), rate.val() );
            parent_row.find('.amount input').val(total);

            var _data = product_with_price[parent_row.attr('data-product-json-key')];

            var cal_igst = total * (_data.igst/100);
            var cal_cgst = total * (_data.cgst/100);
            var cal_sgst = total * (_data.sgst/100);

            total_igst += cal_igst;
            total_cgst += cal_cgst;
            total_sgst += cal_sgst;

            console.log(total_igst, total_cgst, total_sgst);

            igst.val( cal_igst.toFixed(2) );
            cgst.val( cal_cgst.toFixed(2) );
            sgst.val( cal_sgst.toFixed(2) );

        }

        // jQuery('#cgst').html( 'CGST: INR. -'+total_igst.toFixed(2));
        // jQuery('#sgst').html( 'SGST: INR.'+total_cgst.toFixed(2));
        // jQuery('#igst').html( 'IGST: INR.'+total_sgst.toFixed(2));
        // jQuery('#price').html(total);
    }


        jQuery.each(product_with_price, function(i, item) {
            create_row(product_with_price[i], i);
        });

        jQuery('#product-search-input').keyup(function(){
            var current = jQuery(this);
            jQuery('#product-list').html('');
            if( current.val().length < 3 ) {

                jQuery.each(product_with_price, function(i, item) {
                    //console.log('items list',i,item);
                     var current_li_html =item.title;
                   if( current_li_html.toLowerCase().indexOf(current.val().toLowerCase() ) >= 0 ) {
                        create_row(product_with_price[i], i);
                    }
                });

            } else {
                
                jQuery.each(product_with_price, function(i, item) {
                    if( i.toLowerCase().indexOf( current.val().toLowerCase() ) > -1 ) {
                        create_row(product_with_price[i], i);
                    }
                });
            }

        });

        $('#product_search_modal').on('onCloseEnd', function (e) {
             console.log('hello');
            jQuery('.active-row').removeClass('active-row');
        })

        

        jQuery(document).on( 'keypress', '.item-row td input', function(e){
            console.log(e.charCode);

            if( e.charCode == 13 ) {
                jQuery(this).addClass('active-row');
                jQuery('#product_search_modal').modal('open');
            }
            var current = jQuery(this);
            if( e.charCode == 13 ) {
                return false;
            }

        });

        jQuery(document).on( 'click', '.product-item-list', function(){

            var current = jQuery(this);
            var parent_row = jQuery('.active-row').closest('.item-row');
            var _data = product_with_price[current.attr('data-product-json-key')];
            
            parent_row.find('.item-id input').val( _data.id );
            parent_row.find('.product-name input').val( _data.title );
            parent_row.find('.rate input').val( _data.sale_price );
            parent_row.find('.mrp input').val( _data._price );
            parent_row.find('.quantity input').val(1);
            parent_row.find('.igst input').val( _data.sale_price * ( _data.igst/100) );
            parent_row.find('.cgst input').val(_data.cgst * ( _data.cgst/100) );
            parent_row.find('.sgst input').val(_data.sgst * ( _data.sgst/100) );
            parent_row.find('.amount input').val( _data.sale_price * 1 );
            parent_row.find('.bar-code input').val( _data.bar_code);
            parent_row.attr('data-product-json-key', current.attr('data-product-json-key') );

            jQuery('#product_search_modal').modal('close');
            jQuery('#new-order-book').trigger('AddRowEvent');

            //find_duplicate( current.attr('data-product-json-key'), parent_row );
            
            calculate_tax(parent_row.find('.quantity input'));
            get_total();

        });

        jQuery('.quantity input').keyup(function(e){

            /*Check if quantity is numeric*/
            if( isNaN( e.key ) ) return false;

            var current = jQuery(this);
            calculate_tax(current);
            get_total();

        });
        
        
        $('#new-order-book').bind('AddRowEvent', function(event){
            var chkArray =[];
            var description ='';
            var price_total = 0.0;
            console.log('AddRowEvent');
            var product_values = [];
            var groupDesc = $('.product-name input');
            var groupPrice = $('.amount input');
            var groupItemIds = $('.item-id input');
                        
            if (groupItemIds.length > 1){
                
               groupItemIds.each(function () {
                   if($(this).val() !== ''){
                    //console.log($(this).val());
                    chkArray.push($(this).val());
                   }
               });
            }
            

            if (groupDesc.length > 1){
                
               groupDesc.each(function () {
                   if($(this).val() !== ''){
                    //console.log($(this).val());
                    description += $(this).val()+ '\n';
                    
                   }
               });
            }
            if (groupPrice.length > 1){
            
               groupPrice.each(function () {
                   if($(this).val() !== ''){
                    //console.log($(this).val());
                    price_total += parseFloat($(this).val());
                    
                   }
               });
            }
            
            selected_products=chkArray.join(',');
            $("#product-ids").val(selected_products);
            $("#ProductDescription").val(description);
            $('._price').val(price_total);
            $('._sale_price').val(price_total).siblings('label').addClass('active');
            console.log(selected_products,chkArray);
        });

        // jQuery(document).on( 'click', '.remove-product-row', function(){

        //     var current_row = jQuery(this).closest('.item-row').remove();
        //     get_total();
        //     // calculate_tax();
        // });
        
        
        
        jQuery(document).on( 'keypress', '.item-row td.bar-code input', function(e){
           // console.log(e);
            var current = jQuery(this);
            if( e.charCode == 13 ) {

                var parent_row = current.parent().parent();
                
                // jQuery.ajax({

                //     url: myBaseUrl+'admin/Orders/find_product_by_bar_code',
                //     type: 'post',
                //     dataType: 'json',
                //     data: {
                //         bar_code: current.val(),
                //         // item_id: parent_row.find('.item-id input').val()
                //     },
                //     beforeSend: function(){

                //     },
                //     error: function(a,b,c){

                //     },
                //     success: function(response){

                //         if ( response.status == 1 ) {
                //             console.log('heer');
                            
                //             console.log(parent_row);
                            
                //             parent_row.find('.item-id input').val(response.product_id);
                //             parent_row.find('.product-name input').val(response.product_name);
                //             parent_row.find('.rate input').val(response.rate);
                //             parent_row.find('.quantity input').val(1);
                //             parent_row.find('.igst input').val( response.igst * ( response.igst/100) );
                //             parent_row.find('.cgst input').val(response.cgst * ( response.cgst/100) );
                //             parent_row.find('.sgst input').val(response.sgst * ( response.sgst/100) );
                //             parent_row.find('.amount input').val( response.rate * 1 );
                //             parent_row.attr('data-product-json-key', response.product_name+'#'+response.product_id );

                //             //products_array.push( parent_row.attr('data-product-json-key') );

                //             find_duplicate( parent_row.attr('data-product-json-key'), parent_row );
                //             get_total();

                //         } else if( response.status == 2 || response.status == 0 ) {
                //             current.addClass('active-row');
                //             jQuery('#product_search_modal').modal('open');
                //         }

                //     }

                // });

                //return false;
            }

        });

    $('#ProductStatus').formSelect();  



});