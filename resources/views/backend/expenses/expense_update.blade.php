@extends('master')
@section('content')
<main class="app-content">
 

  <div class="app-title" style="direction: ltr">
    <div>
      <h1><i class="bi bi-ui-checks"></i> استعلام المصاريف</h1>
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
          <h3 class="tile-title">نموذج تعديل مصروف </h3>
          <div class="tile-body">
            <form action="{{ route('expense.update' ,$expense->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              {{-- <div class="mb-3">
                <label class="form-label">السائق</label>
                <select name="driver_id" id="" class="form-control">
                    @foreach ($allDrivers as $driver)
                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                    @endforeach
                </select>
              </div> --}}
              <div class="mb-3">
                <label class="form-label">البيان</label>
                <select name="expense_type" class="form-control">
                    <option value="صيانه" {{ $expense->expense_type == 'صيانه' ? 'selected' : '' }}>صيانه</option>
                    <option value="كهرباء" {{ $expense->expense_type == 'كهرباء' ? 'selected' : '' }}>كهرباء</option>
                    <option value="ديزل" {{ $expense->expense_type == 'ديزل' ? 'selected' : '' }}>ديزل</option>
                    <option value="قطع غيار" {{ $expense->expense_type == 'قطع غيار' ? 'selected' : '' }}>قطع غيار</option>
                    <option value="زيوت" {{ $expense->expense_type == 'زيوت' ? 'selected' : '' }}>زيوت</option>
                    <option value="راتب" {{ $expense->expense_type == 'راتب' ? 'selected' : '' }}>راتب</option>
                    <option value="بنشر" {{ $expense->expense_type == 'بنشر' ? 'selected' : '' }}>بنشر</option>
                    <option value="تواير" {{ $expense->expense_type == 'تواير' ? 'selected' : '' }}>تواير</option>
                    <option value="اخري" {{ $expense->expense_type == 'اخري' ? 'selected' : '' }}>اخري</option>
                </select>
            </div>
            
              <div class="mb-3">
                <label class="form-label">المكان </label>
                <select name="expense_country" class="form-control">
                    <option value="مصر" {{ $expense->expense_country == 'مصر' ? 'selected' : '' }}>مصر</option>
                    <option value="السعوديه" {{ $expense->expense_country == 'السعوديه' ? 'selected' : '' }}>السعوديه</option>
                    <option value="الكويت" {{ $expense->expense_country == 'الكويت' ? 'selected' : '' }}>الكويت</option>
                    <option value="قطر" {{ $expense->expense_country == 'قطر' ? 'selected' : '' }}>قطر</option>
                    <option value="ليبيا" {{ $expense->expense_country == 'ليبيا' ? 'selected' : '' }}>ليبيا</option>
                    <option value="اخري" {{ $expense->expense_country == 'اخري' ? 'selected' : '' }}>اخري</option>
                </select>
            </div>
            
              <div class="mb-3">
                <label class="form-label">سعر البيان</label>
                <input class="form-control" type="number" value="{{ $expense->expense_price }}" name="expense_price" placeholder=" ادخل السعر ">
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
                <input class="form-control" value="{{ $expense->expense_date }}" type="date" name="expense_date" placeholder="YYYY-mm-dd">
                @error('expense_price')
                <p class="text-danger">من فضلك ادخل تاريخ الصرف</p>
              @enderror
              </div>
             
              <div class="tile-footer">
                <button class="btn btn-primary" type="submit" style="background: #ffc107 ;border-color:#ffc107"><i class="bi bi-check-circle-fill me-2"></i>تعديل</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="bi bi-x-circle-fill me-2"></i>الغاء</a>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="clearix"></div>

    </div>
  </main>
@endsection