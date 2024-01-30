<?php
include("Config/connection.php");
// ============ the class that will control the save details and delete mechanism
// ========== the connection will be included here ==========//
//  ============= marting silungwe 2024 on GOD it will work ===============//
class Patient{

    public $first_name;
    public $last_name;
    public $guardian;
    public $address;
    public $cell_phone;
    public $other_phone;
    public $email;
    public $emergency_contact;
    public $telephone_number;
    public $date_birth;
    public $age;
    public $gender;
    public $marital_status;
    public $residence;
    public $referred_by;
    public $primary_care;
    public $work_place;
    public $current_occupation;
    public $present_position;
    public $current_school;
    public $college_year;
    public $previous_therapist;
    public $heard_about_us;
    public $payment_method;
    public $signature;
    public $signature_date;
    public $guardian_signature;
    public $guardian_signature_date;
    public $reviewed_by_signature;
    public $reviewed_signature_date;
    public $connection;

    // Method to set values for all attributes
    public function __construct(
        $first_name, $last_name, $guardian, $address, $cell_phone, $other_phone,
        $email, $emergency_contact, $telephone_number, $date_birth, $age, $gender,
        $marital_status, $residence, $referred_by, $primary_care, $work_place,
        $current_occupation, $present_position, $current_school, $college_year,
        $previous_therapist, $heard_about_us, $payment_method, $signature,
        $signature_date, $guardian_signature, $guardian_signature_date,
        $reviewed_by_signature, $reviewed_signature_date
    ) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->guardian = $guardian;
        $this->address = $address;
        $this->cell_phone = $cell_phone;
        $this->other_phone = $other_phone;
        $this->email = $email;
        $this->emergency_contact = $emergency_contact;
        $this->telephone_number = $telephone_number;
        $this->date_birth = $date_birth;
        $this->age = $age;
        $this->gender = $gender;
        $this->marital_status = $marital_status;
        $this->residence = $residence;
        $this->referred_by = $referred_by;
        $this->primary_care = $primary_care;
        $this->work_place = $work_place;
        $this->current_occupation = $current_occupation;
        $this->present_position = $present_position;
        $this->current_school = $current_school;
        $this->college_year = $college_year;
        $this->previous_therapist = $previous_therapist;
        $this->heard_about_us = $heard_about_us;
        $this->payment_method = $payment_method;
        $this->signature = $signature;
        $this->signature_date = $signature_date;
        $this->guardian_signature = $guardian_signature;
        $this->guardian_signature_date = $guardian_signature_date;
        $this->reviewed_by_signature = $reviewed_by_signature;
        $this->reviewed_signature_date = $reviewed_signature_date;
        $this->connection = new Connection("localhost", "root", "", "harmonymentalhealth");
    }

    // constructor function here //
    // Constructor that only initializes the connection property
    // ============== getters for the main class here ============ //
    public function Firstname() {
        return $this->first_name;
    }
    // =============== // =======================//
    public function Lastname() {
        return $this->last_name;
    }
    // =============== // =======================//
    public function Guardian() {
        return $this->guardian;
    }
    // =============== // =======================//
    public function Address() {
        return $this->address;
    }
    // =============== // =======================//
    public function CellPhone() {
        return $this->cell_phone;
    }
    // =============== // =======================//
    public function OtherPhone() {
        return $this->other_phone;
    }

     // ============== getters for the main class here ============ //
     public function Email() {
        return $this->email;
    }
    // =============== // =======================//
    public function EmergencyContact() {
        return $this->emergency_contact;
    }
    // =============== // =======================//
    public function TelephoneNumber() {
        return $this->telephone_number;
    }
    // =============== // =======================//
    public function DateBirth() {
        return $this->date_birth;
    }
    // =============== // =======================//
    public function Age() {
        return $this->age;
    }
    // =============== // =======================//
    public function Gender() {
        return $this->gender;
    }

     // ============== getters for the main class here ============ //
     public function MaritalStatus() {
        return $this->marital_status;
    }
    // =============== // =======================//
    public function Residence() {
        return $this->residence;
    }
    // =============== // =======================//
    public function ReferredBY() {
        return $this->referred_by;
    }
    // =============== // =======================//
    public function PrimaryCare() {
        return $this->primary_care;
    }
    // =============== // =======================//
    public function WorkPlace() {
        return $this->work_place;
    }
    // =============== // =======================//
    public function CurrentOccupation() {
        return $this->current_occupation;
    }

     // ============== getters for the main class here ============ //
     public function PresentPosition() {
        return $this->present_position;
    }
    // =============== // =======================//
    public function CurrentSchool() {
        return $this->current_school;
    }
    // =============== // =======================//
    public function CollegeYear() {
        return $this->college_year;
    }
    // =============== // =======================//
    public function PreviousTherapist() {
        return $this->previous_therapist;
    }
    // =============== // =======================//
    public function HeardAboutUs() {
        return $this->heard_about_us;
    }
    // =============== // =======================//
    public function PaymentMethod() {
        return $this->payment_method;
    }

     // ============== getters for the main class here ============ //
     public function Signature() {
        return $this->signature;
    }
    // =============== // =======================//
    public function SignatureDate() {
        return $this->signature_date;
    }
    // =============== // =======================//
    public function GuardianSignature() {
        return $this->guardian_signature;
    }
    // =============== // =======================//
    public function GuardianSignatureDate() {
        return $this->guardian_signature_date;
    }
    // =============== // =======================//
    public function ReviewedBySignature() {
        return $this->reviewed_by_signature;
    }
    // =============== // =======================//
    public function ReviewedBySignatureDate() {
        return $this->reviewed_signature_date;
    }

    public function GetConnection() {
        return $this->connection;
    }


    // ============ the fuctions for saving the records will be here ========//
    public function SavePatientDetails() {
        // =========== establish the connection here ============== //
        $this->connection->EstablishConnection();
        $conn = $this->connection->get_connection();
        try {
            $sqlCommand = $conn->prepare(
                "INSERT INTO PatientDetails(
                    first_name, last_name, guardian, address, cell_phone, other_phone,
                    email, emergency_contact, telephone_number, date_birth, age, gender,
                    marital_status, residence, referred_by, primary_care, work_place,
                    current_occupation, present_position, current_school, college_year,
                    previous_therapist, heard_about_us, payment_method, signature,
                    signature_date, guardian_signature, guardian_signature_date,
                    reviewed_by_signature, reviewed_by_signature_date 
                ) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
            );
            $this->ensureNotNull();
            // ============== the query will be executed here =============//
            $sqlCommand->bind_param(
                "ssssssssssssssssssssssssssssss",
                $this->first_name, $this->last_name, $this->guardian, $this->address, $this->cell_phone,
                $this->other_phone, $this->email, $this->emergency_contact, $this->telephone_number, $this->date_birth,
                $this->age, $this->gender, $this->marital_status, $this->residence, $this->referred_by,
                $this->primary_care, $this->work_place, $this->current_occupation, $this->present_position,
                $this->current_school, $this->college_year, $this->previous_therapist, $this->heard_about_us,
                $this->payment_method, $this->signature, $this->signature_date, $this->guardian_signature,
                $this->guardian_signature_date, $this->reviewed_by_signature, $this->reviewed_signature_date
            );
            
            $sqlCommand->execute(); // running the query here
        }catch(Exception $ex) {
            print($ex);
        }
    }

    // =============== function to ensure that null values can be passed in here ========= //
    private function ensureNotNull() {
        try {
            $this->first_name = $first_name ?? "";
            $this->last_name = $last_name ?? "";
            $this->guardian = $guardian ?? "";
            $this->address = $address ?? "";
            $this->cell_phone = $cell_phone ?? "";
            $this->other_phone = $other_phone ?? "";
            $this->email = $email ?? "";
            $this->emergency_contact = $emergency_contact ?? "";
            $this->telephone_number = $telephone_number ?? "";
            $this->date_birth = $date_birth ?? "";
            $this->age = $age ?? "";
            $this->gender = $gender ?? "";
            $this->marital_status = $marital_status ?? "";
            $this->residence = $residence ?? "";
            $this->referred_by = $referred_by ?? "";
            $this->primary_care = $primary_care ?? "";
            $this->work_place = $work_place ?? "";
            $this->current_occupation = $current_occupation ?? "";
            $this->present_position = $present_position ?? "";
            $this->current_school = $current_school ?? "";
            $this->college_year = $college_year ?? "";
            $this->previous_therapist = $previous_therapist ?? "";
            $this->heard_about_us = $heard_about_us ?? "";
            $this->payment_method = $payment_method ?? "";
            $this->signature = $signature ?? "";
            $this->signature_date = $signature_date ?? "";
            $this->guardian_signature = $guardian_signature ?? "";
            $this->guardian_signature_date = $guardian_signature_date ?? "";
            $this->reviewed_by_signature = $reviewed_by_signature ?? "";
            $this->reviewed_signature_date = $reviewed_signature_date ?? "";
        }catch(Exception $ex) {
            print($ex);
        }
    }


}


?>