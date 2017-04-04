{{ csrf_field() }}
cancel Message
<a href="javascript:ajaxLoad('busraj/list')" class="btn btn-danger"><i
                                class="glyphicon glyphicon-backward"></i>
                        Back</a>

                        <script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>