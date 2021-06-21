<x-landing-layout>
    <!--Hero-->
    <div class="relative -mt-12 lg:-mt-24">
        <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                    <path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.100000001"></path>
                    <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
                </g>
                <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <path d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"></path>
                </g>
            </g>
        </svg>
    </div>
    <section class="bg-white py-8">
        <div>
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-4">

                    <div class="flex mb-4">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <button wire:click=" showModal()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-2">
                                Create Post
                            </button>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <input wire:model="search" type="text" class="shadow appearence-none rounded w-full px-3 py-2 text-blue-900" placeholder="Search Nama Guru...">
                        </div>
                    </div>

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
    </section>
    <!--Footer-->
    <footer class="bg-white">
        <div class="container mx-auto px-8">
            <div class="w-full flex flex-col md:flex-row py-6">
            </div>
        </div>
    </footer>

</x-landing-layout>