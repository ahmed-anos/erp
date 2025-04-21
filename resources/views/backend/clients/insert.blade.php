@extends('master')
@section('content')
<main class="app-content">

  <div class="app-title" style="direction: ltr">
    <div>
      <h1><i class="bi bi-ui-checks"></i> ادخال العملاء </h1>
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
      <div class="col-md-12" >
        <div class="tile">
          <h3 class="tile-title">نموذج تسجيل عميل </h3>
          <div class="tile-body">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            <form action="{{ route('clients.store') }}" method="POST" style="display: flex ;flex-wrap:wrap">
              @csrf
              <div class="btn_containers" style="display: flex ;flex-wrap:wrap ; width:100%">

              @php
                if($lastClient){
                  $id=$lastClient->id + 1;
                }else{
                  $id=1;
                }
              @endphp
              <div class="mb-3 col-3 mx-3">
                <label class="form-label">كود العميل</label>
                <input class="form-control" disabled type="text" name="code" value="{{ $id }}" placeholder="ادخل كود العميل">
                @error('code')
                  <p style="color: red" >من فضلك ادخل اسم العميل</p>
                @enderror
              </div>
              <div class="mb-3 col-3 mx-3">
                <label class="form-label">الاسم</label>
                <input class="form-control" type="text" name="name" placeholder="ادخل اسم العميل">
                @error('name')
                  <p style="color: red" >من فضلك ادخل اسم العميل</p>
                @enderror
              </div>
              <div class="mb-3 col-3 mx-3">
                <label class="form-label">خط العمل</label>
                <input class="form-control" type="text" name="country" placeholder=" ادخل خط العمل">
                @error('country')
                <p style="color: red">{{ $message }}</p>
              @enderror
              </div>
              <div class="mb-3 col-3 mx-3">
                <label class="form-label">رقم السياره</label>
                <input class="form-control" type="text" name="car" placeholder=" ادخل رقم السياره">
              @error('car')
                <p style="color: red">هذه السياره مسجله مع عميل اخر</p>
              @enderror
              </div>
              <div class="mb-3 col-3 mx-3">
                <label class="form-label">بدايه القسط</label>
                <input class="form-control" id="start" type="date" name="start_installment" >
                @error('start_installment')
                <p style="color: red">{{ $message }}</p>
              @enderror
              </div>
              <div class="mb-3 col-3 mx-3">
                <label class="form-label">نهايه القسط</label>
                <input class="form-control" id="end" type="date" name="end_installment" >
                @error('end_installment')
                <p style="color: red">{{ $message }}</p>
              @enderror
              </div>
              <div class="mb-3 col-3 mx-3">
                <label class="form-label">عدد الاقساط</label>
                <input class="form-control" id="count" type="number" name="installments_count" >
              </div>
              <div class="mb-3 col-3 mx-3">
                <label class="form-label"> معدل الفائده</label>
                <input class="form-control" type="number" min="0" id="interest_rate" name="interest_rate" placeholder=" ادخل قيمه القسط">
                @error('interest_rate')
                <p style="color: red">{{ $message }}</p>
              @enderror
              </div>
              <div class="mb-3 col-3 mx-3">
                <label class="form-label">المديونية</label>
                <input class="form-control" id="indebtedness" type="number" name="indebtedness" placeholder=" ادخل قيمه المديونية">
                @error('indebtedness')
                <p style="color: red">{{ $message }}</p>
              @enderror
              </div>
              <div class="mb-3 col-3 mx-3">
                <label class="form-label">قيمه القسط</label>
                <input class="form-control" type="number" readonly id="installment" name="installment" placeholder=" ادخل قيمه القسط">
                @error('installment')
                <p style="color: red">{{ $message }}</p>
              @enderror
              </div>
              
              <div class="mb-3 col-3 mx-3">
                <label class="form-label">المدفوع</label>
                <input class="form-control" id="paid" type="number" name="paid" placeholder=" ادخل قيمه المدفوع">
              </div>
              <div class="mb-3 col-3 mx-3">
                <label class="form-label">المتبقي</label>
                <input class="form-control" id="remain" autocomplete="off" type="number" name="remaining" placeholder="ادخل قيمه المتبقي" readonly>
              </div>
              <div class="mb-3 col-3 mx-3">
                <label class="form-label">الفائده</label>
                <input class="form-control"  autocomplete="off" type="number" id='interest' name="interest" placeholder="ادخل قيمه الفائده" >
              </div>
              <div class="mb-3 col-3 mx-3">
                <label class="form-label">عدد الاشهر المتاخره</label>
                <input class="form-control"  autocomplete="off" type="number" id="delayedMonths" name="delayed_months" placeholder="ادخل قيمه الشهور" >
              </div>
              <div class="mb-3 col-3 mx-3">
                <label class="form-label">  اجمالي المتاخر</label>
                <input class="form-control" readonly autocomplete="off" type="number" id="delayedMoney" name="delayed_months" placeholder=" اجمالي المتاخر" >
              </div>

            </div>
              <div class="tile-footer col-3 mx-3" style="display: block !important">
                <button class="btn btn-primary" type="submit"><i class="bi bi-check-circle-fill me-2"></i>تسجيل</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="bi bi-x-circle-fill me-2"></i>الغاء</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection




