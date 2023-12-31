<div class="profile-card p-20 bg-white rad-10 mt-20">
    <h2 class="mt-0 mb-10 text-capitalize">My experiences</h2>
    <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">what the stages experience i finished </p>

    <x-alerts.alert :success="session('success-add-experience')" :fail="session('fail-add-experience') "/>

    <livewire:add-experience :notHasRecord="$experiences->isEmpty()"/>

    <ul class="txt-c-mobile experiences">
        @foreach($experiences as $experience)

            <li class="experience">

                <div class="period">
                    <span class="join">{{ $experience->join_date }}</span>
                    <span class="dash">-</span>
                    <span class="leave">{{ $experience->leave_date }}</span>
                </div>

                <form action="{{ route('profile.delete.experience') }}" method="post" class="d-flex justify-between w-full px-1">
                    @csrf @method('delete')
                    <input type="hidden" name="id" value="{{ $experience->id }}">
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

                    <button class="text-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
