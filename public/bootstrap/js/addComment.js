/**
 * Created by ahmedhamdy on 4/3/16.
 */
$(function(){


    $('.delete_comment_button').on('click',function(){
        $(this).parent().remove();
        //alert($(this).index());

        var comment_id = $(this).parent().attr('comment_id');
        //alert(comment_id);

        $.ajax({
            'url':'/userexp/removecomment',
            'method':'POST',
            data:{
                'comment_id':comment_id
            },

            success:function(data){
            }

        });
    });

    $('.update_comment_button').on('click',function(){
        console.log($(this).parent().index());
        var comment_value = $(this).prev().prev().children().eq(1).text();

        $(this).prev().prev().children().eq(1).remove();
        var textarea = '<textarea rows="4" cols="60"></textarea>';

        $(this).prev().prev().append(textarea);
        $(this).prev().prev().children().eq(1).val(comment_value);

        var save_button = '<button class="btn btn-info save_comment_button btn-xs"><span class="glyphicon glyphicon-floppy-disk"></span></button>';

        $(this).hide();
        $(this).parent().append(save_button);

        $('.save_comment_button').on('click',function(){

            alert('Saving Comment');

            var new_comment_value = $(this).prev().prev().prev().children().eq(1).val();

            $(this).prev().show();
            $(this).prev().prev().prev().children().eq(1).remove();
            var comment = '<p class="comment_value">'+ new_comment_value +'</p>';
            $(this).prev().prev().prev().append(comment);

            var comment_id = ($(this).parent().attr('comment_id'));

            $.ajax({
                'url':'/userexp/editcomment',
                'method':'POST',
                data:{
                  'comment_id': comment_id,
                    'comment' : new_comment_value
                },

                success:function(data){
                    alert('Comment Edited Successfully');
                }

            });

            $(this).remove();

        });




    });

    $('#addComment_button').on('click',function(){

        var comment = $('#commentText').val().trim();
        var user_id = $('#user_id').val();
        var user_name = $('#user_name').val();
        console.log(user_id);
        var post_id = $('#post_id').val();
        var comment_section = $('#comments_section');

        console.log(comment);

        $.ajax({
            'url':'/userexp/addcomment',
            'method':'POST',
            data:{
                'comment':comment,
                'post_id':post_id,
                'user_id':user_id

            },
            success:function(data){

                var comment_id = JSON.parse(data);

                var new_comment = '<div comment_id ="'+comment_id['comment_id']+'" class="comment media"><a class="pull-left" href="#"><img class="media-object" src="http://placehold.it/64x64" alt=""></a><div class="media-body"><h4 class="media-heading">'+ user_name +' <small>August 25, 2014 at 9:30 PM</small> </h4><p class="comment_value">'+ comment +'</p></div> </div>';
                var delete_button = '<button class="btn btn-danger delete_comment_button btn-xs"><span class="glyphicon glyphicon-remove"></span></button>';
                var update_button = ' <button class="btn btn-success update_comment_button btn-xs"><span class="glyphicon glyphicon-edit"></span></button>'
                comment_section.append(new_comment);

                $('.comment').last().append(delete_button);
                $('.comment').last().append(update_button);

                $('.delete_comment_button').on('click',function(){
                    $(this).parent().remove();
                    //alert($(this).index());

                    var comment_id = $(this).parent().attr('comment_id');

                    $.ajax({
                        'url':'/userexp/removecomment',
                        'method':'POST',
                        data:{
                            'comment_id':comment_id
                        },

                        success:function(data){

                        }

                    });
                });

                $('.update_comment_button').on('click',function (){
                    console.log($(this).parent().index());
                    var comment_value = $(this).prev().prev().children().eq(1).text();

                    $(this).prev().prev().children().eq(1).remove();
                    var textarea = '<textarea rows="4" cols="60"></textarea>';

                    $(this).prev().prev().append(textarea);
                    $(this).prev().prev().children().eq(1).val(comment_value);

                    var save_button = '<button class="btn btn-info save_comment_button btn-xs"><span class="glyphicon glyphicon-floppy-disk"></span></button>';

                    $(this).hide();
                    $(this).parent().append(save_button);

                    $('.save_comment_button').on('click',function(){

                        alert('Saving Comment');

                        var new_comment_value = $(this).prev().prev().prev().children().eq(1).val();

                        $(this).prev().show();
                        $(this).prev().prev().prev().children().eq(1).remove();
                        var comment = '<p class="comment_value">'+ new_comment_value +'</p>';
                        $(this).prev().prev().prev().append(comment);

                        var comment_id = ($(this).parent().attr('comment_id'));

                        $.ajax({
                            'url':'/userexp/editcomment',
                            'method':'POST',
                            data:{
                                'comment_id': comment_id,
                                'comment' : new_comment_value
                            },

                            success:function(data){
                                alert('Comment Edited Successfully');
                            }

                        });

                        $(this).remove();

                    });
                });

                $('#commentText').val("");

            }
        });
    });
});
