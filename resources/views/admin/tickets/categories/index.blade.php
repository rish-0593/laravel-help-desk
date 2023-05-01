<x-helpdesk::layouts.admin>
    <x-slot name="title">{{ __('Categories') }}</x-slot>

    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Categories') }}</h4>
                            <div class="card-header-form">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-primary" data-modal-target="#addOrUpdate" data-modal-id="">Add</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @includeIf('helpdesk::admin.tickets.categories.filters')

                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Status') }}</th>
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
        @includeIf('helpdesk::admin.tickets.categories.modals')
    </x-slot>

    <x-slot name="scripts">
        <script>
            const datatable_url = `{{ route('admin.tickets.categories.index') }}`;
            const trash_url = `{{ route('admin.tickets.categories.trash') }}`;
        </script>

        @includeIf('helpdesk::admin.tickets.categories.datatable')
        @includeIf('helpdesk::admin.tickets.categories.scripts')
    </x-slot>
</x-helpdesk::layouts.admin>
