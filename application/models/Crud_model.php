<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Crud_model
 *
 * @author durga it
 */
class Crud_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function createTopNavigation() {
        $this->db->order_by('sequence', 'asc');
        $menu = $this->db->get('menu_sequence')->result_array();
        return $menu;
    }

    public function createMegaMenu($stream_id) {

        return '<ul class="dropdown-menu megamenu">
                                        <li>
                                            <div class="row">
                                                <div class="col-md-4 text-center">
                                                    <h4>Courses</h4>
                                                    <ul class="list-unstyled mb-3">' . $this->getCourses($stream_id) . '</ul>

                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <h4>Top Branch Or Subject</h4>
                                                    <ul class="list-unstyled mb-3">' . $this->getTopBranch($stream_id) . '</ul>

                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <h4>State Wise</h4>
                                                    <ul class="list-unstyled mb-3">' . $this->getAllState($stream_id) . '</ul>
                                                </div>

                                            </div>
                                        </li>
                                    </ul>
                                </li>';
    }

    public function createMegaMenuMore($stream_id, $listed_stream) {

        $remaining_stream = $this->getAllRemainingStream($listed_stream);

//        var_dump($remaining_stream);die;

        $megamenu = '<ul class="dropdown-menu megamenu">
                                        <li>
                                            <div class="row">
                                                <!-- Nav tabs -->
                                                <div class="col-sm-3">
                                                    <ul class="tab-menu list-unstyled mb-3">';
        $counter = 1;
        foreach ($remaining_stream as $k => $v) {
            if ($counter == 1) {
                $class = 'active';
            } else {
                $class = '';
            }
            $megamenu.='<li class="nav-item"><a data-toggle="tab"  href="#' . $v['stream_id'] . '" class="nav-link ' . $class . '" role="tab" aria-controls="' . $v['stream_id'] . '">' . $v['name'] . '</a></li>';
            $counter++;
        }

        $megamenu.='</ul></div>
            <div class="col-sm-8">
              <div class="tab-content">';
        $count = 1;
        foreach ($remaining_stream as $k => $v) {
            if ($count == 1) {
                $class = 'active';
            } else {
                $class = 'hide';
            }
            $megamenu.='<div class="tab-pane ' . $class . '" id="' . $v['stream_id'] . '" role="tabpanel"> 
                                                            <div class="row">
                                                                <div class="col-md-4 text-center">
                                                                    <h4>Courses</h4>
                                                                    <ul class="list-unstyled mb-3">
                                                                        ' . $this->getCourses($v['stream_id']) . '
                                                                       

                                                                    </ul>

                                                                </div>
                                                                <div class="col-md-4 text-center">
                                                                    <h4>Top Branch Or Subject</h4>
                                                                    <ul class="list-unstyled mb-3">
                                                                       ' . $this->getTopBranch($v['stream_id']) . '

                                                                    </ul>

                                                                </div>
                                                                <div class="col-md-4 text-center">
                                                                    <h4>State Wise</h4>
                                                                    <ul class="list-unstyled mb-3">
                                                                    ' . $this->getAllState($v['stream_id']) . '
                                                                    </ul>
                                                                </div>

                                                            </div>
                                                        </div>';
            $count++;
        }

        $megamenu .='</div></div></div>';
        return $megamenu;
    }

    public function getCourses($stream_id) {
        $this->db->where('stream_id', $stream_id);
        $data = $this->db->get('courses')->result_array();
        $mega_menu = '';
        foreach ($data as $k => $v) {
            $mega_menu.='<li class="nav-item"><a href="' . base_url('college/by_course/' . $v['course_id']) . '" class="nav-link">' . $v['course_name'] . '</a></li>';
        }
        return $mega_menu;
    }

    public function getTopBranch($stream_id) {
        $mega_menu = '';
        $this->db->where('stream_id', $stream_id);
        $data = $this->db->get('courses')->result_array();
        foreach ($data as $k => $v) {
            $this->db->where('course_id', $v['course_id']);
            $branch_data = $this->db->get('branch')->result_array();
            foreach ($branch_data as $kv => $vv) {
                $mega_menu.='<li class="nav-item"><a href="' . base_url('college/by_branch/' . $vv['branch_id']) . '" class="nav-link">' . $vv['branch_name'] . '</a></li>';
            }
        }
        return $mega_menu;
    }

    public function getAllState($stream_id) {
        $this->db->limit(10);
        $data = $this->db->get('states')->result_array();
        $mega_menu = '';
        foreach ($data as $k => $v) {
            $mega_menu.='<li class="nav-item"><a href="' . base_url('college/by_state/' . $v['state_id']) . '" class="nav-link">' . $v['state_name'] . '</a></li>';
        }
        return $mega_menu;
    }

    public function getEachState() {
        $data = $this->db->get('states')->result_array();
        $mega_menu = '';
        foreach ($data as $k => $v) {
            $mega_menu.='<li class="nav-item"><a href="#" data-stateid="' . $v['state_id'] . '" class="nav-link state-change">' . $v['state_name'] . '</a></li>';
        }
        return $mega_menu;
    }

    public function getEachStream() {
        $data = $this->db->get('streams')->result_array();
        $mega_menu = '';
        foreach ($data as $k => $v) {
            $mega_menu.='<li class="nav-item"><a href="#" data-streamid="' . $v['stream_id'] . '" class="nav-link stream-change">' . $v['name'] . '</a></li>';
        }
        return $mega_menu;
    }

    public function getEachCity() {
        $data = $this->db->get('cities')->result_array();
        $mega_menu = '';
        foreach ($data as $k => $v) {
            $mega_menu.='<li class="nav-item"><a href="#" data-cityid="' . $v['city_id'] . '" class="nav-link city-change">' . $v['city_name'] . '</a></li>';
        }
        return $mega_menu;
    }

    public function getAllRemainingStream($stream) {
        $this->db->where_not_in('stream_id', $stream);
        return $this->db->get('streams')->result_array();
    }

    public function createCityStateOption() {
        $state = $this->getAllStates();
        $state_city_select = '';
        foreach ($state as $k => $v) {
            $state_city_select.='<optgroup label="' . $v['state_name'] . '">';
            $city = $this->getAllCityByState($v['state_id']);
            foreach ($city as $ck => $cv) {
                $state_city_select.='<option class="city_group" style="padding:.3em" value="' . $cv['city_id'] . '">' . $cv['city_name'] . '</option>';
            }
            $state_city_select.='</optgroup>';
        }
        return $state_city_select;
    }

    public function getAllStates() {
        return $this->db->get('states')->result_array();
    }
     public function getAllStreams() {
        return $this->db->get('streams')->result_array();
    }
    
   

    public function getAllCityByState($state_id) {
        $this->db->where('state_id', $state_id);
        return $this->db->get('cities')->result_array();
    }

    public function createCourseStreamOption() {
        $streams = $this->getAllStreams();
        $course_stream_select = '';
        foreach ($streams as $k => $v) {
            $course_stream_select.='<optgroup label="' . $v['name'] . '">';
            $course = $this->getAllCourseByStream($v['stream_id']);
            foreach ($course as $ck => $cv) {
                $course_stream_select.='<option class="course_group" style="padding:.3em" value="' . $cv['course_id'] . '">' . $cv['course_name'] . '</option>';
            }
            $course_stream_select.='</optgroup>';
        }
        return $course_stream_select;
    }

   

    public function getAllCourseByStream($stream_id) {
        $this->db->where('stream_id', $stream_id);
        return $this->db->get('courses')->result_array();
    }

    public function createCityStateOptionSelected($city_selected = 0) {
        $state = $this->getAllStates();
        $state_city_select = '';
        foreach ($state as $k => $v) {
            $state_city_select.='<optgroup label="' . $v['state_name'] . '">';
            $city = $this->getAllCityByState($v['state_id']);
            foreach ($city as $ck => $cv) {
                if ($city_selected == $cv['city_id']) {
                    $text = 'selected';
                } else {
                    $text = '';
                }
                $state_city_select.='<option ' . $text . '  class="city_group" style="padding:.3em" value="' . $cv['city_id'] . '">' . $cv['city_name'] . '</option>';
            }
            $state_city_select.='</optgroup>';
        }
        return $state_city_select;
    }

    public function createCourseList($stream_id) {
        $courses = $this->getAllCourseByStream($stream_id);
        $ul = '<ul class="new-course-list">';
        foreach ($courses as $k => $v) {
            $ul.='<li><a href="' . base_url() . 'getByCourse/' . $v['course_id'] . '"><span class="badge badge-success">' . strtoupper($v['course_name']) . '</span></a></li>';
        }
        $ul.="</ul>";
        return $ul;
    }

    public function createNewsTags() {
        $tags = $this->getAllTags();
        $alltags = '';
        $tag_ul = '';
        foreach ($tags as $k => $v) {
            $alltags.=',';
            $alltags.=$v['tags'];
        }
        $tags_array = array_unique(array_filter(explode(',', $alltags)));
        foreach ($tags_array as $kk => $vv) {
            $tag_ul.=' <li class="list-inline-item"><a href="' . base_url() . 'news/' . $vv . '"><i class="fa fa-tags"></i>' . $vv . '</a></li>';
        }
        return $tag_ul;
    }

    function getAllTags() {
        $this->db->select('tags');
        $this->db->from('news');
        return $this->db->get()->result_array();
    }
    
    function getCollegeByCity($city){
        $this->db->select('college_id,college_name');
        $this->db->from('colleges');
        $this->db->where('city_id',$city);
        return $this->db->get()->result_array();
        
    }
    
    function addReview($params){
        return $this->db->insert('reviews',$params);
    }
    
    function getCollegeRating($college_id){
        $this->db->select('sum(rate) as rate,count(review_id) as total_review');
        $this->db->from('reviews');
        $this->db->where('college_id',$college_id);
        return $this->db->get()->row();
    }
    function getCourseDetails($course_id){
        $this->db->select('c.course_name,c.course_type,c.years');
        $this->db->from('courses c');
        $this->db->where('course_id',$course_id);
        return $this->db->get()->row();
    }
    
    function getFees($course_id,$college_id){
        $this->db->where('course_id',$course_id);
        $this->db->where('college_id',$college_id);
        return $this->db->get('fees')->result_array();
    }
    function getBranchById($id){
        return $this->db->get_where('branch',array('branch_id'=>$id))->row();
    }
    
    function addSubscription($params){
        return $this->db->insert('subscription',$params);
    }
    
    function searchCourse($keywords){
        $this->db->select('course_id,course_name');
        $this->db->from('courses');
        $this->db->like('course_name', $keywords, 'after');
        return $this->db->get()->result_array();
    }
    
    function getSubstreamByCourse($course_id){
        $this->db->where('course_id'); 
        return $this->db->get('branch')->result_array();
    }

}
