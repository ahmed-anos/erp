
<div class="ml-4">
    @if ($account->children->count())
        <button wire:click="toggle({{ $account->id }})" class="btn  border mt-2" style="background: #eaeaea">
            {{ in_array($account->id, $expandedAccounts) ? '-' : '+' }} 
            {{ $account->name }} ({{ $account->code }})
        </button>
    @else
        <div class="mt-2">
            - {{ $account->name }} ({{ $account->code }})
        </div>
    @endif

    @if ($account->children->count() && in_array($account->id, $expandedAccounts))
        @foreach ($account->children as $child)
            @include('livewire.partials.account-node', ['account' => $child])
        @endforeach
    @endif
</div>
