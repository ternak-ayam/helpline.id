<?php
namespace App\Models\Traits;

use App\Jobs\SavePdfFileJobs;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

trait SavePdfTrait {
    public static function bootSavePdfTrait(): void
    {
        static::saving(function (Model $model) {
//            $model->savePdf();
//            $model->setAttribute($model->column(), $model->filename());
        });
    }

    public function savePdf() {
        SavePdfFileJobs::dispatch($this->getFullFilePath(), $this->view(), $this->data())->afterCommit();
    }

    public function data()
    {
        return [];
    }

    public function view()
    {
        return 'exports.patients.record';
    }

    public function filename()
    {
        return 'file.pdf';
    }

    public function destination()
    {
        return 'docs';
    }

    public function column()
    {
        return 'invoice_file';
    }

    public function getFullFilePath()
    {
        return $this->destination() . '/' . $this->filename();
    }

    public function download()
    {
        return Storage::disk('public')->download($this->getFullFilePath());
    }

    public function export()
    {
        $pdf = Pdf::setOption('isRemoteEnabled', true)->loadView($this->view(), $this->data());

        return $pdf->stream();
    }
}
