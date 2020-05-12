<?php
    include './_external_autoload.php';
    $instance = new contrllers\IndexController();
    $instance->index();
    
    $topickCillection = $instance->getTopicCollection();
    //$currentPage = 1;
    $currentPage = isset($_GET['offset']) ? $_GET['offset'] : 0;
?>
<!DOCTYPE html>
<<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style/style.css"/>
    </head>
    <body>
        
        <div id="wrapper">
            <form method="POST" name="public_board">
                
                <?php if (!$instance->hasTopicId()) {
                    echo '<input name="topick_title" placeholder="Тема"/>';
                }
                ?>
                
                <textarea name="opinion_conten" placeholder="Коментар"></textarea>
                
                <input name="opinion_author" placeholder="Вашето име"/>
                
                <input type="hidden" name="tokken" value="1"/>
                
                <input class="button" type="submit" value="Изкажи се" /> 
                
            </form>
            
            <div class="opinion">
                <?php
                
                if(!is_null($topicCillection)){
                
                foreach ($topicCоllection as $instance){
                    echo '<div class="opinion-entry">';
                    echo '<h3>'.$element['title'].'</h3>';  
                    echo '<div>'.$element['content'].'</div>';  
                    echo '</div>';
                    }  
                }
                else {
                    echo 'Няма коментари';
               }
                ?>
            </div>
            <a class="pagination" href="http://localhost/Public_Bord/index.php?offset=<?php echo $currentPage -1; ?>">Предишна</a>
            <a class="pagination" href="http://localhost/Public_Bord/index.php?offset=<?php echo $currentPage +1; ?>">Следваща</a>
        </div>    
    </body>
</html>
