<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Religion;
use App\Models\BloodType;
use App\Models\Nationality;
use App\Models\StudentParent;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class AddParent extends Component
{
    use WithFileUploads;

    public $successMessage = '', $updateMode = false, $photos = [], $show_table = true, $parent_id;

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
            'Email' => 'required|email|unique:student_parents,email,' . $this->parent_id,
            'National_ID_Father' => 'required|numeric|digits:14|unique:student_parents,father_national_ID',
            'Passport_ID_Father' => 'numeric|digits:10|unique:student_parents,father_passport_ID',
            'Phone_Father' => 'numeric|digits:11|unique:student_parents,father_phone',
            'National_ID_Mother' => 'required|numeric|digits:14|unique:student_parents,mother_national_ID',
            'Passport_ID_Mother' => 'numeric|digits:10|unique:student_parents,mother_passport_ID',
            'Phone_Mother' => 'numeric|digits:11|unique:student_parents,mother_phone',
        ]);
    }

    public function render()
    {
        return view('livewire.add-parent', [
            'Nationalities' => Nationality::all(),
            'Type_Bloods' => BloodType::all(),
            'Religions' => Religion::all(),
            'student_parents' => StudentParent::all(),
        ]);
    }

    public function firstStepSubmit()
    {
        $this->validate([
            'Email' => 'required|unique:student_parents,email,' . $this->parent_id,
            'Password' => 'required',
            'Name_Father' => 'required|min:3',
            'Name_Father_en' => 'required|min:3',
            'Job_Father' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|unique:student_parents,father_national_ID,' . $this->parent_id,
            'Passport_ID_Father' => 'required|unique:student_parents,father_passport_ID,' . $this->parent_id,
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|unique:student_parents,father_phone,' . $this->parent_id,
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

        if ($this->photos) {
                $attachments = [];
                
                foreach ($this->photos as $photo) {
                    $path = $photo->store('parents_attachments/' . $this->National_ID_Father, 'public');
                    $attachments[] = $path;
                }
                
                $studentParent->attachments = json_encode($attachments);
                $studentParent->save();

                $tempPath = storage_path('app/livewire-tmp');
    
                if (File::exists($tempPath)) {
                    // Delete all files and directories recursively
                    File::cleanDirectory($tempPath);
                    
                    // Alternatively, to be more selective:
                    // $files = File::files($tempPath);
                    // foreach ($files as $file) {
                    //     if (now()->diffInHours(File::lastModified($file)) > 1) {
                    //         File::delete($file);
                    //     }
                    // }
                }

        } else {
            dd(__('messages.No photos'));
        }

        $studentParent->save();


        $this->successMessage = trans('messages.success');

        $this->clearForm();

        return redirect('parents.page');
    }

    public function edit($id)
    {
        // This method is for filling the inputs with parents data
        $this->show_table = false;
        $this->updateMode = true;
        $parent = StudentParent::where('id',$id)->first();
        $this->parent_id = $id;
        $this->Email = $parent->email;
        $this->Password = $parent->password;
        $this->Name_Father = $parent->getTranslation('father_name', 'ar');
        $this->Name_Father_en = $parent->getTranslation('father_name', 'en');
        $this->Job_Father = $parent->getTranslation('father_job', 'ar');;
        $this->Job_Father_en = $parent->getTranslation('father_job', 'en');
        $this->National_ID_Father = $parent->father_national_ID;
        $this->Passport_ID_Father = $parent->father_passport_ID;
        $this->Phone_Father = $parent->father_phone;
        $this->Nationality_Father_id = $parent->father_nationality_id;
        $this->Blood_Type_Father_id = $parent->father_blood_type_id;
        $this->Religion_Father_id = $parent->father_religion_id;
        $this->Address_Father = $parent->father_address;

        $this->Name_Mother = $parent->getTranslation('mother_name', 'ar');
        $this->Name_Mother_en = $parent->getTranslation('mother_name', 'en');
        $this->Job_Mother = $parent->getTranslation('mother_job', 'ar');;
        $this->Job_Mother_en = $parent->getTranslation('mother_job', 'en');
        $this->National_ID_Mother =$parent->mother_national_ID;
        $this->Passport_ID_Mother = $parent->mother_passport_ID;
        $this->Phone_Mother = $parent->mother_phone;
        $this->Nationality_Mother_id = $parent->mother_nationality_id;
        $this->Blood_Type_Mother_id = $parent->mother_blood_type_id;
        $this->Address_Mother =$parent->mother_address;
        $this->Religion_Mother_id =$parent->mother_religion_id;
    }

    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;
    }

    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;
    }

    public function submitForm_edit()
    {
        if ($this->parent_id){
            $parent = studentParent::find($this->parent_id);
            $parent->update([
                // Father Data
                'email' => $this->Email,
                'password' => Hash::make($this->Password),
                'father_name' => ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father],
                'father_passport_ID' => $this->Passport_ID_Father,
                'father_national_ID' => $this->National_ID_Father,
                'father_phone' => $this->Phone_Father,
                'father_job' => $this->Job_Father,
                'father_address' => $this->Address_Father,
                'father_nationality_id' => $this->Nationality_Father_id,
                'father_blood_type_id' => $this->Blood_Type_Father_id,
                'father_religion_id' => $this->Religion_Father_id,

                //Mother Data
                'mother_name' => $this->Name_Mother,
                'mother_passport_ID' => $this->Passport_ID_Mother,
                'mother_national_ID' => $this->National_ID_Mother,
                'mother_phone' => $this->Phone_Mother,
                'mother_job' => $this->Job_Mother,
                'mother_address' => $this->Address_Mother,
                'mother_nationality_id' => $this->Nationality_Mother_id,
                'mother_blood_type_id' => $this->Blood_Type_Mother_id,
                'mother_religion_id' => $this->Religion_Mother_id,
            ]);

        }

        return redirect('add-parent');
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

    public function showFormAdd()
    {
        $this->show_table = false;
    }

    public function delete($id)
    {
        $parent = StudentParent::findOrFail($id);
        $parent->delete();
        return $this->redirect('add-parent');
    }
}
