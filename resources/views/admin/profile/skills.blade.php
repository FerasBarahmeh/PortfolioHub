<div class="skills-card p-20 bg-white rad-10 mt-20">
    <h2 class="mt-0 mb-10">My Skills</h2>
    <p class="mt-0 mb-20 c-grey fs-15">Complete Skills List</p>


    @php
        $alertType = session('fail-skill') ? ['danger', session('fail-skill')] : (session('success-skill') ? ['success',  session('success-skill')] : '');
    @endphp

    @if ($alertType)
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600 dark:text-gray-400 text-capitalize alert alert-{{ $alertType[0] }}"
        >{{ $alertType[1] }}</p>
    @endif

    <livewire:add-skill/>

    <ul class="m-0 txt-c-mobile skills">
        @foreach($skills as $skill)

            <li class="skill">
                <form action="{{ route('profile.delete.skill') }}" method="post">
                    @csrf @method('delete')
                    <input type="hidden" name="id" value="{{ $skill->id }}">

                    <figure>
                        <img src="{{ Storage::url($skill->image->url) }}" alt="icon skill">
                    </figure>
                    <div class="content">
                        <span class="name">{{ Str::limit($skill->name_skill , '15')  }}</span>
                        <button type="submit">
                            <i class="fa fa-trash text-danger"></i>
                        </button>
                    </div>
                </form>
            </li>
        @endforeach


    </ul>
</div>
