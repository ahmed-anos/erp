@extends('master')

@section('content')
<main class="app-content" style="direction: rtl">

  <div class="row">
    <div class="col-12 col-sm-6 col-lg-3" style="padding:0 !important;">
      <div class="widget-small primary coloured-icon" style="margin:10px !important">
        <i class="icon bi bi-people fs-1"></i>
        <div class="info">
          <h4>العملاء</h4>
          <p><b>50</b></p>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-lg-3" style="padding:0 !important;">
      <div class="widget-small info coloured-icon" style="margin:10px !important">
        <i class="icon bi bi-heart fs-1"></i>
        <div class="info">
          <h4>الاقساط المتاخره</h4>
          <p><b>25</b></p>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-lg-3" style="padding:0 !important;">
      <div class="widget-small warning coloured-icon" style="margin:10px !important">
        <i class="icon bi bi-folder2 fs-1"></i>
        <div class="info">
          <h4>المصروفات الشهريه</h4>
          <p><b>10000</b></p>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-lg-3" style="padding:0 !important;">
      <div class="widget-small danger coloured-icon" style="margin:10px !important">
        <i class="icon bi bi-star fs-1"></i>
        <div class="info">
          <h4>اجمالي المتاخر</h4>
          <p><b>500</b></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-6" style="padding:0 !important;">
      <div class="tile" style="margin:10px !important">
        <h3 class="tile-title">المصروفات الشخصيه - النسبه الشهريه</h3>
        <div class="ratio ratio-16x9">
          <div id="salesChart"></div>
        </div>
      </div>
    </div>

    <div class="col-md-6" style="padding:0 !important;">
      <div class="tile" style="margin:10px !important">
        <h3 class="tile-title">نسبه سداد الاقساط مقابل المتاخر</h3>
        <div class="ratio ratio-16x9">
          <div id="supportRequestChart"></div>
        </div>
      </div>
    </div>
  </div>
  @php
    Context::push('breadcrumbs' ,['url'=>route('dashboard') ,'label'=>'الصفحه الرئيسيه']);
    Context::push('breadcrumbs' ,['url'=>route('userDriver.index') ,'label'=>'المصروفات ']);
    Context::push('breadcrumbs' ,['url'=>route('userDriver.create') ,'label'=>'تسجيل مصروف ']);
  @endphp

  {{-- @include('backend.user_driver.addExpense') --}}
</main>
@endsection

@section('add_footer')
  @parent
@endsection
