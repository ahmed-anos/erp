
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar">
  <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ asset("logo/$logo") }}"  alt="User Image">
    <div>
      <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
      <p class="app-sidebar__user-designation">{{ Auth::user()->role }}</p>
    </div>
  </div>
  <ul class="app-menu">
   {{-- @if (Auth::user()->hasRole(['owner','محاسب'])) --}}
    <li class="treeview"  style="text-align: center">
     <a class="app-menu__item" href="#" data-toggle="treeview" aria-controls="treeview-menu" aria-hidden="true" style="justify-content:space-between">
          <i class="treeview-indicator bi bi-chevron-left"></i>
          <span>
             <span class="app-menu__label">السائقين</span>
             <i class="bi bi-car-front"></i>
          </span>
         
         </a>
        
      <ul class="treeview-menu" >
        <li style="direction: rtl"><a class="treeview-item" href="{{ route('drivers.create') }}"><i class="icon bi bi-circle-fill"></i> ادخال سائق جديد</a></li>
        <li style="direction: rtl"><a class="treeview-item" href="{{ route('drivers.index') }}" target="_self" rel="noopener"><i class="icon bi bi-circle-fill"></i> استعلام عن السائق</a></li>
      </ul>
    </li>

{{-- @endif --}}
{{-- @if (Auth::user()->hasRole(['سائق'])) --}}

     <li class="treeview"  style="text-align: center">
     <a class="app-menu__item" href="#" data-toggle="treeview" aria-controls="treeview-menu" aria-hidden="true" style="justify-content:space-between">
          <i class="treeview-indicator bi bi-chevron-left"></i>
          <span>
             <span class="app-menu__label">مصروفات السائقين</span>
             <i class="bi bi-credit-card-2-back"></i>
          </span>
         
         </a>
        
      <ul class="treeview-menu" >
         <li style="direction: rtl"><a class="treeview-item" href="{{ route('expense.create') }}"><i class="icon bi bi-circle-fill"></i> تسجيل مصروف جديد</a></li>
         <li style="direction: rtl"><a class="treeview-item" href="{{ route('expense.index') }}"><i class="icon bi bi-circle-fill"></i> استعلام المصروفات </a></li>
         
      </ul>
   </li>
   {{-- @endif --}}

    {{-- @if (Auth::user()->hasRole(['owner','محاسب'])) --}}
     <li class="treeview"  style="text-align: center">
     <a class="app-menu__item" href="#" data-toggle="treeview" aria-controls="treeview-menu" aria-hidden="true" style="justify-content:space-between">
          <i class="treeview-indicator bi bi-chevron-left"></i>
          <span>
             <span class="app-menu__label">المصروفات</span>
             <i class="bi bi-credit-card-2-back"></i>
          </span>
         
         </a>
        
      <ul class="treeview-menu" >
        <li style="direction: rtl"><a class="treeview-item" href="{{ route('expense.create') }}"><i class="icon bi bi-circle-fill"></i> تسجيل مصروف جديد</a></li>
        <li style="direction: rtl"><a class="treeview-item" href="{{ route('expense.index') }}"><i class="icon bi bi-circle-fill"></i> استعلام المصروفات </a></li>
        <li style="direction: rtl"><a class="treeview-item" href="{{ route('expense.total') }}"><i class="icon bi bi-circle-fill"></i>  الاجمالي حسب المكان </a></li>
      
       </ul>
    </li>
  
    



































    <li class="treeview"  style="text-align: center">
     <a class="app-menu__item" href="#" data-toggle="treeview" aria-controls="treeview-menu" aria-hidden="true" style="justify-content:space-between">
          <i class="treeview-indicator bi bi-chevron-left"></i>
          <span>
             <span class="app-menu__label">التعريفات المحاسبيه</span>
             <i class="bi bi-menu-button-wide"></i>
          </span>
         
         </a>
        
      <ul class="treeview-menu" style="position: relative; ">
      <li style="direction: rtl ;" id="accounts"><a class="treeview-item "  href="" ><i class="icon bi bi-circle-fill"></i>  الحسابات </a>
         
      </li>
      <li style="direction: rtl" id="assets"><a class="treeview-item" href="" ><i class="icon bi bi-circle-fill"></i>   الاصول الثابته </a></li>
      </ul>
     </li>




































    <li class="treeview"  style="text-align: center">
     <a class="app-menu__item" href="#" data-toggle="treeview" aria-controls="treeview-menu" aria-hidden="true" style="justify-content:space-between">
          <i class="treeview-indicator bi bi-chevron-left"></i>
          <span>
             <span class="app-menu__label">التقارير</span>
             <i class="bi bi-menu-button-wide"></i>
          </span>
         
         </a>
        
      <ul class="treeview-menu" >
      <li style="direction: rtl"><a class="treeview-item" href="{{ route('reports.drivers') }}"><i class="icon bi bi-circle-fill"></i>  جميع السائقين </a></li>
        <li style="direction: rtl"><a class="treeview-item" href="{{ route('reports.expenses') }}"><i class="icon bi bi-circle-fill"></i>  جميع المصروفات </a></li>
        <li style="direction: rtl"><a class="treeview-item" href="{{ route('reports.daily.expenses') }}"><i class="icon bi bi-circle-fill"></i>  المصروفات اليوميه</a></li> 
        <li style="direction: rtl"><a class="treeview-item" href="{{ route('reports.total.expenses') }}"><i class="icon bi bi-circle-fill"></i>اجمالي المصاريف</a></li>
        <li style="direction: rtl"><a class="treeview-item" href="{{ route('client.account') }}"  rel="noopener"><i class="icon bi bi-circle-fill"></i> كشف حساب العملاء </a></li>
        <li style="direction: rtl"><a class="treeview-item" href="#"  rel="noopener"><i class="icon bi bi-circle-fill"></i> الاقساط</a></li>
        <li style="direction: rtl"><a class="treeview-item" href="#"  rel="noopener"><i class="icon bi bi-circle-fill"></i> الاقساط المؤخره</a></li>
        <li style="direction: rtl"><a class="treeview-item" href="#"  rel="noopener"><i class="icon bi bi-circle-fill"></i> الاقساط المدفوعه</a></li>
        <li style="direction: rtl"><a class="treeview-item" href="#"  rel="noopener"><i class="icon bi bi-circle-fill"></i>  قسط عميل</a></li>
        <li style="direction: rtl"><a class="treeview-item" href="#"  rel="noopener"><i class="icon bi bi-circle-fill"></i> اقساط الشهر القادم</a></li>
      </ul>
     </li>
     {{-- @endif

     @can('role:owner|محاسب') --}}
     <li class="treeview"  style="text-align: center">
     <a class="app-menu__item" href="#" data-toggle="treeview" aria-controls="treeview-menu" aria-hidden="true" style="justify-content:space-between">
          <i class="treeview-indicator bi bi-chevron-left"></i>
          <span>
             <span class="app-menu__label">الحركه </span>
             <i class="bi bi-menu-button-wide"></i>
          </span>
         
         </a>
        
      <ul class="treeview-menu" >
         <li style="direction: rtl"><a class="treeview-item" href="{{ route('client.transaction') }}"><i class="icon bi bi-circle-fill"></i> حركه العميل </a></li>
         <li style="direction: rtl"><a class="treeview-item" href=""><i class="icon bi bi-circle-fill"></i>   دفتر الاستاذ </a></li>
         <li style="direction: rtl"><a class="treeview-item" href=""><i class="icon bi bi-circle-fill"></i>  الارباح /الخسائر  </a></li>

      </ul>
    </li>
    {{-- @endcan
    
    @if (Auth::user()->hasRole(['owner','محاسب'])) --}}
    <li class="treeview"  style="text-align: center">
     <a class="app-menu__item" href="#" data-toggle="treeview" aria-controls="treeview-menu" aria-hidden="true" style="justify-content:space-between">
          <i class="treeview-indicator bi bi-chevron-left"></i>
          <span>
             <span class="app-menu__label">العملاء</span>
             <i class="bi bi-people"></i>
          </span>
         
         </a>
        
      <ul class="treeview-menu" >
        <li style="direction: rtl"><a class="treeview-item" href="{{ route('clients.create') }}" target="_self" rel="noopener"><i class="icon bi bi-circle-fill"></i> ادخال عميل</a></li>
        <li style="direction: rtl"><a class="treeview-item" href="{{ route('clients.index') }}" target="_self" rel="noopener"><i class="icon bi bi-circle-fill"></i> استعلام العملاء</a></li>
        <li style="direction: rtl"><a class="treeview-item" href="{{ route('client.account') }}" target="_self" rel="noopener"><i class="icon bi bi-circle-fill"></i> كشف حساب العملاء</a></li>

      </ul>
    </li>

    {{-- @endif

    @if (Auth::user()->hasRole(['owner','محاسب'])) --}}
    <li class="treeview"  style="text-align: center">
     <a class="app-menu__item" href="#" data-toggle="treeview" aria-controls="treeview-menu" aria-hidden="true" style="justify-content:space-between">
          <i class="treeview-indicator bi bi-chevron-left"></i>
          <span>
             <span class="app-menu__label">السندات الماليه</span>
             <i class="bi bi-people"></i>
          </span>
         
         </a>
        
      <ul class="treeview-menu" >
         <li style="direction: rtl"><a class="treeview-item" href="{{ route('client.receipt') }}"><i class="icon bi bi-circle-fill"></i>  سند قبض   </a></li>
         <li style="direction: rtl"><a class="treeview-item" href=""><i class="icon bi bi-circle-fill"></i>   سند صرف  </a></li>
         <li style="direction: rtl"><a class="treeview-item" href=""><i class="icon bi bi-circle-fill"></i>   اوراق القبض   </a></li>
         <li style="direction: rtl"><a class="treeview-item" href=""><i class="icon bi bi-circle-fill"></i>    ارسال الي البنك    </a></li>
         <li style="direction: rtl"><a class="treeview-item" href=""><i class="icon bi bi-circle-fill"></i>    مرتد من البنك   </a></li>
         <li style="direction: rtl"><a class="treeview-item" href=""><i class="icon bi bi-circle-fill"></i>   اوراق الدفع   </a></li>
         <li style="direction: rtl"><a class="treeview-item" href=""><i class="icon bi bi-circle-fill"></i>   سداد اوراق الدفع  </a></li>

      </ul>
    </li> 
    {{-- @endif

    @if (Auth::user()->hasRole(['owner','محاسب'])) --}}
    <li class="treeview"  style="text-align: center">
     <a class="app-menu__item" href="#" data-toggle="treeview" aria-controls="treeview-menu" aria-hidden="true" style="justify-content:space-between">
          <i class="treeview-indicator bi bi-chevron-left"></i>
          <span>
             <span class="app-menu__label">الحسابات العامه</span>
             <i class="bi bi-people"></i>
          </span>
         
         </a>
        
      <ul class="treeview-menu" >
         <li style="direction: rtl"><a class="treeview-item" href="{{ route('account.tree') }}"><i class="icon bi bi-circle-fill"></i>دليل الحسابات  </a></li>

      </ul>
    </li>
    {{-- @endif
    @if (Auth::user()->hasRole(['owner','محاسب'])) --}}
    <li class="treeview"  style="text-align: center">
     <a class="app-menu__item" href="#" data-toggle="treeview" aria-controls="treeview-menu" aria-hidden="true" style="justify-content:space-between">
          <i class="treeview-indicator bi bi-chevron-left"></i>
          <span>
             <span class="app-menu__label">المخزن</span>
             <i class="bi bi-people"></i>
          </span>
         
         </a>
        
      <ul class="treeview-menu" >
      </ul>
    </li>
    {{-- @endif
    
    @if (Auth::user()->hasRole('owner')) --}}
       
   
    <li class="treeview"  style="text-align: center">
     <a class="app-menu__item" href="#" data-toggle="treeview" aria-controls="treeview-menu" aria-hidden="true" style="justify-content:space-between">
          <i class="treeview-indicator bi bi-chevron-left"></i>
          <span>
             <span class="app-menu__label">المستخدمين</span>
             <i class="bi bi-people"></i>
          </span>
         
         </a>
        
      <ul class="treeview-menu" >
        <li style="direction: rtl"><a class="treeview-item" href="{{ route('users.index') }}" target="_self" rel="noopener"><i class="icon bi bi-circle-fill"></i>المستخدمين</a></li>
        <li style="direction: rtl"><a class="treeview-item" href="{{ route('roles.index') }}" target="_self" rel="noopener"><i class="icon bi bi-circle-fill"></i>  صلاحيات المستخدمين</a></li>

      </ul>
    </li>

    {{-- @endif --}}
    
    {{-- @if (Auth::user()->can('role:owner'))
        --}}
        {{-- @if (Auth::user()->hasRole(['owner','محاسب'])) --}}
        <!-- إظهار الأيقونة هنا -->
    {{-- @endif --}}
    <li class="treeview"  style="text-align: center">
     <a class="app-menu__item" href="#" data-toggle="treeview" aria-controls="treeview-menu" aria-hidden="true" style="justify-content:space-between">
          <i class="treeview-indicator bi bi-chevron-left"></i>
          <span>
             <span class="app-menu__label">الاعدادات</span>
             <i class="bi bi-people"></i>
          </span>
         
         </a>
        
      <ul class="treeview-menu" >
        <li style="direction: rtl"><a class="treeview-item" href="{{ route('settings.index') }}" target="_self" rel="noopener"><i class="icon bi bi-circle-fill"></i>اعدادات عامه</a></li>
        <li style="direction: rtl"><a class="treeview-item" href="" target="_self" rel="noopener"><i class="icon bi bi-circle-fill"></i>اعدادات التنبيه</a></li>

      </ul>
    </li>  
    {{-- @endif --}}
  </ul>
</aside>
@push('scripts')

 <script>

let submenu = document.getElementById('submenu');
let accounts = document.getElementById('accounts');
let assets = document.getElementById('assets');
let assetsSubmenu = document.getElementById('assets-submenu');

accounts.addEventListener('mouseover', function (e) {
  e.stopPropagation(); 
  submenu.style.display = 'block';
  assetsSubmenu.style.display = 'none';
});
assets.addEventListener('mouseover', function (e) {
  e.stopPropagation(); 
  assetsSubmenu.style.display = 'block';
  submenu.style.display = 'none';
});


document.addEventListener('click', function (e) {
  if (!submenu.contains(e.target) && e.target !== accounts) {
    submenu.style.display = 'none';
  }
});
document.addEventListener('click', function (e) {
  if (!assetsSubmenu.contains(e.target) && e.target !== assets) {
   assetsSubmenu.style.display = 'none';
  }

});

 </script>
@endpush