<div class="card p-3" style="width: 15rem;">
    <p class="text-center mb-3 text-capitalize">{{ $domain->domain }}</p>
    <div class="icon c-white p-5 fs-1 flex justify-center align-center rad-6" style="background-color: {{ $domain->hex_color  }}">
        <i class="fa-brands fa-{{ $domain->icon_name  }}"></i>
    </div>

    <div class="card-body" >
        <h5 class="card-title text-center text-gray-400 text-capitalize">hex color</h5>
        <div class="flex justify-between align-center cursor-pointer">
            <p class="card-text">{{ $domain->hex_color  }}</p>
            <i class="fa-solid fa-copy cursor-pointer"></i>
        </div>
    </div>
</div>
