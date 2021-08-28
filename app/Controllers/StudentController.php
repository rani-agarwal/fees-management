<?php
class StudentController extends MainController{
    public function __construct(){

        parent::__construct();
        $this->loadModel('Students','sob');
        $this->loadModel('Courses','cob');
    }
    public function index()
    {
     $data=$this->sob->execQuery('SELECT student.id as id,course_id,
    courses.name as courses_name,sname,mobileno,email,joiningdate
    FROM student LEFT JOIN
    courses on courses.id=student.course_id order by student.id DESC');
    
    $this->view->loadview('students.index',['data'=>$data]);
    }
    public function create()
    {
        $cdata=$this->cob->fetchData('name,id,fees','name','asc');
        $this->view->loadview('students.create',compact('cdata'));     
    }
    public function store()
    {
        if($_FILES['profilepic']['name'])
        {
            $filename='';
            $type=substr($_FILES['profilepic']['type'],0,strpos($_FILES['profilepic']['type'],'/'));
            if($type=='image')
            {
                $filename= time()."_student_".request('sname')."_".$_FILES['profilepic']['name'];
                move_uploaded_file($_FILES['profilepic']['tmp_name'],UIMAGES.$filename);
            }else{
                $_SESSION['emsg']="File is not in image format !!";
                reDirect('student/create');
            }
        }
        $info=[    
            'course_id'=> request('course_id'),
            'sname'=> request('sname'),
            'profilepic'=>$filename,
            'mobileno'=> request('mobileno'),
            'othermobile'=> request('othermobileno'),
            'address'=> request('address'),
            'email'=> request('email'),
            'referby'=> request('referby'),
            'joiningdate'=> request('joiningdate'),
            
        ];
        if($rid=$this->sob->submitData($info))
        {
           Session::set('smsg',"Data Submitted Successfully");
        }else{
            Session::set('emsg',"Error Occured");
        }
        reDirect('student');
    }
    public function show(){
        echo "show of course contoller";
    }
    public function edit($id)
    {
        $cdata=$this->cob->fetchData('name,id,fees','name','asc');
        $info=$this->sob->fetchInfo(udecode($id));
        $this->view->loadview('students.edit',compact('info','cdata'));
        
    }
    public function update($id)
    {
        $id=udecode($id);
        $filename=request('oldprofilepic');
        if($_FILES['profilepic']['name'])
        {
            
            $type=substr($_FILES['profilepic']['type'],0,strpos($_FILES['profilepic']['type'],'/'));
            if($type=='image')
            {
                if($filename)
                    unlink(UIMAGES.$filename);
                $filename= time()."_student_".request('sname')."_".$_FILES['profilepic']['name'];
                move_uploaded_file($_FILES['profilepic']['tmp_name'],UIMAGES.$filename);
            }else{
                $_SESSION['emsg']="File is not in image format !!";
                reDirect('student/edit/'.uencode($id));
            }
        }
        $info=[    
            'course_id'=> request('course_id'),
            'sname'=> request('sname'),
            'profilepic'=>$filename,
            'mobileno'=> request('mobileno'),
            'othermobile'=> request('othermobileno'),
            'address'=> request('address'),
            'email'=> request('email'),
            'referby'=> request('referby'),
            'joiningdate'=> request('joiningdate'),
            
        ];
        if($rid=$this->sob->submitData($info,$id)){
            Session::set('smsg',"Data Updated Successfully");
         }else{
             Session::set('emsg',"Updation Error");
         }
         reDirect('student');

    }
    public function destroy($id)
    {
       if($this->sob->deleteRecord($id)){
        Session::set('smsg',"Data Deleted Successfully");
     }else{
         Session::set('emsg',"Error Occured");
     }
     reDirect('student');
    }
}
?>