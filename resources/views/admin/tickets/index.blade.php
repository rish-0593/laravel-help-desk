<x-helpdesk::layouts.admin>
    <x-slot name="title">{{ __('Tickets') }}</x-slot>

    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Tickets') }}</h4>
                        </div>
                        <div class="card-body">
                            @includeIf('helpdesk::admin.tickets.filters')

                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Title') }}</th>
                                            <th>{{ __('Category') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('User') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <x-slot name="modals">
        @includeIf('helpdesk::admin.tickets.modals')
    </x-slot>

    <x-slot name="scripts">
        <script>
            const datatable_url = `{{ route('admin.tickets.index') }}`;
            const trash_url = `{{ route('admin.tickets.trash') }}`;
            const update_status_url = `{{ route('admin.tickets.update.status') }}`;
            const statuses = @json($statuses);
        </script>

        @includeIf('helpdesk::admin.tickets.datatable')
        @includeIf('helpdesk::admin.tickets.scripts')
    </x-slot>
</x-helpdesk::layouts.admin>
