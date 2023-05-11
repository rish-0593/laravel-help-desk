<x-helpdesk::layouts.guest>
    <x-slot name="title">{{ __('Raise a Ticket') }}</x-slot>
    <x-slot name="styles">
        <style>
            .em-error{
                color: red;
                padding-left: 5px;
            }
        </style>
    </x-slot>

    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>{{ __('Raise a Ticket') }}</h4>
                        </div>

                        <div class="card-body px-5">
                            <form id="ticket-module" method="POST" action="{{ route('ticket') }}">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" class="form-control" name="name" autofocus>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="mobile">Mobile</label>
                                        <input id="mobile" type="text" class="form-control" name="mobile">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email">
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="category" class="d-block">Category</label>
                                        <select id="category" class="form-control" name="category">
                                            <option value="">Select</option>
                                            @foreach ($categories ?? [] as $category)
                                                <option value="{{ Crypt::encrypt($category->id) }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="title" class="d-block">Title</label>
                                        <input id="title" type="text" class="form-control" name="title">
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="description" class="d-block">Description</label>
                                        <textarea id="description" style="height: 120px;" class="form-control" name="description"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Submit
                                    </button>
                                </div>
                            </form>

                            <div id="thank-you-tab" class="d-none">
                                <h5 class="mt-0 mb-1 text-center my-5">{{ __('Ticket submitted successfully') }}!</h5>
                                <div class="mb-4 text-muted text-center">
                                    Create new <a href="javascript:void(0);" onclick="window.location.reload();">Ticket</a>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 text-muted text-center d-none">
                            Check your old <a href="javascript:void(0);">Tickets</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-slot name="scripts">
        <script>
            $(document).ready(function() {
                $("#ticket-module").validate({
                    errorElement: "em",
                    errorClass: "em-error",
                    rules: {
                        name: {
                            required: true,
                        },
                        mobile: {
                            required: true,
                        },
                        email: {
                            required: true,
                        },
                        category: {
                            required: true,
                        },
                        status: {
                            required: true,
                        },
                        title: {
                            required: true,
                        },
                        description: {
                            required: true,
                        },
                    }
                });

                $('#ticket-module').submit(function(e) {
                    e.preventDefault();

                    const form = $(this);
                    const formData = new FormData(form[0]);

                    $.ajax({
                        url: form.attr('action'),
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            form.addClass('d-none');
                            $('#thank-you-tab').removeClass('d-none');
                            console.log(response);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                });
            });
        </script>
    </x-slot>
</x-helpdesk::layouts.guest>
