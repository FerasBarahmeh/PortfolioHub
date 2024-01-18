@php $colors = ['pink',  '#bd7686', 'black', '#f0f0f0'] @endphp
<div id="colorlib-progress">
    <div class="container">
        <div class="row text-center">
            <h2 class="bold">Skills</h2>
        </div>

        {{-- soft skills --}}
        @if($admin->softSkills->isNotEmpty())
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center animate-box intro-heading">
                    <span>Skills</span>
                    <h2>My Soft Skills</h2>
                </div>
            </div>
            <div class="row">
                @foreach($admin->softSkills as $skill)
                    <div class="col-md-3 col-sm-6 text-center">
                        <h2 class="skill-head mb-15">{{ $skill->name_skill }}</h2>

                        <div class="img-skill " style="box-shadow: 3px 3px 6px 10px {{ $colors[array_rand($colors)]}};">
                            <img src="{{ Storage::url($skill->image->url) }}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- technical skills --}}
        @if($admin->technicalSkills->isNotEmpty())
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center animate-box intro-heading">
                    <span>Skills</span>
                    <h2>My Technical Skills</h2>
                </div>
            </div>
            <div class="row">

                @foreach($admin->technicalSkills as $skill)
                    <div class="col-md-3 col-sm-6 text-center">
                        <h2 class="skill-head mb-15">{{ $skill->name_skill }}</h2>
                        <div class="img-skill " style="box-shadow: 3px 3px 6px 10px  {{ $colors[array_rand($colors)]}};">
                            <img src="{{ Storage::url($skill->image->url) }}" alt="">
                        </div>
                    </div>
                @endforeach

            </div>
        @endif
    </div>
</div>
