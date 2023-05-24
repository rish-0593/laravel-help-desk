<script>
    $(document).ready(function() {
        let datatable = _initDatatable();

        $(document).on('click', '[data-modal-target]', function(){
            let target = $(this).data('modal-target');
            let __id = $(this).data('modal-id');

            if(__id != ''){
                let __name = $(this).closest('tr').find('.__name').text() ?? '';

                $('[name="id"]').val(__id);
                $('[name="name"]').val(__name);
            }

            $(target).modal('show');
        });

        $("#addOrUpdate").on('hide.bs.modal', function(){
            $('[name="id"]').val('');
            $('#add-update-module').trigger("reset");
        });

        $('#add-update-module').on('submit', function(e){
            e.preventDefault();

            const url = $(this).attr('action');
            const formData = new FormData($(this)[0]);

            $.ajax({
                url: url,
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
            })
            .done(function(response) {
                $('#addOrUpdate').modal('hide');
                datatable.ajax.reload();
            })
            .fail(function(error) {
                console.log( "error" );
            });
        });

        $(document).on('click', '[data-trash]', function(){
            let __id = $(this).attr('data-trash');

            $.ajax({
                url: trash_url,
                method: "POST",
                data: {
                    id: __id,
                },
            })
            .done(function(response) {
                datatable.ajax.reload();
            })
            .fail(function(error) {
                console.log( "error" );
            });
        });

        $(document).on('click', '[data-status]', function(){
            let __id = $(this).data('modal-id');

            $.ajax({
                url: update_status_url,
                method: "POST",
                data: {
                    id: __id,
                },
            })
            .done(function(response) {
                datatable.ajax.reload();
            })
            .fail(function(error) {
                console.log( "error" );
            });
        });
    });
</script>
