<li class="experience">

    <div class="period">
        <span class="join">{{ $experience->join_date }}</span>
        <span class="dash">-</span>
        <span class="leave">{{ $experience->leave_date }}</span>
    </div>

    <div class="d-flex justify-between w-full px-1">
        <div class="content">
            <div class="name">
                <span class="name">{{ Str::limit($experience->career_title )  }}</span>
                <span class="at caret-black text-capitalize">At</span>
                <a href="{{ $experience->organisation_url }}">{{ $experience->name_organisation }}</a>
            </div>


            <div class="description fs-15 c-grey">
                {{ Str::limit($experience->job_description, 30) }}
            </div>
        </div>

        <div class="options flex gap-1 p-10">
            <x-primary-button
                x-click
                class="text-capitalize bg-transparent "
                @style(['border: none !important;  padding: 0px !important; '])
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'edit_experience_{{ $experience->id }}')"
            >
                <i class="fa fa-edit text-success fs-15"></i>
            </x-primary-button>

            <x-danger-button
                x-click
                class="text-capitalize bg-transparent "
                @style(['border: none !important;  padding: 0px !important; '])
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'delete_experience_{{ $experience->id }}')"
            >
                <i class="fa fa-trash text-danger fs-15"></i>
            </x-danger-button>

        </div>

        @include('admin.profile.edit-experience', ['experience'=> $experience])
        @include('admin.profile.delete-experience', ['experience'=> $experience])
    </div>
</li>
