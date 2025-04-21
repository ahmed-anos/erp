@extends('frontend.master')
@section('content')
<main class="app-content" style="direction: rtl">
     
    <div class="row">
      {{-- <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon bi bi-people fs-1"></i>
          <div class="info">
            <h4>العملاء</h4>
            <p><b>50</b></p>
          </div>
        </div>
      </div> --}}
      {{-- <div class="col-md-6 col-lg-3">
        <div class="widget-small info coloured-icon"><i class="icon bi bi-heart fs-1"></i>
          <div class="info">
            <h4>الاقساط المتاخره</h4>
            <p><b>25</b></p>
          </div>
        </div>
      </div> --}}
      <div class="col-md-6 col-lg-3">
        <div class="widget-small warning coloured-icon"><i class="icon bi bi-folder2 fs-1"></i>
          <div class="info">
            <h4>المصروفات الشهريه</h4>
            <p><b>10000</b></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="widget-small danger coloured-icon"><i class="icon bi bi-star fs-1"></i>
          <div class="info">
            <h4> عدد الدروبات</h4>
            <p><b>5</b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="tile">
          <h3 class="tile-title">المصروفات الشخصيه - النسبه الشهريه</h3>
          <div class="ratio ratio-16x9">
            <div id="salesChart"></div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="tile">
          <h3 class="tile-title">نسبه سداد الاقساط مقابل المتاخر</h3>
          <div class="ratio ratio-16x9">
            <div id="supportRequestChart"></div>
          </div>
        </div>
      </div>
    </div>
  </main>

@endsection
@section('add_footer')
 @parent
