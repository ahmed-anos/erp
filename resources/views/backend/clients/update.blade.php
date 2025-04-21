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
          <div class="table-responsive" style="overflow: hidden">
            <table class="table table-hover table-bordered" id="sampleTable1" >
         
              <thead>
                <tr>
                  <th>الاسم</th>
                 <th>القسط</th>
                  <th>عدد الاشهر التاخير</th>
                  <th> اجمالي المتاخر </th>
                  <th>الفائده </th>
                  <th>القسط الحالي</th>
                  <th>ميعاد السداد</th>
                  <th>حاله القسط   </th>
                  <th>سداد/الغاء</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0 ?>
                
                <tr class="my_row flex column">
                  <form action="{{ route('installments.store') }}" method="POST">
                    @csrf
                   <td><input type="text" name="name" class="installment" readonly value="{{ $client->name }}" style="border:none !important ; outline:none ;width:50%"></td>
                   <td><input type="text" name="installment" class="installment" readonly value="{{ $client->installment }}" style="border:none !important ; outline:none ;width:50%"></td>
                   <td><input type="text" name="delayed_months" class="installment" readonly value="{{ $client->delayed_months }}" style="border:none !important ; outline:none ;width:50%"></td>
                   <td><input type="text" name="totalDelayed" class="installment" readonly value="{{ $client->delayed_months * $client->installment }}" style="border:none !important ; outline:none ;width:50%"></td>
                   <td><input type="text" name="interest" class="installment" readonly value="{{ $client->interest }}" style="border:none !important ; outline:none ;width:50%"></td>
                  <td>رقم القسط الحالي</td>
                  <td>تاريخ التسديد</td>
                   <td>
                   
                        <select name="status" id="status" class="form-control">
                            {{-- <option value="" readonly>اختر العمليه</option> --}}
                            <option value="1" name="paid" id="paid">دفع</option>
                            <option value="2" name="delay" id="delay">تاخير</option>
                        </select>
                        
                        
                      </td>
                      <td><button type="submit" class="form-control" style="background-color: #6610f2; color:#fff">حفظ </button></td>
                    </form>
                  {{--<td>اجمالي المتبقي</td>
                  <td>الفائده</td> --}}
                  {{-- <td class="text-center"><a href="{{ route('clients.update') }}" class="btn " style="background: #20c997">تعديل  </a></td> --}}
                  {{-- <td class="text-center"><a href="{{ route('clients.details', ['id'=>$client->id]) }}" class="btn" style="background: #6c757d">تفاصيل </a></td> --}}

                  
                </tr>
                {{-- @endforeach --}}
                
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