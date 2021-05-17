<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Report;
use Livewire\Component;

class ReportsSection extends Component
{

    public function setDone(Report $report)
    {
        $report->delete();
    }

    public function render()
    {
        return view('livewire.dashboard.reports-section')
            ->with('reports', Report::all());
    }
}
