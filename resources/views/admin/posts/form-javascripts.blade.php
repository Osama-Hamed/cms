<script src="{{ asset('/cms/admin/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
<script src="{{ asset('/cms/admin/plugins/simple-mde/simplemde.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment-with-locales.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="{{ asset('/cms/admin/plugins/tag-editor/jquery.caret.min.js') }}"></script>
<script src="{{ asset('/cms/admin/plugins/tag-editor/jquery.tag-editor.min.js') }}"></script>
<script>
    $('input[name=tags]').tagEditor({ placeholder: 'tags'});
</script>

<script src="{{ asset('/cms/admin/js/custom.js') }}"></script>
<script>
    var simplemde1 = new SimpleMDE({element: $("#excerpt")[0]});
    var simplemde2 = new SimpleMDE({element: $("#body")[0]});

    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        showClear: true
    });

    $('#draft-btn').click(function (e) {
        $('#published_at').val('');
        $('#post-form').submit();
    });
</script>