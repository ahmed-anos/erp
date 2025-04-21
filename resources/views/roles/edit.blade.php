@extends('master')

@section('content')

<main class="app-content" style="direction: rtl">
    @session('success')
         <div class="alert alert-success">تم تعديل صلاحيات الدور بنجاح</div>
     @endsession
         
 
     <div class="row">
         <div class="col-md-12">
             <div class="tile">
                 <div class="tile-body">
             <div class="card-header" style="overflow: hidden">
                 <div class="" style="float: right">
                     تعديل دور
                 </div>
             <div style="float: left">
                    <a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm"> رجوع &larr; </a>
                </div>
            </div>
            <div style="clear: both"></div>
            <div class="card-body">
                <form action="{{ route('roles.update', $role->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">الاسم</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $role->name }}">
                            @error('name')
                                <span class="text-danger">اسم الدور مطلوب</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="permissions" class="col-md-4 col-form-label text-md-end text-start">الصلاحيات</label>
                        <div class="col-md-6">           
                            <select class="form-select @error('permissions') is-invalid @enderror" multiple aria-label="Permissions" id="permissions" name="permissions[]" style="height: 210px;">
                                @forelse ($permissions as $permission)
                                    <option value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions ?? []) ? 'selected' : '' }}>
                                        {{ $permission->name }}
                                    </option>
                                @empty

                                @endforelse
                            </select>
                            @error('permissions')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="mx-auto btn btn-primary" style="width: 150px" value="تحديث دور">
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