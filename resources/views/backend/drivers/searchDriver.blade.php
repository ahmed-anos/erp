{{-- @extends('frontend.home') --}}

@extends('master')
@section('content')

<nav>
  <ul>
      @foreach (Context::get('breadcrumbs') as $breadcrumb)
          <li>{{ $breadcrumb }}</li>
      @endforeach
  </ul>
</nav>

<main class="app-content" style="direction: rtl">
    <div class="app-title">
      <div>
        <h1><i class="bi bi-table"></i> Data Table</h1>
        <p>Table to display analytical data effectively</p>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="table-responsive" style="display: flex; justify-content:space-between">
              <form action="{{ route('drivers.show') }}" style="margin: 10px 0" method="get">
              <div style="display: flex">
                <label for="" >البحث عن موظف:</label>
                <select name="id" id="" style="width: 350px" class="form-control">
                  @foreach ($allDrivers as $driver)
                      <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                      @endforeach
                    </select>
                    <button type="submit" style="background: #00695C ;color:#fff ;margin:0 10px" class="btn ">بحث</button>
                </div>
                </form>
                <div class='optional-btns'>
                    <form action="{{ route('drivers.index') }}" method="get" style="display: inline-block; margin:10px 0">
                        <button type="submit" style="background: #055160 ;color:#fff ;margin:0 10px" class="btn ">عرض الكل</button>
                    </form>
                        <a class="btn btn-primary" style="background: #343a40 ;border-color:#343a40" href="javascript:window.print();"><i class="bi bi-printer me-2"></i> طباعه</a>
                    {{-- <button type="submit" style="background: #ffc107 ;color:#fff ;margin:0 10px" class="btn ">ترحيل الاكسيل </button> --}}
                </div>
                {{-- {{ $allDrivers->links() }} --}}
            </div>
            
            <table class="table table-hover table-bordered" id="sampleTable">
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
                @forelse ($oneDriver as $driver)
                <tr>
                  <td>{{ $driver->name }}</td>
                  <td>{{ $driver->phone }}</td>
                  <td>{{ $driver->car }}</td>
                  <td>{{ $driver->country }}</td>
                  <td>{{ $driver->notice }}</td>
                </tr>
                @empty
                  <p>لا يوجد سائقين حاليا</p>
                @endforelse
              
              
         
              </tbody>
            </table>
        </div>
    </div>
      </div>
    </div>
  </main>

@endsection