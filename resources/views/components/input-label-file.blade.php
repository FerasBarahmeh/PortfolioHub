<label {!!  $attributes->merge(['for' => 'input-file', 'class' => 'flex justify-center align-center p-10 border rounded-md shadow-md cursor-pointer fs-15 outline-0 user-select-none hover:bg-gray-100 transition delay-100 ease-in-out dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600', ]) !!}>
    <i class="fa-solid fa-cloud mr-2 ml-2 c-grey"></i>
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        Select File
    @endif
</label>
