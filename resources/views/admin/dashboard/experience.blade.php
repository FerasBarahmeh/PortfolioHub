<div class="w-full border-b">
    <div class="bg-grey-lightest  p-4 w-full flex justify-content-between align-center">
        <div class="left-0 mr-2 text-sm">
            <span>{{ $experience->career_title }}</span>
            <span>At</span>
            <a href="{{ $experience->organisation_url }}"
               class="w-full c-grey">{{ $experience->name_organisation }}</a>
        </div>

        <div class="text-grey text-xs c-grey flex flex-col gap-1">
            <div class="period">
                <span class="join">{{ $experience->join_date }}</span>
                <span class="dash">-</span>
                <span class="leave">{{ $experience->leave_date }}</span>
            </div>
        </div>
    </div>

    <div class=" text-sm mb-10 flex flex-col">
        <div class="head text-sm c-grey mb-10 text-capitalize flex justify-items-start">job description</div>
        <p>{{ \Illuminate\Support\Str::limit($experience->job_description) }}</p>
    </div>
</div>
