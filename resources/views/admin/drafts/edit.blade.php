
<x-modal name="edit-draft">
    <div class="quick-draft p-20 bg-white rad-10">
        <h2 class="mt-0 mb-10">Quick Draft</h2>
        <p class="mt-0 mb-20 c-grey fs-15">Write A Draft For Your Ideas</p>
        <x-admin.edit-draft-form :draft="$draft" />
    </div>
</x-modal>
