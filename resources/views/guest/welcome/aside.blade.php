<aside>

    <button class="btn-show-contact" id="show-contact">Show Contact</button>
    <div class="me">
        <figure class="avatar">
            <img src="{{ asset('guest/images/my-avatar.png') }}" alt="my picture">
        </figure>
        <div class="personal">
            <h3 class="name">{{ $admin->name }}</h3>
            <span class="jod-name">{{ $admin->extensions->job_title }}</span>
        </div>
    </div>

    <div class="info-contact opend" id="contact-info">
        <ul class="ways-contact">
            <li>
                <div class="icon"><i class="fa fa-mail-bulk"></i></div>
                <div class="info">
                    <h4 class="title">Email</h4>
                    <div class="content">{{ $admin->email }}</div>
                </div>
            </li>

            <li>
                <div class="icon"><i class="fa fa-phone"></i></div>
                <div class="info">
                    <h4 class="title">Phone</h4>
                    <div class="content">{{ $admin->extensions->phone }}</div>
                </div>
            </li>


            <li>
                <div class="icon"><fa class="fa fa-calendar"></fa></div>
                <div class="info">
                    <h4 class="title">Birthday</h4>
                    <div class="content">{{ $admin->extensions->BOD }}</div>
                </div>
            </li>


            <li>
                <div class="icon"><i class="fa fa-location"></i></div>
                <div class="info">
                    <h4 class="title">Location</h4>
                    <div class="content">{{ $admin->extensions->location }}</div>
                </div>
            </li>
        </ul>

        <div class="links">
            <ul>

                @foreach($admin->accounts as $account)
                    <li  description="{{ $account->domain->domain }}">
                        <a href="https://{{ $account->domain->domain }}.com/{{ $account->username_account }}" target="_blank">
                            <i class="fa-brands fa-{{ $account->domain->domain }}"></i>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>



</aside>
