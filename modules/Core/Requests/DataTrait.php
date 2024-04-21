<?php

namespace Modules\Core\Requests;

trait DataTrait
{
    abstract protected function getDataClass();

    private function removeEmptyValues(array $values): array
    {
        foreach ($values as $key => $value) {
            if (is_null($value)) {
                unset($values[$key]);
            }
        }

        return $values;
    }

    public function toData()
    {
        try {
            $mapper = new \JsonMapper();
            $values = $this->removeEmptyValues($this->all());
            $json = json_decode(json_encode($values));

            return $mapper->map((object)$json, $this->getDataClass());
        } catch (\JsonMapper_Exception $e) {
            // TODO JsonMapper_Exception 예외처리에 대한 처리
            dd($e);
        }
    }
}
