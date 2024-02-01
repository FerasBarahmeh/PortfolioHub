<div class="w-full">
    <div class="bg-grey-lightest border-b p-4 w-full flex justify-content-between align-center" >
        <div class="left-0 mr-2 text-sm">
            <span>{{ $education->name }}</span>
            <span>At</span>
            <a href="{{ $education->organisation_url }}"
               class="w-full c-grey">{{ $education->organisation_name }}</a>
        </div>

        <div class="text-grey text-xs c-grey flex flex-col gap-1">
            <div class="period">
                <span class="join">{{ $education->start_date }}</span>
                <span class="dash">-</span>
                <span class="leave">{{ $education->finish_date }}</span>
            </div>

            <div class="grade">
                <span>grade:</span>
                <span>{{ $education->grade }}</span>
            </div>
        </div>
    </div>

</div>
