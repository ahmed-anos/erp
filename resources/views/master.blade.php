@include('layouts.head')
@include('layouts.header')

@yield('content')

<div class="submenu-hover" id="submenu">
    <li class="bs-component d-grid">
      <a href="{{ route('clients.create') }}" class="btn btn-primary  btn-block" type="button">العملاء</a>
    </li>
    <li class="bs-component d-grid">
      <button class="btn btn-primary  btn-block" type="button">العملاء الفرعين</button>
    </li>
    <li class="bs-component d-grid">
      <button class="btn btn-primary  btn-block" type="button">الموردين</button>
    </li>
    <li class="bs-component d-grid">
      <button class="btn btn-primary  btn-block" type="button">السائقون</button>
    </li>
    <li class="bs-component d-grid">
      <button class="btn btn-primary  btn-block" type="button">المصروفات</button>
    </li>
    <li class="bs-component d-grid">
      <button class="btn btn-primary  btn-block" type="button">الايرادات</button>
    </li>
    <li class="bs-component d-grid">
      <button class="btn btn-primary  btn-block" type="button">الصناديق</button>
    </li>
    <li class="bs-component d-grid">
      <button class="btn btn-primary  btn-block" type="button">حسابات البنوك</button>
    </li>
    <li class="bs-component d-grid">
      <button class="btn btn-primary  btn-block" type="button">حسابات الفيزا</button>
    </li>
    <li class="bs-component d-grid">
      <button class="btn btn-primary  btn-block" type="button">حسابات اوراق القبض</button>
    </li>
    <li class="bs-component d-grid">
      <button class="btn btn-primary  btn-block" type="button">حسابات اوراق الدفع</button>
    </li>
    <li class="bs-component d-grid">
      <button class="btn btn-primary  btn-block" type="button">حسابات مدينه اخري</button>
    </li>
    <li class="bs-component d-grid">
      <button class="btn btn-primary  btn-block" type="button">حسابات دائنه اخري</button>
    </li>
    <li class="bs-component d-grid">
      <button class="btn btn-primary  btn-block" type="button">  العهد</button>
    </li>
    <li class="bs-component d-grid">
      <button class="btn btn-primary  btn-block" type="button"> السلف </button>
    </li>
   
  </div>
  <div class="assets" id="assets-submenu">
    <li class="bs-component d-grid">
      <button class="btn btn-primary  btn-block" type="button">مجموعات الاصول</button>
    </li>
    <li class="bs-component d-grid">
      <button class="btn btn-primary  btn-block" type="button"> الاصول الثابته</button>
    </li>
    <li class="bs-component d-grid">
      <button class="btn btn-primary  btn-block" type="button">قيد الاهلاك</button>
    </li>
    <li class="bs-component d-grid">
      <button class="btn btn-primary  btn-block" type="button">سجل الاصول</button>
    </li>
  </div>

@include('layouts.side')
@include('layouts.footer')