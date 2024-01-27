<li class="education-card">
    <div class="period">
        <span class="join">{{ $education->start_date }}</span>
        <span class="dash">-</span>
        <span class="leave">{{ $education->finish_date }}</span>
    </div>

    <div class="d-flex justify-between w-full px-1">
        <div class="content">
            <div class="name">
                <span class="name">{{ Str::limit($education->name )  }}</span>
                <span class="at">At</span>
                <a href="{{ $education->organisation_url }}">{{ $education->organisation_name }}</a>
            </div>
        </div>

        <div class="options flex gap-1 p-10">
            <x-primary-button
                x-click
                class="text-capitalize bg-transparent "
                @style(['border: none !important;  padding: 0px !important; '])
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'edit_education_{{ $education->id }}')"
            >
                <i class="fa fa-edit text-success fs-15"></i>
            </x-primary-button>

            <x-danger-button
                x-click
                class="text-capitalize bg-transparent "
                @style(['border: none !important;  padding: 0px !important; '])
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'delete_education_{{ $education->id }}')"
            >
                <i class="fa fa-trash text-danger fs-15"></i>
            </x-danger-button>

        </div>

        @include('admin.profile.edit-education', ['education'=> $education])
        @include('admin.profile.delete-education', ['$education'=> $education])
    </div>
</li>
