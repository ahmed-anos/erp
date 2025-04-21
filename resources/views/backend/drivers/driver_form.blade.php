
@extends('master')

@section('content')
<main class="app-content">
  <div class="app-title" style="direction: ltr">
    <div>
      <h1><i class="bi bi-ui-checks"></i> ادخال السائقين</h1>
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
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">نموذج تسجيل سائق جديد</h3>
        <div class="tile-body">
          <form action="{{ route('drivers.store') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label class="form-label">الاسم</label>
              <input class="form-control" type="text" name="name" placeholder="ادخل اسم السائق">
              @error('name')
                <p style="color: red">من فضلك ادخل اسم السائق</p>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">رقم الهاتف</label>
              <input class="form-control" type="text" name="phone" placeholder="ادخل رقم الهاتف">
              @error('phone')
                <p style="color: red">من فضلك ادخل رقم السائق</p>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">رقم الشاحنه</label>
              <input class="form-control" type="text" name="car" placeholder="ادخل رقم الشاحنه">
              @error('car')
                <p style="color: red">هذه الشاحنه مسجله مع سائق اخر</p>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">عنوان السائق</label>
              <input class="form-control" type="text" name="country" placeholder="ادخل عنوان السائق">
            </div>

            <div class="mb-3">
              <label class="form-label">ملاحظات اخري</label>
              <textarea class="form-control" name="notice" rows="4" placeholder="ملاحظاتك عن السائق"></textarea>
            </div>

            <div class="tile-footer">
              <button class="btn btn-primary" type="submit">
                <i class="bi bi-check-circle-fill me-2"></i>تسجيل
              </button>
              &nbsp;&nbsp;&nbsp;
              <a class="btn btn-secondary" href="#">
                <i class="bi bi-x-circle-fill me-2"></i>الغاء
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>
</main>
@endsection
