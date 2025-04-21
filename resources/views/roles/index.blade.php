@extends('master')

@section('content')
<main class="app-content" style="direction: rtl">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
    <div class="card-header">صلاحيات المستخدمين </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="card-body">
        {{-- @can('create-role') --}}
            <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i>اضافه دور جديد</a>
        {{-- @endcan --}}
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">الرقم</th>
                <th scope="col" style="max-width:100px;">اسم الدور</th>
                <th scope="col">الصلاحيات</th>
                <th scope="col" style="width: 250px;">العمليات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $role->name }}</td>
                    <td>
                        <ul>
                            @forelse ($role->permissions as $permission)
                                <li>{{ $permission->name }}</li>
                            @empty
                            @endforelse
                        </ul>
                    </td>
                    <td>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            @if ($role->name!='owner')
                                {{-- @can('edit-role') --}}
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm">تعديل <i class="bi bi-pencil-square"></i></a>   
                                {{-- @endcan --}}

                                {{-- @can('delete-role') --}}
                                @can('اضافه دور')
                                @if (Auth::user()->id!=$role->id)
                                  <!-- Button trigger modal -->
                                  <form id="delete-form-{{ $role->id }}" action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                    @csrf
                                    {{-- @method('DELETE') --}}
                                
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $role->id }}">
                                        حذف
                                    </button>
                                
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal-{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $role->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel-{{ $role->id }}">تأكيد الحذف</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    هل أنت متأكد أنك تريد حذف هذا الدور مع صلاحياته؟
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                                                    <button type="submit" class="btn btn-danger" >
                                                        تأكيد الحذف
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                


                                @endif
                            @endcan
                                {{-- @endcan --}}
                            @endif

                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="3">
                        <span class="text-danger">
                            <strong>لا يوجد صلاحيات</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $roles->links() }}

    </div>
</div>
</div>
</div>
</div>
</div>
</main>
@endsection