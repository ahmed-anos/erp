@extends('master')

@section('content')

<main class="app-content" style="direction: rtl">
   @session('success')
        <div class="alert alert-success">تم تعديل دور المستخدم بنجاح</div>
    @endsession
        

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
            <div class="card-header" style="overflow: hidden">
                <div class="" style="float: right">
                    تعديل مستخدم
                </div>
                <div class="" style="float: left">
                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm"> رجوع &larr;</a>
                </div>
            </div>
            <div style="clear: both"></div>
            <div class="mt-3">
                <form action="{{ route('users.update', $user->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">الاسم</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}">
                            @error('name')
                                <span class="text-danger">من فضلك ادخل اسم المستخدم</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">الايميل</label>
                        <div class="col-md-6">
                          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}">
                            @error('email')
                                <span class="text-danger">من فضلك ادخل ايميل المستخدم</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-start">كلمه المرور</label>
                        <div class="col-md-6">
                          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password')
                                <span class="text-danger">خطأ في كلمه المرور</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">تاكيد كلمه المرور</label>
                        <div class="col-md-6">
                          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="roles" class="col-md-4 col-form-label text-md-end text-start">الادوار</label>
                        <div class="col-md-6">           
                            <select class="form-select @error('roles') is-invalid @enderror" multiple aria-label="Roles" id="roles" name="roles[]">
                                @forelse ($roles as $role)

                                    @if ($role!='owner')
                                    <option value="{{ $role }}" {{ in_array($role, $userRoles ?? []) ? 'selected' : '' }}>
                                        {{ $role }}
                                    </option>
                                    @else
                                        @if (Auth::user()->hasRole('owner'))   
                                        <option value="{{ $role }}" {{ in_array($role, $userRoles ?? []) ? 'selected' : '' }}>
                                            {{ $role }}
                                        </option>
                                        @endif
                                    @endif

                                @empty

                                @endforelse
                            </select>
                            @error('roles')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="mx-auto btn btn-primary" style="width: 150px" value="تحديث">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>    

</div>
</div>
</div>
</div>
</main>
@endsection