<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mini Project</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" defer>
        @livewireStyles

    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-200 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl w-full sm:px-6 lg:px-8">
                <div class="mb-8">
                    <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload file</label>
                        <div class="flex space-x-2">
                            <input name="file" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                            <button class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-1 px-4 rounded">
                                Upload
                            </button>
                        </div>

                        @error('file')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </form>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Time
                            </th>
                            <th scope="col" class="px-6 py-3">
                                File Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <p>{{ $item->created_at->format('d-m-Y h:i:s a') }}</p>
                                    <p>({{ $item->created_at->diffForHumans() }})</p>
                                </th>
                                <td class="px-6 py-4 w-64">
                                    {{ $item->file_name }}
                                </td>
                                <td class="px-6 py-4 w-1/2">
                                    <livewire:progress-bar :bus-id="$item->bus_id"/>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 py-8">
                                <td colspan="3" class="text-center">No csv file uploaded.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
        @livewireScripts

    </body>
</html>
