@extends('master')

@section('content')
    <main class="app-content">

        <div class="app-title" style="direction: ltr">
            <div>
              <h1><i class="bi bi-ui-checks"></i>تفاصيل عميل</h1>
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
                                href="#">معلومات العميل</a>
                            <a id="attachment" class="flex-sm-fill text-sm-center nav-link" href="#">تفاصيل حركه القسط</a>
                        </nav>

                        
                     <div id="attachment_container" style="display: none ;" >

                       
                        <div class="container" id="container">
                            <table class="table table-hover table-bordered mt-3" id="sampleTable1" >
                                <thead>
                                    <tr>
                                        <th>الرقم</th>
                                        <th>المديونيه </th>
                                        <th>المدفوع</th>
                                        <th>المتبقي</th>
                                        <th> الفائده</th>
                                        <th> اشهر التاخير </th>
                                        <th>اجمالي اشهر التاخير </th>
                                        <th>حاله الدفع</th>
                                        <th> التاريخ</th>
                                        <th> الشخص المسؤل</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $client->indebtedness }}</td>
                                        <td>{{ $client->installment }}</td>
                                        <td>{{ $client->delayed_months }}</td>
                                        <td>{{ $client->interest }}</td>
                                        <td>{{ $client->interest }}</td>
                                        <td>{{ $client->interest }}</td>
                                        <td>{{ $client->interest }}</td>
                                        <td>{{ $client->interest }}</td>
                                        <td>{{ $client->interest }}</td>
                                        

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>   

                    </div>

                </div>
            </div>
        </div>
        </div>
    </main>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let expense = document.getElementById('expense');
        let attachment = document.getElementById('attachment');
        let table = document.getElementById('container');
        let attachment_container = document.getElementById('attachment_container');

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

  
</script>

