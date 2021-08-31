jQuery(document).ready(function($){
    $('#button').on('click', function(e){
        e.preventDefualt;

        $.ajax({
            url: lucidicatheme_ajax_script.ajaxurl,
            data: {
                'action': 'lucidicatheme_ajax_example',
                'nonce' : lucidicatheme_ajax_script.nonce,
                'string_one': lucidicatheme_ajax_script.string_old,
                'string_two': lucidicatheme_ajax_script.string_new,
            },
            seccuess: function(data){
                $('#car_content').append(data);
            },
            error: function(errorThrow){
                console.log(errorThrow)
            }
        });
    });
});