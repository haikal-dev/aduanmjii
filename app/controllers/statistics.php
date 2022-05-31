<?php

class Statistics extends Controller
{
	public function index(){
		
	}
	
	public function api($data = ''){
		$app = $this->model("config");
		$issue = $this->model("IssueModel");
		
		if($data == ""){
			header("location: /");
		}
		
		elseif($data == "issues.json"){
			// total issues
			$total_issues = $issue->get_total_issue();
			
			// total issue resolved
			$total_issue_resolved = $issue->total_issue_resolved();
			
			$app->set('issues', [
				"total_issues" => $total_issues,
				"total_issue_resolved" => $total_issue_resolved,
				"percent_resolved" => number_format(($total_issue_resolved / $total_issues * 100), 1),
				"percent_unresolved" => number_format(100-($total_issue_resolved / $total_issues * 100),1)
			]);
			//$app->debug();
			header("Access-Control-Allow-Origin: *");
			header("Access-Control-Allow-Headers: *");
			header("Content-Type: application/json");
			echo json_encode($app->load(), JSON_PRETTY_PRINT);
		}
	}
}