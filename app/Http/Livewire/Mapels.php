<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Mapel;
use App\Models\Guru;

class Mapels extends Component
{
    use WithPagination;
    public $search;
    // public $mapels;
    public $mapelId;
    public $namaMapel = '';
    public $isOpen = 0; //0 = false

    public function render()
    {
        // $this->mapels = Mapel::get();
        $searchParams = '%' . $this->search . '%';
        return view('livewire.mapels', [
            'mapels' => Mapel::where('mapel', 'like', $searchParams)->latest()->paginate(5),
        ]);
    }

    public function showModal()
    {
        $this->isOpen = true;
    }

    public function hideModal()
    {
        $this->isOpen = false;

        $this->mapelId = '';
        $this->namaMapel = '';
    }

    public function messages()
    {
        return [
            'namaMapel.required' => 'Nama Mata Pelajaran harus diisi!',
        ];
    }

    public function store()
    {
        $this->validate(
            [
                'namaMapel' => 'required',
            ]
        );

        Mapel::updateOrCreate(['id_mapel' => $this->mapelId], [
            'mapel' => $this->namaMapel,
        ]);

        $this->hideModal();

        session()->flash('info', $this->mapelId ? 'Mata Pelajaran Berhasil Diupdate' : 'Mata Pelajaran Berhasil Dibuat');

        $this->mapelId = '';
        $this->namaMapel = '';
    }

    public function edit($id)
    {
        $mapels = Mapel::findOrFail($id);
        $this->mapelId = $id;
        $this->namaMapel = $mapels->mapel;

        $this->showModal();
    }

    public function delete($id)
    {
        Mapel::find($id)->delete();

        session()->flash('delete', 'Mata Pelajaran Berhasil Dihapus');
    }
}
