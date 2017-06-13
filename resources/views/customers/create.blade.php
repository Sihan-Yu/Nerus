@extends('layouts.app')

@include('layouts.parts.page_title', ['title' => __('crm.crm'), 'description' => __('crm.crm_desc')])
@include('layouts.parts.breadcrumbs', ['breadcrumbs' => [0 => ['text' => __('crm.crm'), 'icon' => 'fa fa-address-book', 'route' => route('crm.index'), 'active' => 1], 1 => ['text' => __('crm.add_new_customer'), 'icon' => 'fa fa-plus', 'route' => route('crm.company.create'), 'active' => 1]]])

@section('content')

    <div class="row">
        <form action="{{ route('crm.company.create') }}" method="post">
            {{ csrf_field() }}
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name_en">{{ __('crm.name_en') }}</label>
                    <input type="text" class="form-control" id="name_en" name="name_en">
                    <small class="text-muted">{{ __('crm.check_if_name_is_english') }}</small>
                </div>
                <div class="form-group">
                    <label for="vat_number"><input type="checkbox" id="has_vat">&nbsp; {{ __('crm.has_vat') }}</label>
                    <small class="text-muted">{{ __('crm.vat_meaning') }}</small>
                    <input type="text" class="form-control" id="vat_number" name="vat_number" disabled="disabled">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name_en">{{ __('crm.name_cn') }}</label>
                    <input type="text" class="form-control" id="name_cn" name="name_cn">
                    <small class="text-muted">{{ __('crm.check_if_name_is_chinese') }}</small>
                </div>
                <div class="form-group">
                    <label for="country">{{ __('crm.country') }}</label>
                    <select class="form-control select2 width" id="country" name="country">
                        @foreach ($countries as $country)
                            <option value="{{ strtolower($country->code) }}"><span><img src="/images/flags/{{ strtolower($country->code) }}.png" /></span>{{ __('countries.'.$country->code) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    <script src="/plugins/iCheck/icheck.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function () {

            $('.select2').select2();

            $('#has_vat').iCheck({
                checkboxClass: 'icheckbox_square-green'
            }).on('ifChecked', function () {
                $('#vat_number').prop('disabled', '');
            }).on('ifUnchecked', function () {
                $('#vat_number').prop('disabled', 'disabled');
            });

        });

    </script>
@endsection