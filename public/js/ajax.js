
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.edit').click(function(){
        $('.error').hide();
        let id = $(this).data('id');
        //Edit
        $.ajax({
            url : 'category/'+id+'/edit',
            dataType : 'json',
            type : 'get',
            success :function($result){
                console.log($result);
                $('.name').val($result.name);
                $('.title').text($result.name);
                // if($result.status == 1){
                //     $('.ht').attr('selected','selected');
                // }else{
                //     $('.kht').attr('selected','selected');
                // }
            }
        });
        $('.update').click(function(){
            let ten = $('.name').val();
            let parent_id = $('.parent_id').val();
            console.log(parent_id);
            $.ajax({
                url : 'category/'+id,
                data : {
                    name : ten,
                    parent_id : parent_id
                },
                type : 'put',
                dataType : 'json',
                success : function($result){
                    console.log($result);

                        $('#edit').modal('hide');
                        location.reload();


                }
            });
        });
    });
    //Delete category
    $('.delete').click(function(){
        let id = $(this).data('id');

        $('.del').click(function(){
            console.log(id);
            $.ajax({
                url : 'category/'+id,
                type : 'delete',
              //  method:'delete',
                success : function($result){
                    //console.log(1111111111111)
                    // toastr.success($result.success, 'Thông báo', {timeOut: 5000});
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });
    });

});



