@extends('master')
<style>
  .installment:hover{
    background: inherit;
  }
  .my_row:hover .installment{
    background: inherit;
  }
</style>
@section('content')

<main class="app-content">


  <div class="app-title" style="direction: ltr">
    <div>
      <h1><i class="bi bi-ui-checks"></i> استعلام العملاء</h1>
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
<div class="row" style="direction: rtl">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive" style="overflow: hidden">
            <table class="table table-hover table-bordered" id="sampleTable1" >
         
              <thead>
                <tr>
                  <th>كود العميل</th>
                  <th>الاسم</th>
                 <th>القسط</th>
                  <th>عدد الاشهر التاخير</th>
                  <th> اجمالي المتاخر </th>
                  <th>القسط الحالي</th>
                  <th>ميعاد السداد</th>
                   
                  {{-- <th>حاله القسط   </th> --}}
                  <th>سداد/الغاء</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0 ?>
                
                <tr class="my_row flex column">
                  <form action="{{ route('installments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="client_id" value="{{ $client->id }}">
                    <td>{{ $client->code }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->installment }}</td>
                    <td>{{ $client->delay_months }}</td>
                    <td>{{ $client->delayed_amount }}</td>
                    <td>{{ $currentInstallmentNumber }}</td> 
                    <td><input type="date" name="date" >
                      @error('date')
                    <span class="text-danger d-block">من فضلك ادخل تاريخ الدفع</span>
                      
                    @enderror
                    </td>
                  
                        <select name="status" id="status" class="form-control d-none"> {{-- نخليه مخفي لأننا هنحدد القيم بزرار --}}
                            <option value="1">دفع</option>
                            <option value="2">تأخير</option>
                        </select>
                    <td class="d-flex">
                        <button type="submit" name="action" value="paid" class="form-control bg-success" style=" color:#fff">حفظ</button>
                        <button type="submit" name="action" value="delay" class="form-control bg-danger" style=" color:#fff">تراجع</button>
                    </td>
                </form>
                

                  
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
  @endsection

<script>
    document.addEventListener('DOMContentLoaded',function(){

        let status= document.getElementById('status');
        let paid=document.getElementById('paid')
        let delay=document.getElementById('delay')
        paid.addEventListener('click', function(){
            status.style.backgroundColor='green';
            status.style.color="#fff";
            status.style.border="none";
        })
        delay.addEventListener('click' ,function(){
          status.style.backgroundColor='red';
            status.style.color="#fff";
            status.style.border="none";
        })
     
    })
</script>