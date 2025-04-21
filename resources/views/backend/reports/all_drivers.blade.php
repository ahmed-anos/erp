@extends('master')
@section('content')
<main class="app-content" style="direction: rtl">
    {{-- <div class="app-title">
      <div>
        <h1><i class="bi bi-table"></i> Data Table</h1>
        <p>Table to display analytical data effectively</p>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
      </ul>
    </div> --}}
    
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            <div class="table-responsive" style="display: flex; justify-content:space-between">
       
                @if (count($allDrivers) >0)
                @if (Auth::user()->can(['طباعه' ,'ترحيل اكسيل']))
                    
                <div class='optional-btns' style="display:flex; margin-bottom:30px; width:100% ; justify-content:end">
                      <a class="btn btn-primary" style="background: #343a40 ;border-color:#343a40" href="javascript:window.print();"><i class="bi bi-printer me-2"></i> طباعه</a>
                  <a href="{{ route('drivers.export') }}" style="background: #ffc107 ;color:#fff ;margin:0 10px" class="btn ">ترحيل الاكسيل </a>
                </div>
                  
                @endif
                @endif

            </div> 
            @if (count($allDrivers) >0)
              
            <table class="table table-hover table-striped table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>الاسم</th>
                  <th>رقم الهاتف</th>
                  <th>رقم العربيه</th>
                  <th>الدوله</th>
                  <th>ملاحظات</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($allDrivers as $driver)
                <tr>
                  <td>{{ $driver->name }}</td>
                  <td>{{ $driver->phone }}</td>
                  <td>{{ $driver->car }}</td>
                  <td>{{ $driver->country }}</td>
                  <td>{{ $driver->notice }}</td>
                </tr>
                 @empty
                @endforelse 
              
              
         
              </tbody>
            </table>
            @else
            <p class="text-center text-danger" style="font-weight: bolder">لا يوجد سائقين حاليا</p>

            @endif
            {{ $allDrivers->links() }}
          </div>
        </div>
      </div>
    </div>
  </main>

@endsection