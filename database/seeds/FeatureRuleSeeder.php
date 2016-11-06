<?php

use Illuminate\Database\Seeder;
use Agrosellers\Entities\Feature;

class FeatureRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        /*$this->setRules('presentation', 'required');
        $this->setRules('size', 'required|numeric');
        $this->setRules('weight', 'required|numeric');
        $this->setRules('measure', 'required|numeric');
        $this->setRules('material', 'required');
        $this->setRules('description', 'required');
        $this->setRules('composition', 'required');
        $this->setRules('price', 'required|numeric');
        $this->setRules('taxes', 'required');
        $this->setRules('available-quantity', 'required|numeric');
        $this->setRules('image-scale', 'required');
        $this->setRules('location', 'required');
        $this->setRules('description-use', 'required');*/
    }

    private function setRules($name, $rules){
        $feature = Feature::where('name', $name);
        $feature->update(['rules', $rules]);
    }
}
