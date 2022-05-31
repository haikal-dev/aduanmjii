<?php

class admin extends Controller
{
    public function index(){
        require_once "../app/models/admin/AdminModel.php";
        $admin = new AdminModel();

        if(!$admin->session()->exists()){
            $admin->redirect('/admin/login');
        }
        
        else {
            $issue = $admin->issue();
            $total_issue = $issue->get_total_issue();
            $total_new_issue = $issue->get_total_unread_report(); 
            $total_progress = $issue->get_total_progress();
            $total_unsolved = $issue->get_total_unsolved();
            $total_solved = $issue->total_issue_resolved();
            $resolved_rating = ($total_issue - $total_new_issue - $total_progress - $total_unsolved) / $total_issue * 5;

            $admin->data = [
                'title' => 'Dashboard',
                'total_issue' => $total_issue,
                'new_issue' => $total_new_issue,
                'total_progress' => $total_progress,
                'total_unsolved' => $total_unsolved,
                'total_solved' => $total_solved,
                'resolved_rating' => number_format($resolved_rating, 1)
            ];

            $this->view('admin/index', $admin->config()->load());
        }
    }

    public function log(){
        require_once "../app/models/admin/AdminModel.php";
        $admin = new AdminModel();
        
        header("Content-Type: text/plain");
        echo $admin->config()->getLog();
    }

    public function issue($page = 'new', $id = ""){
        require_once "../app/models/admin/AdminModel.php";
        $admin = new AdminModel();

        if(!$admin->session()->exists()){
            $admin->redirect('/admin/login');
        }

        else {
            $issue = $admin->issue();
            $total_new_issue = $issue->get_total_unread_report(); 
            $total_progress = $issue->get_total_progress();
            $total_unsolved = $issue->get_total_unsolved();
            $total_solved = $issue->total_issue_resolved();

            $admin->data = [
                'new_issue' => $total_new_issue,
                'total_progress' => $total_progress,
                'total_unsolved' => $total_unsolved,
                'total_solved' => $total_solved
            ];

            if($page == 'new'){
                $admin->data['title'] = 'New Issues';
                $admin->data['issues'] = $issue->show_new_issue_all();

                // $admin->config()->debug();
                $this->view('admin/issue/new', $admin->config()->load());
            }

            elseif($page == 'progress') {
                $admin->data['title'] = 'Progress Issue';
                $admin->data['issues'] = $issue->show_progress_issue_all();
                
                //$admin->config()->debug();
                $this->view('admin/issue/progress', $admin->config()->load());
            }

            elseif($page == 'unsolved'){
                $admin->data['title'] = 'Unsolved Issue';
                $admin->data['issues'] = $issue->show_unsolved_issue_all();

                // $admin->config()->debug();
                $this->view('admin/issue/unsolved', $admin->config()->load());
            }

            elseif($page == 'solved'){
                $admin->data['title'] = 'Solved Issue';
                $admin->data['issues'] = $issue->show_solved_issue_all();

                $this->view('admin/issue/solved', $admin->config()->load());
            }

            elseif($page == 'id'){
                if($id == ''){
                    http_response_code(404);
                }

                else {
                    $data = $issue->show_issue_by_id($id);
                    
                    if(!isset($data['id'])){
                        http_response_code(404);
                    }

                    else {
                        if($data['id'] == ''){
                            http_response_code(404);
                        }

                        else {

                            $processId = (isset($_GET['pid'])) ? $_GET['pid'] : "";

                            if($processId == ""){
                                $data['status'] = ($data['status'] == 'Unread') ? "New" : $data['status'];
                                $admin->data['title'] = 'Issue #' . $data['id'];
                                $admin->data['issue'] = $data;
                
                                // $admin->config()->debug();
                                $this->view('admin/issue/id', $admin->config()->load());
                            }

                            elseif($processId == 'setStatus'){
                                if(isset($_GET['status'])){
                                    $status = $_GET['status'];
                                    $ok = false;

                                    if($data['status'] == "Unread" && $status == 'progress'){
                                        $status = "4";
                                        $ok = true;
                                    }

                                    elseif($data['status'] == 'Progress'){
                                        if($status == 'solved'){
                                            $status = "3";
                                            $ok = true;
                                        }

                                        elseif($status == 'unsolved'){
                                            $status = "2";
                                            $ok = true;
                                        }
                                    }

                                    if($ok){
                                        $issue->updateStatus($id, $status);
                                        $admin->config()->update("aduanmjii updated status #" . $id . " to " . $_GET['status']);
                                    }

                                    header("location: /admin/issue/id/" . $id);
                                }
                            }

                            elseif($processId == 'delete'){
                                $issue->removeIssue($id);
                                $admin->config()->update("aduanmjii deleted #" . $id);
                                if($data['status'] == 'Resolved'){ $data['status'] = 'solved'; }
                                elseif($data['status'] == 'Unresolved'){ $data['status'] = 'unsolved'; }
                                elseif($data['status'] == 'Progress'){ $data['status'] = 'progress'; }
                                elseif($data['status'] == 'Unread'){ $data['status'] = 'new'; }
                                header("location: /admin/issue/" . $data['status']);
                            }

                            elseif($processId == 'submit'){
                                $data = json_decode(file_get_contents("php://input"), true);
                                
                                if(isset($_POST['solution'])){
                                    $issue->updateSolution($id, $_POST['solution']);
                                    $admin->config()->update("aduanmjii updated solution #" . $id);
                                    echo "ok";
                                }
                                else {
                                    echo "Response Error: 404.";
                                }
                            }
                        }
                    }
                }
            }

            else {
                http_response_code(404);
            }
        }
    }

