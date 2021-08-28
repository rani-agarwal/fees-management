<?php
declare(strict_types=1);
class MainModel extends mysqli{
    protected $table,$id;

    public function __construct()
    {
        parent::__construct(HOSTNAME,USERNAME,PASSWORD,DBNAME);
    
        if(!$this->table){
            $this->table=strtolower(get_class($this));
        }
        if(!$this->id){
            $this->id='id';
        }
    }
    public function submitData(Array $info,int $id=null):int
    {
        $sql="insert into $this->table set ";
        $wh='';
        if($id){
            # if id comes in parameter than query change to update
            $sql="update $this->table set ";
            $wh ="where $this->id=$id ";
        }
        foreach($info as $colname=>$colvalue){
         $sql.="$colname='$colvalue',";
        }
          $sql=substr($sql,0,-1).$wh;
         
         if($this->query($sql)){
            return (($this->insert_id)?$this->insert_id:$id);
         }
         return 0;
        
    }

 public function fetchData(string $cols= null,string $order=null, string $orderby="desc")
 {
     if(!$order){
        $order=$this->id;
     }
      if(!$cols){
       $cols="*";
        }
            $sql="select $cols from $this->table order by $order $orderby ";
            if($rs=$this->query($sql))
        {
            if(method_exists($rs,'fetch_all')){

                return $rs->fetch_all(MYSQLI_ASSOC);
            }else{
                while($data[]=$rs->fetch_assoc());
                array_pop($data);
                return $data;
            }
    
        }
    }
public function fetchInfo(int $id,string $cols=null){

      if(!$cols){
       $cols="*";
        }
        $sql="select $cols from $this->table where $this->id=$id ";
        if($rs=$this->query($sql))
        {
            return $rs->fetch_assoc();
        }
        return 0;
}
public function execQuery($sql){
          
          if($rs=$this->query($sql)){
              if(is_object($rs)&& get_class($rs)=='mysqli_result'){
                  if($rs->num_rows==1){
                      return $rs->fetch_assoc();
                  }
                  else{
                    if(method_exists($rs,'fetch_all')){

                        return $rs->fetch_all(MYSQLI_ASSOC);
                    }else{
                        while($data[]=$rs->fetch_assoc());
                        array_pop($data);
                        return $data;
                    }
                  }
              }else{
                  return true;
              }
          }
          return false;
}
    public function deleteRecord($ids){
            $sql="delete from $this->table where id in($ids)";
            if($this->query($sql)){
                return true;
            }
                return false;
            
    }
    public function __destruct(){
        $this->close();

    }
}
?>