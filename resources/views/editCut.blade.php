
@extends('layouts.app')

@section('subTitle', 'Edit Customers')
@section('mainContent')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Customers</h1>
        </div>



        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show w-50" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif



    @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show w-50">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div id="ajax-alert" class="alert alert-dismissible fade show w-50" style="display: none">

        </div>

<form id="customer-form" class="mb-5" method="post" action="{{ route('update_customer',$customer->id) }}">
@csrf
    <input type="hidden" name="_method" value="PUT">
<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control w-50" id="name" name="name" value="{{$customer->name}}">
</div>

<div class="form-group">
    <label for="email">Email address:</label>
    <input type="text" class="form-control w-50" id="email" name="email" value="{{ $customer->email }}">
</div>

<div class="form-group">
    <label for="password"> New Password:</label>
    <input type="password" class="form-control w-50" id="password" name="password">
</div>

<div class="form-group">
    <label for="password_confirmation">Confirm password:</label>
    <input type="password" class="form-control w-50" id="password_confirmation"
           name="password_confirmation">
</div>
<a href="{{route('customers')}}" class="btn btn-dark">Back</a>
<button id="submit-btn" type="submit" class="btn btn-primary"><span data-feather="check"></span> update
</button>
</form>
@endsection

        @section('pageScripts')
            <script type="text/javascript">
                $('#submit-btn').on('click', function (e) {
                    e.preventDefault();

                    $.ajax({
                        type: 'post',
                        url: '{{ route('update_customer',$customer->id) }}',
                        data: $('#customer-form').serialize(),
                        success: function (data) {
                            if (data.error) {
                                $('#ajax-alert').removeClass('alert-success').addClass('alert-danger').html(data.error).show();
                            } else {
                                $('#customer-form').trigger('reset');
                                $('#ajax-alert').removeClass('alert-danger').addClass('alert-success').html(data.success).show();
                                /* TODO: refresh customers table */
                            }
                        },
                        complete: function () {
                            setTimeout(function () {
                                $('#ajax-alert').hide();
                            }, 10000);
                        }
                    });
                });
            </script>
@endsection
