<?php

namespace Percontmx\SportsCloud\Tournaments\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PostCompetitionEditionController extends BaseCompetitionEditionInfoController
{
    public function index(int $tournamentId)
    {
        $tournament = $this->getTournament($tournamentId);

        $data = [
            'name' => $this->request->getPost('name'),
            //'official_name' => $this->request->getPost('official_name'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
            'competition_id' => $tournament->id
        ];

        /**
         * @var EditionsService
         */
        $service = service('editions');
        $edition = $service->createEdition($data);
        // return to a view with new edition data
        return redirect()
            ->to(base_url("/tournaments/$tournamentId/editions/"))
            ->with('success', 'Edition created successfully')
            ->with('edition', $edition)
            ->with('tournament', $tournament);    
    }
}
