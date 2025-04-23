<main class="app-content">
    <div class="app-title" style="direction: ltr">
        <div>
          <h1><i class="bi bi-ui-checks"></i> سندات قبض العملاء </h1>
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
            <h3 class="tile-title">   اضافه قبض عميل </h3>
            <div class="tile-body">
                <form wire:submit.prevent="addReceipt" style="display: flex ;flex-wrap:wrap" enctype="multipart/form-data">
                    @csrf
                    <div class="btn_containers" style="display: flex ;flex-wrap:wrap ; width:100%">
      

                      <div class="mb-3 col-3 mx-3 position-relative" wire:click.away="$set('showSuggestions', false)">
                        <label class="form-label">الكود</label>
                        <input class="form-control" type="text" wire:model.live="code" wire:focus="$set('showSuggestions', true)" placeholder="ابحث بالكود أو الاسم">
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
                                                    <button class="btn btn-sm btn-primary" wire:click.prevent="selectClient('{{ $client->code }}')">اختيار</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                    
                      
                   
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label">رقم المستند</label>
                      <input class="form-control" type="text" wire:model="document_number" placeholder="ادخل رقم المستند">
                      @error('document_number')
                        <p style="color: red" >من فضلك ادخل رقم المستند</p>
                      @enderror
                    </div>
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label"> التاريخ</label>
                      <input class="form-control" type="date" wire:model="date" placeholder=" ">
                      @error('date')
                      <p style="color: red">من فضلك ادخل التاريخ</p>
                    @enderror
                    </div>
                    <div class="mb-3 col-3 mx-3">
                        <label class="form-label">  نوع القبض</label>
                        <select class="form-control"  wire:model="type" placeholder=" ادخل نوع القبض">
                            <option value="">من فضلك اختر نوع</option>
                          <option value="نقدي">قبض نقدي </option>
                          <option value="بنكي">شيك بنكي </option>
                        </select>
                        @error('type')
                        <p style="color: red">من فضلك حدد نوع العمليه</p>
                      @enderror
                    </div>
                 
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label">البيان</label>
                      <input class="form-control" id="paid" type="text" wire:model="description" placeholder=" ادخل البيان ">
                    </div>
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label">السعر </label>
                      <input class="form-control" id="remain"  type="integer" wire:model="money" placeholder="ادخل اموال القبض" >
                      @error('money')
                      <p style="color: red">من فضلك ادخل المبلغ</p>
                    @enderror
                    </div>
                   
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label">  المرفقات</label>
                      <input class="form-control" readonly autocomplete="off" type="file" multiple id="delayedMoney" wire:model="images" placeholder=" صور المستند" >
                    @if ($images)
                    @foreach ($images as $image)
                      
                     <img src="{{ $image->temporaryUrl() }}" width="100" height="100">
                    @endforeach
                      
                    @endif
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