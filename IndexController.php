<?php



namespace contrllers;

class IndexController {
    
    private $topicCollection;
    
    public function index() {
        
        $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
        
        $requestArgumentCollection = array(
            'id'=> $this->getTopicId(),
            'offset' => $offset
        );
        
        $this->topicCollection  = \models\TopickModel::readWithOpinion($requestArgumentCollection); //Масив! Глобална променлива!
      // List all opinions based on this topick 
        if(isset($_POST['tokken'])&& $_POST['tokken'] ==1 ){
            $this->create();            
        }
    }
    
    public function create() {
        
      if($this->hasTopicId()) {
                $opinionContent = $_POST['opinion_content'];
                $opinionAutor   = $_POST['opinion_author'];
                
                $opinionId = \models\OpinionModel::create($this->getTopicId(), $opinionContent, $opinionAutor);
                 
                if(!is_null($opinionId)){
                   $requestArgumentCollection = array(
                       'id'=> $this->getTopicId()    
                   ); 
                   $this->topicCollection  = \models\TopickModel::readWithOpinion($requestArgumentCollection); //Масив! Глобална променлива!
                }
                return;
            }
            
            $topickTitle   = $_POST['topick_title'];
            $topickId = \models\TopickModel::create($topickTitle);
            
            if(!is_null($topickId)) {
                
                $opinionContent = $_POST['opinion_content'];
                $opinionAutor   = $_POST['opinion_author'];
                
                $opinionId = \models\OpinionModel::create($topickId, $opinionContent, $opinionAutor);
                
                if(!is_null($opinionId)){
                    
                   $requestArgumentCollection = array(
                       'id'=> $topickId    
                   );
                    
                   $this->topicCollection  = \models\TopickModel::readWithOpinion($topickId); //Масив! Глобална променлива!
                   //$this->topicId          = $topickId;
                   $_SESSION['topick_id']  = $topickId;
                }
            }
    }
    
    public function getTopicCollection(){
        return $this->topicCollection;
    }
    
    public function getTopicId() {
        
        if(isset($_SESSION['topick_id'])) {
            return $_SESSION['topick_id'];
        }
    }
    
    public function hasTopicId() {
        return !is_null($this->getTopicId());
    }
}
