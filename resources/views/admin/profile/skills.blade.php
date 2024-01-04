<div class="profile-card p-20 bg-white rad-10 mt-20">
    <h2 class="mt-0 mb-10 text-capitalize">my skills</h2>
    <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">complete skills list</p>


    <x-alerts.alert :success="session('success-skill')" :fail="session('fail-skill')" />
    <livewire:add-skill :notHasRecord=" $skills->isEmpty()"/>

    <ul class="txt-c-mobile skills mt-20">
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
