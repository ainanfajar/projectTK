<!-- This example requires Tailwind CSS v2.0+ -->
<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form action="">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div>
                        <h1 class="font-bold text-center mb-4">CREATE DATA GURU</h1>
                    </div>
                    <div>
                        <div class="mb-2">
                            <input wire:model="mapelId" type="hidden" class="shadow appearence-none rounded w-full px-3 py-2 text-blue-900" placeholder="Input Nama Guru">
                        </div>
                        <div class="mb-2">
                            <label for="nama_guru" class="block">Nama Guru</label>
                            <input wire:model="nama_guru" type="text" class="shadow appearence-none rounded w-full px-3 py-2 text-blue-900" placeholder="Input Nama Guru">
                            @error('nama_guru') <h1 class="text-red-500">{{$message}}</h1> @enderror
                        </div>
                        <div class="mb-2">
                            <label for="mapel_id" class="block">Mata Pelajaran</label>
                            <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232">
                                <path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero" />
                            </svg>
                            <select wire:model="mapel_id" class="rounded shadow w-full text-gray-600 h-10 pl-5 pr-10 mb-2 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                <option selected value="">Mata Pelajaran</option>
                                @foreach ($mapels as $mpl)

                                <option value="{{ $mpl->id_mapel }}">{{ $mpl->mapel }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="nip" class="block">NIP</label>
                            <input wire:model="nip" type="text" class="shadow appearence-none rounded w-full px-3 py-2 text-blue-900" placeholder="Input NIP">
                            @error('nip') <h1 class="text-red-500">{{$message}}</h1> @enderror
                        </div>
                        <div class="mb-2">
                            <label for="no_hp" class="block">Nomor HP</label>
                            <input wire:model="no_hp" type="text" class="shadow appearence-none rounded w-full px-3 py-2 text-blue-900" placeholder="Input Nomor HP">
                            @error('no_hp') <h1 class="text-red-500">{{$message}}</h1> @enderror
                        </div>
                        <div class="mb-2">
                            <label for="foto" class="block">Foto Guru</label>
                            <input wire:model="foto" type="file" class="shadow appearence-none rounded w-full px-3 py-2 text-blue-900" placeholder="Input Nomor HP">
                            @error('foto') <h1 class="text-red-500">{{$message}}</h1> @enderror
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button wire:click.prevent="store()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Submit
                    </button>
                    <button wire:click="hideModal()" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>