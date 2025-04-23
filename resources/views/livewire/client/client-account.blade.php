<main class="app-content">
    <div class="app-title" style="direction: ltr">
        <div>
          <h1><i class="bi bi-ui-checks"></i> كشف حساب  العملاء </h1>
          {{-- <p>Bootstrap default form components</p> --}}
        </div>
        {{-- <ul class="app-breadcrumb breadcrumb" style="direction: rtl; font-size:14px">
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
        </ul> --}}
      </div>

      <div class="row" style="direction: rtl">
        <div class="col-md-12" >
          <div class="tile">
            {{-- @if ($details)
              {{ dd($details) }}
            @endif --}}
            <h3 class="tile-title">   كشف حساب العميل </h3>
            <div class="tile-body">
                <form wire:submit.prevent="getDetails" style="display: flex ;flex-wrap:wrap">
                    @csrf
                    <div class="btn_containers" style="display: flex ;flex-wrap:wrap ; width:100%">
      
                      <div class="mb-3 col-3 mx-3 position-relative" style="width: 20% !important" wire:click.away="$set('showSuggestions', false)">
                        <label class="form-label">الكود</label>
                        <input class="form-control" type="text"  wire:model.live="code" wire:focus="$set('showSuggestions', true)" placeholder="ابحث بالكود أو الاسم">
                        @error('code')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    
                        @if($showSuggestions && !empty($suggestedClients))
                            <div class="position-absolute bg-white border shadow mt-2 w-100" style="z-index: 1000; max-height: 300px; overflow-y: auto;">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>الكود</th>
                                            <th>الاسم</th>
                                            <th>اختيار</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($suggestedClients as $client)
                                            <tr>
                                                <td>{{ $client->code }}</td>
                                                <td>{{ $client->name }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary" wire:click.prevent="selectClient('{{ $client->code }}', '{{ $client->name }}')">اختيار</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                    
                      
                    <div class="mb-3 col-3 mx-3" style="width: 20% !important">
                      <label class="form-label">الحساب </label>
                      <input type="text" wire:model.live="client_name" class="form-control" >
                      @error('name')
                        <p style="color: red" ></p>
                      @enderror
                    </div>
                    
                    {{-- <div class="mb-3 col-3 mx-3" style="width: 20% !important">
                      <label class="form-label">  من التاريخ </label>
                      <input class="form-control" type="date" wire:model="start_date" placeholder=" " >
                      @error('country')
                      <p style="color: red">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="mb-3 col-3 mx-3" style="width: 20% !important">
                      <label class="form-label">  الي التاريخ </label>
                      <input class="form-control" type="date" wire:model="end_date" placeholder=" " >
                      @error('country')
                      <p style="color: red">{{ $message }}</p>
                    @enderror
                    </div> --}}
                    
                    <div class="tile-footer col-3 mx-3" style="display: block !important">
                      <button class="btn btn-primary" type="submit"><i class="bi bi-check-circle-fill me-2"></i>بحث</button>&nbsp;&nbsp;&nbsp;</a>
                    </div>
                  </form>


                  <table class="table table-hover table-bordered mt-3" id="sampleTable1" >
                    <thead>
                        <tr>
                            <th>التاريخ</th>
                            <th>المستند </th>
                            <th>نوع المستند</th>
                            <th>المصروف </th>
                            <th>البيان</th>
                            {{-- <th> مدين</th>
                            <th> دائن  </th>
                            <th>  الرصيد </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                     
                         @foreach ($account_details as $detail)
                         <tr>
                             <td>{{ $detail['date'] }}</td>
                             <td>{{ $detail['document_number'] }}</td>
                             <td>{{ $detail['expense'] }}</td>
                             <td>{{ number_format($detail['amount'], 2) }}</td>
                             <td>{{ $detail['description'] }}</td>
                         </tr>
                     @endforeach
                        
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
</main>