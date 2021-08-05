jQuery(document).ready(function () {
    var myBaseUrl = basePath;

    function add_fields_row(container, main_class, add_remove_button, form_fields) {
        console.log(container, main_class);
        var counter = parseInt($('#counter').val());
        var _div, _lable, _input, div_main;
        div_main = jQuery('<div />').addClass(container).addClass('clear');
        for (var i = 0; i < form_fields.length; i++) {
            _div = "";
            _lable = "";
            _input = "";
            if (form_fields[i][0] == 'input') {
                if (form_fields[i][1] != 'hidden') {
                    _div = jQuery('<div />').attr('data-order', (i + 1)).addClass('product-variation-panel');
                    _lable = jQuery('<label />').html(form_fields[i][2]).appendTo(_div);
                    _input = jQuery('<input />').addClass('form-control ' + form_fields[i][4]);
                    if (typeof form_fields[i][5] !== 'undefined') {
                        options_fields_row(_input, form_fields[i][5]);
                    }
                    _input.attr('type', form_fields[i][1]).attr('name', '[' + form_fields[i][4] + '][' + counter + ']').attr('placeholder', form_fields[i][2]).appendTo(_div);
                } else { /*If type is hidden*/
                    _div = jQuery('<input />').addClass('form-control').addClass(form_fields[i][4]).attr('type', form_fields[i][1]).attr('name', '[' + form_fields[i][4] + '][' + counter + ']')
                }
            } else if (form_fields[i][0] == 'select') {
                _div = jQuery('<div />').attr('data-order', (i + 1)).addClass('product-variation-panel');
                _lable = jQuery('<label />').html(form_fields[i][2]).appendTo(_div);
                _input = jQuery('<select />').addClass('form-control ' + form_fields[i][4]).attr('name', '[' + form_fields[i][4] + '][' + counter + ']');
                if (typeof form_fields[i][5] !== 'undefined') {
                    options_fields_row(_input, form_fields[i][5]);
                }
                _input.appendTo(_div);
            }
            _div.appendTo(div_main);
        }
        if (add_remove_button) {
            _div = jQuery('<a />').html('x').addClass('remove-variation small-round-symbole-button').appendTo(div_main);
        }
        div_main.addClass('product-meta-item');
        div_main.appendTo('.' + main_class);
        $('#counter').val(counter + 1);
    }

    function options_fields_row(_input, data) {
        $.each(data, function (key, value) {
            if (key == 'options') {
                var _html = '<option value="">Select Value</option>';
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
    jQuery(document).on('click', '.remove-variation', function () {
        var current = jQuery(this);
        if (confirm('Are you sure?')) {
            current.parent().remove();
        }
    });
    jQuery('._variable-type').change(function () {
        var chosen_text = jQuery(this).find('option:selected').text();
        console.log('chosen_text', chosen_text, jQuery(this).val());
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
        if (jQuery(this).val() == '2') {
            console.log('here variable Product');
            jQuery('._variable-product-info').show();
            jQuery('._simple-product-info').hide();
            jQuery('.bundled_product_add_section').hide();
            jQuery('._simple-product-info').children('._simple-product-item').remove();
            add_fields_row('product-meta-item', '_variable-product-info', true, form_fields);
        } else if (jQuery(this).val() == '1') {
            jQuery('._variable-product-info').children('._variable-product-item').remove();
            jQuery('._simple-product-info').show();
            jQuery('._variable-product-info').hide();
            jQuery('.bundled_product_add_section').hide();
            if (jQuery('._simple-product-info').children().length > 0) return;
            add_fields_row('_simple-product-item', '_simple-product-info', false, form_fields);
        } else if (jQuery(this).val() == '4') {
            //$("#yourdropdownid option:selected").text();
            jQuery('._simple-product-info').show();
            jQuery('._variable-product-info').hide();
            jQuery('.bundled_product_add_section').show();
            /* $.ajax({
            url: myBaseUrl +'Products/ajax_bundled_product_search/',
            cache: false,
            type: 'post',
            dataType: 'html',
            data: {
                search_txt: $('#product_search').val()
            },
            success: function(data) {
                $('#bundled_product_search_listing').html(data);
            }
        }); */
        } else {
            jQuery('._simple-product-info').hide();
            jQuery('._variable-product-info').hide();
            jQuery('.bundled_product_add_section').hide();
        }
    });
    /* $('#product_search').on('keyup',function(){
        console.log('length',$(this).val().length);
        if($(this).val().length > 2){
        $.ajax({
            url: myBaseUrl +'Products/ajax_bundled_product_search/',
            cache: false,
            type: 'post',
            dataType: 'html',
            data: {
                search_txt: $(this).val()
            },
            success: function(data) {
                $('#bundled_product_search_listing').html(data);
            }
        });
        }else if($(this).val().length ==''){
            $.ajax({
            url: myBaseUrl +'Products/ajax_bundled_product_search/',
            cache: false,
            type: 'post',
            dataType: 'html',
            data: {
                search_txt: $(this).val()
            },
            success: function(data) {
                $('#bundled_product_search_listing').html(data);
            }
        });
        }
        
    }); */
    jQuery('._variable-add-more').click(function () {
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
        add_fields_row('_variable-product-item', '_variable-product-info', true, form_fields);
    });
    jQuery(document).on('blur', '._sale_price', function () {
        var current = jQuery(this);
        var mrp = current.closest('._variable-product-item').find('._price');
        if (mrp.length == 0) {
            mrp = current.closest('._simple-product-item').find('._price');
        }
        var _mrp = parseFloat(mrp.val());
        var _sp = parseFloat(current.val());
        if (_mrp < _sp) {
            current.css('border-color', 'red');
            jQuery('.product-save-button').addClass('disabled');
        } else {
            current.css('border-color', 'green');
            jQuery('.product-save-button').removeClass('disabled');
        }
    });
    jQuery('.btn-product-save').click(function () {
        var _cgst = parseFloat(jQuery('._cgst').val());
        var _sgst = parseFloat(jQuery('._sgst').val());
        if (jQuery('._is_taxable').val() == 'Yes' && (_cgst <= 0 || _sgst <= 0)) {
            var error_element = '<span class="arrow"><label id="gst-error" class="error" for="ProductStatus" style="display: inline-block;">Must be greater than 0.</label></span>';
            if (_cgst <= 0) {
                if (jQuery('._cgst').siblings('.arrow').length == 0) {
                    jQuery('._cgst').after(error_element);
                }
            } else {
                jQuery('._cgst').siblings('.arrow').remove();
            }
            if (_sgst <= 0) {
                if (jQuery('._sgst').siblings('.arrow').length == 0) {
                    jQuery('._sgst').after(error_element);
                }
            } else {
                jQuery('._sgst').siblings('.arrow').remove();
            }
            //return false;
        }
    });
    var field_counter = 0;
    jQuery('._product-item-add-more').click(function () {
        var qty_id = 'pi-qty-' + field_counter;
        var price_id = 'pi-prc-' + field_counter;
        var total_id = 'pi-ttl-' + field_counter;
        var _call_back = function () {
            var qty = jQuery('#' + qty_id).val();
            var prc = jQuery('#' + price_id).val();
            if (!isNaN(qty) && !isNaN(prc)) {
                jQuery('#' + total_id).val(qty * prc);
            }
        };
        field_counter++;
        var form_fields = [
            ['input', 'hidden', 'Product', 'PurchaseItem', 'id'],
            ['select', 'select', 'Product', 'PurchaseItem', 'vendor_product_id', {
                'options': vendor_products
            }],
            ['input', 'text', 'Quantity', 'PurchaseItem', 'quantity', {
                'call_back': ['keyup', _call_back],
                'id': qty_id
            }],
            ['input', 'text', 'P. Price', 'PurchaseItem', 'purchase_price', {
                'call_back': ['keyup', _call_back],
                'id': price_id
            }],
            ['input', 'text', 'Total', 'PurchaseItem', 'amount', {
                'call_back': ['blur', _call_back],
                'id': total_id
            }],
            ['input', 'text', 'Rate (MRP)', 'PurchaseItem', 'price'],
            ['input', 'text', 'S. Price', 'PurchaseItem', 'sale_price'],
            ['input', 'date', 'Expiry', 'PurchaseItem', 'expiry'],
            ['input', 'text', 'Margin %age', 'PurchaseItem', 'margin']
        ];
        add_fields_row('product-meta-item', '_variable-product-info', true, form_fields);
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
            dataType: 'json',
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
    jQuery(document).on('click', '.delete-product-variation', function () {
        if (!confirm('Are you sure?')) return;
        jQuery('#store-image').removeAttr('value');
        var current = jQuery(this);
        jQuery.ajax({
            url: current.attr('ajax-url'),
            type: 'post',
            dataType: 'json',
            data: {
                var_id: current.attr('data-id')
            },
            success: function (response) {
                var result = JSON.parse(response);
                console.log('con' + result);
                if (result == 1) {
                    current.parent().remove();
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
        //$('#detail_7').prop('min',1);
    });
    jQuery(document).on('click', '.delete-purchase-item', function () {
        if (!confirm('Are you sure?')) return;
        var current = jQuery(this);
        jQuery.ajax({
            url: current.attr('ajax-url'),
            type: 'post',
            dataType: 'json',
            data: {
                item_id: current.attr('data-id')
            },
            success: function (response) {
                var result = JSON.parse(response);
                console.log('con' + result);
                if (result == 1) {
                    current.parent().remove();
                } else {
                    alert('Try again later!!');
                }
            },
            error: function (a, b, c) {
                console.log('error: ' + c)
            },
            beforeSend: function () {
                console.log('sending request....');
            }
        });
        //$('#detail_7').prop('min',1);
    });
    /*Check parent category if child get clicked*/
    jQuery('.sub-cat').click(function () {
        var current = jQuery(this);
        var parent_box = current.parents().closest('.parent-checkbox').find('input[type="checkbox"]').val();
    });
    jQuery(".vend-category a").click(function () {
        console.log('herer');
        jQuery(this).parent().addClass('selected').siblings().removeClass('selected');
    });
    /*Search in category*/
    jQuery('#search-category').keyup(function () {
        var searchText = jQuery('#search-category').val().toString().toLowerCase();
        var current = jQuery(this);
        jQuery('.category-listing .main-cat').each(function () {
            var current_li = jQuery(this);
            var current_li_html = current_li.attr('data-value').toString().toLowerCase();
            if (current_li_html.indexOf(searchText) >= 0) {
                jQuery('.category-listing').prepend(current_li.closest('li.parent-checkbox'));
            }
        });
        jQuery('.category-listing .sub-cat').each(function () {
            var current_li = jQuery(this);
            var current_li_html = current_li.attr('data-value').toString().toLowerCase();
            if (current_li_html.indexOf(searchText) >= 0) {
                jQuery('.category-listing').prepend(current_li.closest('li.parent-checkbox'));
            }
        });
    });
    /*Search in brand*/
    jQuery('#search-brand').keyup(function () {
        var searchText = jQuery('#search-brand').val().toString().toLowerCase();
        var current = jQuery(this);
        jQuery('.brand-list .sub-cat').each(function () {
            var current_li = jQuery(this);
            var current_li_html = current_li.attr('data-value').toString().toLowerCase();
            if (current_li_html.indexOf(searchText) >= 0) {
                jQuery('.brand-list').prepend(current_li.closest('li.parent-checkbox'));
            }
        });
    });




    function create_row( $data, $key ){

        var div = jQuery('<div />')
        .addClass( 'product-item-list' )
        .html( '<div class="">'+$data.title+'</div><div class="">'+$data.price+'</div><div class="">'+$data.sale_price+'</div>' )
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
                var quantity = parent_row.find('.quantity input').val();
                var igst = parent_row.find('.igst input').val();
                var cgst = parent_row.find('.cgst input').val();
                var sgst = parent_row.find('.sgst input').val();
                var amount = parent_row.find('.amount input').val();
                var bar_code = parent_row.find('.bar-code input').val();

                current.find('.item-id input').val( item_id );
                current.find('.product-name input').val( product_name );
                current.find('.rate input').val( rate );
                current.find('.quantity input').val( quantity );
                current.find('.igst input').val( igst );
                current.find('.cgst input').val( cgst );
                current.find('.sgst input').val( sgst );
                current.find('.amount input').val( amount );
                current.find('.bar-code input').val( bar_code );

                current.attr('data-product-json-key', parent_row.attr('data-product-json-key') );

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
                .addClass('form-control')
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
        _tr.each(function(){

            var current = jQuery(this);

            if( current.find('.item-id input').val() != "" ) {
                
                products_array.push( current.attr('data-product-json-key') );
                
                console.log( current.find('.cgst input').val(), current.find('.sgst input').val(), current.find('.igst input').val(), current.find('.amount input').val() );

                cgst = parseFloat( cgst ) + parseFloat( current.find('.cgst input').val() );
                sgst = parseFloat( sgst ) + parseFloat( current.find('.sgst input').val() );
                igst = parseFloat( igst ) + parseFloat( current.find('.igst input').val() );
                total = parseFloat( total ) + parseFloat( current.find('.amount input').val() );

            }

        });
        jQuery('#cgst span').html(cgst);
        jQuery('#sgst span').html(sgst);
        jQuery('#igst span').html(igst);
        jQuery('#total span').html(total);
    }

    function calculate_tax( current ){
        var parent_row = current.parent().parent();
        var rate = parent_row.find('.rate input');
        var igst = parent_row.find('.igst input');
        var cgst = parent_row.find('.cgst input');
        var sgst = parent_row.find('.sgst input');

        if( rate.val() != "" ) {

            var total = current.val()*rate.val();
            console.log( total, current.val(), rate.val() );
            parent_row.find('.amount input').val(total);

            var _data = product_with_price[parent_row.attr('data-product-json-key')];

            var cal_igst = total * (_data.igst/100);
            var cal_cgst =total * (_data.cgst/100);
            var cal_sgst =total * (_data.sgst/100);

            igst.val( cal_igst.toFixed(2) );
            cgst.val( cal_cgst.toFixed(2) );
            sgst.val( cal_sgst.toFixed(2) );

        }
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

        $('#product_search_modal').on('hidden.bs.modal', function (e) {
            jQuery('.active-row').removeClass('active-row');
        })

        

        jQuery(document).on( 'keypress', '.item-row td input', function(e){
            console.log(e.charCode);

            if( e.charCode == 10 ) {
                jQuery(this).addClass('active-row');
                jQuery('#product_search_modal').modal('show');
            }
            var current = jQuery(this);
            if( e.charCode == 13 ) {
                return false;
            }

        });

        jQuery(document).on( 'click', '.product-list.body .product-item-list', function(){

            var current = jQuery(this);
            parent_row = jQuery('.active-row').parent().parent();

            var _data = product_with_price[current.attr('data-product-json-key')];

            parent_row.find('.item-id input').val( _data.id );
            parent_row.find('.product-name input').val( _data.title );
            parent_row.find('.rate input').val( _data.sale_price );
            parent_row.find('.quantity input').val(1);
            parent_row.find('.igst input').val( _data.sale_price * ( _data.igst/100) );
            parent_row.find('.cgst input').val(_data.cgst * ( _data.cgst/100) );
            parent_row.find('.sgst input').val(_data.sgst * ( _data.sgst/100) );
            parent_row.find('.amount input').val( _data.sale_price * 1 );
            parent_row.find('.bar-code input').val( _data.bar_code * 1 );

            parent_row.attr('data-product-json-key', current.attr('data-product-json-key') );

            //products_array.push( current.attr('data-product-json-key') );

            jQuery('#product_search_modal').modal('hide');

            find_duplicate( current.attr('data-product-json-key'), parent_row );
            get_total();
            jQuery('#new-order-book').trigger('AddRowEvent');

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
            var groupDesc = $('input[name="product_name[]"]');
            var groupPrice = $('input[name="amount[]"]');
            var groupItemIds = $('input[name="item_id[]"]');
                        
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
            $('input[name="data[ProductMeta][_price][0]"]').val(price_total);
            console.log(selected_products,chkArray);
        });
        
        
        
        jQuery(document).on( 'keypress', '.item-row td.bar-code input', function(e){
           // console.log(e);
            var current = jQuery(this);
            if( e.charCode == 13 ) {

                var parent_row = current.parent().parent();
                
                jQuery.ajax({

                    url: myBaseUrl+'admin/Orders/find_product_by_bar_code',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        bar_code: current.val(),
                        // item_id: parent_row.find('.item-id input').val()
                    },
                    beforeSend: function(){

                    },
                    error: function(a,b,c){

                    },
                    success: function(response){

                        if ( response.status == 1 ) {
                            console.log('heer');
                            
                            console.log(parent_row);
                            
                            parent_row.find('.item-id input').val(response.product_id);
                            parent_row.find('.product-name input').val(response.product_name);
                            parent_row.find('.rate input').val(response.rate);
                            parent_row.find('.quantity input').val(1);
                            parent_row.find('.igst input').val( response.igst * ( response.igst/100) );
                            parent_row.find('.cgst input').val(response.cgst * ( response.cgst/100) );
                            parent_row.find('.sgst input').val(response.sgst * ( response.sgst/100) );
                            parent_row.find('.amount input').val( response.rate * 1 );
                            parent_row.attr('data-product-json-key', response.product_name+'#'+response.product_id );

                            //products_array.push( parent_row.attr('data-product-json-key') );

                            find_duplicate( parent_row.attr('data-product-json-key'), parent_row );
                            get_total();

                        } else if( response.status == 2 || response.status == 0 ) {
                            current.addClass('active-row');
                            jQuery('#product_search_modal').modal('show');
                        }

                    }

                });

                return false;
            }

        });
});