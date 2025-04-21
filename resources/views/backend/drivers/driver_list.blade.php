{{-- @extends('frontend.home') --}}
@extends('master')
@section('content')
<main class="app-content" style="direction: rtl">

<div class="app-title" style="direction: ltr">
  <div>
    <h1><i class="bi bi-ui-checks"></i> استعلام السائقين</h1>
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
              {{-- @if (count($allDrivers) >0)
              <form action="{{ route('drivers.show') }}" style="margin: 10px 0" method="get">
                <div style="display: flex">
                  <label for="" >البحث عن سائق:</label>
                  <select name="id" id=""  class="form-control" style="width:350px">
                    @foreach ($allDrivers as $driver)
                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                        @endforeach
                      </select>
                      <button type="submit" style="background: #00695C ;color:#fff ;margin:0 10px" class="btn ">بحث</button>
                  </div>
                </form>
                @endif --}}
               

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
                  <th>تعديل</th>
                  <th>حذف</th>
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
                  <td class="text-center"><a href="{{ route('drivers.update', ['id'=>$driver->id]) }}" class="btn btn-primary">تعديل</a></td>
                  <td class="text-center">
                    <form id="delete-form-{{ $driver->id }}" action="{{ route('drivers.destroy', ['id' => $driver->id]) }}" method="POST">
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
                                        هل أنت متأكد أنك تريد حذف هذا السائق؟
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
                    </form>
                </td>
                
                </tr>
                 @empty
                  {{-- <p class="text-center text-danger" style="font-weight: bolder">لا يوجد سائقين حاليا</p> --}}
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