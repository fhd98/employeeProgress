<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Description of leavesModel
 *
 * @author hp
 */
class leavesModel extends Model {
    //put your code here
    protected $table= 'emp_leaves';
    protected $primaryKey='leave_ID';
    public $timestamps= false;
    
    public static function Store($post)
    {
        $oLeaves =new leavesModel();
        $oLeaves->emp_name=$post['empName'];
        $oLeaves->department=$post['empDept'];
        $oLeaves->days=$post['daysLeave'];
        $oLeaves->type=$post['typeLeave'];
        $oLeaves->details=$post['details'];
        $oLeaves->startingDate=$post['startDate'];
        $oLeaves->endingDate=$post['endDate'];        
        
        
        $oLeaves->save();
    }
}
