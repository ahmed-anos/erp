@extends('master')
@section('content')
<main class="app-content" style="direction: rtl">

  <div class="app-title" style="direction: ltr">
    <div>
      <h1><i class="bi bi-ui-checks"></i> اجمالي المصاريف</h1>
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
            <div class="table-responsive" style="display: flex; justify-content:space-between">

              <table class="table table-hover table-bordered" id="sampleTable1">
                    <thead style="text-align: center">
                      <tr>
                        <th>الرقم</th>
                        <th> المكان</th>
                        <th>الاجمالي</th>
                        <th>التفاصيل</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $i=1
                      @endphp
                        @forelse ($totals as $total)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $total->expense_country }}</td>
                        <td>{{ $total->total_expense }}</td>
                        <td class="text-center"><a href="{{ route('expense.country' , ['country' => $total->expense_country]) }}" class="btn btn-primary">عرض التفاصيل</a></td>
                      </tr>
                      @empty
                        <p>لا يوجد مصروفات حاليا</p>
                      @endforelse
                    
                    
               
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </main>
    
    @endsection