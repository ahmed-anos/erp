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
            <h3 class="tile-title">  حركه عميل </h3>
            <div class="tile-body">
                <form wire:submit.prevent="#" style="display: flex ;flex-wrap:wrap">
                    @csrf
                    <div class="btn_containers" style="display: flex ;flex-wrap:wrap ; width:100%">
      
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label">الكود </label>
                      <input class="form-control"  type="text" name="code" value="" placeholder="">
                      @error('code')
                        <p style="color: red" ></p>
                      @enderror
                    </div>
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label">رقم المستند</label>
                      <input class="form-control" type="text" name="name" placeholder="ادخل رقم المستند">
                      @error('name')
                        <p style="color: red" >من فضلك ادخل رقم المستند</p>
                      @enderror
                    </div>
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label"> التاريخ</label>
                      <input class="form-control" type="date" name="date" placeholder=" ">
                      @error('country')
                      <p style="color: red">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label"> العميل</label>
                      <select class="form-control"  name="client" placeholder=" ادخل رقم العميل">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                      </select>
                    @error('client')
                      {{-- <p style="color: red">هذه السياره مسجله مع عميل اخر</p> --}}
                    @enderror
                    </div>
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label">رصيد العميل</label>
                      <input class="form-control" id="start" type="number" name="money" >
                      @error('start_installment')
                      <p style="color: red">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="mb-3 col-3 mx-3">
                        <label class="form-label"> مصروفات النساف</label>
                        <select class="form-control"  name="violation" placeholder=" ادخل رقم العميل">
                          <option value="">ديزل</option>
                          <option value="">قطع غيار</option>
                          <option value="">صيانه</option>
                          <option value="">كهرباء </option>
                          <option value="">زيوت</option>
                          <option value="">راتب</option>
                          <option value="">اخري</option>
                          <option value="">بنشر</option>
                          <option value="">تواير</option>
                        </select>
                      @error('violation')
                        {{-- <p style="color: red">هذه السياره مسجله مع عميل اخر</p> --}}
                      @enderror
                    </div>
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label">  سعر المخالفه</label>
                      <input class="form-control" type="number" min="0" id="interest_rate" name="interest_rate" placeholder=" ادخل  سعر المخالفه">
                      @error('interest_rate')
                      <p style="color: red">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label">اجمالي المخالفه للمصروف المختار فقط</label>
                      <input class="form-control" id="indebtedness" type="number" name="indebtedness">
                      @error('indebtedness')
                      <p style="color: red">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label"> اجمالي المصروف حتي الان</label>
                      <input class="form-control" type="number" readonly id="installment" name="installment" >
                      @error('installment')
                      <p style="color: red">{{ $message }}</p>
                    @enderror
                    </div>
                    
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label">البيان</label>
                      <input class="form-control" id="paid" type="text" name="paid" placeholder=" ادخل البيان ">
                    </div>
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label">السائق</label>
                      <input class="form-control" id="remain" autocomplete="off" type="number" name="remaining" placeholder="ادخل اسم السائق" readonly>
                    </div>
                   
                    <div class="mb-3 col-3 mx-3">
                      <label class="form-label">  المرفقات</label>
                      <input class="form-control" readonly autocomplete="off" type="file" multiple id="delayedMoney" name="delayed_months" placeholder=" صور المستند" >
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