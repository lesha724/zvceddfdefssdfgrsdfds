$(document).ready(function(){

    $spinner1 = $('#spinner1');

    initTooltips();

    $(document).on('click', '.btn-retake', function(){

        var $that = $(this);

        var url = $that.parents('[data-url-retake]').data('url-retake');

        var uo1  = $that.data('uo1');
        var st1  = $that.data('st1');
        var sem1  = $that.data('sem1');
        var type  = $that.data('type');
        var gr1  = $that.data('gr1');

        var params = {
            st1   : st1,
            uo1   : uo1,
            sem1   : sem1,
            type   : type,
            gr1   : gr1,
        }

        $spinner1.show();

        $.ajax({
            url: url,
            data:params,
            dataType: 'json',
            success: function( data ) {
                if (!data.error) {
                    $('#modalBlock .modal-header h4').html(data.title);
                    $('#modalBlock #modal-content').html(data.html);
                    $('#modalBlock').modal('show');
                } else {
                    addGritter(data.html, tt.error, 'error');
                }
                $spinner1.hide();
            },
            error: function( data ) {
                addGritter('', tt.error, 'error');
                $spinner1.hide();
            }
        });
    });
});