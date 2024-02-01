<div class="flex flex-col justify-content-center align-items-center p-10 gap-10  " @style(['background-color: var(--bs-border-color); box-shadow: var(--bs-box-shadow); width: 200px'])>

    <figure @style(['width: 100px; height: 100px; '])>
        <img src="{{ Storage::url($skill->image->url) }}" class="w-full h-full" alt="skill image">
    </figure>
    <div class="content flex justify-content-center flex-col">
        <p class="name text-center">{{  Str::limit($skill->name_skill , '15') }}</p>
        <span class="c-grey text-sm text-capitalize text-center">{{ $skill->type_skill }}</span>
    </div>

        <div class="flex">
            <x-primary-button
                x-click
                class="text-capitalize  "
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'edit-skill_{{ $skill->id }}')"
            >
                <i class="fa fa-edit fs-15"></i>
            </x-primary-button>
            <x-danger-button
                x-click
                class="text-capitalize  "
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'delete_skill_{{ $skill->id }}')"
            >
                <i class="fa fa-trash fs-15"></i>
            </x-danger-button>
        </div>

    @include('admin.profile.edit-skill', ['skill'=> $skill])
    @include('admin.profile.delete-skill', ['skill'=> $skill])

</div>
