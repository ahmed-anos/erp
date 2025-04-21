@extends('master')
@section('content')
<main class="app-content" style="direction: rtl">
 
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="table-responsive" style="display: flex; justify-content:space-between">
              <form action="{{ route('expense.show') }}" style="margin: 10px 0" method="get">
              <div style="display: flex">
                <label for="" >البحث عن مصروف:</label>
                <select name="id" id="" style="width: 350px" class="form-control">
                  @foreach ($allDrivers as $driver)
                      <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                      @endforeach
                    </select>
                    <button type="submit" style="background: #00695C ;color:#fff ;margin:0 10px" class="btn ">بحث</button>
                </div>
                </form>
                <div class='optional-btns'>
                    <form action="{{ route('expense.index') }}" method="get" style="display: inline-block; margin:10px 0">
                        <button type="submit" style="background: #055160 ;color:#fff ;margin:0 10px" class="btn ">عرض الكل</button>
                    </form>
                        {{-- <a class="btn btn-primary" style="background: #343a40 ;border-color:#343a40" href="javascript:window.print();"><i class="bi bi-printer me-2"></i> طباعه</a>
                      <a href= "{{ route('expense.export.one' ,['id'=>$driver_id]) }}" style="background: #ffc107 ;color:#fff ;margin:0 10px" class="btn ">ترحيل الاكسيل </a> --}}
                  </div>
                {{-- {{ $allDrivers->links() }} --}}
            </div>
            @if(count($driverExpenses) > 0)
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>الاسم</th>
                    <th>رقم السواق</th>
                    <th>المكان</th>
                    <th>البيان</th>
                    <th> السعر</th>
                    <th>التاريخ</th>
                    <th>الصوره</th>
                 
                </tr>
              </thead>
              <tbody>
                @forelse ($driverExpenses as $expense)
                <tr>
                    <td>{{ $expense->name }}</td>
                    <td>{{ $expense->phone }}</td>
                    <td>{{ $expense->expense_country }}</td>
                    <td>{{ $expense->expense_type }}</td>
                    <td>{{ $expense->expense_price }}</td>
                    <td>{{ $expense->expense_date }}</td>
                    <td>image</td>
                </tr>
                @empty
                  
                @endforelse
              
              
         
              </tbody>
            </table>
            @else
            <p style="color: red ;text-align:center">لا يوجد مصروف لهذا السائق</p>

            @endif
        </div>
    </div>
      </div>
    </div>
  </main>

@endsection