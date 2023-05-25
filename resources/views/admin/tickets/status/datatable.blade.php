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
                    name: 'name',
                    data: function ( d ) {
                        return `<span class="__name">${d.name}</span>`;
                    },
                    orderable: false
                },
                {
                    name: 'status',
                    data: function ( d ) {
                        return `
                            <span class="__status">
                                <div class="pretty p-switch p-fill">
                                    <input type="checkbox" ${d.status ? 'checked' : ''} data-status data-modal-id="${ d.id }">
                                    <div class="state p-success">
                                        <label></label>
                                    </div>
                                </div>
                            </span>
                        `;
                    },
                    orderable: false
                },
                {
                    name: 'action',
                    data: function ( d ) {
                        let html = `
                            <a href="javascript:void(0);" data-modal-target="#addOrUpdate" data-modal-id="${ d.id }">
                                <i class="fas fa-edit" style="font-size: 15px;"></i>
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
