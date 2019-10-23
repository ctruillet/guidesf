<?php

namespace GuideSF;

class Controller
{
    protected $keyword;
    protected $searchResults = array();
    protected $view = '';
    protected $model;
    protected $isHome = false;

    public function __construct()
    {
        $this->model = new Model();

        if (isset($_GET['view'])) {
            $this->view = $_GET['view'];
        }
    }

    protected function before(): void
    {
        // Remove the search keyword in the user session
        if (isset($_GET['search']) && $_GET['search'] == 'reset') {
            unset($_SESSION['search']);
            unset($_GET['search']);
        }

        // Save the search keyword in the user session
        if (isset($_SESSION['search']) && !isset($_GET['search'])) {
            $_GET['search'] = $_SESSION['search'];
        }

        if (isset($_GET['search'])) {
            $this->keyword = $_GET['search'];
        }

        $this->searchResults = $this->model->search($this->keyword);
    }

    public function home(): void
    {
        $this->isHome = true;
        $this->before();
        $this->read();
    }

    public function read(): void
    {
        $this->before();
       
        $tree = $this->model->getTree();
        $sections = $this->model->getSections();

        if (empty($this->view)) {
            $this->view = reset($sections);
        }
        
        $section = $this->model->getSection($this->view);
        $sectionTitle = $this->model->getSectionTitle();

        $view = new View();
        $view->set('is_home', $this->isHome);
        $view->set('tree', $tree);
        $view->set('section_title', $sectionTitle);
        $view->set('subsection_title', $this->view);
        $view->set('sections', $sections);
        $view->set('content', $section);
        $view->set('keyword', $this->keyword);
        $view->set('search_results', $this->searchResults);
        $view->render('read.php');
    }
}
