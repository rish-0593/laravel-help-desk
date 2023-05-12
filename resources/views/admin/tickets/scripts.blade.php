<script>
    $(document).ready(function() {
        let datatable = _initDatatable();

        $(document).on('click', '[data-modal-target]', function(){
            let target = $(this).data('modal-target');
            $(target).modal('show');
        });

        $('#viewTicketModal').on('shown.bs.modal', function(e) {
            let __data = $('[data-modal-target="#viewTicketModal"]').data('modal-data');

            if(__data != ''){
                __data = JSON.parse(atob(__data));

                $(this).find('[data-title]').text(__data.title ?? '--');
                $(this).find('[data-status]').text(__data.ticket_status?.name ?? '--');
                $(this).find('[data-name]').text(__data.ticket_user?.name ?? '--');
                $(this).find('[data-mobile]').text(__data.ticket_user?.mobile ?? '--');
                $(this).find('[data-email]').text(__data.ticket_user?.email ?? '--');
                $(this).find('[data-description]').text(__data.description ?? '--');
            }
        }).on('hide.bs.modal', function(){
            $(this).find('[data-title], [data-status], [data-name], [data-mobile], [data-email], [data-description]').text('--');
        });

        $('#statusModal').on('shown.bs.modal', function(e) {
            let _elm = $('[data-modal-target="#statusModal"]');
            let __data = _elm.data('modal-data');

            if(__data != ''){
                $(this).find('[data-title]').text('Change Status');

                const __status = JSON.parse(atob(__data));
                const __select = $(this).find('[name="status"]');
                const __selected = _elm.data('modal-selected');
                __select.attr('data-id', _elm.data('modal-id'));

                __status.forEach((v) => {
                    if(__selected != v.id) {
                        __select.append(`<option value="${v.id}">${v.name}</option>`);
                    }
                });
            }
        }).on('hide.bs.modal', function(){
            $(this).find('[data-title]').text('--');
            $(this).find('[name="status"] option:not([value=""])').remove();
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

        $(document).on('change', '[name="status"]', function(){
            let __id = $(this).attr('data-id');
            let __status = $(this).val();

            $.ajax({
                url: update_status_url,
                method: "POST",
                data: {
                    id: __id,
                    status: __status,
                },
            })
            .done(function(response) {
                $('#statusModal').modal('hide');
                datatable.ajax.reload();
            })
            .fail(function(error) {
                console.log( "error" );
            });
        });
    });
</script>
