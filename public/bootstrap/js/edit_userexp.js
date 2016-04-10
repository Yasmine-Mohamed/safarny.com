/**
 * Created by ahmedhamdy on 4/8/16.
 */
$(function(){
    var edit_post_button = $('#edit_user_exp');
    //var post_title = $('#post_title');
    //var post_desc = $('#post_desc');
    //var post_id = $('#post_id');


    edit_post_button.on('click',function(){

        var old_post_title_text = $(this).parent().parent().children().eq(1).text().trim();
        var old_post_desc_text = $(this).parent().parent().children().eq(10).text().trim();

        $('#post_title').children().eq(0).remove();
        $('#post_desc').children().eq(0).remove();

        var post_title_text_area = '<textarea id="edit_post_title" rows="4" cols="80"></textarea>';
        var post_desc_text_area = '<textarea id="edit_post_desc" rows="10" cols="80"></textarea>';

        $('#post_title').append(post_title_text_area);
        $('#post_desc').append(post_desc_text_area);
        $('#edit_post_title').val(old_post_title_text);
        $('#edit_post_desc').val(old_post_desc_text);


        var save_user_exp_button = '<span>  </span><button class="btn btn-info save_comment_button"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>';

        $(this).hide();
        $(this).parent().append(save_user_exp_button);

        $('.save_comment_button').on('click',function(){

            alert("Saving Experience");

            console.log($('#edit_post_title').val());
            console.log($('#edit_post_desc').val());

            var new_post_title_value = $('#edit_post_title').val();
            var new_post_desc_value = $('#edit_post_desc').val();

            $(this).parent().children().eq(2).show();

            $('#post_title').children().eq(0).remove();
            $('#post_desc').children().eq(0).remove();


            $('#post_title').append('<h1>'+ new_post_title_value +'</h1>');
            $('#post_desc').append('<p class="lead">'+ new_post_desc_value +'</p>');

            $.ajax({

                'url':'/userexp/editexp',
                'method':'POST',
                data:{
                    'post_id': $('#post_id').val(),
                    'post_title' : new_post_title_value,
                    'post': new_post_desc_value
                },

                success:function(data){
                    alert('Comment Edited Successfully');
                }

            });

            $(this).remove();
        });

    });


});