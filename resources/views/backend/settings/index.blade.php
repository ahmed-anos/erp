@extends('master')
@section('content')
<main class="app-content" style="direction: rtl">

  <div class="app-title" style="direction: ltr">
    <div>
      <h1><i class="bi bi-ui-checks"></i>الاعدادات العامه</h1>
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

              <table class="table table-hover table-bordered" id="sampleTable1">
                    <thead style="text-align: center">
                      <tr>
                        <th style="width: 40%">اسم الشركه</th>
                        <td style="width: 60%">{{ $setting->name }}</td>
                      </tr>
                      <tr>
                        <th style="width: 40%">اسم المالك</th>
                        <td style="width: 60%">{{ $setting->owner }}</td>
                      </tr>
                      <tr>
                        <th style="width: 40%"> النشاط</th>
                        <td style="width: 60%">{{ $setting->activity }}</td>
                      </tr>
                      <tr>
                        <th style="width: 40%"> رقم الهاتف</th>
                        <td style="width: 60%">{{ $setting->phone }}</td>
                      </tr>
                      <tr>
                        <th style="width: 40%"> الرقم الضريبي</th>
                        <td style="width: 60%">{{ $setting->tax_number }}</td>
                      </tr>
                      <tr>
                        <th style="width: 40%">العنوان </th>
                        <td style="width: 60%"> {{ $setting->address }}</td>
                      </tr>
                      <tr>
                        <th style="width: 40%">اخر تحديث </th>
                        <td style="width: 60%">{{ $setting->updated_at }}</td>
                      </tr>
                      <tr>
                        <th style="width: 40%">الشخص المسؤل </th>
                        <td style="width: 60%">{{ $setting->user }}</td>
                      </tr>
                      <tr>
                        <th style="width: 40%"> اللوجو </th>
                        <td style="width: 60%"><img src={{ asset("logo/$setting->logo") }} style="width:150px ;height:150px"  alt="logo"></td>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <form action="{{ route('settings.create') }}" method="get">
             
                   <button class="btn btn-primary" type="submit"><i class="bi bi-check-circle-fill me-2"></i>تعديل</button>&nbsp;&nbsp;&nbsp;
            </form>
            </div>
          </div>
        </div>
      </main>
    
    @endsection