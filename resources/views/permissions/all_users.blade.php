@extends('master')
@section('content')
    <main class="app-content" style="direction: rtl">
        <form action="{{ route('users.add') }}" method="get">
            <button class="btn btn-success mb-2" style="font-weight: bold;">اضافه مستخدم <i class="bi bi-person-plus"
                    style="font-size:20px"></i></button>
        </form>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive" style="display: flex; justify-content:space-between">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم المستخدم</th>
                                        <th> الايميل</th>
                                        <th>كلمه المرور</th>
                                        <th>الصلاحيه</th>
                                        <th>حاله المستخدم</th>
                                        <th>تعديل</th>
                                        <th>حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($users as $user)
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->password }}</td>
                                            <td>{{ $user->role }}</td>
                                            @if ($user->status && $user->status == 'مفعل')
                                                <td class="text-success">{{ $user->status }}</td>
                                            @else
                                                <td class="text-danger">{{ $user->getRoleName }}</td>
                                            @endif
                                            <td>edit</td>
                                            <td>delete</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection
