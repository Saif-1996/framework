<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class FormExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $formData;

    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    public function collection()
    {
        return collect($this->formData);
   }
}
