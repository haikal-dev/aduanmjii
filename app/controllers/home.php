<?php

class home extends Controller
{	
	public function index(){
		$app = $this->model("config");
		$issue = $this->model("IssueModel");

		$rating = [];
		
		$startYear = 2018;
		$endYear = gmdate("Y", time());
		$totalMonth = ($endYear - $startYear) * 12;
		
		$app->set("total_progress", $issue->get_total_progress());
		$app->set("total_unsolved", $issue->get_total_unsolved());

		$rating['progress'] = $issue->get_total_progress();
		$rating['unsolved'] = $issue->get_total_unsolved();
		
		$app->set("title", "Dashboard");
		$app->set("load_dashboard_js", true);
		
		// navigations
		$app->set('navigations', [
			["title" => "Home", "url" => $app->load()['url']],
			["title" => "Dashboard"]
		]);
		
		// graphs for voltage animation
		$app->set('hasGraph', true);
		
		// total issues
		$total_issues = $issue->get_total_issue();
		$app->set('total_issues', $total_issues);
		$rating['total'] = $total_issues;
		
		// total issue resolved
		$total_issue_resolved = $issue->total_issue_resolved();
		$app->set('total_issue_resolved', $total_issue_resolved);
		$app->set('percent_total_resolved', number_format(($total_issue_resolved / $total_issues * 100), 1));
		$rating['resolved'] = $total_issue_resolved;

		// total unread report (new)
		$app->set('total_unread_report', $issue->get_total_unread_report());
		$rating['unread'] = $issue->get_total_unread_report();

		$rating['rate'] = $rating['resolved'] / $rating['total'] * 5;
		$app->set('rating', $rating['rate']);

		// Network Active
		$mjiinetlib = $app->mjiinet();
		$json_file = $mjiinetlib->network_display();
		$network_api = json_decode($json_file, true);
		$total_net = count($network_api);
		$total_active = 0;
		foreach($network_api as $net){
			if($net['status'] == "Connected"){
				$total_active++;
			}
		}
		$app->set('net_active', $total_active);
		$app->set('total_net', $total_net);
		$app->set('net_stats', $network_api);
		
		// Current Voltage Tangki Air
		$app->set("tangki_voltage", 0);
		
		// manage recent reports
		$recent_reports = $issue->get_unread_report();
		$app->set('number_of_recent_report', count($recent_reports));
		$app->set('recent_reports', $recent_reports);
		
		// latest announcement
		//require_once "../app/models/Announcement.php";
		//$announce = new \haikal\Announcement();
		//$app->set('announcement', $announce->latest());
		
		//$app->debug();
		$this->view("index4", $app->load());
		
		
	}
	
	/* public function index2(){
		$app = $this->model("config");
		$issue = $this->model("IssueModel");
		
		$app->set("title", "Dashboard");
		$app->set("load_dashboard_js", true);
		
		// navigations
		$app->set('navigations', [
			["title" => "Home", "url" => $app->load()['url']],
			["title" => "Dashboard"]
		]);
		
		// graphs for voltage animation
		$app->set('hasGraph', true);
		
		// total issues
		$total_issues = $issue->get_total_issue();
		$app->set('total_issues', $total_issues);
		
		// total issue resolved
		$total_issue_resolved = $issue->total_issue_resolved();
		$app->set('total_issue_resolved', $total_issue_resolved);
		$app->set('percent_total_resolved', number_format(($total_issue_resolved / $total_issues * 100), 1));
		
		// total unread report (new)
		$app->set('total_unread_report', $issue->get_total_unread_report());
		
		// Network Active
		$network_api = json_decode(file_get_contents("https://v2.haikalazizan.com/mjii/api/netwatch.json"), true);
		$total_net = count($network_api);
		$total_active = 0;
		foreach($network_api as $net){
			if($net['status'] == "Connected"){
				$total_active++;
			}
		}
		$app->set('net_active', $total_active);
		$app->set('total_net', $total_net);
		$app->set('net_stats', $network_api);
		
		// Current Voltage Tangki Air
		$app->set("tangki_voltage", 0);
		
		// manage recent reports
		$recent_reports = $issue->get_unread_report();
		$app->set('number_of_recent_report', count($recent_reports));
		$app->set('recent_reports', $recent_reports);
		
		// latest announcement
		require_once "../app/models/Announcement.php";
		$announce = new \haikal\Announcement();
		$app->set('announcement', $announce->latest());
		
		//$app->debug();
		$this->view("index3", $app->load());
	} */
	
	public function start(){
		header("location: /report/create");
	}
}
