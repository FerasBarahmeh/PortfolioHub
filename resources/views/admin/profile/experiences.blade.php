<div class="skills-card p-20 bg-white rad-10 mt-20">
    <h2 class="mt-0 mb-10">My experiences</h2>
    <p class="mt-0 mb-20 c-grey fs-15">experiences</p>


    @php
        $alertType = session('fail-experience') ? ['danger', session('fail-experience')] : (session('success-experience') ? ['success',  session('success-experience')] : '');
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

    <livewire:add-experience/>

    <ul class="txt-c-mobile experiences">
        @foreach($experiences as $experience)

            <li class="experience">
                <form action="{{ route('profile.delete.experience') }}" method="post" class="d-flex justify-between w-full px-1">
                    @csrf @method('delete')
                    <input type="hidden" name="id" value="{{ $experience->id }}">
                    <div class="content">
                        <div class="name">
                            <span class="name">{{ Str::limit($experience->career_title )  }}</span>
                            <span class="at">At</span>
                            <a href="{{ $experience->organisation_url }}">{{ $experience->name_organisation }}</a>
                        </div>


                        <div class="description">
                            {{ Str::limit($experience->job_description, 30) }}
                        </div>
                    </div>

                    <div class="options d-flex flex-col justify-between gap-2 align-content-end">
                        <div class="info">
                            <span class="join">{{ $experience->join_date }}</span>
                            <span class="dash">--</span>
                            <span class="leave">{{ $experience->leave_date }}</span>
                        </div>
                        <button class="text-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </form>
            </li>
        @endforeach
    </ul>
</div>
