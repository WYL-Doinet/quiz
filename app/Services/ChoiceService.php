<?php
namespace App\Services;

use App\Models\Choice;

class ChoiceService {

    public function __construct(protected Choice $choice)
    {
    
    }

    public function findAll($filter)
    {
        return $this->choice->filter($filter)->get();
    }

    public function update($id, $data)
    {
        return $this->choice->where('id', $id)->update($data);
    }
}