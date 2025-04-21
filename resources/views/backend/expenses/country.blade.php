@extends('master')
@section('content')
<main class="app-content" style="direction: rtl">
  <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            {{-- @if(count($allExpenses)>0) --}}

            <div class="table-responsive" id="expensesTable" style="display: flex; justify-content:space-between">
              {{-- <form action="{{ route('expense.show') }}" style="margin: 10px 0;" method="get">
                <div style="display: flex ;justify-content:space-between">
                  <div class="search-name" style="display:flex">
                    <label for="" >البحث عن مصروف سائق:</label>
                    <select name="id" id="" style="width: 350px" class="form-control">
                      @foreach ($allDrivers as $driver)
                          <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                          @endforeach
                        </select>
                        <button type="submit" style="background: #00695C ;color:#fff ;margin:0 10px" class="btn ">بحث</button>
                  </div>
                  
                </div>
              </form> --}}
              {{-- <div class="date-btns">
               <form action="{{ route('expense.dates') }}" method="GET">
                     <label for=""> البحث عن مصروف بتاريخ محدد:</label>
                     <input type="date" name='first_date' style="background: #ffc107 ;border:none ;border-radius:5px ;padding:10px" > --}}
                     {{-- <input type="date" name='last_date'  style="background: #ffc107 ;border:none ;border-radius:5px ;padding:10px"> --}}
                     {{-- <button type="submit" style="background: #6c757d ;color:#fff ;margin:0 10px; padding:10px" class="btn ">بحث</button>
               </form>
              </div> --}}
             
               {{-- @endif  --}}
                <div class='optional-btns' style="margin-bottom: 30px ; width:100%">
                      <a class="btn btn-primary" style="float: left; background: #343a40 ;border-color:#343a40" href="{{ route('expense.total') }}">عرض الكل</a>
                  {{-- <a class="btn" style="background: #ffc107 ;color:#fff ;margin:0 10px" href="{{ route('expense.export') }}">ترحيل الاكسيل </a> --}}
              </div>

            </div>
            @if(count($country_search)>0)
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
                    {{-- <th>تعديل</th>
                    <th>حذف</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @forelse ($country_search as $expense)
                  <tr>
                      <td>{{ $expense->name }}</td>
                      <td>{{ $expense->phone }}</td>
                      <td>{{ $expense->expense_country }}</td>
                    <td>{{ $expense->expense_type }}</td>
                    <td>{{ $expense->expense_price }}</td>
                    <td>{{ $expense->expense_date }}</td>
                    <td><img src="" alt="">image</td>
                    {{-- <td class="text-center"><a href="#" class="btn btn-primary">تعديل</a></td>
                    <td class="text-center">
                        ccc --}}
                      {{-- <form id="delete-form-{{ $driver->id }}" action="{{ route('drivers.destroy', ['id' => $driver->id]) }}" method="POST">
                          @method('DELETE')
                          @csrf
                  
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $driver->id }}">
                              حذف
                          </button>
                  
                          <!-- Modal -->
                          <div class="modal fade" id="deleteModal-{{ $driver->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $driver->id }}" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="deleteModalLabel-{{ $driver->id }}">تأكيد الحذف</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          انت علي وشك حذف المصروف للسائق؟
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                          <button type="button" class="btn btn-danger" onclick="document.getElementById('delete-form-{{ $driver->id }}').submit();">
                                              تأكيد الحذف
                                          </button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form> --}}
                  {{-- </td> --}}
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