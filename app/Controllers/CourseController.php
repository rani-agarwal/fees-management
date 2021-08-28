<?php
class CourseController extends MainController{

    public function __construct(){

        parent::__construct();
        $this->loadModel('Courses','cob');
    }
    public function index(){

        $this->view->loadview('courses.index',['data'=>$this->cob->fetchData()]);
    }
    public function create(){
               
        $this->view->loadview('courses.create');
        
    }
    public function store()
    {
      
        $info=[
            'name'=> request('name'),
            'description'=>request('description'),
            'fees'=>request('fees')
        ];
       
        if($rid=$this->cob->submitData($info)){
          
           Session::set('smsg',"Data Submitted Successfully");
        }else{
            Session::set('emsg',"Error Occured");
        }
        reDirect('course');
    }
    public function show(){
        echo "show of course contoller";
    }
    public function edit($id)
    {
        $info=$this->cob->fetchInfo(udecode($id));
        $this->view->loadview('courses.edit',compact('info'));
        echo "edit of course contoller";
    }
    public function update($id)
    {
        $id=udecode($id);
        $info=[
            'name'=> request('name'),
            'description'=>request('description'),
            'fees'=>request('fees')
        ];
        if($rid=$this->cob->submitData($info,$id)){
            Session::set('smsg',"Data Updated Successfully");
         }else{
             Session::set('emsg',"Updation Error");
         }
         reDirect('course');
    }
    public function destroy($id)
    {
       if($this->cob->deleteRecord($id))
       {
       Session::set('smsg',"Data Deleted Successfully");  
        }else{
         Session::set('emsg',"Error Occured");
     }
     reDirect('course');
    }
}
?>