<?php

namespace App\Repositories;



class costbenchmarkRepo{



	 public function get_MonthlyData($projectid,$type,$date,$month){

	 		 $get_Total= \DB::table('cost_templates as ct')
	 			->leftJoin('cost_data as cd','ct.id','=','cd.cost_template_id')
	 			->where([['ct.project_id',$projectid],['cd.cost_type',$type]])
	 			->selectRaw('SUM(cd.total_price) as total')
	 			->whereYear('ct.created_at',$date)->whereMonth('ct.created_at',$month)->value('total');
 
 
        return $get_Total;
    }

    private function computeDiff($val1,$val2,$type=0){
        if($val1==0){
            return 'Insufficient Data';
        }
        $deviation=round(($val2/$val1)*100,2);
        if($type==0){

            return $deviation.'%';
        }
        return $deviation;
    }

    private function raiseflag($value){

        $getvalue=\Helper::getdev();
        if(!is_numeric($value) || !$value){
            return 'No Data';
        }
        if($value > $getvalue){
            return 'red';
        }
            return 'green';
    }

    public function deviation(array $finaldata){



         $keys = array_keys($finaldata[0]);

            foreach ($finaldata as $key => $value) {
                foreach ($keys as $index) {
                    $new_data[$index][] = $value[$index];
                }
            }
            
            $benchestdata=$new_data['estimated'];
            $benchactdata=$new_data['actual'];
            $compestdata=$new_data['currentest'];
            $compactdata=$new_data['currentactual']; 
            $computeDevest=[];
            $computeDevact=[];
            $month=[];
            for ($i=0; $i<count($benchestdata); $i++) { 

                $computeDevest[]=['deviation'=>$this->computeDiff($benchestdata[$i],$compestdata[$i]),'month'=>$finaldata[$i]['month'],'flag'=>$this->raiseflag($this->computeDiff($benchestdata[$i],$compestdata[$i],1))];
                $computeDevact[]=['deviation'=>$this->computeDiff($benchactdata[$i],$compactdata[$i]),'month'=>$finaldata[$i]['month'],'flag'=>$this->raiseflag($this->computeDiff($benchactdata[$i],$compactdata[$i],1))];
 
 
            }
            return ['estimateddev'=>$computeDevest,'actualdev'=>$computeDevact];
 
    }





	}