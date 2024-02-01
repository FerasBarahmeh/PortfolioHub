@php use App\Models\Post; @endphp
<x-app-layout>

    @section('title', 'Add Post')
    <x-admin.title-page class="">
        <span class="text-capitalize">{{ __('add post') }}</span>
    </x-admin.title-page>


    <div class="container">

        <div class="row w-full mb-15">
            <div class="col-12  flex justify-end">
                <a href="{{ route('posts.index') }}" class="btn btn-dark text-capitalize">posts</a>
            </div>
        </div>

        @if($fields->isNotEmpty())
            <form method="post" action="{{ route('posts.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="wrapper grid gap-2" @style(['background-color: var(--bs-light); padding: 10px;'])>
                    <div class="layout-img w">
                        <x-input-label for="layout_img" value="{{ __('layout image') }}" class=" text-capitalize mb-1"/>
                        <x-input-label-file for="layout_img" class="text-capitalize" class=" mt-2 mb-2 ">Layout image
                        </x-input-label-file>
                        <x-file-input name="layout_img" id="layout_img"/>
                        <x-input-error :messages="$errors->get('layout_img')" class="mt-2"/>
                    </div>

                    <div class="sub-info">
                        <x-input-label for="filed" value="{{ __('category') }}" class=" text-capitalize mb-1"/>
                        <x-input-select :class="'mt-0 mb-0'" id="filed" name="fields">
                            <x-select-option>Category</x-select-option>
                            @each('common.fields-option', $fields, 'field')
                        </x-input-select>
                    </div>
                </div>

                <div class="mb-10">
                    <x-text-input name="title" value="{{ old('title', '') }}" class="w-full mb-20"
                                  placeholder="Title Post " autofocus/>
                    <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                </div>

                <div class="mb-10">
                    <x-textarea-input name="brief" class="w-full mb-20"
                                      placeholder="Brief">{{ old('brief', '') }}</x-textarea-input>
                    <x-input-error :messages="$errors->get('brief')" class="mt-2"/>
                </div>

                <div class="mb10">
                    <x-text-editor :namespace="Post::class" :name="'content'"
                                   :pk="Post::getLastInsertedId()"> {{ old('content', '') }} </x-text-editor>
                    <x-input-error :messages="$errors->get('content')" class="mt-2"/>
                </div>


                <div class="flex items-center gap-4 mt-10">
                    <x-primary-button>{{ __('share') }}</x-primary-button>
                </div>
            </form>
        @else
            <div class="wrapper d-grid gap-20">
                <!-- Start not found category Widget -->
                <div class="welcome bg-white rad-10 txt-c-mobile block-mobile">
                    <div class="intro p-20 d-flex space-between bg-eee">
                        <div>
                            <h2 class="m-0 text-danger mb-1">Ops!</h2>
                            <p class="c-grey">the post must attach with category <a href="{{ route('profile.index') }}" class=" m-1 text-black text-capitalize">add one</a></p>
                        </div>
                    </div>
                </div>
                <!-- End not found category Widget -->
            </div>

        @endif
    </div>

</x-app-layout>
