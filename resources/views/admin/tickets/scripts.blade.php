<script>
    $(document).ready(function() {
        let datatable = _initDatatable();

        $(document).on('click', '[data-modal-target]', function(){
            let target = $(this).data('modal-target');
            let __data = $(this).data('modal-data');

            if(__data != ''){
                __data = JSON.parse(atob(__data));

                $('[data-title]').text(__data.title ?? '--');
                $('[data-status]').text(__data.ticket_status ?? '--');
                $('[data-name]').text(__data.ticket_user?.name ?? '--');
                $('[data-mobile]').text(__data.ticket_user?.mobile ?? '--');
                $('[data-email]').text(__data.ticket_user?.email ?? '--');
                $('[data-description]').text(__data.description ?? '--');
            }

            $(target).modal('show');
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
    });
</script>
