jQuery(document).ready(function () {
    function createProduct(type,result){
        let product = '';
        product+='<li class="product">';
        product+='<div class="product-container">';
        product+='<div class="product-image">';
        product+='<a href="product-detail/'+result.id+'"><img style="height: 221px" src="'+result.images[0].image_path+'" alt="Product"></a>';
        product+='<div class="group-tool-button" style="left: 67%">';
        product+='<a class="withlist wishlist" id-product="'+result.id+'">withlist</a>';
        product+='<a class="cart" href="#">cart</a>';
        product+='</div>';
        product+='<a href="product-detail/'+result.id+'" class="quick-view">Qick view</a>';
        if(type==1) {
            product += '<span class="status-new"></span>';
        }
        product+='</div>';
        product+='<div class="product-info">';
        product+='<h5 class="product-name"><a href="product-detail/'+result.id+'">'+result.name+'</a></h5>';
        if(type == 2){
            product+='<div><i class="fas fa-eye" style="margin-top:5px "></i><strong>'+result.view+'</strong></div>';
        }
        product+='<div class="product-rating">';
        product+='<div style="color: black">'+result.customer.name+'</div>';
        product+='</div>';
        product+='<div class="box-price">';
        if(result.status == 0){
            product+='<span class="product-price">Giá: '+(result.price)+'đ</span>';
        }
        else{
            product+='<span class="product-price" style="color: #2fa360">Giá:'+result.price+'đ</span>';
        }
        product+='</div>';
        product+='</div>';
        product+='</div>';
        product+='</li>';
        return product;
    }
    jQuery('.post-latest').click(function () {
        let category_id = jQuery(this).attr('id_cate');
        let token = jQuery('input[name=_token]').val();
        jQuery.ajax({
            url:'porduct-latest',
            method:'post',
            data:{'category_id':category_id, "_token": token}
        }).done(function (result) {
            let buy ='';
            let sell ='';
            for(let i = 0; i<result.length; i++){
                if(result[i].status == 0){
                    sell+=createProduct(1,result[i]);
                }
                else if(result[i].status == 1){
                   buy+=createProduct(1,result[i]);
                }
            }
            if(sell==''){
                sell='<strong style="padding:20px;color:red">Không có sản phẩm nào đang bán</strong>'
            }
            if(buy==''){
                buy='<strong style="padding:20px;color:#2fa360">Không có ai đang mua</strong>'
            }

            jQuery('#latest-product-sell').html(sell);
            jQuery('#latest-product-buy').html(buy);
        })
    })
    jQuery('.post-care').click(function () {
        let category_id = jQuery(this).attr('id_cate');
        console.log(category_id)
        let token = jQuery('input[name=_token]').val();
        jQuery.ajax({
            url:'porduct-care',
            method:'post',
            data:{'category_id':category_id, "_token": token}
        }).done(function (result) {
            console.log(result)
            let buy ='';
            let sell ='';
            for(let i = 0; i<result.length; i++){

                if(result[i].status == 0){
                    sell+=createProduct(2,result[i]);
                }
                else if(result[i].status == 1){
                    buy+=createProduct(2,result[i]);
                }
            }
            if(sell==''){
                sell='<strong style="padding:20px;color:red">Không có sản phẩm nào đang bán</strong>'
            }
            if(buy==''){
                buy='<strong style="padding:20px;color:#2fa360">Không có ai đang mua</strong>'
            }

            jQuery('#care-product-sell').html(sell);
            jQuery('#care-product-buy').html(buy);
        })
    })
})
