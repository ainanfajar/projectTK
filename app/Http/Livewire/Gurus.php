<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Gurus extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search;
    // public $gurus;
    public $mapels;
    public $nama_mapel;
    public $guruId;
    public $nama_guru, $nip, $no_hp, $foto, $mapel_id;
    public $isOpen = 0; //0 = false

    public function render()
    {
        // $this->gurus = Guru::get();
        $this->mapels = Mapel::all();
        $this->guru = Guru::with('mapel')->get();
        $searchParams = '%' . $this->search . '%';
        return view('livewire.gurus', [
            'gurus' => Guru::where('nama_guru', 'like', $searchParams)->latest()->paginate(10),
        ]);
    }

    public function showModal()
    {
        $this->isOpen = true;
    }

    public function hideModal()
    {
        $this->isOpen = false;

        $this->guruId = '';
        $this->mapel_id = '';
        $this->nama_mapel = '';
        $this->nama_guru = '';
        $this->nip = '';
        $this->no_hp = '';
        $this->foto = '';
    }

    public function messages()
    {
        return [
            'nama_guru.required' => 'Nama Guru harus diisi!',
            'nip.required' => 'Kolom NIP harus diisi!',
            'no_hp.required' => 'Kolom Nomor HP harus diisi!',
            'foto.required' => 'Kolom Foto harus diisi!',
            'foto.max' => 'Ukuran Foto maksimal 1024 KB',
            'nip.numeric' => 'NIP harap diisi dengan angka saja!',
            'no_hp.numeric' => 'Kolom Nomor HP hanya bisa diisi dengan angka',
        ];
    }

    public function store()
    {
        $this->validate(
            [
                'nama_guru' => 'required',
                'nip' => 'required|numeric',
                'no_hp' => 'required|numeric',
                'foto' => 'required|mimes:jpg,jpeg,bpm,png|max:1024',
            ]
        );

        $filename = $this->foto->store('foto', 'public');

        Guru::updateOrCreate(['id_guru' => $this->guruId], [
            'nama_guru' => $this->nama_guru,
            'mapel_id' => $this->mapel_id,
            'nip' => $this->nip,
            'no_hp' => $this->no_hp,
            'foto' => $filename,
        ]);

        $this->hideModal();

        session()->flash('info', $this->guruId ? 'Data Guru Berhasil Diupdate' : 'Data Guru Berhasil Dibuat');

        $this->guruId = '';
        $this->mapel_id = '';
        $this->nama_guru = '';
        $this->nip = '';
        $this->no_hp = '';
        $this->foto = '';
    }

    public function edit($id)
    {
        $gurus = Guru::with('mapel')->findOrFail($id);

        $this->guruId = $id;
        $this->nama_guru = $gurus->nama_guru;
        $this->mapel_id = $gurus->mapel->mapel_id;
        $this->nama_mapel = $gurus->mapel->mapel;
        $this->nip = $gurus->nip;
        $this->no_hp = $gurus->no_hp;
        $this->foto = $gurus->foto;


        $this->showModal();
    }

    public function delete($id)
    {
        Storage::delete('storage' . $this->foto);
        Guru::find($id)->delete();

        session()->flash('delete', 'Data Guru Berhasil Dihapus');
    }
}
