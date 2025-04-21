@extends('master')
@section('content')
<main class="app-content">
 
  <div class="app-title" style="direction: ltr">
    <div>
      <h1><i class="bi bi-ui-checks"></i> الاعدادات العامه </h1>
      {{-- <p>Bootstrap default form components</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb" style="direction: rtl; font-size:14px">
      <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
      @foreach (Context::get('breadcrumbs') as $breadcrumb)
        <li class="breadcrumb-item">
          @if (request()->url() == $breadcrumb['url'])
          {{-- {{ $breadcrumb['url'] }} --}}
            <!-- العنصر النشط -->
            <span class="active">{{ $breadcrumb['label'] }}</span>
          @else
            <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
          @endif
        </li>
      @endforeach
    </ul>
  </div>
  
    <div class="row" style="direction: rtl">
      <div class="col-md-12" >
        <div class="tile">
          <h3 class="tile-title">نموذج اعدادات الشركه </h3>
          <div class="tile-body">
            <form action="{{ route('settings.store') }}" method="POST" class="form-control" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label class="form-label">اسم الشركه</label>
                    <input type="text" name="name" class="form-control" value="{{ $setting->name }}" placeholder="ادخل اسم الشركه">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              <div class="mb-3">
                <label class="form-label">اسم المالك</label>
                    <input type="text" name="owner" value="{{ $setting->owner }}" class="form-control" placeholder="ادخل اسم المالك">
                    @error('owner')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              <div class="mb-3">
                <label class="form-label">النشاط </label>
                    <input type="text" name="activity" value="{{ $setting->activity }}" class="form-control" placeholder="ادخل  النشاط">
                    @error('activity')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              <div class="mb-3">
                <label class="form-label">الرقم الضريبي </label>
                    <input type="text" name="tax_number" value="{{ $setting->tax_number }}" class="form-control" placeholder="ادخل  الرقم الضريبي">
                </div>
              <div class="mb-3">
                <label class="form-label"> الهاتف </label>
                    <input type="text" name="phone" value="{{ $setting->phone }}" class="form-control" placeholder="ادخل   الهاتف">
                </div> 
              <div class="mb-3">
                <label class="form-label"> العنوان </label>
                    <input type="text" name="address" value="{{ $setting->address }}" class="form-control" placeholder="ادخل العنوان">
                </div>
            
              <div class="mb-3">
                <label class="form-label"> لوجو الشركه </label>
                <input class="form-control" type="file" name="logo" placeholder=" ادخل الصوره ">
              </div>
              
             
              <div class="tile-footer">
                <button class="btn btn-primary" type="submit"><i class="bi bi-check-circle-fill me-2"></i>تسجيل</button>&nbsp;&nbsp;&nbsp;
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="clearix"></div>

    </div>
  </main>
@endsection