<script>
  document.addEventListener('DOMContentLoaded', function() {
    const remain = document.getElementById('remain');
    const paid = document.getElementById('paid');
    const indebtedness = document.getElementById('indebtedness');
    const start = document.getElementById('start');
    const end = document.getElementById('end');
    const count = document.getElementById('count');
    const installment = document.getElementById('installment');
    const interest = document.getElementById('interest');
    const delayedMonths = document.getElementById('delayedMonths');
    const delayedMoney = document.getElementById('delayedMoney');
    const interestRate = document.getElementById('interest_rate');

    // تحديث المتبقي
    function updateRemaining() {
      let indebtednessValue = parseFloat(indebtedness.value) || 0;
      let paidValue = parseFloat(paid.value) || 0;
      remain.value = (indebtednessValue - paidValue).toFixed(0); 
    }

    // تحديث عدد الأشهر بين التاريخين
    function countMonth() {
      let startDate = new Date(start.value);
      let endDate = new Date(end.value);
      let yearsDifference = endDate.getFullYear() - startDate.getFullYear();
      let monthsDifference = endDate.getMonth() - startDate.getMonth();
      if (monthsDifference < 0) {
        yearsDifference--;
        monthsDifference += 12;
      }
      let totalMonths = yearsDifference * 12 + monthsDifference;
      count.value = totalMonths + 1;
      calcInstallment(); // إعادة الحساب بعد تحديث عدد الأشهر
    }

    // حساب القسط والفائدة والمتأخر
    function calcInstallment() {
      const c = parseFloat(count.value) || 0;
      const d = parseFloat(indebtedness.value) || 0;
      const r = parseFloat(interestRate.value) || 0;
      const dm = parseFloat(delayedMonths.value) || 0;

      const monthlyRate = r / 100 / 12;
      let resultInstallment = 0;

      if (monthlyRate > 0 && c > 0) {
        resultInstallment = (d * monthlyRate * Math.pow(1 + monthlyRate, c)) /
                            (Math.pow(1 + monthlyRate, c) - 1);
        installment.value = resultInstallment.toFixed(0);
        interest.value = (d * monthlyRate * c).toFixed(0);
      } else if (c > 0) {
        resultInstallment = d / c;
        installment.value = resultInstallment.toFixed(0);
        interest.value = 0;
      }

      // حساب المتأخر بناء على عدد الأشهر المتأخرة
      delayedMoney.value = (dm * resultInstallment).toFixed(0);
    }

    // الأحداث
    [indebtedness, paid].forEach(el => el.addEventListener('input', updateRemaining));
    [start, end].forEach(el => el.addEventListener('input', countMonth));
    [count, interestRate, indebtedness, delayedMonths].forEach(el => el.addEventListener('input', calcInstallment));
  });
</script>

 {{-- <script>
  document.addEventListener('DOMContentLoaded', function() {
    let remain = document.getElementById('remain');
    let paid = document.getElementById('paid');
    let indebtedness = document.getElementById('indebtedness');
    let start = document.getElementById('start');
    let end = document.getElementById('end');
    let count = document.getElementById('count');
    let installment=document.getElementById('installment')
    let interest=document.getElementById('interest')
    let delayedMonths=document.getElementById('delayedMonths');
    let delayedMoney=document.getElementById('delayedMoney')
    let interestRate=document.getElementById('interest_rate')


   
    
    if (indebtedness && paid) {
      function updateRemaining() {
        let indebtednessValue = parseFloat(indebtedness.value) || 0;
        let paidValue = parseFloat(paid.value) || 0;
        let interestRateValue=parseFloat(interestRate.value)||0;
        remain.value = (indebtednessValue - paidValue).toFixed(0); 
     
    
      }

      indebtedness.addEventListener('input', updateRemaining);
      paid.addEventListener('input', updateRemaining);
    }

    if(delayedMonths && installment){
      console.log(delayedMoney);
      
        delayedMoney.value= (delayedMonths * installment).toFixed(2)
    }
    if(count.value && interestRate.value && indebtedness.value){
      let monthlyInterestRate = interestRate.value / 100 / 12;
      let installmentC = 0;
      function calcInstallment(){
        // let totalInterest = 0;
        // let totalLateInterest = 0;
        if (monthlyInterestRate > 0 ) {
          installmentC = (indebtedness.value * monthlyInterestRate * Math.pow(1 + monthlyInterestRate, count.value)) / 
                        (Math.pow(1 + monthlyInterestRate, count.value) - 1);
          installment.value=(installmentC).toFixed(0)
          let totalInterest = indebtedness.value * monthlyInterestRate * count.value;
          interest.value=totalInterest.toFixed(0)

  
          
      } else {
          installmentC = indebtedness.value / count.value; // في حالة عدم وجود فائدة
          installment.value=installmentC
      }
      }
    }
    // calcInstallment()

    if (start && end) {
    function countMonth() {
      let startDate = new Date(start.value);
      let endDate = new Date(end.value);
      
      let yearsDifference = endDate.getFullYear() - startDate.getFullYear();
      let monthsDifference = endDate.getMonth() - startDate.getMonth();

      if (monthsDifference < 0) {
        yearsDifference--;
        monthsDifference += 12;
      }

      let totalMonths = yearsDifference * 12 + monthsDifference;
      count.value=totalMonths + 1;
      return totalMonths + 1;
    }

    start.addEventListener('input', countMonth);
    end.addEventListener('input', countMonth);
    indebtedness.addEventListener('change' ,calcInstallment);
    interestRate.addEventListener('change' ,calcInstallment);
    count.addEventListener('change' ,calcInstallment);
    delayedMonths.addEventListener('change' ,calcInstallment);
  }
  });



</script> --}}
