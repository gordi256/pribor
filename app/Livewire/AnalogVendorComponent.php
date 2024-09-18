<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\AnalogVendor;
use App\Models\Analog;
class AnalogVendorComponent extends Component
{

    public $isDisabled = false;
    public $record = '';

    public $analogVendors;
    public $analog_name = [];
    public $analog_article = [];
    public $analogTable = [];

    public function fillAnalogTable($analogVendors, $analogs)
    {

        $analogTable = [];
        foreach ($analogVendors as $analogVendor) {
            $analogTable[$analogVendor->id]['vendor_id'] = $analogVendor->id;
            $analogTable[$analogVendor->id]['vendor_name'] = $analogVendor->name;
            $analogTable[$analogVendor->id]['name']    = @$analogs->first(function ($item) use ($analogVendor) {
                return $item->analog_vendor_id === $analogVendor->id;
            })->name;
            $analogTable[$analogVendor->id]['article'] = @$analogs->first(function ($item) use ($analogVendor) {
                return $item->analog_vendor_id === $analogVendor->id;
            })->article;
        }
        return $analogTable;
    }
    public function mount($record = null)
    {

        $this->record        = $record;
        $this->analogVendors = AnalogVendor::get(['id', 'name']);
        $this->analogs       = Analog::where('product_id', $this->record->id)->get();
        $this->analogTable   = $this->fillAnalogTable($this->analogVendors, $this->analogs);


        // dd($this->record, $this->analogs, $this->analogTable);
        // $this->productType = ProductType::where('id', $this->record->product_kind_id)->with('props')->first();
        // $this->props       = $this->productType->props;
        // dd($this->record, $this->productType, $this->props);
    }

    public function render()
    {
        return view('livewire.analog-vendor-component');
    }




    public function save()
    {


        dd($this->analogTable  );

        try {

            $this->dispatch('toast', message: 'Аналоги  обновлены.', notify: 'success');
            //   dd($this->record ,$this->record->seo , $this->title, $this->keywords, $this->description, $this->canonical_url);
        }
        catch (\Throwable $th) {
            $this->dispatch('toast', message: 'Ошибка! Не удалось обновить аналоги.' . $th->getMessage(), notify: 'error');
        }
        $this->updateSeo($this->record);
    }

}
