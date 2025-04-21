<main class="app-content">
    <div class="app-title" style="direction: ltr">
        <div>
          <h1><i class="bi bi-ui-checks"></i> كشف حساب  العملاء </h1>
          {{-- <p>Bootstrap default form components</p> --}}
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
        <div class="col-md-12" >
          <div class="tile">
            <h3 class="tile-title">   كشف حساب العميل </h3>
            <div class="tile-body">
                <form wire:submit.prevent="#" style="display: flex ;flex-wrap:wrap">
                    @csrf
                    <div class="btn_containers" style="display: flex ;flex-wrap:wrap ; width:100%">
      
                        <div class="mb-3 col-1 " style="margin-left: 2px">
                            <label class="form-label">رقم الحساب</label>
                            <input class="form-control" type="text" name="name" style="width:80%">
                            @error('name')
                              <p style="color: red" >من فضلك ادخل رقم المستند</p>
                            @enderror
                          </div>
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label">الحساب </label>
                      <select name="" id="" class="form-control">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                      </select>
                      @error('code')
                        <p style="color: red" ></p>
                      @enderror
                    </div>
                    
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label">  من التاريخ </label>
                      <input class="form-control" type="date" name="date" placeholder=" ">
                      @error('country')
                      <p style="color: red">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label">  الي التاريخ </label>
                      <input class="form-control" type="date" name="date" placeholder=" ">
                      @error('country')
                      <p style="color: red">{{ $message }}</p>
                    @enderror
                    </div>
                    
                    {{-- <div class="tile-footer col-3 mx-3" style="display: block !important">
                      <button class="btn btn-primary" type="submit"><i class="bi bi-check-circle-fill me-2"></i>تسجيل</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="bi bi-x-circle-fill me-2"></i>الغاء</a>
                    </div> --}}
                  </form>


                  <table class="table table-hover table-bordered mt-3" id="sampleTable1" >
                    <thead>
                        <tr>
                            <th>التاريخ</th>
                            <th>المستند </th>
                            <th>نوع المستند</th>
                            <th>المصروف </th>
                            <th>البيان</th>
                            <th> مدين</th>
                            <th> دائن  </th>
                            <th>  الرصيد </th>
                        </tr>
                    </thead>
                    <tbody>
                     

                        <tr>
                            <td>1</td>
                            <td>6000</td>
                            <td>2000</td>
                            <td>كهرباء</td>
                            <td>4000</td>
                            <td>12</td>
                            <td>3</td>
                            <td>1300</td>
                         
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>6000</td>
                            <td>2000</td>
                            <td>زيوت</td>
                            <td>2000</td>
                            <td>12</td>
                            <td>3</td>
                            <td>1300</td>
                          
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>6000</td>
                            <td>2000</td>
                            <td>قطع غيار</td>
                            <td>500</td>
                            <td>12</td>
                            <td>3</td>
                            <td>1300</td>
                            
                        </tr>

                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
</main>