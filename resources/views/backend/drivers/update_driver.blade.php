@extends('master')
@section('content')
<main class="app-content">
    <div class="row" style="direction: rtl">
      <div class="col-md-12" >
        <div class="tile">
          <h3 class="tile-title">نموذج تعديل سائق موجود بالفعل</h3>
          <div class="tile-body">
            <form action="{{ route('drivers.edit' ,['id'=>$driver->id]) }}" method="POST">
                @method('PUT')
              @csrf
              <div class="mb-3">
                <label class="form-label">الاسم</label>
                <input class="form-control" type="text" name="name" value="{{ $driver->name}}" placeholder="ادخل اسم السائق">
                @error('name')
                  <p style="color: red" >من فضلك ادخل اسم السائق</p>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">رقم الهاتف</label>
                <input class="form-control" type="text" value="{{ $driver->phone }}" name="phone" placeholder=" ادخل رقم الهاتف">
                @error('phone')
                <p style="color: red" >من فضلك ادخل رقم السائق</p>
              @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">رقم الشاحنه</label>
                <input class="form-control" type="text" name="car" value="{{ $driver->car }}" placeholder=" ادخل رقم الشاحنه">
              </div>
              <div class="mb-3">
                <label class="form-label">عنوان السائق</label>
                <input class="form-control" type="text" name="country" value="{{ $driver->country }}" placeholder=" ادخل عنوان السائق">
              </div>
              <div class="mb-3">
                <label class="form-label">ملاحظات اخري</label>
                <textarea class="form-control" name="notice"  rows="4" placeholder="ملاحاظاتك عن السائق">{{ $driver->notice }}</textarea>
              </div>
              <div class="tile-footer">
                <button class="btn btn-primary" style="background: #ffc107 ;border-color:#ffc107" type="submit"><i class="bi bi-check-circle-fill me-2"></i>تعديل</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="bi bi-x-circle-fill me-2"></i>الغاء</a>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="clearix"></div>

    </div>
  </main>
@endsection