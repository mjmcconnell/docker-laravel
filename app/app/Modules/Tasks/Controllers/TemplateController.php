<?php namespace App\Modules\Tasks\Controllers;

use Validator;
use Illuminate\Http\Request;

use App\Modules\Base\Controller;
use App\Modules\Tasks\Models\Task;

/**
 * TemplateController
 *
 * Controller handles all rendering of templates, related to the displaying
 * of Task database records.
 */
class TemplateController extends Controller {

    function __construct(Task $Task) {
        $this->model = $Task;
    }

    public function list() {
        $records = $this->model->fetch_all();
        return view(
            'Tasks::list',
            ['records' => $records]
        );
    }

    public function detail($id) {
        $record = $this->model->get($id);
        return view(
            'Tasks::detail',
            ['record' => $record]
        );
    }
}
