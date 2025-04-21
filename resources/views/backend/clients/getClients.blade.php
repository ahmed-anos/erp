@extends('master')
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
          <div class="table-responsive mt-4" style="overflow: hidden">
            <table class="table table-hover table-bordered" id="sampleTable">
              {{-- @if (count($clients) >0)
              <div class='optional-btns' style="display:flex; margin-bottom:30px; width:100% ; justify-content:end">
                    <a class="btn btn-primary" style="background: #343a40 ;border-color:#343a40" href="javascript:window.print();"><i class="bi bi-printer me-2"></i> طباعه</a>
                <a href="{{ route('drivers.export') }}" style="background: #ffc107 ;color:#fff ;margin:0 10px" class="btn ">ترحيل الاكسيل </a>
              </div>
              @endif --}}
              {{-- @if (count($clients) >0)
              <form action="{{ route('clients.show', ':id') }}" style="margin: 10px 0" method="get">
                <div style="display: flex ;margin:10px 0">
                  <label for="" >البحث عن عميل:</label>
                  <select name="id" id=""  class="form-control" style="width:350px">
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                      </select>
                      <button type="submit" style="background: #00695C ;color:#fff ;margin:0 10px" class="btn ">بحث</button>
                  </div>
                </form>
                @endif --}}
              <thead>
                <tr>
                  <th>الاسم</th>
                  <th>خط العمل</th>
                  <th>بدايه القسط</th>
                  <th>نهايه القسط</th>
                  <th>رقم السياره </th>
                  <th>القسط</th>
                  <th>المديونيه</th>
                  <th>المدفوع </th>
                  <th>المتبقي </th>
                  <th>عدد اشهر القسط </th>
                  <th>عدد الاشهر التاخير</th>
                  <th> اجمالي المتاخر </th>
                  <th>الفائده </th>
                  {{-- <th>القسط الحالي  </th>
                  <th>جميع الاقساط </th>
                  <th>حذف </th> --}}
                </tr>
              </thead>
              <tbody>
                <?php $i=0 ?>
                @foreach ($clients as $client)
                <tr onclick="window.location.href='{{ route('clients.details' ,$client->id) }}';">
                  <td>{{ $client->name }}</td>
                  <td>{{ $client->country }}</td>
                  <td>{{ $client->start_installment }}</td>
                  <td>{{ $client->end_installment }}</td>
                  <td>{{ $client->car }}</td>
                  <td>{{ $client->installment }}</td>
                  <td>{{ $client->indebtedness }}</td>
                  <td>{{ $client->paid }}</td>
                  <td>{{ $client->remaining }}</td>
                  <td>{{ $client->installments_count }}</td>
                  <td> {{ $client->delayed_months }}</td>
                  <td>{{ $client->delayed_months * $client->installment }}</td>
                  <td>{{ $client->interest }}</td>
                  {{-- <td class="text-center"><a href="{{ route('clients.edit' , $client->id) }}" class="btn " style="background: #20c997">تعديل  </a></td>
                  <td class="text-center"><a href="{{ route('clients.details' ,$client->id) }}" class="btn" style="background: #6c757d">عرض </a></td>
                  <td class="text-center">
                    <form id="delete-form-{{ $client->id }}" action="{{ route('drivers.destroy', ['id' => $client->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $client->id }}">
                            حذف
                        </button>
                
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal-{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $client->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel-{{ $client->id }}">تأكيد الحذف</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        هل أنت متأكد أنك تريد حذف هذا السائق؟
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                        <button type="button" class="btn btn-danger" onclick="document.getElementById('delete-form-{{ $client->id }}').submit();">
                                            تأكيد الحذف
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </td> --}}
                
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
  @endsection

