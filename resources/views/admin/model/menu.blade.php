@extends('admin')

{{-- @section('breadcrumbs')
{!! Breadcrumbs::render($breadcrumb, @$item) !!}
@endsection --}}

@section('title', 'Справочники')
@section('content_header')
<h1>Справочники</h1>
@stop
@section('content')


<div class="row">

    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>TODO</h3>
                {{-- <h3>{{ @$price_segment_count }}</h3> --}}
                <h4>Валюты</h4>
            </div>
            <div class="icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <a href="{{ route('admin.currency.index') }}" class="small-box-footer">
            Перейти <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>




    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>TODO</h3>
                {{-- <h3>{{ @$product_style_count }}</h3> --}}
                <h4>Курсы валют</h4>
            </div>
            <div class="icon">
                <i class="fas fa-newspaper"></i>
            </div>
            {{-- <a href="{{ route('admin.currency_rate.index') }}" class="small-box-footer">
            Перейти <i class="fas fa-arrow-circle-right"></i>
            </a> --}}
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>TODO</h3>
                {{-- <h3>{{ @$vendor_count }}</h3> --}}
                <h4> Производители</h4>
            </div>
            <div class="icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <a href="{{ route('admin.vendor.index') }}" class="small-box-footer">
            Перейти <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>TODO</h3>
                {{-- <h3>{{ @$vendor_count }}</h3> --}}
                <h4> Производители АНАЛОГОВ </h4>
            </div>
            <div class="icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <a href="{{ route('admin.analog-vendor.index') }}" class="small-box-footer">
            Перейти <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>TODO</h3>
                {{-- <h3>{{ @$product_count }}</h3> --}}
                <h4> Товары </h4>
            </div>
            <div class="icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <a href="{{ route('admin.product.index') }}" class="small-box-footer">
                Перейти <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>TODO</h3>
                {{-- <h3>{{ @$product_count }}</h3> --}}
                <h4> Категории </h4>
            </div>
            <div class="icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <a href="{{ route('admin.category.index') }}" class="small-box-footer">
                Перейти <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>

    </div>
</div>
@endsection

@section('scripts')
@parent
@endsection
