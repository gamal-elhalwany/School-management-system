<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Religion;
use App\Models\BloodType;
use App\Models\Nationality;
use App\Models\StudentParent;
use Illuminate\Support\Facades\Hash;

class AddParent extends Component
{
    public $successMessage = '';

    public $currentStep = 1,

        // Father_INPUTS
        $Email, $Password,
        $Name_Father, $Name_Father_en,
        $National_ID_Father, $Passport_ID_Father,
        $Phone_Father, $Job_Father, $Job_Father_en,
        $Nationality_Father_id, $Blood_Type_Father_id,
        $Address_Father, $Religion_Father_id,

        // Mother_INPUTS
        $Name_Mother, $Name_Mother_en,
        $National_ID_Mother, $Passport_ID_Mother,
        $Phone_Mother, $Job_Mother, $Job_Mother_en,
        $Nationality_Mother_id, $Blood_Type_Mother_id,
        $Address_Mother, $Religion_Mother_id;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'Email' => 'required|email',
            'National_ID_Father' => 'required|numeric|digits:14',
            'Passport_ID_Father' => 'numeric|digits:10',
            'Phone_Father' => 'numeric|digits:11',
            'National_ID_Mother' => 'required|numeric|digits:14',
            'Passport_ID_Mother' => 'numeric|digits:10',
            'Phone_Mother' => 'numeric|digits:11',
        ]);
    }

    public function render()
    {
        return view('livewire.add-parent', [
            'Nationalities' => Nationality::all(),
            'Type_Bloods' => BloodType::all(),
            'Religions' => Religion::all(),
        ]);
    }

    public function firstStepSubmit()
    {
        $this->validate([
            'Email' => 'required|unique:student_parents,email',
            'Password' => 'required',
            'Name_Father' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|unique:student_parents,father_national_ID',
            'Passport_ID_Father' => 'required|unique:student_parents,father_passport_ID',
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'Nationality_Father_id' => 'required',
            'Blood_Type_Father_id' => 'required',
            'Religion_Father_id' => 'required',
            'Address_Father' => 'required',
        ]);

        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $this->validate([
            'Name_Mother' => 'required',
            'Name_Mother_en' => 'required',
            'Job_Mother' => 'required',
            'Job_Mother_en' => 'required',
            'National_ID_Mother' => 'required|unique:student_parents,father_national_ID',
            'Passport_ID_Mother' => 'required|unique:student_parents,father_passport_ID',
            'Phone_Mother' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'Nationality_Mother_id' => 'required',
            'Blood_Type_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',
            'Address_Mother' => 'required',
        ]);

        $this->currentStep = 3;
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function submitForm()
    {
        $studentParent = new StudentParent();
        // Father_INPUTS
        $studentParent->email = $this->Email;
        $studentParent->password = Hash::make($this->Password);

        $studentParent->father_name = ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father];
        $studentParent->father_national_ID = $this->National_ID_Father;
        $studentParent->father_passport_ID = $this->Passport_ID_Father;
        $studentParent->father_phone = $this->Phone_Father;
        $studentParent->father_job = ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father];
        $studentParent->father_nationality_id = $this->Nationality_Father_id;
        $studentParent->father_blood_type_id = $this->Blood_Type_Father_id;
        $studentParent->father_religion_id = $this->Religion_Father_id;
        $studentParent->father_address = $this->Address_Father;

        // Mother_INPUTS
        $studentParent->mother_name = ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother];
        $studentParent->mother_national_ID = $this->National_ID_Mother;
        $studentParent->mother_passport_ID = $this->Passport_ID_Mother;
        $studentParent->mother_phone = $this->Phone_Mother;
        $studentParent->mother_job = ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother];
        $studentParent->mother_nationality_id = $this->Nationality_Mother_id;
        $studentParent->mother_blood_type_id = $this->Blood_Type_Mother_id;
        $studentParent->mother_religion_id = $this->Religion_Mother_id;
        $studentParent->mother_address = $this->Address_Mother;

        $studentParent->save();
        $this->successMessage = trans('messages.success');

        $this->clearForm();

        $this->currentStep = 1;
    }

    public function clearForm()
    {
        $this->Email = '';
        $this->Password = '';
        $this->Name_Father = '';
        $this->Job_Father = '';
        $this->Job_Father_en = '';
        $this->Name_Father_en = '';
        $this->National_ID_Father ='';
        $this->Passport_ID_Father = '';
        $this->Phone_Father = '';
        $this->Nationality_Father_id = '';
        $this->Blood_Type_Father_id = '';
        $this->Address_Father ='';
        $this->Religion_Father_id ='';

        $this->Name_Mother = '';
        $this->Job_Mother = '';
        $this->Job_Mother_en = '';
        $this->Name_Mother_en = '';
        $this->National_ID_Mother ='';
        $this->Passport_ID_Mother = '';
        $this->Phone_Mother = '';
        $this->Nationality_Mother_id = '';
        $this->Blood_Type_Mother_id = '';
        $this->Address_Mother ='';
        $this->Religion_Mother_id ='';
    }
}
