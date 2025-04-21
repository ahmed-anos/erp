@extends('master')
@section('content')
<main class="app-content" style="direction: rtl">
  <div class="row">
      <div class="col-md-12">
          
  

        <div class="tile">
          <div class="tile-body">
            @if (count($allExpenses) >0)
            <div class='optional-btns' style="display: flex ;justify-content:end ;width:100% ;margin-bottom:30px">
                <a class="btn btn-primary" style="background: #343a40 ;border-color:#343a40" href="javascript:window.print();"><i class="bi bi-printer me-2"></i> طباعه</a>
            <a class="btn" style="background: #ffc107 ;color:#fff ;margin:0 10px" href="{{ route('expense.export') }}">ترحيل الاكسيل </a>
        </div>
        @endif
            <div class="table-responsive" style="display: flex; justify-content:space-between">
             
             
              @if (count($allExpenses) >0)
              <table class="table table-hover table-bordered" id="sampleTable1">
                <thead>
                  <tr>
                    <th>الاسم</th>
                    <th>رقم السواق</th>
                    <th>المكان</th>
                    <th>البيان</th>
                    <th> السعر</th>
                    <th>التاريخ</th>
                    <th>الصوره</th>
                    {{-- <th>تعديل</th>
                    <th>حذف</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @forelse ($allExpenses as $expense)
                  <tr>
                      <td>{{ $expense->name }}</td>
                      <td>{{ $expense->phone }}</td>
                      <td>{{ $expense->expense_country }}</td>
                    <td>{{ $expense->expense_type }}</td>
                    <td>{{ $expense->expense_price }}</td>
                    <td>{{ $expense->expense_date }}</td>
                    <td><img src="" alt="">image</td>
                  </tr>
                  @empty
                    <p>لا يوجد مصروفات حاليا</p>
                  @endforelse
                
                
           
                </tbody>
              </table>
              @else
              <p class="text-center text-danger w-100" style="font-weight: bolder">لا يوجد مصروفات حاليا</p>
  
              @endif
              {{-- {{ $allExpenses->links() }} --}}
          </div>
        </div>
      </div>
    </div>
  </main>

@endsection