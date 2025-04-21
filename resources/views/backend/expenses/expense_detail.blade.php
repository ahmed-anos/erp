@extends('master')

@section('content')
    <main class="app-content">

        <div class="app-title" style="direction: ltr">
            <div>
              <h1><i class="bi bi-ui-checks"></i>تفاصيل مصروف</h1>
              {{-- <p>Bootstrap default form components</p> --}}
            </div>
            <ul class="app-breadcrumb breadcrumb" style="direction: rtl; font-size:14px">
              <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
              @foreach (Context::get('breadcrumbs') as $breadcrumb)
                <li class="breadcrumb-item">
                  @if (request()->url() == $breadcrumb['url'])
                  {{-- {{ $breadcrumb['url'] }} --}}
                    <!-- العنصر النشط -->
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
                    <div class="tile-body">

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                        <nav class="nav nav-pills flex-column flex-sm-row">
                            <a class="flex-sm-fill text-sm-center nav-link  active" id="expense" aria-current="page"
                                href="#">معلومات المصروف</a>
                            <a id="attachment" class="flex-sm-fill text-sm-center nav-link" href="#">المرفقات</a>
                        </nav>

                        <div class="container" id="container">
                            <table class="table table-hover table-bordered mt-3" id="sampleTable1">
                                <thead>
                                    <tr>

                                        <th>المكان</th>
                                        <th>البيان</th>
                                        <th> السعر</th>
                                        <th> التاريخ</th>
                                        <th>تعديل </th>
                                        <th>حذف </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $expense->expense_country }}</td>
                                        <td>{{ $expense->expense_type }}</td>
                                        <td>{{ $expense->expense_price }}</td>
                                        <td>{{ $expense->expense_date }}</td>
                                        <td class="text-center"><a href="{{ route('expense.edit', $expense->id) }}"
                                                class="btn btn-primary">تعديل</a></td>
                                        <td class="text-center">

                                            <form id="delete-form-{{ $expense->id }}"
                                                action="{{ route('expense.destroy', ['id' => $expense->id]) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#deleteModal-{{ $expense->id }}">
                                                    حذف
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteModal-{{ $expense->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="deleteModalLabel-{{ $expense->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="deleteModalLabel-{{ $expense->id }}">تأكيد الحذف
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                هل أنت متأكد أنك تريد حذف هذا المصروف؟
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">إلغاء</button>
                                                                <button type="button" class="btn btn-danger"
                                                                    onclick="document.getElementById('delete-form-{{ $expense->id }}').submit();">
                                                                    تأكيد الحذف
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                     <div id="attachment_container" style="display: none ;" >

                        <form  id="ajax-form" action="{{ route('attachments.new' ,$expense->id)}}" class="form mt-4" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="" class="mb-3">اضافة صورة</label>
                            <input type="file" name="expense_invoice" class="form-control mb-3" id="expense_invoice">
                            @error('expense_invoice')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <button type="submit" id="actionBtn" class="form-control btn btn-primary" style="width:80px">تأكيد</button>
                        </form>
                        
                        <table class="table table-hover table-bordered mt-3" id="sampleTable1">
                            <thead style="text-align: center">
                                <tr>

                                    <th>اسم الملف </th>
                                    <th>تاريخ الاضافه</th>
                                    <th> العمليات</th>
                                   
                                </tr>
                            </thead>
                            <tbody style="text-align: center">
                                @if($attachments)
                                    @forelse ($attachments as $attachment)
                                    <tr>
                                        <td>{{ $attachment->name }}</td>
                                        <td>{{ $attachment->date }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('attachments.view' ,$attachment->name) }}" class="btn btn-success btn-sm"> عرض <i class="bi bi-eye"></i></a>
                                            <a href="{{ route('attachments.download' ,$attachment->name) }}" class="btn btn-primary btn-sm"> تحميل <i class="bi bi-download"></i></a>
                                            <form id="delete-form-{{ $attachment->id }}" style="display: inline" action="{{ route('attachments.destroy', ['name' => $attachment->name]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                        
                                                <!-- Button trigger modal -->
                                                <a type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#deleteModal-{{ $attachment->id }}">
                                                    حذف
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                        
                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteModal-{{ $attachment->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $attachment->id }}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel-{{ $attachment->id }}">تأكيد الحذف</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                هل أنت متأكد أنك تريد حذف المرفق؟
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                                                <button type="button" class="btn btn-danger" onclick="document.getElementById('delete-form-{{ $attachment->id }}').submit();">
                                                                    تأكيد الحذف
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
    
                                    </tr>
                                    @empty
                                        <p class="text-danger text-center mt-4" style="font-weight: bolder">لا يوجد مرفقات لهذا المصروف</p>
                                    @endforelse
                                
                                @endif
            

                            </tbody>
                        </table>
                        
                      
                    </div>   

                    </div>

                </div>
            </div>
        </div>
        </div>
    </main>
@endsection

<!-- تأكد من تضمين jQuery -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let expense = document.getElementById('expense');
        let attachment = document.getElementById('attachment');
        let table = document.getElementById('container');
        let attachment_container = document.getElementById('attachment_container');

        // Toggle بين المصاريف والمرفقات
        attachment.addEventListener('click', function () {
            attachment.classList.add('active');
            expense.classList.remove('active');
            table.style.display = 'none';
            attachment_container.style.display = 'block';
        });

        expense.addEventListener('click', function () {
            attachment.classList.remove('active');
            expense.classList.add('active');
            table.style.display = 'block';
            attachment_container.style.display = 'none';
        });
    });

    // $(document).ready(function () {
    //     $('#ajax-form').submit(function (event) {
    //         event.preventDefault(); // منع إعادة تحميل الصفحة

    //         var formData = new FormData(this); // جمع بيانات الفورم (بما في ذلك الملف)
    //         var url = "{{ route('attachments.new', $expense->id) }}"; // حل مشكلة Blade داخل JS

    //         $.ajax({
    //             url: url,
    //             method: 'POST',
    //             data: formData,
    //             contentType: false, // لا تحدد نوع المحتوى يدويًا
    //             processData: false, // منع معالجة البيانات يدويًا
    //             success: function (response) {
    //                 console.log("نجاح:", response);
    //                 $('#attachment_container').html(
    //                     '<div class="alert alert-success">' + response.message + '</div>'
    //                 );
    //             },
    //             error: function (xhr, status, error) {
    //                 console.log("خطأ:", error);
    //                 var errors = xhr.responseJSON ? xhr.responseJSON.errors : null;
    //                 var errorMessage = errors && errors.expense_invoice ? errors.expense_invoice[0] : "حدث خطأ أثناء رفع المرفق";
    //                 $('#attachment_container').html('<div class="alert alert-danger">' + errorMessage + '</div>');
    //             }
    //         });
    //     });
    // });
</script>

