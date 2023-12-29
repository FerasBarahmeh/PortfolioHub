<style>
    .checkbox-label {
        padding-left: 30px;
        cursor: pointer;
        position: relative;
        left: -18px;
        user-select: none;
    }

    .checkbox-label::before,
    .checkbox-label::after {
        position: absolute;
        left: 0;
        top: 50%;
        margin-top: -9px;
        border-radius: 4px;
    }

    .checkbox-label::before {
        content: "";
        width: 14px;
        height: 14px;
        border: 2px solid var(--grey-color);
    }

    .checkbox-label:hover::before {
        border-color: var(--bs-body-color);
    }

    .checkbox-label::after {
        font-family: var(--fa-style-family-classic);
        content: "\f00c";
        font-weight: 900;
        background-color: var(--bs-black);
        color: white;
        font-size: 12px;
        width: 18px;
        height: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
        transform: scale(0) rotate(360deg);
        transition: 0.3s;
    }

    input[type="checkbox"]:checked ~ label.checkbox-label::after {
        transform: scale(1);
    }

</style>

<label
    {!!
       $attributes->merge([
           'class' => 'checkbox-label'
       ])
     !!}
>
    {{ $slot }}
</label>
