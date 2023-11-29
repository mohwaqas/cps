@extends('admin.master', ['menu' => 'users', 'submenu' => 'customer_list'])
@section('title', isset($title) ? $title : '')
@section('content')

    <div id="table-url" data-url="{{ route('admin.customer_list') }}"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{__('Customer List')}}</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Admin')}}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <form id="search-form">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="input__group mb-25">
                            <select class="form-control" id="package_id" name="package_id">
                                <option value="0">Filter Package</option>
                                @foreach($packages as $package)
                                    <option value="{{ $package->id }}"> {{ $package->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-blue">Filter</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <div class="customers__area bg-style mb-30">
                <div class="customers__table">
                    <table id="BlogTable" class="row-border data-table-filter table-style">
                        <thead>
                        <tr>
                            <th>{{ __('Name')}}</th>
                            <th>{{ __('Email')}}</th>
                            <th>Phone</th>
                            <th>{{ __('Current Package')}}</th>
                            <th>{{ __('Orders')}}</th>
                            <th>{{ __('Approve')}}</th>
                            <th>{{ __('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->

    @foreach ($customers as $customer)
        <div class="modal fade bd-example-modal-sm" id="changePackageModal{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="changeeModalTitle{{$customer->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white" id="viewModalLongTitle">{{__('Change Customer Package')}}</h5>
                        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form enctype="multipart/form-data" method="POST" action="{{route('admin.customer_package_change', $customer->id)}}">
                    <div class="modal-body">
                        @csrf
                        <div class="input__group mb-25">
                            <label>Package</label>
                            <select name="package_id" id="package_id" class="form-select">
                                <option value="">Select Package</option>
                                @foreach($packages as $package)
                                    <option value="{{ $package->id }}"> {{ $package->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger small me-2" data-bs-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary small">{{ __('Update')}}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="sendEmailModal{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="changeeModalTitle{{$customer->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white">{{__('Send Email to Customer')}}</h5>
                        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form enctype="multipart/form-data" method="POST" action="{{route('admin.send_email_to_customer', $customer->id)}}">
                    <div class="modal-body">
                        @csrf
                        <div class="input__group mb-25">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="mt-2 ml-4">Email To</label>
                                </div>
                                <div class="col-lg-8"> 
                                    <input type="email" id="email" name="email" class="w-100" value="{{$customer->email}}" readonly>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-4">
                                    <label class="mt-2 ml-4">Subject</label>
                                </div>
                                <div class="col-lg-8"> 
                                    <input type="text" id="subject" name="subject" class="w-100" value="">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-4">
                                    <label class="mt-2 ml-4">Body</label>
                                </div>
                                <div class="col-lg-8"> 
                                    <textarea name="body" id="body" class="form-control" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger small me-2" data-bs-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary small">{{ __('Send')}}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @push('post_scripts')
        <script src="{{asset('backend/js/admin/datatables/customer-list.js')}}"></script>
        <!-- Page level custom scripts -->
    @endpush
@endsection
