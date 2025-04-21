
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar" style="overflow: hidden">
   <div class="app-sidebar__user">
      
      <img class="app-sidebar__user-avatar" src="https://randomuser.me/api/portraits/men/1.jpg" alt="User Image">
      <div>
      <p class="app-sidebar__user-name" style="word-wrap: break-word;white-space:wrap">مرحبا بك في شركه دانه العواصم للنقل</p>

      {{-- <p class="app-sidebar__user-designation">{{ Auth::user()->role }}</p> --}}
    </div>
  </div>
  <ul class="app-menu">
    {{-- <li class="treeview"  style="text-align: center">
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
    </li> --}}
     <li class="treeview"  style="text-align: center">
     <a class="app-menu__item" href="#" data-toggle="treeview" aria-controls="treeview-menu" aria-hidden="true" style="justify-content:space-between">
          <i class="treeview-indicator bi bi-chevron-left"></i>
          <span>
             <span class="app-menu__label">المصروفات</span>
             <i class="bi bi-credit-card-2-back"></i>
          </span>
         
         </a>
        
      <ul class="treeview-menu" >
        <li style="direction: rtl"><a class="treeview-item" href="{{ route('frontend.create') }}"><i class="icon bi bi-circle-fill"></i> تسجيل مصروف جديد</a></li>
        <li style="direction: rtl"><a class="treeview-item" href="{{ route('frontend.index') }}"><i class="icon bi bi-circle-fill"></i> استعلام المصروفات </a></li>
        {{-- <li style="direction: rtl"><a class="treeview-item" href="{{ route('frontend.expenses.total') }}"><i class="icon bi bi-circle-fill"></i>  الاجمالي حسب المكان </a></li> --}}
      
       </ul>
    </li>
   

     {{-- @if (Auth::user()->hasRole(['owner','محاسب'])) --}}
        
    <li class="treeview"  style="text-align: center">
     <a class="app-menu__item" href="#" data-toggle="treeview" aria-controls="treeview-menu" aria-hidden="true" style="justify-content:space-between">
          <i class="treeview-indicator bi bi-chevron-left"></i>
          <span>
             <span class="app-menu__label">التقارير</span>
             <i class="bi bi-menu-button-wide"></i>
          </span>
         
         </a>
        
      <ul class="treeview-menu" >
        <li style="direction: rtl"><a class="treeview-item" href=""><i class="icon bi bi-circle-fill"></i>  جميع المصروفات </a></li>
        <li style="direction: rtl"><a class="treeview-item" href=""><i class="icon bi bi-circle-fill"></i>  المصروفات اليوميه</a></li> 
        <li style="direction: rtl"><a class="treeview-item" href=""><i class="icon bi bi-circle-fill"></i>اجمالي المصاريف</a></li>
      </ul>
     </li>
     {{-- @endif --}}

   
    
    
  </ul>
</aside>
{{-- @extends('layouts.footer') --}}
{{-- @endsection --}}