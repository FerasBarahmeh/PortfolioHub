<button {{ $attributes->merge(['type'=>'button',  'class' => 'inline-flex items-center text-black  bg-transparent border-0 text-xs uppercase transition ease-in-out duration-150 text-capitalize']) }}>


    @if($slot->isNotEmpty())
        {{ $slot }}
    @else
        <i class="fa fa-x c-black bg-transparent border-0 d-inline-flex  justify-center align-center"></i>
    @endif

</button>
