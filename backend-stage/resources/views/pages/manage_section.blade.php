<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Section Manage') }}
        </h2>
    </x-slot>

    <div class="py-14">
        <div class="">

            <div class="w-10/12 mx-auto">
                @if(Session::has('success'))
                    <div class="bg-green-200 text-green-800 rounded-md p-4 mb-4">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('section.update', $section->id) }}" enctype="multipart/form-data" class="flex flex-col gap-3">
                    @csrf @method('PUT')

                    <div class="">
                        <label for="section_name" class="block font-medium text-gray-900">Name</label>
                        <input
                            type="text"
                            name="section_name"
                            id="section_name"
                            value="{{ $section->section_name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Name"
                            required
                        >
                    </div>

                    @isset($section->title['fr'])
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                            <div class="">
                                <label for="title_fr" class="block font-medium text-gray-900">Titre (Francais)</label>
                                <input
                                    type="text"
                                    name="title_fr"
                                    id="title_fr"
                                    value="{{ $section->title['fr'] }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
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
                                    value="{{ $section->title['en'] }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="Title (Anglais)"
                                    required
                                >
                            </div>
                        </div>
                    @endisset

                    @isset($section->subtitle1['fr'])
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                            <div class="">
                                <label for="subtitle1_fr" class="block font-medium text-gray-900">Sous-titre 1 (Francais)</label>
                                <input
                                    type="text"
                                    name="subtitle1_fr"
                                    id="subtitle1_fr"
                                    value="{{ $section->subtitle1['fr'] }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="Sous-titre 1 (Francais)"
                                    required
                                >
                            </div>
                            <div class="">
                                <label for="subtitle1_en" class="block font-medium text-gray-900">Subtitle 1 (Anglais)</label>
                                <input
                                    type="text"
                                    name="subtitle1_en"
                                    id="subtitle1_en"
                                    value="{{ $section->subtitle1['en'] }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="Subtitle 1 (Anglais)"
                                    required
                                >
                            </div>
                        </div>
                    @endisset

                    @isset($section->subtitle2['fr'])
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                            <div class="">
                                <label for="subtitle2_fr" class="block font-medium text-gray-900">Sous-titre 2 (Francais)</label>
                                <input
                                    type="text"
                                    name="subtitle2_fr"
                                    id="subtitle2_fr"
                                    value="{{ $section->subtitle2['fr'] }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="Sous-titre 2 (Francais)"
                                    required
                                >
                            </div>
                            <div class="">
                                <label for="subtitle2_en" class="block font-medium text-gray-900">Subtitle 2 (Anglais)</label>
                                <input
                                    type="text"
                                    name="subtitle2_en"
                                    id="subtitle2_en"
                                    value="{{ $section->subtitle2['en'] }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="Subtitle 2 (Anglais)"
                                    required
                                >
                            </div>
                        </div>
                    @endisset

                    @isset($section->description['fr'])
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                            <div>
                                <label htmlFor="description_fr" class="block font-medium text-gray-900">
                                    Description (Francais)
                                </label>
                                <textarea
                                    name="description_fr"
                                    id="description_fr"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 h-40 "
                                    required
                                >{{ $section->description['fr'] }}</textarea>
                            </div>
                            <div>
                                <label htmlFor="description_en" class="block font-medium text-gray-900">
                                    Description (Anglais)
                                </label>
                                <textarea
                                    name="description_en"
                                    id="description_en"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 h-40 "
                                    required
                                >{{ $section->description['en'] }}</textarea>
                            </div>
                        </div>
                    @endisset

                    @isset($section->article_photo)
                    <div class="flex gap-4 items-center">
                        <div class="w-32">
                            <img id="previewImage" src="{{ asset($section->article_photo) }}" alt="{{ $section->name }}" class="w-full h-auto" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <input type="file" name="article_photo" id="article_photo" onchange="previewFile()" class="px-3 py-2 border border-gray-300 rounded-md" />
                            <button type="button" class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400 focus:outline-none focus:ring focus:ring-gray-400" onclick="resetImage()">Reset</button>
                        </div>
                    </div>
                    @endisset

                    <div>
                        <input
                            type="submit"
                            value="Enregistrer"
                            class="text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg px-5 py-2.5 text-center cursor-pointer"
                        />
                    </div>
                </form>

                <div class="my-10">
                    @if (count($cards) !== 0)
                        <h1 class="text-3xl font-bold my-4">List of Cards</h1>
                        <table class="w-full text-left text-gray-500">
                            <thead class="text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Order
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Title
                                    </th>
                                    <th scope="col" class="py-3 text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cards as $card)
                                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{!! $card->card_order !!}</th>
                                        <td class="text-gray-900">{!! $card->title['fr'] !!}</td>
                                        <td class="flex items-center justify-center gap-3">
                                            <a href="/cards/manage/{{ $card->id }}">
                                                <x-setting-svg/>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

            </div>

        </div>
    </div>

    <script>
        function previewFile() {
            const preview = document.getElementById('previewImage');
            const file = document.getElementById('article_photo').files[0];
            const reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "{{ asset($section->article_photo) }}";
            }
        }

        function resetImage() {
            const preview = document.getElementById('previewImage');
            preview.src = "{{ asset($section->article_photo) }}";
            document.getElementById('article_photo').value = '';
        }
    </script>

</x-app-layout>
