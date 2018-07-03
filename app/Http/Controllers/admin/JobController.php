<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Job_request;
use DB;
use App\Job_board;
class JobController extends Controller
{

    public function __construct(){
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$args['job_requests'] = Job_request::leftJoin('job_boards','job_boards.id','=','job_requests.job_id')->leftJoin('users','users.id','=','job_requests.tutor_id')
                                ->select('job_requests.id','users.first_name','users.last_name','job_requests.description','job_requests.request_status','job_boards.title','job_boards.details')
                                ->get();
    	return view('admin.job_request.index')->with($args);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accept_job_request($id){
        DB::table('job_requests')
            ->where('id', $id)
            ->update(['request_status' => 1]);        
        $this->set_session('Job Request Is Accepted', true); 
        return redirect()->back();
    }
    
    public function reject_job_request($id){
        DB::table('job_requests')
            ->where('id', $id)
            ->update(['request_status' => 0]);         
        $this->set_session('Job Request Is Rejected', false); 
        return redirect()->back();
    }

    public function delete_job_request($id)
    {
       //simple job_request delete
        try{
            $job_request = Job_request::find($id);
            $job_request = $job_request->delete();
            if($job_request){
               $this->set_session('Job Request Successfully Deleted.', true);
            }else{
               $this->set_session('Job Request couldnot be deleted', false);
            }
            return redirect()->route('job_requests');
        }catch(\Exception $e){
            $this->set_session('Subject couldnot be deleted', false);
            return redirect()->route('job_requests');
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $this->logActivity('Page added');
            //Creating new User
            $page = $this->page;
            $page->heading = $request->input('heading');
            $page->content = $request->input('content');
            $page->title = $request->input('title');
            $page->meta = $request->input('meta');
            $page->tags = $request->input('tags');
            if($page->save()){
                $this->set_session('Page Successfully Added.', true);
            }else{
                $this->set_session('Page couldnot be added.', false);
            }
            return redirect()->route('pages.create');
        }catch(\Exception $e){
            $this->set_session('Page Couldnot be Added.'.$e->getMessage(), false);
            return redirect()->route('pages.create'); 
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['page'] = $this->page->getSinglePage($id);
        return view('admin.page.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page'] = $this->page->getSinglePage($id);
        return view('admin.page.edit')->with($data);
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
       try{

            $this->logActivity('Page edited');

            //Editing Page
            $page = $this->page::find($id);
            
            $page->heading = $request->input('heading');
            $page->content = $request->input('content');

            $page->title = $request->input('title');
            $page->meta = $request->input('meta');
            $page->tags = $request->input('tags');

            if($page->save()){
                $this->set_session('Page Successfully Edited.', true);
            }else{
                $this->set_session('Page couldnot be edited.', false);
            }

            return redirect()->route('pages.edit', ['id'=> $id]);

        }catch(\Exception $e){
            $this->set_session('Page Couldnot be Edited.'.$e->getMessage(), false);
            return redirect()->route('pages.edit', ['id'=> $id]); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        //Deleting Page
       
       try{
            $this->logActivity('Page deleted');

            $page = Page::whereId($id);
            $page = $page->delete();
            
            if($page){
                $this->set_session('Page Deleted.', true);
            }else{
                $this->set_session('Page Couldnot be Deleted.', false);
            }

            return redirect()->route('pages.index');

        }catch(\Exception $e){
            $this->set_session('Page Couldnot be Deleted.'.$e->getMessage(), false);
            return redirect()->route('pages.index'); 
        }
    }

    public function job_boards()
    {
        $args['job_boards'] = Job_board::leftJoin('users','users.id','=','job_boards.tutor_id')
                                ->select('job_boards.id','users.first_name','users.last_name','job_boards.request_status','job_boards.title','job_boards.details')
                                ->get();
        return view('admin.job_board.index')->with($args);
    }

    public function delete_job_board($id)
    {
       //simple job_request delete

        try{
            $job_board = Job_board::find($id);
            $job_board = $job_board->delete();
            if($job_board){
               $this->set_session('Job Request Successfully Deleted.', true);
            }else{
               $this->set_session('Job Request couldnot be deleted', false);
            }
            return redirect()->route('job_boards');
        }catch(\Exception $e){
            $this->set_session('Subject couldnot be deleted', false);
            return redirect()->route('job_boards');
        } 
    }

    public function reject_job_board($id){
        DB::table('job_boards')
            ->where('id', $id)
            ->update(['request_status' => 0]);         
        $this->set_session('Job Request Is Rejected', false); 
        return redirect()->back();
    }

    public function accept_job_board($id){
        DB::table('job_boards')
            ->where('id', $id)
            ->update(['request_status' => 1]);        
        $this->set_session('Job Request Is Accepted', true); 
        return redirect()->back();
    }
}
