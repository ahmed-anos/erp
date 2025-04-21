@extends('master')
@section('content')
<h2>
    dddddddddddddddddddd
</h2>
<main class="app-content" style="direction: rtl">

  <div class="app-title" style="direction: ltr">
    <div>
      <h1><i class="bi bi-ui-checks"></i> استعلام المصاريف</h1>
      {{-- <p>Bootstrap default form components</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb" style="direction: rtl; font-size:14px">
      <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
      @foreach (Context::get('breadcrumbs') as $breadcrumb)
        <li class="breadcrumb-item">
          @if (request()->url() == $breadcrumb['url'])
            <span class="active">{{ $breadcrumb['label'] }}</span>
          @else
            <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
          @endif
        </li>
      @endforeach
    </ul>
  </div>
  <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
         

            </div>
            @if(true)
              <table class="table table-hover table-bordered " id="sampleTable">
                <thead>
                  <tr>
                    <th>الرقم</th>
                    <th>المكان</th>
                    <th>البيان</th>
                    <th> السعر</th>
                    <th>التاريخ</th>
                    {{-- <th>العمليات</th> --}}
                    {{-- <th>تعديل</th>
                    <th>حذف</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @forelse ($expenses as $expense)
                  <tr onclick="window.location.href='{{ route('userDriver.detail' ,$expense->id) }}';">
                    <td>{{ $loop->iteration }}</td>  
                    <td>{{ $expense->expense_country }}</td>
                    <td>{{ $expense->expense_type }}</td>
                    <td>{{ $expense->expense_price }}</td>
                    <td>{{ $expense->expense_date }}</td>
                  </tr>
                  @empty
                    <p>لا يوجد مصروفات حاليا</p>
                  @endforelse
                
                
           
                </tbody>
              </table>
              @else
              <p class="text-danger" style="font-weight:bold ; text-align:center">لا يوجد مصروفات حاليا</p>

              @endif
              {{-- {{ $allExpenses->links() }} --}}
          </div>
        </div>
      </div>
    </div>
  </main>

@endsection