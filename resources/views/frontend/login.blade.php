@include('layouts.head')
<section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1>شركه دانه العواصم للنقل</h1>
    </div>
    <div class="login-box" style="direction: rtl">
      <form class="login-form" action="{{ route('person/check') }}" method="POST">
        @csrf
        <h3 class="login-head"><i class="bi bi-person me-2"></i>تسجيل دخول </h3>
        <div class="mb-3">
          <label class="form-label"> الايميل</label>
          <input class="form-control" name="email" type="text" placeholder="ادخل الايميل" autofocus>
            @error('email')
                <p style="color: red">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">كلمه المرور</label>
          <input class="form-control" name="password" type="password" placeholder="كلمه المرور">
          @error('password')
                <p style="color: red">خطأ في كلمه المرور</p>
            @enderror
        </div>
        <div class="mb-3">
          <div class="utility">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" name="remember" type="checkbox"><span class="label-text">تذكرني</span>
              </label>
            </div>
            <p class="semibold-text mb-2"><a href="{{ route('password.request') }}" data-toggle="flip">هل نسيت كلمه المرور؟</a></p>
          </div>
        </div>
        <div class="mb-3 btn-container d-grid">
          <button class="btn btn-primary btn-block"><i class="bi bi-box-arrow-in-right me-2 fs-5"></i>تسجيل دخول</button>
        </div>
      </form>
    
    </div>
  </section>













