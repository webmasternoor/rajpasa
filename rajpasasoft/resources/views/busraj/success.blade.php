{{ csrf_field() }}
Success Message
<a href="javascript:ajaxLoad('busraj/list')" class="btn btn-danger"><i
        class="glyphicon glyphicon-backward"></i>
Back</a>
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>
<script type="text/javascript">
    window.location.replace("http://localhost/rajpasa/rajpasasoft/public/busraj/success156");
</script>