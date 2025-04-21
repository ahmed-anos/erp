@extends('master')

@section('content')

<main class="app-content" style="direction: rtl">
    {{-- @session('success')
    <div class="alert alert-success">تم تعديل دور المستخدم بنجاح</div>
@endsession --}}
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
{{-- <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card"> --}}
            <div class="card-header" style="overflow: hidden">
                <div class="" style="float: right">
                    اضافه مستخدم جديد
                </div>
                <div class="" style="float: left">
                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm"> رجوع &larr;</a>
                </div>
            </div>
            <div style="clear: both"></div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">الاسم</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">من فضلك ادخل اسم المستخدم</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">ربط بسائق</label>
                        <div class="col-md-6">
                            <select name="driver_id" id="" class="form-control">
                                <option value="" selected>اختر السائق</option>
                                @if(isset($drivers) && $drivers->count()) 
                                    @foreach ($drivers as $driver)
                                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">الايميل</label>
                        <div class="col-md-6">
                          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-start">كلمه المرور</label>
                        <div class="col-md-6">
                          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password')
                                <span class="text-danger">خطا في كلمه المرور</span>
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
                                        <option value="{{ $role }}" {{ in_array($role, old('roles') ?? []) ? 'selected' : '' }}>
                                        {{ $role }}
                                        </option>
                                    @else
                                        @if (Auth::user()->hasRole('owner'))   
                                            <option value="{{ $role }}" {{ in_array($role, old('roles') ?? []) ? 'selected' : '' }}>
                                            {{ $role }}
                                            </option>
                                        @endif
                                    @endif

                                @empty

                                @endforelse
                            </select>
                            @error('roles')
                                <span class="text-danger">من فضلك اختر دور المستخدم</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="mx-auto btn btn-primary" style="width: 150px" value="اضافه ">
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