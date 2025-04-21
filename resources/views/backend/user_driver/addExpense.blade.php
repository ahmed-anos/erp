@extends('master')
@section('content')
<main class="app-content">
 
  <div class="app-title" style="direction: ltr">
    <div>
      <h1><i class="bi bi-ui-checks"></i> ادخال المصاريف</h1>
      {{-- <p>Bootstrap default form components</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb" style="direction: rtl; font-size:14px">
      <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
      @foreach (Context::get('breadcrumbs') as $breadcrumb)
        <li class="breadcrumb-item">
          @if (request()->url() == $breadcrumb['url'])
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
          <h3 class="tile-title">نموذج تسجيل مصروف جديد</h3>
          <div class="tile-body">
            <form action="{{ route('userDriver.store', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="number" hidden name="driver_id" value="{{ Auth::user()->driver_id }}">
              <div class="mb-3">
                <label class="form-label"> البيان</label>
                    <select name="expense_type" class="form-control" id="">
                        <option value="صيانه">صيانه</option>
                        <option value="كهرباء">كهرباء</option>
                        <option value="ديزل">ديزل</option>
                        <option value="قطع غيار">قطع غيار</option>
                        <option value="زيوت">زيوت</option>
                        <option value="راتب">راتب</option>
                        <option value="بنشر">بنشر</option>
                        <option value="تواير">تواير</option>
                        <option value="اخري">اخري</option>
                    </select>
                {{-- <input class="form-control" type="text" name="expense_type" placeholder=" ادخل نوع المصروف"> --}}
              </div>
              <div class="mb-3">
                <label class="form-label">المكان </label>
                <select name="expense_country" class="form-control" id="">
                  <option value="مصر">مصر</option>
                  <option value="السعوديه">السعوديه</option>
                  <option value="الكويت">الكويت</option>
                  <option value="قطر">قطر </option>
                  <option value="ليبيا">ليبيا</option>
                  <option value="اخري">اخري</option>
              </select>
                {{-- <input class="form-control" type="text" name="expense_price" placeholder=" ادخل السعر "> --}}
              </div>
              <div class="mb-3">
                <label class="form-label">سعر البيان</label>
                <input class="form-control" type="number" name="expense_price" placeholder=" ادخل السعر ">
              @error('expense_price')
                <p class="text-danger">من فضلك ادخل السعر</p>
              @enderror
              </div>
              <div class="mb-3">
                <label class="form-label"> صوره الفاتوره</label>
                <input class="form-control" type="file" name="expense_invoice" placeholder=" ادخل الصوره ">
              </div>
              <div class="mb-3">
                <label class="form-label"> تاريخ الصرف</label>
                <input class="form-control" value="{{date('Y-m-d')}}" type="date" name="expense_date" placeholder="YYYY-mm-dd">
                @error('expense_price')
                <p class="text-danger">من فضلك ادخل تاريخ الصرف</p>
              @enderror
              </div>
             
              <div class="tile-footer">
                <button class="btn btn-primary" type="submit"><i class="bi bi-check-circle-fill me-2"></i>تسجيل</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="bi bi-x-circle-fill me-2"></i>الغاء</a>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="clearix"></div>

    </div>
  </main>
@endsection