@props([
    'admin'
])
@foreach($admin->accounts as $account)
    <a href="https://{{ $account->domain->domain }}.com/{{ $account->username_account }}"
       class="mb-3" target="_blank">
        <i class="fa-brands fa-{{ $account->domain->domain }}"></i>
    </a>
@endforeach
