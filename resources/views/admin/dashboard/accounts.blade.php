<div class="flex align-center flex-1 gap-1 mb-3">
    <i class="fa-brands fa-{{ $account->domain->icon_name }} center-flex c-white w-16 h-full p-15"
       style="background-color: {{ $account->domain->hex_color }}"></i>
    <div class="content flex  w-100 align-items-center">
        <div
            class="name flex-1 text-white p-10" @style(['opacity: .5; background-color: ' . $account->domain->hex_color])>
            <a href="https://{{ $account->domain->domain }}.com/{{ $account->username_account }}"
               class="w-full">{{$account->username_account}}</a>
        </div>
    </div>
</div>