    // public function announcement($page = 'index', $id = ''){
    //     require_once "../app/models/admin/AdminModel.php";
    //     $admin = new AdminModel();

    //     if(!$admin->session()->exists()){
    //         $admin->redirect('/admin/login');
    //     }

    //     else {
    //         if($page == 'index'){
    //             $announcement = $admin->announcement();
    //             $issue = $admin->issue();
    //             $total_new_issue = $issue->get_total_unread_report(); 
    //             $total_progress = $issue->get_total_progress();
    //             $total_unsolved = $issue->get_total_unsolved();
    //             $total_solved = $issue->total_issue_resolved();

    //             $admin->data = [
    //                 'title' => 'Announcement',
    //                 'new_issue' => $total_new_issue,
    //                 'total_progress' => $total_progress,
    //                 'total_unsolved' => $total_unsolved,
    //                 'total_solved' => $total_solved,
    //                 'announcements' => $announcement->doList()
    //             ];
                
    //             // echo "<pre>";
    //             // print_r($admin->config()->load());
    //             $this->view('admin/announcement/index', $admin->config()->load());
    //         }

    //         elseif($page == 'edit'){

    //         }
    //     }
    // }

    public function login(){
        require_once "../app/models/admin/AdminModel.php";
        $admin = new AdminModel();

        if($admin->session()->exists()){
            $admin->redirect('/admin');
        } 
        
        else {
        
            if(isset($_POST['username']) && isset($_POST['pass'])){
                
                if(!$admin->config()->login($_POST['username'], $_POST['pass'])){
                    echo json_encode([
                        "message" => "Invalid authentication"
                    ]);
                } 
                
                else {
					if($admin->config()->locked){
						echo json_encode([
							"message" => "Account is currently disabled!"
						]);
					}
					
					else {
						$admin->session()->register();
						$admin->config()->update("aduanmjii logged in.");
						echo json_encode([
							"message" => "OK"
						]);
					}
                }
            } 
            
            else {
                $admin->data = [
                    'title' => 'Login'
                ];
                $this->view("admin/login", $admin->config()->load());
            }
        }
    }

    public function logout(){
        require_once "../app/models/admin/AdminModel.php";
        $admin = new AdminModel();
        if($admin->session()->exists()){
            $admin->session()->destroy();
            $admin->config()->update("aduanmjii logged out.");
        }
        $admin->redirect('/admin/login');
    }
}