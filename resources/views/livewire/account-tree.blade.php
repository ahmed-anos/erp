<main class="app-content">
    <div class="app-title" style="direction: ltr">
        <div>
            <h1><i class="bi bi-ui-checks"></i> دليل الحسابات   </h1>
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
        <div class="col-md-5">
            <div class="tile">
                <h3 class="tile-title">اضافه الحسابات</h3>
                <div class="tile-body">
                    <form wire:submit.prevent="save" class="space-y-2 clo-6">
                        <div class="btn_containers" style="display: flex ;flex-wrap:wrap ; width:100%">

                        <div class="mb-3 col-3 mx-3">
                            <label  class="form-label">اسم الحساب</label>
                            <input wire:model="name" type="text" class="form-control">
                            @error('name')
                                <p style="color: red">اسم الحساب مطلوب</p>
                            @enderror
                        </div>

                        <div class="mb-3 col-3 mx-3">
                            <label class="form-label">الكود</label>
                            <input wire:model="code" type="text" class="form-control">
                            @error('code')
                                <p style="color: red">يجب تسجيل كود حساب فريد</p>
                            @enderror
                        </div>

                        <div class="mb-3 col-3 mx-3">
                            <label class="form-label">نوع الحساب</label>
                            <select wire:model="type"  class="form-control">
                                <option value="">اختر</option>
                                <option value="asset">أصل</option>
                                <option value="liability">التزام</option>
                                <option value="income">إيراد</option>
                                <option value="expense">مصروف</option>
                            </select>
                        </div>

                        <div class="mb-3 col-3 mx-3">
                            <label class="form-label">الحساب الأب</label>
                            <select wire:model="parent_id" class="form-control">
                                <option value="">بدون</option>
                                @foreach(App\Models\Account::all() as $acc)
                                    <option value="{{ $acc->id }}">{{ $acc->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="tile-footer col-3 mx-3" style="display: block !important">
                        <button type="submit" class="btn btn-primary"> <i class="bi bi-check-circle-fill me-2"></i>إضافة</button>
                        </div>
                    </form>

                    @if (session()->has('message'))
                        <div class="text-green-600">{{ session('message') }}</div>
                    @endif

                   
                </div> <!-- .tile-body -->
            </div> <!-- .tile -->
        </div> <!-- .col-md-12 -->

        {{-- <div class=" col-5">
            <div class="tile">
            <div class="tile-body">
            <h2 class="font-bold">شجرة الحسابات:</h2>
            @foreach($accounts as $acc)
                @include('livewire.partials.account-node', ['account' => $acc])
            @endforeach
            </div>
            </div>
        </div> --}}


        <div class=" col-6">
            <div class="tile">
                <h2 class="font-bold">شجرة الحسابات:</h2>
            <div class="tile-body d-flex flex-wrap">
            @foreach(['asset' => 'الأصول', 'liability' => 'الخصوم', 'income' => 'الإيرادات', 'expense' => 'المصروفات'] as $key => $label)
                <div class="col-md-3 " style="margin-left: 1px ;width:24%">
                    <button wire:click="toggleMain('{{ $key }}')" class="btn btn-primary w-100 " >
                        {{ in_array($key, $expandedMainTypes) ? '-' : '+' }} {{ $label }}
                    </button>
        
                    @if(in_array($key, $expandedMainTypes))
                        @foreach($accounts->where('type', $key)->whereNull('parent_id') as $acc)
                            @include('livewire.partials.account-node', ['account' => $acc])
                        @endforeach
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div> 
        
    </div> <!-- .row -->
</main>
