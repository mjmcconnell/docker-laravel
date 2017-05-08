<?php namespace App\Modules\Tasks\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    public function fetch_all() {
        return Task::orderBy('created_at', 'asc')->get();
    }

    public function get($id) {
        return Task::findOrFail($id);
    }

    public function get_or_create($id) {
        if ($id) {
            return Task::findOrFail($id);
        } else {
            return new Task;
        }
    }
}
