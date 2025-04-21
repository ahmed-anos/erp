@extends('master')

@section('content')

<main class="app-content" style="direction: rtl">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
    <div class="card-header">اداره المستخدمين</div>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="card-body">
        @can('اضافه مستخدم جديد')
            <a href="{{ route('users.create') }}" class="btn btn-success btn-sm my-2"> اضافه مستخدم جديد<i class="bi bi-plus-circle"></i></a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">الرقم</th>
                <th scope="col">الاسم</th>
                <th scope="col">الايميل</th>
                <th scope="col">الدور</th>
                <th scope="col">العمليات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <ul>
                            @forelse ($user->getRoleNames() as $role)
                                <li>{{ $role }}</li>
                            @empty
                            @endforelse
                        </ul>
                    </td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            @if (in_array('owner', $user->getRoleNames()->toArray() ?? []) )
                                @if (Auth::user()->hasRole('owner'))
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm"> تعديل <i class="bi bi-pencil-square"></i></a>
                                @endif
                            @else
                                @can('تعديل مستخدم')
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm"> تعديل <i class="bi bi-pencil-square"></i></a>   
                                @endcan

                                @can('حذف مستخدم')
                                    @if (Auth::user()->id!=$user->id)
                                      <!-- Button trigger modal -->
                                      <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        {{-- @method('DELETE') --}}
                                    
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $user->id }}">
                                            حذف
                                        </button>
                                    
                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $user->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel-{{ $user->id }}">تأكيد الحذف</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        هل أنت متأكد أنك تريد حذف هذا المستخدم؟
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
                            @endif



                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="5">
                        <span class="text-danger">
                            <strong>لا يوجد مستخدمين حاليا</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $users->links() }}

    </div>
</div>
            </div>
            </div>
            </div>
            </div>
</main>
@endsection