<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    private int $id;
    private string $fullname;
    private DateTime $birthday;
    private string $address;

    public function __construct(){
        $id = -1;
        $fullname = "NO SET";
        $address = "NO SET";
    }
    public function get_all_student()
    {
        $results = DB::table('Student')->get();
        return $results;
    }   

    public function get_student_by_id($id)
    {
        $student = DB::table('Student')->where("id",$id)->first();
        return $student;
    }

    public function edit($id, $fullname, $birthday, $address)
    {
        $update = DB::table('Student')->where('id', $id) ->limit(1) ->update( [ 'fullname' => $fullname, 'birthday' => $birthday, 'address' => $address]);
    }

    public function add($fullname, $birthday, $address)
    {
        $insert = DB::table('Student')->insert(
            [ 'fullname' => $fullname, 'birthday' => $birthday, 'address' => $address]
        );
    }

    public function del($id)
    {
        $deleted = DB::table('Student')->where('id', $id)->delete();
    }
    use HasFactory;
}
