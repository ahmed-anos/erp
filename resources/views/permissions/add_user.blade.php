@extends('master')
@section('content')
<main class="app-content">
    <div class="row" style="direction: rtl">
      <div class="col-md-12" >
        <div class="tile">
          <h3 class="tile-title">نموذج تسجيل مستخدم جديد</h3>
          <div class="tile-body">
            <form action="{{ route('users.store') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label class="form-label">الاسم</label>
                <input class="form-control" type="text" name="name" placeholder="ادخل اسم المستخدم">
                @error('name')
                  <p style="color: red" >من فضلك ادخل اسم المستخدم</p>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">الايميل </label>
                <input class="form-control" type="text" name="email" placeholder=" الايميل" >
                @error('email')
                <p style="color: red" >من فضلك ادخل الايميل</p>
              @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">كلمه المرور</label>
                <input class="form-control" type="password" name="password" placeholder="  كلمه المرور ">
              @error('password')
                <p style="color: red">خطا في كلمه المرور</p>
              @enderror
              </div>
              <div class="mb-3">
                <label class="form-label"> تاكيد كلمه المرور  </label>
                <input class="form-control" type="password" name="password_confirmation" placeholder="  تاكيد كلمه المرور ">
              @error('password')
                <p style="color: red">خطا في  تاكيد كلمه المرور</p>
              @enderror
              </div>
                <select name="role" id="" class="form-control">
                    <option value="admin">ادمن</option>
                    <option value="accountant">محاسب</option>
                    <option value="driver">سائق</option>
                </select>
              
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