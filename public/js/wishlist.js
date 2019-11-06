jQuery(document).ready(function () {

    let token = jQuery('input[name=_token]').val();
    jQuery('.wishlist').click(function () {
        let product_id = jQuery(this).attr('id-product');
        jQuery.ajax({
            url:'wishlist',
            method:'post',
            data:{'product_id':product_id, "_token": token}
        }).done(function (result) {
            console.log(result)
            if(result == -1){
                jQuery("#modal_1").modal();
            }
            else if(result == 0){
                jQuery("#modal_2").modal();
            }
            else{
                let html ='';
                html+='<li class="product-info" id="wishlist-'+result.id+'">';
                html+='<div class="p-left">';
                html+='<a style="cursor: pointer" id-product="'+result.id+'" class="remove_link remove-wishlist-online" ></a>';
                html+='<a style="padding-left: 16px" href="product-detail/'+result.id+'">';
                if((result.images.length>0))
                    html+='<img class="img-responsive" width="80%" src="'+result.images[0].image_path+'" alt="p10">';
                else
                    html+='<img id="product-zoom" height="85px" src="uploads/product_images/no-image.jpg" data-zoom-image="uploads/product_images/no-image.jpg"/>';
                html+='</a>';
                html+='</div>';
                html+='<div class="p-right">';
                html+='<strong class="p-name">'+result.name+'</strong>';
                html+='<div>';
                html+='<span style="color: red">Giá: '+(result.price)+'</span>';
                html+='</div>';
                if(result.status == 0)
                    html+='<div><strong style="color: red">Cần bán</strong></div>';
                else
                    html+='<strong style="color: #2fa360">Cần mua</strong>';

                html+='<i>Nguời đăng: '+result.customer.name+'</i>';
                html+='</div>';
                html+='</li>';
                jQuery('#list-wishlist').append(html);
                let upCount = parseInt(jQuery('#count-wishlist').html())+1;
                jQuery('#count-wishlist').html(upCount);
                jQuery("#modal_3").modal();
            }
        })
    })
    jQuery('.remove-wishlist-online').click(function () {
        let product_id = jQuery(this).attr('id-product');
        console.log(product_id);
        jQuery.ajax({
            url:'delete-wishlist',
            method:'post',
            data:{'product_id':product_id, "_token": token}
        }).done(function (result) {
            let downCount = parseInt(jQuery('#count-wishlist').html())-1;
            jQuery('#count-wishlist').html(downCount);
            let id_wishlist = 'wishlist-'+product_id;
            document.getElementById(id_wishlist).remove();
        })
    })
})
