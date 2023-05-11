<script>
    function _initDatatable() {
        let datatable = $('#datatable').DataTable({
            lengthMenu: [
                [50, 100],
                [50, 100],
            ],
            pageLength: 50,
            processing: true,
            serverSide: true,
            searching: false,
            ajax: {
                url: datatable_url,
                type: "POST",
                data: function ( d ) {
                    d._token = "{{ csrf_token() }}";
                },
            },
            columns: [
                {
                    name: 'title',
                    data: function ( d ) {
                        return `<span class="__title">${d.title}</span>`;
                    },
                    orderable: false
                },
                {
                    name: 'ticket_category',
                    data: function ( d ) {
                        return `<span class="__ticket_category">${d.ticket_category}</span>`;
                    },
                    orderable: false
                },
                {
                    name: 'ticket_status',
                    data: function ( d ) {
                        return `<span class="__ticket_status badge badge-primary">${d.ticket_status}</span>`;
                    },
                    orderable: false
                },
                {
                    name: 'ticket_user',
                    data: function ( d ) {
                        return `<span class="__ticket_user">${d.ticket_user?.mobile}</span>`;
                    },
                    orderable: false
                },
                {
                    name: 'action',
                    data: function ( d ) {
                        let html = `
                            <a href="javascript:void(0);" data-modal-target="#viewTicketModal" data-modal-data="${ btoa(JSON.stringify(d)) }">
                                <i class="fas fa-eye" style="font-size: 15px;"></i>
                            </a>

                            <a href="javascript:void(0);" data-trash="${ d.id }">
                                <i class="fas fa-trash" style="font-size: 15px;"></i>
                            </a>
                        `;

                        return html;
                    },
                    orderable: false,
                }
            ],
        });

        return datatable;
    };
</script>
