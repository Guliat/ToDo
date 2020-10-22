<?php

namespace App\Http\Livewire;

use Auth;
use Session;
use App\Todo;
use Livewire\Component;

class Crud extends Component {

	public $data;

	public function render() {
		$this->data = Todo::where('is_active', 1)->where('user_id', Auth::id())->orderBy('name', Session::get('sort_name'))->get();
		return view('livewire.crud');
	}

	public function destroy($id) {
		if($id) {
			$update = Todo::where('id', $id)->first();
			$update->is_active = 0;
			$update->update();
		}
	}

}
