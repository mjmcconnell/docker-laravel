<?php namespace App\Modules\Tasks\Controllers;

use Validator;
use Illuminate\Http\Request;

use App\Modules\Base\Controller;
use App\Modules\Tasks\Models\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * ApiController
 *
 * Controller to handle all interactions between the user and the Task model.
 */
class ApiController extends Controller {

    function __construct(Task $Task) {
        $this->model = $Task;
    }

    private function validateForm($request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }
    }

    private function processForm($request, $id) {
        $record = $this->model->get_or_create($id);
        $record->name = $request->name;
        $record->save();

        return $record;
    }

    public function post(Request $request, $id=NULL) {
        // Validate form
        $errors = $this->validateForm($request);
        if ($errors) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Validation failed',
                'data' => array(
                    'errors' => $errors
                )
            ]);
        }

        // Save form to database
        try {
            $record = $this->processForm($request, $id);
        } catch(ModelNotFoundException $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => array(
                'record' => $record->toJson()
            )
        ]);

    }

    public function delete($id) {
        try {
            $this->model::findOrFail($id)->delete();
        } catch(ModelNotFoundException $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e,
            ]);
        }

        return response()->json([
            'status' => 'success',
        ]);
    }
}
