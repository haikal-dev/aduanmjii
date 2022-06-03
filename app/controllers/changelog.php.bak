<?php

class changelog extends Controller
{
    public function index(){
        $app = $this->model("config");
        $issue = $this->model("IssueModel");

        $app->set("title", "Version Update");

        $app->set('navigations', [
            ["title" => "Home", "url" => $app->load()['url']],
            ["title" => "App Version Changelog"]
        ]);

        // manage recent reports
		$recent_reports = $issue->get_unread_report();
		$app->set('number_of_recent_report', count($recent_reports));
		$app->set('recent_reports', $recent_reports);

        //$app->debug();
        $this->view("changelog", $app->load());
    }
}