<?php
class FeesController extends MainController{
    public function __construct()
    {

        parent::__construct();
        $this->loadModel('Students','sob');
        $this->loadModel('Courses','cob');
        $this->loadModel('Fees');
    }
    public function index()
    {
        $wh=" where 1";
        if(request('from'))
        {
            if(request('from') && request('to'))
            {
                if(strtotime(request('from'))<=strtotime(request('to')))
                {
                 $wh.=" and ( fees.date between '".request('from')."' and '".request('to')."')";
            
                }else{
                    Session::set('emsg',"From date should smaller than To date");
                }

            }else{
                Session::set('emsg',"Select Both Dates");
                }
        }
       
        $sql="SELECT fees.id as id,courses.name as courses_name,
        sname,courses.fees as cfees,fees.date as submitted_date,fees.fees as submitted_fees,fees.student_id as student_id
        FROM
        student LEFT JOIN
        courses on courses.id=student.course_id
        RIGHT JOIN fees on
        fees.student_id=student.id $wh
         order by fees.date desc";

        $sdata=$this->sob->execQuery($sql);

        if(!isset($sdata[0])){
            $data[0]=$sdata;
        }
        else{
            $data=$sdata;
        }
        $this->view->loadview('fees.index',['data'=>$data]);
    }

    public function duelist()
    {
        $wh=" where 1";
        if(request('from'))
        {
            if(request('from') && request('to'))
            {
                if(strtotime(request('from'))<=strtotime(request('to')))
                {
                 $wh.=" and ( fees.date between '".request('from')."' and '".request('to')."')";
            
                }else{
                    Session::set('emsg',"From date should smaller than To date");
                }

            }else{
                Session::set('emsg',"Select Both Dates");
                }
        }
       
    $sql="SELECT fees.id as id,courses.name as courses_name,
    sname,courses.fees as cfees,fees.date as submitted_date,
    courses.fees-sum(fees.fees) as due_fees, sum(fees.fees) as submitted_fees,fees.student_id as student_id
    FROM
    student LEFT JOIN
    courses on courses.id=student.course_id
    RIGHT JOIN fees on
    fees.student_id=student.id $wh group by fees.student_id
    order by fees.date desc";

        $sdata=$this->sob->execQuery($sql);

        if(!isset($sdata[0])){
            $data[0]=$sdata;
        }
        else{
            $data=$sdata;
        }
        $this->view->loadview('fees.duelist',['data'=>$data]);
    }
    public function create($sid)
    {
    $sid=udecode($sid);
    $sdata=$this->sob->execQuery("SELECT student.id as sstudent_id,course_id,courses.name as courses_name,sname,courses.fees as cfees, joiningdate,fees.date as submitted_date,fees.fees as submitted_fees
    FROM
    student LEFT JOIN
    courses on courses.id=student.course_id
    LEFT JOIN fees on
    fees.student_id=student.id
    WHERE student.id=$sid");
     //dd($sdata);
    $this->view->loadview('fees.create',compact('sdata'));  
    } 
    public function store(){
            $info=[
                'student_id'=> request('student_id'),
                'fees'=>request('fees'),
                'date'=>request('date'),
            ];    
            if($rid=$this->fees->submitData($info)){
               Session::set('smsg',"Data Submitted Successfully");
            
            }else{
                Session::set('emsg',"Error Occured");
            }
            reDirect('student');
        }
    public function show(){
            echo "show of fees contoller";
        }
    public function edit($id)
        {
            $info=$this->cob->fetchInfo(udecode($id));
            $this->view->loadview('courses.edit',compact('info'));
            echo "edit of fees contoller";
        }
    public function update($id)
        {
            $id=udecode($id);
            $info=[
                'name'=> request('name'),
                'description'=>request('description'),
                'fees'=>request('fees')
            ];
            if($rid=$this->cob->submitData($info,$id))
            {
                Session::set('smsg',"Data Updated Successfully");
             }else{
                 Session::set('emsg',"Updation Error");
             }
             reDirect('course');
        }
    public function destroy($id)
        {
            if($this->cob->deleteRecord($id)){
                Session::set('smsg',"Data Deleted Successfully");
            }else{
                Session::set('emsg',"Error Occured");
            }
            reDirect('course');
            }
    }
    ?>