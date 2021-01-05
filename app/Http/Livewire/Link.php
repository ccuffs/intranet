<?php

namespace App\Http\Livewire;

use App\Models\Link as Links;
use Livewire\Component;

class Link extends Component
{
    public $data, $key, $url, $selected_id;
    public $updateMode = false;

    public function render()
    {
        $this->data = Links::all();
        return view('livewire.link');
    }

    private function resetInput()
    {
        $this->key = null;
        $this->url = null;
    }
    
    public function store()
    {
        $this->validate([
            'key' => 'required|unique:links|min:1',
            'url' => 'required|url'
        ]);

        Links::create([
            'key' => $this->key,
            'url' => $this->url
        ]);

        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Links::findOrFail($id);

        $this->selected_id = $id;
        $this->key = $record->key;
        $this->url = $record->url;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'key' => 'required|unique:links|min:1',
            'url' => 'required|url'
        ]);

        if ($this->selected_id) {
            $record = Links::find($this->selected_id);

            $record->update([
                'key' => $this->key,
                'url' => $this->url
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Links::where('id', $id);
            $record->delete();
        }
    }
}
