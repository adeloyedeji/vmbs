<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Interfaces\CompanyInterface;

class CompanyController extends Controller
{

    protected $company;
    public function __construct(CompanyInterface $company)
    {
        $this->middleware('auth');
        $this->company = $company;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $company = $this->company->getCompany('all');
        return view('companies.index', ['companies' => $company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        if($id == 'directories')
        {
            $lookup = $request->lookup;
            $company = $this->company->getCompany($lookup);
            $blocks = $this->company->getCompanyBlock($lookup);
            $fields = $this->company->getCompanyField($lookup);
            $wells = $this->company->getCompanyWell($lookup);
            $companies = $this->company->getCompany('all');
            $cost_templates=$this->company->getTemplate($lookup);
            session(['company' => $lookup]);
            return view('companies.company', 
                         compact('companies', 'company', 'blocks', 'fields', 'wells','cost_templates'));
        }
        if($id == 'raw')
        {
            $data;
            $object = $request->object;

            session(['company_asset' => $object]);
            if(session()->has('company'))
            {
                $lookup = session('company');
            }
            else
            {
                redirect('companies/directories');
            }

            if($object == 'blocks')
            {
                $data = $this->company->getCompanyBlock($lookup);
            }
            else if($object == 'fields') 
            {
                $data = $this->company->getCompanyField($lookup);
            }
            else
            {
                $data = $this->company->getCompanyWell($lookup);
            }
            $company = $this->company->getCompany($lookup);
            $companies = $this->company->getCompany('all');
            return view('companies.assets_display', ['data' => $data, 'companies' => $companies, 'company' => $company]);
        }
         if($id=='costtemplate'){

                $cost_data=app('App\Http\Controllers\FdpController')->get_cost_data($request->id);
                $template=app('App\Http\Controllers\FdpController')->view_cost_template($request->id,0);
               
                return view('partials.ajaxhtml.ajaxdata',compact('cost_data','template'));

        } 
        if($id=='terrain'){
 

            if(strlen($request->q)<=2){
                return '';
            }
            $fieldsearch=\App\field::where('field_name','LIKE','%'.$request->q.'%')
                        ->select('id','field_name as text')
                         ->where('terrain_id',$request->tid)
                        ->get();

            return $fieldsearch;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCompanyFieldBlock($block_id)
    {
        $fieldBlock;

        $fieldBlock = $this->company->getCompanyFieldBlock($block_id);

        return $fieldBlock;
    }

    public function getCompanyWellField($field_id)
    {
        $wellField;

        $wellField = $this->company->getCompanyWellField($field_id);

        return $wellField;
    }
}
