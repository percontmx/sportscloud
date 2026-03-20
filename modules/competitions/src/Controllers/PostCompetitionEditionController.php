<?php

namespace Percontmx\SportsVibe\Competitions\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PostCompetitionEditionController extends BaseCompetitionEditionInfoController
{
    public function index(int $competitionId)
    {
        $competition = $this->getCompetition($competitionId);

        $data = [
            'name' => $this->request->getPost('name'),
            //'official_name' => $this->request->getPost('official_name'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
            'competition_id' => $competition->id
        ];

        /**
         * @var EditionsService
         */
        $service = service('editions');
        $edition = $service->createEdition($data);
        // return to a view with new edition data
        return redirect()
            ->to(base_url("/competitions/$tournamentId/editions/"))
            ->with('success', 'Edition created successfully')
            ->with('edition', $edition)
            ->with('tournament', $tournament);    
    }
}




