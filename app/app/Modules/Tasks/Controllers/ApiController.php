<?php namespace App\Modules\Tasks\Controllers;

use Validator;
use Illuminate\Http\Request;

use App\Modules\Base\Controller;
use App\Modules\Tasks\Models\Task;

/**
 * ApiController
 *
 * Controller to handle all interactions between the user and the Task model.
 */
class ApiController extends Controller {

    function __construct(Task $Task) {
        $this->model = $Task;
    }

    private function processForm($request, $id=NULL) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:2',
        ]);

        if ($validator->fails()) {
            return redirect('/tasks')
                ->withInput()
                ->withErrors($validator);
        }

        $record = $this->model->get_or_create($id);
        $record->name = $request->name;
        $record->save();
    }

    public function add(Request $request) {
        $this->processForm($request);
        return redirect('/tasks');
    }

    public function update(Request $request, $id) {
        $this->processForm($request, $id);
        return redirect('/tasks/'.$id);
    }

    public function delete($id) {
        $this->model::findOrFail($id)->delete();
        return redirect('/tasks');
    }
}
