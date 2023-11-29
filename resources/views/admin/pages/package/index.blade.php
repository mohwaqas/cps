@extends('admin.master', ['menu' => 'package'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div id="table-url" data-url="{{ route('admin.package_list') }}"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{__('Package')}}</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Package')}}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="customers__area bg-style mb-30">
                <div class="customers__table">
                    <table id="PackageTable" class="row-border data-table-filter table-style">
                        <thead>
                        <tr>
                            <th>{{ __('Package Name')}}</th>
                            <th>{{ __('Range From ($)')}}</th>
                            <th>{{ __('Range To ($)')}}</th>
                            <th>{{ __('Quantity')}}</th>
                            <th>{{ __('Discount (%)')}}</th>
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

    @foreach ($package as $packg)
        <div class="modal fade" id="editModal{{$packg->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalTitle{{$packg->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white" id="editModalLongTitle">{{__('Edit')}}</h5>
                        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form enctype="multipart/form-data" method="POST" action="{{route('admin.update_package', encrypt($packg->id))}}">
                        <div class="modal-body">
                            @csrf
                            <div class="input__group mb-25">
                                <label>{{__('Name')}}</label>
                                <input type="text" name="name" placeholder="{{__('Name')}}" value="{{$packg->name}}">
                            </div>
                            <div class="input__group mb-25">
                                <label>{{ __('Range From ($)')}}</label>
                                <input type="number" name="range_from" placeholder="{{__('Range From ($)')}}" value="{{$packg->range_from}}">
                            </div>
                            <div class="input__group mb-25">
                                <label>{{ __('Range To ($)')}}</label>
                                <input type="number" name="range_to" placeholder="{{__('Range To ($)')}}" value="{{$packg->range_to}}">
                            </div>
                            <div class="input__group mb-25">
                                <label>{{ __('Quantity')}}</label>
                                <input type="number" name="quantity" placeholder="{{__('Quantity')}}" value="{{$packg->quantity}}">
                            </div>
                            <div class="input__group mb-25">
                                <label>{{ __('Discount (%)')}}</label>
                                <input type="number" name="discount_percentage" placeholder="{{__('Discount (%)')}}" value="{{$packg->discount_percentage}}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger me-0" data-bs-dismiss="modal">{{__('Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Update')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    @push('post_scripts')
        <script src="{{asset('backend/js/admin/datatables/package.js')}}"></script>
        <!-- Page level custom scripts -->
    @endpush
@endsection
