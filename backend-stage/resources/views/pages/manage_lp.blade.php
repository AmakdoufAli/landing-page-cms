<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Landing Page Manage') }}
        </h2>
    </x-slot>

    <div class="py-14">
        <div class="w-10/12 mx-auto">

            @if(Session::has('success'))
                <div class="bg-green-200 text-green-800 rounded-md p-4 mb-4">
                    {{ Session::get('success') }}
                </div>
            @endif

            <div class="">
                <form method="POST" action="{{ route('landing-page.update', $landing_page->id) }}" enctype="multipart/form-data" class="flex flex-col gap-4 text-base">
                    @csrf @method('PUT')

                    <div class="">
                        <label for="name" class="block font-medium text-gray-900">Name</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{!! $landing_page->name !!}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Name"
                            required
                        >
                    </div>

                    <div class="">
                        <label for="link" class="block font-medium text-gray-900">Link</label>
                        <input
                            type="text"
                            name="link"
                            id="link"
                            value={!! $landing_page->link !!}
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Link"
                            required
                        >
                    </div>

                    <div class="">
                        <label for="price" class="block font-medium text-gray-900">Price</label>
                        <input
                            type="number"
                            name="price"
                            id="price"
                            value={!! $landing_page->price !!}
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Price"
                            required
                        >
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">

                        <div class="">
                            <label for="title_fr" class="block font-medium text-gray-900">Titre (Francais)</label>
                            <input
                                type="text"
                                name="title_fr"
                                id="title_fr"
                                value="{!! $landing_page->title['fr'] !!}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Titre (Francais)"
                                required
                            >
                        </div>

                        <div class="">
                            <label for="title_en" class="block font-medium text-gray-900">Title (Anglais)</label>
                            <input
                                type="text"
                                name="title_en"
                                id="title_en"
                                value="{!! $landing_page->title['en'] !!}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Title (Anglais)"
                                required
                            >
                        </div>

                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">

                        <div class="">
                            <label for="description_fr" class="block font-medium text-gray-900">Description (Francais)</label>
                            <textarea name="description_fr" id="description_fr" class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 h-32" required>{!! $landing_page->description['fr'] !!}</textarea>
                        </div>

                        <div class="">
                            <label for="description_en" class="block font-medium text-gray-900">Description (Anglais)</label>
                            <textarea name="description_en" id="description_en" class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 h-32" required>{!! $landing_page->description['en'] !!}</textarea>
                        </div>

                    </div>

                    <div class="flex gap-4 items-center">
                        <div class="w-32">
                            <img id="previewImage" src="{{ asset($landing_page->image) }}" alt="{{ $landing_page->name }}" class="w-full h-auto" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <input type="file" name="image" id="image" onchange="previewFile()" class="px-3 py-2 border border-gray-300 rounded-md" />
                            <button type="button" class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400 focus:outline-none focus:ring focus:ring-gray-400" onclick="resetImage()">Reset</button>
                        </div>
                    </div>

                    <div class="">
                        <input type="submit" value="Enregistrer" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer" />
                    </div>

                </form>
            </div>

            <div class="my-10">
                <h1 class="text-3xl font-bold my-4">List of Sections</h1>
                <table class="w-full text-left text-gray-500 ">
                    <thead class="text-gray-700 uppercase bg-gray-50 ">
                      <tr>
                        <th scope="col" class="px-6 py-3">
                          Name
                        </th>
                        <th scope="col" class="text-center py-3">
                          Order
                        </th>
                        <th scope="col" class="text-center py-3">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($sections as $section)
                            <tr class="odd:bg-white even:bg-gray-50 border-b">
                                <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{!! $section->section_name !!}</th>
                                <td class="text-center">{!! $section->section_order !!}</td>
                                <td class="flex flex-row items-center justify-center pt-3">
                                    <a href="/sections/manage/{{ $section->id }}">
                                        <x-setting-svg/>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <h2 class="text-xl font-semibold text-gray-500">There is no sections yet !</h2>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script>
        function previewFile() {
            const preview = document.getElementById('previewImage');
            const file = document.getElementById('image').files[0];
            const reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "{{ asset($landing_page->image) }}";
            }
        }

        function resetImage() {
            const preview = document.getElementById('previewImage');
            preview.src = "{{ asset($landing_page->image) }}";
            document.getElementById('image').value = '';
        }
    </script>

</x-app-layout>
