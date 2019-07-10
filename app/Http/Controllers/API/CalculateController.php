<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;


class CalculateController extends BaseController
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $input = $request->all();


            $validator = Validator::make($input, [
                'value1' => 'required',
                'value2' => 'required',
                'options' => 'required'
            ]);


            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

        $response = '';
        if(isset($request->options) && $request->options!=''){
            switch ($request->options){
                case '+':
                    $response = $request->value1 + $request->value2;
                    break;
                case '-':
                    $response = $request->value1 - $request->value2;
                    break;
                case '*':
                    $response = $request->value1 * $request->value2;
                    break;

                case '/':
                    $response = $request->value1 / $request->value2;
                    break;
                default:
                    $response = "Oops. Something Went Wrong!";
            }
        }
        return $this->sendResponse($response, 'User register successfully.');
        } catch (\Exception $e){
            return $this->sendResponse($e->getMessage(), $e->getMessage());
        }
    }
}