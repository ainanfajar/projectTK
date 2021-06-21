<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Guru') }}
    </h2>
</x-slot>
<div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-5">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-4">

            <div class="flex mb-4">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <button wire:click=" showModal()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-2">
                        Create Data
                    </button>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <input wire:model="search" type="text" class="shadow appearence-none rounded w-full px-3 py-2 text-blue-900" placeholder="Search Nama Guru...">
                </div>
            </div>

            @if($isOpen)
            @include('livewire.create-guru')
            @endif

            @if(session()->has('info'))
            <div class="bg-green-500 border-2 border-green-600 rounded-b mb-2 py-2 px-3">
                <div>
                    <h1 class="text-white font-bold">{{session('info')}}</h1>
                </div>
            </div>
            @endif

            @if(session()->has('delete'))
            <div class="bg-red-500 border-2 border-red-600 rounded-b mb-2 py-2 px-3">
                <div>
                    <h1 class="text-white font-bold">{{session('delete')}}</h1>
                </div>
            </div>
            @endif

            <table class="table-fixed w-full">
                <thead class="bg-blue-500">
                    <tr>
                        <th class="px-4 py-2 text-white w-20">No</th>
                        <th class="px-4 py-2 text-white">Foto</th>
                        <th class="px-4 py-2 text-white">Nama Guru</th>
                        <th class="px-4 py-2 text-white">Mata Pelajaran</th>
                        <th class="px-4 py-2 text-white">NIP</th>
                        <th class="px-4 py-2 text-white">Nomor HP</th>
                        <th class="px-4 py-2 text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gurus as $key=>$guru)
                    <tr>
                        <td class="px-2 py-3 text-center">{{ $gurus->firstitem() + $key }}</td>
                        <td class="px-2 py-3"><img src="{{ asset('storage') }}/{{ $guru->foto }}" width="150px"></td>
                        <td class="px-2 py-3">{{ $guru->nama_guru }}</td>
                        <td class="px-2 py-3">{{ $guru->mapel->mapel}}</td>
                        <td class="px-2 py-3">{{ $guru->nip }}</td>
                        <td class="px-2 py-3">{{ $guru->no_hp }}</td>
                        <td class="px-2 py-3 text-center ">
                            <button wire:click="edit({{ $guru->id_guru }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
                                Edit
                            </button>
                            <button wire:click="delete({{ $guru->id_guru }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>



        </div>
    </div>
</div>